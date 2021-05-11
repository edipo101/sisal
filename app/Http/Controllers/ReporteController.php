<?php

namespace SIS\Http\Controllers;

use Illuminate\Http\Request;

use SIS\Http\Requests;
use SIS\Producto;
use SIS\DetalleIngreso;
use SIS\Almacen;
use Toastr;
use Yajra\DataTables\DataTables;

class ReporteController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index()
    {
        return view('reportes.index');
    }

    public function productosAlmacen(){
        $productos = Producto::all();
        $almacen = Almacen::find(\Auth::user()->almacen_id);
        return view('reportes.productos', compact('productos','almacen'));
    }
    
    public function kardexProducto(Request $request){
        return view('reportes.kardex');
    }
    
    public function apiKardexs()
    {
        $productos = Producto::with('categoria')->orderBy('id','DESC')->get();

        return Datatables::of($productos)
                            ->addColumn('action','reportes.partials.acciones')
                            ->editColumn('imagen',function($producto){
                                return '<img src="'.asset('/img/productos/'. $producto->imagen).'" class="img-responsive" width="50px">';
                            })
                            ->rawColumns(['imagen','action'])
                            ->toJson();
    }

    public function informeProducto($id){
        $producto = Producto::find($id);
        $detalleingresos = DetalleIngreso::where('producto_id',$id)->get();
        return view('reportes.imprimir.informekardex', compact('producto','detalleingresos'));
    }
}
