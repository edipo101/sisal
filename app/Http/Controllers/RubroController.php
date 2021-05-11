<?php

namespace SIS\Http\Controllers;

use Illuminate\Http\Request;

use SIS\Http\Requests;
use SIS\Http\Requests\RubroRequest;
use SIS\Rubro;
use Toastr;
use Yajra\DataTables\DataTables;

class RubroController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        return view('rubros.index');
    }

    public function apiRubros()
    {
        $rubros = Rubro::orderBy('nombre','ASC')->get();
        return Datatables::of($rubros)
                            ->addColumn('action','rubros.partials.acciones')
                            ->toJson();
    }

    public function create()
    {
        return view('rubros.create');
    }

    public function store(RubroRequest $request)
    {
        Rubro::create($request->all());
        Toastr::success('Rubro creado con exito','Correcto!');

        return redirect()->route('rubros.index');
    }

    // public function show($id)
    // {
    //     $rubro = Rubro::find($id);
    //     return view('rubros.show',compact('rubro'));
    // }

    public function edit($id)
    {
        $rubro = Rubro::find($id);
        return view('rubros.edit',compact('rubro'));
    }

    public function update(RubroRequest $request, $id)
    {
        $rubro = Rubro::find($id);
        $rubro->fill($request->all())->save();

        Toastr::info('Rubro actualizado con exito','Actualizado!');

        return redirect()->route('rubros.index');
    }

    public function destroy($id)
    {
        Rubro::find($id)->delete();
        Toastr::error('Rubro eliminado correctamente','Eliminado!');

        return back();
    }
}
