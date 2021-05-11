<?php

namespace SIS\Http\Controllers;

use Illuminate\Http\Request;
use SIS\Http\Requests;
use SIS\Http\Requests\DestinoRequest;
use SIS\Destino;
use SIS\Area;
use Toastr;
use Yajra\DataTables\DataTables;

class DestinoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
		$destinos = Destino::orderBy('nombre','ASC')->pluck('nombre','id');
        return view('destinos.index', compact('destinos'));
    }

    public function create() {
        $areas = Area::orderBy('nombre','ASC')->pluck('nombre','id');
        return view('destinos.create', compact('areas'));
    }

    public function apiDestinos()
    {
        $destinos = Destino::orderBy('nombre','ASC')->with('area')->get();
        return Datatables::of($destinos)
                            ->addColumn('action','destinos.partials.acciones')
                            ->toJson();
    }

    public function store(DestinoRequest $request)
    {
        Destino::create($request->all());
        Toastr::success('Destino creado con exito','Correcto!');

        return redirect()->route('destinos.index');
    }

    public function show($id)
    {
        $destino = Destino::find($id);
        return view('destinos.show',compact('destino'));
    }

    public function edit($id)
    {
        $destino = Destino::find($id);
        $areas = Area::orderBy('nombre','ASC')->pluck('nombre','id');
        return view('destinos.edit',compact('destino','areas'));
        
    }

    public function update(DestinoRequest $request, $id)
    {
        $destino = Destino::find($id);
        $destino->fill($request->all())->save();

        Toastr::info('Destino actualizado con exito','Actualizado!');

        return redirect()->route('destinos.index');
    }

    public function destroy($id)
    {
        Destino::find($id)->delete();
        Toastr::error('Categoria eliminado correctamente','Eliminado!');

        return back();
    }
}
