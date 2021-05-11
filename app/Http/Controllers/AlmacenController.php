<?php
namespace SIS\Http\Controllers;
use Illuminate\Http\Request;
use SIS\Http\Requests;
use SIS\Http\Requests\AlmacenRequest;
use SIS\Almacen;
use Toastr;
use Yajra\DataTables\DataTables;

class AlmacenController extends Controller {
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        return view('almacenes.index');
    }

    public function apialmacenes()
    {
        $almacenes = Almacen::orderBy('nombre','ASC')->get();
        return Datatables::of($almacenes)
                            ->addColumn('action','almacenes.partials.acciones')
                            ->toJson();
    }

    public function create()
    {
        return view('almacenes.create');
    }

    public function store(AlmacenRequest $request)
    {
        Almacen::create($request->all());
        Toastr::success('Almacen creado con exito','Correcto!');
        return redirect()->route('almacenes.index');
    }

    public function show($id)
    {
        $almacen = Almacen::find($id);
        return view('almacenes.show',compact('almacen'));
    }

    public function edit($id)
    {
        $almacen = Almacen::find($id);
        return view('almacenes.edit',compact('almacen'));
    }

    public function update(AlmacenRequest $request, $id)
    {
        $almacen = Almacen::find($id);
        $almacen->fill($request->all())->save();

        Toastr::info('Almacen actualizado con exito','Actualizado!');

        return redirect()->route('almacenes.index');
    }

    public function destroy($id)
    {
        Almacen::find($id)->delete();

        Toastr::error('Almacen eliminado correctamente','Eliminado!');

        return back();
    }
}
