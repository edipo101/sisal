@extends('roles.box')

@section('subtitle','Gestionar roles en el sistema')

@section('breadcrumbs')
	{{ breadcrumbs('roles') }}
@endsection

@section('title','LISTA DE ROLES')

@section('buttons')
	@can('roles.create')
	<a href="{{ route('roles.create') }}" class="btn btn-sm btn-primary">
		<i class="fa fa-plus-circle"></i> NUEVO ROL
	</a>
	@endcan
@endsection

@section('body')
<table id="roles" class="table table-bordered table-striped table-hover">
	<thead>
		<tr>
			<th width="10px">#</th>
			<th>NOMBRE ROL</th>
			<th>DESCRIPCION</th>
			<th>URL</th>
			<th>PERMISOS</th>
			<th>USUARIOS</th>
			<th width="8%">&nbsp;</th>
		</tr>
	</thead> 
</table>
@endsection

@section('scripts')
<script>
	const dataRoles = [
		{ data: 'numero_index'},
		{ data: 'name'},
		{ data: 'description'},
		{ data: 'slug'},
		{ data: 'permisos'},
		{ data: 'usuarios'},
		{ data: 'action', orderable: false, searchable: false},
	];
	const apiRoles = '{!! route('roles.apiRoles') !!}';
    let tabla = $('#roles').DataTable(
		confDataTable(apiRoles,dataRoles,'rol')
	);
	const eliminarRole = id => {
		let ruta = `${direccion}/administracion/roles/${id}/delete`
		eliminar(ruta,'rol',tabla)
	};
</script>
@endsection