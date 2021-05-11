<?php
namespace SIS\Http\Controllers;
use Illuminate\Http\Request;
use SIS\Http\Requests;
use SIS\Http\Requests\AreaRequest;
use SIS\Area;
use Toastr;
use Yajra\DataTables\DataTables;

class AreaController extends Controller {
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        return view('areas.index');
    }

    public function apiAreas()
    {
        $areas = Area::orderBy('nombre','ASC')->get();
        return Datatables::of($areas)
                            ->addColumn('action','areas.partials.acciones')
                            ->toJson();
    }

    public function create()
    {
        return view('areas.create');
    }

    public function store(AreaRequest $request)
    {
        Area::create($request->all());
        Toastr::success('Area creado con exito','Correcto!');
        return redirect()->route('areas.index');
    }

    public function show($id)
    {
        $area = Area::find($id);
        return view('areas.show',compact('area'));
    }

    public function edit($id)
    {
        $area = Area::find($id);
        return view('areas.edit',compact('area'));
    }

    public function update(AreaRequest $request, $id)
    {
        $area = Area::find($id);
        $area->fill($request->all())->save();

        Toastr::info('Area actualizado con exito','Actualizado!');

        return redirect()->route('areas.index');
    }

    public function destroy($id)
    {
        Area::find($id)->delete();

        Toastr::error('Area eliminado correctamente','Eliminado!');

        return back();
    }
}
