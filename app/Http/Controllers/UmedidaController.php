<?php

namespace SIS\Http\Controllers;

use Illuminate\Http\Request;

use SIS\Http\Requests;
use SIS\Http\Requests\UmedidaRequest;
use SIS\Umedida;
use Toastr;
use Yajra\DataTables\DataTables;

class UmedidaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        return view('umedidas.index');
    }

    public function apiUmedidas()
    {
        $umedidas = Umedida::orderBy('nombre','ASC')->get();
        return Datatables::of($umedidas)
                            ->addColumn('action','umedidas.partials.acciones')
                            ->toJson();
    }

    public function create()
    {
        return view('umedidas.create');
    }

    public function store(UmedidaRequest $request)
    {
        Umedida::create($request->all());
        Toastr::success('Unidad de Medida creado con exito','Correcto!');

        return redirect()->route('umedidas.index');
    }

    public function show($id)
    {
        $umedida = Umedida::find($id);
        return view('umedidas.show',compact('umedida'));
    }

    public function edit($id)
    {
        $umedida = Umedida::find($id);
        return view('umedidas.edit',compact('umedida'));
    }

    public function update(UmedidaRequest $request, $id)
    {
        $umedida = Umedida::find($id);
        $umedida->fill($request->all())->save();

        Toastr::info('Unidad de Medida actualizado con exito','Actualizado!');

        return redirect()->route('umedidas.index');
    }

    public function destroy($id)
    {
        Umedida::find($id)->delete();

        Toastr::error('Unidad de Medida eliminado correctamente','Eliminado!');

        return back();
    }
}
