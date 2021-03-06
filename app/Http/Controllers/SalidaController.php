<?php

namespace SIS\Http\Controllers;

use Illuminate\Http\Request;

use SIS\Http\Requests;
use SIS\Http\Requests\SalidaRequest;

use SIS\Salida;
use SIS\Almacen;
use SIS\Destino;
use SIS\Funcionario;
// use SIS\Mecanico;
// use SIS\Conductor;
use SIS\Producto;
use SIS\DetalleIngreso;
use SIS\DetalleSalida;
use DB;
use Toastr;
use Yajra\DataTables\DataTables;

use App;

class SalidaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        return view('salidas.index');
    }

    public function apiSalidas()
    {
        if(auth()->user()->rol == 'admin')
            $salidas = Salida::with('destino')->with('funcionario')->with('user')->orderBy('id','DESC')->get();
        else
            $salidas = Salida::with('destino')->with('funcionario')->with('user')->where('user_id',auth()->id())->orderBy('id','DESC')->get();
        return Datatables::of($salidas)
        ->addColumn('action','salidas.partials.acciones')
        ->addColumn('funcionario',function($salida){
            return $salida->funcionario->fullnombre;
        })
        ->editColumn('created_at',function($salida){
            return $salida->created_at->format('d/m/Y').'<br>'.$salida->created_at->format('h:i:s a');
        })
        ->editColumn('destino.sigla',function($salida){
            return $salida->destino->upper_nombre;
        })
        ->editColumn('cantidad', function($salida){
            return number_format($salida->cantidad, 2);
        })
        ->editColumn('total',function($salida){
            return number_format($salida->total, 2);
        })
        ->rawColumns(['created_at','destino.sigla','total','action'])
        ->toJson();
    }

    public function create()
    {
        $destinos = Destino::orderBy('nombre','ASC')->get()->pluck('fulldestino','id');
        $funcionarios = Funcionario::orderBy('nombre','ASC')->get()->pluck('fullnombre','id');
        $detalleingresos = DetalleIngreso::orderBy('id','ASC')->pluck('id','id');
        $productos = Producto::orderBy('nombre','ASC')->get();
        // return $productos;
        return view('salidas.create', compact('destinos','productos','funcionarios','detalleingresos'));
        // return view('salidas.create_disabled', compact('destinos','productos','funcionarios','detalleingresos'));
    }

    public function store(SalidaRequest $request)
    {
        // return $request->all();
        try {
            DB::beginTransaction();
            
            $salida = new Salida();
            $salida->fill($request->all());
            $salida->user_id = \Auth::user()->id;
            $salida->almacen_id = \Auth::user()->almacen_id;            
            // return $salida;
            $salida->save();

            if (isset($request->detalles)){
                foreach (json_decode($request->detalles) as $detail) {
                    $detalle = new DetalleSalida();
                    $detalle->salida_id = $salida->id;
                    $detalle->producto_id = $detail->id;

                    $producto = Producto::find($detalle->producto_id);
                    $detalle->stock_inicial = $producto->stock_actual;
                    $detalle->saldo_inicial = $producto->saldo_actual;
                    
                    $detalle->cantidad = $detail->quantity;
                    $detalle->precio = $detail->price;
                    $detalle->subtotal = $detail->subtotal;
                    
                    $detalle->detalle_ingreso_id = $detail->detalle_ingreso_id;
                    $detalle->save();
                    echo($detalle.'<br>');

                    $detalle_ingreso = $detalle->detalle_ingreso;
                    $detalle_ingreso->stock_ingreso -= $detalle->cantidad;
                    $detalle_ingreso->save();
                    echo($detalle_ingreso.'<br>');
                }
            }    
            // return 0;
            DB::commit();
            Toastr::success('Registro de salida creado con ??xito','Correcto!');
        } catch (Exception $e) {
            DB::rollBack();
            Toastr::error('Error con el registro de datos','Error!');
        }

        return redirect()->route('salidas.index');
    }

    public function show($id)
    {
        $salida = Salida::find($id);
        return view('salidas.show',compact('salida'));
    }

    public function destroy($id)
    {
        Salida::find($id)->delete();
        DetalleSalida::where('salida_id',$id)->delete();
        
        Toastr::error('Salida Anulado correctamente','Eliminado!');

        return back();
    }


    public function reportesalida($id){
        $salida = Salida::find($id);
        $almacen = Almacen::find(\Auth::user()->almacen_id);
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('salidas.volante', compact('salida','almacen'));
        $pdf->setPaper('letter');
        return $pdf->stream();
    }

    public function edit($id){
        $salida = Salida::find($id);
        return view('salidas.edit', compact('salida'));
    }
    public function update(Request $request, $id)
    {
        $salida = Salida::find($id);
        $salida->created_at = $request->created_at;
        $salida->updated_at = $request->created_at;
        $salida->save();
        foreach ($salida->detallesalidas as $detalle) {
            $detalle->created_at = $request->created_at;
            $detalle->updated_at = $request->created_at;
            $detalle->save();
        }

        Toastr::info('Producto actualizado con exito','Actualizado!');

        return redirect()->route('salidas.index');
    }
}
