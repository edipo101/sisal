<?php

namespace SIS\Http\Controllers;

use Illuminate\Http\Request;

use SIS\Http\Requests;
use SIS\Http\Requests\IngresoRequest;

use SIS\Ingreso;
use SIS\Almacen;
use SIS\Proveedor;
use SIS\Producto;
use SIS\DetalleIngreso;
use SIS\Destino;

use Toastr;
use Yajra\DataTables\DataTables;

use App;

class IngresoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        return view('ingresos.index');
    }

    public function apiIngresos()
    {
        if(auth()->user()->rol == 'admin')
            $ingresos = Ingreso::with('proveedor')->with('user')->with('destino')->orderBy('id','DESC')->get();
        else
            $ingresos = Ingreso::with('proveedor')->with('user')->with('destino')->where('user_id',auth()->id())->orderBy('id','DESC')->get();
        return Datatables::of($ingresos)
                            ->addColumn('action','ingresos.partials.acciones')
                            ->editColumn('created_at',function($ingreso){
                                return $ingreso->created_at->format('d/m/Y').'<br>'.$ingreso->created_at->format('h:i:s a');
                            })
                            ->rawColumns(['created_at','action'])
                            ->toJson();
    }

    public function getDetalleIngreso($id){
        $detalles = DetalleIngreso::where('producto_id',$id)->get();
        $lista = [];
        foreach ($detalles as $detalle) {
            if($detalle->ingreso->almacen_id!=auth()->user()->almacen_id)
                continue;
            $lista = array_add($lista, $detalle->id, ['id'=>$detalle->id,'orden' => $detalle->ingreso->orden]);
        }
        return response()->json(
            $lista
        );
    }

    public function getDetalleIngresoDestino($id, $destino_id){
        $detalles = DetalleIngreso::join('ingresos', 'detalle_ingresos.ingreso_id','=','ingresos.id')->where('producto_id',$id)->where('destino_id',$destino_id)->orderBy('detalle_ingresos.id','DESC')->get();
       // $detalles = DetalleIngreso::with('ingreso')->where('producto_id',$id)->where('destino_id',$destino_id)->get();
        $lista = [];
        foreach ($detalles as $detalle) {
            if($detalle->ingreso->almacen_id!=auth()->user()->almacen_id)
                continue;
            $lista = array_add($lista, $detalle->id, ['id'=>$detalle->id,'orden' => $detalle->ingreso->orden]);
        }
        return response()->json(
            $lista
        );
    }

    public function getDetalleDestino($destino_id){
        $detalles = DetalleIngreso::join('ingresos', 'detalle_ingresos.ingreso_id','=','ingresos.id')->with('producto')->where('destino_id',$destino_id)->get();
        
       // $detalles = DetalleIngreso::with('ingreso')->where('producto_id',$id)->where('destino_id',$destino_id)->get();
        $lista = [];
        foreach ($detalles as $detalle) {
            if($detalle->ingreso->almacen_id!=auth()->user()->almacen_id)
                continue;
            $lista = array_add($lista, $detalle->id, ['id'=>$detalle->producto_id,'producto' => $detalle->producto->nombre]);
        }
        return response()->json(
            $lista
        );
    }

    public function getProductoCantidad($id, $idproducto){
        // $prod = Producto::find($producto);
        $detalle = DetalleIngreso::where('producto_id',$idproducto)->where('id',$id)->first();
        $cantidadsalida = 0;
        foreach ($detalle->detallesalidas as $salida) {
            $cantidadsalida += $salida->cantidad_salida;
        }
        $cantidadingreso = $detalle->cantidad_ingreso;
        $total = $cantidadingreso - $cantidadsalida;
        $lista = ['cantidad' => $total, 'precio_ingreso' => $detalle->precio_ingreso ];
        return response()->json(
            $lista
        );
    }

    public function create()
    {
        $proveedors = Proveedor::orderBy('nombre','ASC')->pluck('nombre','id');
        $productos = Producto::orderBy('nombre','ASC')->pluck('nombre','id');
        $destinos = Destino::orderby('nombre','ASC')->get()->pluck('FullDestino','id');
        return view('ingresos.create', compact('proveedors','productos','destinos'));
    }

    public function store(IngresoRequest $request)
    {
        $ingreso = new Ingreso();
        $ingreso->fill($request->all());
        $ingreso->user_id = \Auth::user()->id;
        $ingreso->almacen_id = \Auth::user()->almacen_id;
        $ingreso->save();
        $items_id = explode(',',$request->item);
        $items_cantidad = explode(',',$request->cantidaditem);
        $items_precio = explode(',',$request->precioitem);
        $items_subtotal = explode(',',$request->totalitem);

        for ($i=0; $i < count($items_id); $i++) {
            // DETALLE DEL INGRESO
            $detalle = new DetalleIngreso();
            $detalle->producto_id = $items_id[$i];
            $detalle->ingreso_id = $ingreso->id;
            $detalle->cantidad_ingreso = $items_cantidad[$i];
            $detalle->precio_ingreso = $items_precio[$i];
            $detalle->subtotal = $items_subtotal[$i];
            $detalle->save();
        }
        // Ingreso::create($request->all());
        Toastr::success('Ingreso creado con exito','Correcto!');
        return redirect()->route('ingresos.index');
    }

    public function show($id)
    {
        $ingreso = Ingreso::find($id);
        return view('ingresos.show',compact('ingreso'));
    }

    public function destroy($id)
    {
        Ingreso::find($id)->delete();
        DetalleIngreso::where('ingreso_id',$id)->delete();

        Toastr::error('Ingreso Anulado correctamente','Eliminado!');

        return back();
    }


    public function reporteingreso($id){
        $ingreso = Ingreso::find($id);
        $almacen = Almacen::find(\Auth::user()->almacen_id);
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('ingresos.volante', compact('ingreso', 'almacen'));
        $pdf->setPaper('letter');
        return $pdf->stream('prueba.pdf');
    }

    public function edit($id){
        $ingreso = Ingreso::find($id);
        $proveedors = Proveedor::orderBy('nombre','ASC')->pluck('nombre','id');
        $productos = Producto::orderBy('nombre','ASC')->pluck('nombre','id');

        return view('ingresos.edit', compact('ingreso','proveedors','productos'));
    }
    public function update(Request $request, $id)
    {
        $ingreso = Ingreso::find($id);
        $ingreso->created_at = $request->created_at;
        $ingreso->updated_at = $request->created_at;
        $ingreso->save();
        foreach ($ingreso->detalleingresos as $detalle) {
            $detalle->created_at = $request->created_at;
            $detalle->updated_at = $request->created_at;
            $detalle->save();
        }

        Toastr::info('La fecha del ingreso actualizado con exito','Actualizado!');

        return redirect()->route('ingresos.index');
    }
}