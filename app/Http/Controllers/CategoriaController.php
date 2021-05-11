<?php

namespace SIS\Http\Controllers;

use Illuminate\Http\Request;
use SIS\Http\Requests;
use SIS\Http\Requests\CategoriaRequest;
use SIS\Categoria;
use Toastr;
use Yajra\DataTables\DataTables;

class CategoriaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        return view('categorias.index');
    }

    public function apiCategorias()
    {
        $categorias = Categoria::orderBy('nombre','ASC')->get();
        return Datatables::of($categorias)
                            ->addColumn('action','categorias.partials.acciones')
                            ->toJson();
    }

    public function create()
    {
        return view('categorias.create');
    }

    public function store(CategoriaRequest $request)
    {
        Categoria::create($request->all());
        Toastr::success('Categoria creado con exito','Correcto!');
        return redirect()->route('categorias.index');
    }

    public function show($id)
    {
        $categoria = Categoria::find($id);
        return view('categorias.show',compact('categoria'));
    }

    public function edit($id)
    {
        $categoria = Categoria::find($id);
        return view('categorias.edit',compact('categoria'));
    }

    public function update(CategoriaRequest $request, $id)
    {
        $categoria = Categoria::find($id);
        $categoria->fill($request->all())->save();

        Toastr::info('Categoria actualizado con exito','Actualizado!');

        return redirect()->route('categorias.index');
    }

    public function destroy($id)
    {
        Categoria::find($id)->delete();

        Toastr::error('Categoria eliminado correctamente','Eliminado!');

        return back();
    }
}
