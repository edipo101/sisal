<?php

namespace SIS\Http\Controllers;

use Illuminate\Http\Request;

use SIS\Http\Requests;
use SIS\Http\Requests\FuncionarioRequest;

use SIS\Mecanico;
// use SIS\Rubro;
use Toastr;
use Yajra\DataTables\DataTables;
use SIS\Funcionario;

class FuncionarioController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        return view('funcionarios.index');
    }

    public function apiFuncionarios()
    {
        $funcionarios = Funcionario::orderBy('nombre','ASC')->get();
        return Datatables::of($funcionarios)
                            ->addColumn('action','funcionarios.partials.acciones')
                            ->editColumn('nombre',function($funcionario){
                                return $funcionario->nombre.' '.$funcionario->apellido;
                            })
                            ->toJson();
    }

    public function create()
    {
        // $rubros = Rubro::orderBy('nombre','ASC')->pluck('nombre','id');
        return view('funcionarios.create');
    }

    public function store(FuncionarioRequest $request)
    {
        Funcionario::create($request->all());
        Toastr::success('Funcionario creado con exito','Correcto!');

        return redirect()->route('funcionarios.index');
    }

    public function show($id)
    {
        $funcionario = Funcionario::find($id);
        return view('funcionarios.show',compact('funcionario'));
    }

    public function edit($id)
    {
        $funcionario = Funcionario::find($id);
        // $rubros = Rubro::orderBy('nombre','ASC')->pluck('nombre','id');
        return view('funcionarios.edit',compact('funcionario'));
    }

    public function update(FuncionarioRequest $request, $id)
    {
        $funcionario = Funcionario::find($id);
        $funcionario->fill($request->all())->save();
        Toastr::info('Funcionario actualizado con exito','Actualizado!');


        return redirect()->route('funcionarios.index');
    }

    public function destroy($id)
    {
        Funcionario::find($id)->delete();
        Toastr::error('Funcionario eliminado correctamente','Eliminado!');

        return back();
    }
}
