<?php

namespace SIS\Http\Controllers;

use Illuminate\Http\Request;

use SIS\Http\Requests;
use SIS\Http\Requests\ProductoRequest;
use Illuminate\Support\Facades\Storage;
use DB;
use SIS\Producto;
use SIS\Ingreso;
use SIS\DetalleIngreso;
use SIS\Categoria;
use SIS\Umedida;
use SIS\Almacen;
use Toastr;
use Yajra\DataTables\DataTables;

use App;


class ProductoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $almacenes = Almacen::orderBy('nombre','ASC')->pluck('nombre','id');
        $almacenid = auth()->user()->almacen_id;
        return view('productos.index', compact('almacenes','almacenid'));
    }

    public function apiProductos(){
        $productos = Producto::with('categoria')->with('umedida')->orderBy('id','DESC')->get();      
        return Datatables::of($productos)
            ->addColumn('action','productos.partials.acciones')
            ->addColumn('cantidadtotal', function($producto){
                return $producto->stock_almacen(auth()->user()->almacen_id);
                // return $producto->stock_actual;
            })
            ->editColumn('imagen',function($producto){
                return '<img src="'.asset('/img/productos/'. $producto->imagen).'" class="img-responsive" width="50px">';
              })
            ->editColumn('promedio',function($producto){
                return $producto->detalle_ingresos->avg('precio_ingreso')==null ? '0.00' : number_format($producto->detalle_ingresos->avg('precio_ingreso'),2);
            })
            ->editColumn('umedida.prefijo',function($producto){
                return '<span class="label label-primary">'.$producto->umedida->prefijo.'</span>';
            })
            ->rawColumns(['imagen','umedida.prefijo','action'])
            ->toJson();
    }

    //cargar datatable por almacen
    public function getProductoAlmacen($id_almacen){
        $productos = Producto::with('categoria')->with('umedida')->orderBy('id','DESC')->get();
        
        return Datatables::of($productos)
                            ->addColumn('action','productos.partials.acciones')
                            ->addColumn('cantidadtotal',function($producto){
                                return $producto->cantidadtotala;                              
                            })
                            ->editColumn('imagen',function($producto){
                                return '<img src="'.asset('/img/productos/'. $producto->imagen).'" class="img-responsive" width="50px">';
                              })
                            ->editColumn('promedio',function($producto){
                                return $producto->detalle_ingresos->avg('precio_ingreso')==null ? '0.00' : number_format($producto->detalle_ingresos->avg('precio_ingreso'),2);
                            })
                            ->editColumn('umedida.prefijo',function($producto){
                                return '<span class="label label-primary">'.$producto->umedida->prefijo.'</span>';
                            })
                            ->rawColumns(['imagen','umedida.prefijo','action'])
                            ->toJson();
    }

    public function getCantidadAlmacen($id){
        $producto = Producto::find($id);
        $detalles = DetalleIngreso::where('producto_id',$id)->get();
        $cantidadsalida = 0;
        foreach ($detalles as $detalle) {
            foreach ($detalle->detallesalidas as $salida) {
                $cantidadsalida += $salida->cantidad_salida;
            }
        }
        $cantidadingreso = $producto->detalle_ingresos->sum('cantidad_ingreso');
        $total = $cantidadingreso - $cantidadsalida;
        return response()->json(
            $total
        );
    }

    public function getStock(Request $request){
        $product = Producto::find($request->id);
        return $product->stock_actual;
    }

    public function getDetalleIngresos(Request $request){
        $product = Producto::find($request->id);
        return $product->detalle_ingresos;
    }

    public function getProducto($id,$c,$p){
        $resultado['producto'] = Producto::find($id)->toArray();
        $resultado['subtotal'] = $c*$p.'';
        $resultado['cantidad'] = $c;
        return response()->json(
            $resultado
        );
    }

    public function create()
    {
        $categorias = Categoria::orderBy('nombre','ASC')->pluck('nombre','id');
        $umedidas = Umedida::orderBy('nombre','ASC')->pluck('nombre','id');
        return view('productos.create', compact('categorias','umedidas'));
    }

    public function store(ProductoRequest $request)
    {
        $producto = new Producto();
        $producto->fill($request->all());
        if($request->file('foto')){
            $file = $request->file('foto');
            $extension = $file->guessExtension();
            $nombrefile = str_slug($request->nombre) . ".".$extension;
            Storage::disk('public')->put('productos/' .$nombrefile,\File::get($file));

            $producto->fill(['imagen'=>$nombrefile]);
        }
        else{
            $producto->fill(['imagen'=>'default.jpg']);
        }
        $producto->save();

        Toastr::success('Producto creado con exito','Correcto!');

        return redirect()->route('productos.index');
    }

    public function show($id)
    {
        $producto = Producto::find($id);
        return view('productos.show',compact('producto'));
    }

    public function edit($id)
    {
        $producto = Producto::find($id);
        $categorias = Categoria::orderBy('nombre','ASC')->pluck('nombre','id');
        $umedidas = Umedida::orderBy('nombre','ASC')->pluck('nombre','id');
        return view('productos.edit',compact('producto','categorias','umedidas'));
    }

    public function update(ProductoRequest $request, $id)
    {
        $producto = Producto::find($id);
        $producto->fill($request->all());

        if($request->file('foto')){
            $file = $request->file('foto');
            $extension = $file->guessExtension();
            $nombrefile = str_slug($request->nombre) . ".".$extension;
            Storage::disk('public')->put('productos/' .$nombrefile,\File::get($file));

            $producto->fill(['imagen'=>$nombrefile]);
        }
        $producto->save();

        Toastr::info('Producto actualizado con exito','Actualizado!');

        return redirect()->route('productos.index');
    }

    public function destroy($id)
    {
        Producto::find($id)->delete();

        Toastr::error('Producto eliminado correctamente','Eliminado!');

        return back();
    }
}
