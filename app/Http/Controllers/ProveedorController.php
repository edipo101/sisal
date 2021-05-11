<?php

namespace SIS\Http\Controllers;

use Illuminate\Http\Request;

use SIS\Http\Requests;
use SIS\Http\Requests\ProveedorRequest;
use SIS\Proveedor;
use Toastr;
use Yajra\DataTables\DataTables;

class ProveedorController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        return view('proveedors.index');
    }

    public function apiProveedors()
    {
        $proveedors = Proveedor::orderBy('nombre','ASC')->get();
        return Datatables::of($proveedors)
                            ->addColumn('action','proveedors.partials.acciones')
                            ->toJson();
    }

    public function create()
    {
        return view('proveedors.create');
    }

    public function store(ProveedorRequest $request)
    {
        Proveedor::create($request->all());
        Toastr::success('Proveedor creado con exito','Correcto!');

        return redirect()->route('proveedors.index');
    }

    public function show($id)
    {
        $proveedor = Proveedor::find($id);
        return view('proveedors.show',compact('proveedor'));
    }

    public function edit($id)
    {
        $proveedor = Proveedor::find($id);
        return view('proveedors.edit',compact('proveedor'));
    }

    public function update(ProveedorRequest $request, $id)
    {
        $proveedor = Proveedor::find($id);
        $proveedor->fill($request->all())->save();
        Toastr::info('Proveedor actualizado con exito','Actualizado!');


        return redirect()->route('proveedors.index');
    }

    public function destroy($id)
    {
        Proveedor::find($id)->delete();

        Toastr::error('Proveedor eliminado correctamente','Eliminado!');


        return back();
    }
}
