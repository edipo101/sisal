@extends('users.box')

@section('subtitle','Gestionar usuarios en el sistema')

@section('breadcrumbs')
    {{ breadcrumbs('users') }}
@endsection

@section('title','LISTA DE USUARIOS')

@section('buttons')
	@can('users.create')
	<a href="{{ route('users.create') }}" class="btn btn-sm btn-primary">
		<i class="fa fa-plus-circle"></i> NUEVO USUARIO
	</a>
	@endcan
@endsection

@section('body')
<table id="users" class="table table-bordered table-striped table-hover">
	<thead>
		<tr>
			<th width="10px">#</th>
			<th>NOMBRE</th>
			<th>USUARIO</th>
			<th>ROLES</th>
			<th width="10%">ESTADO</th>
			<th width="8%">&nbsp;</th>
		</tr>
	</thead> 
</table>
@endsection

@section('scripts')
<script>
	const dataUsers = [
		{ data: 'numero_index'},
		{ data: 'nombre'},
		{ data: 'nickname'},
		{ data: 'rol'},
		{ data: 'estado'},
		{ data: 'action', orderable: false, searchable: false},
	];
	const apiUsers = '{!! route('users.apiUsers') !!}';
    let tabla = $('#users').DataTable(
		confDataTable(apiUsers,dataUsers,'usuario')
	);
	const eliminarUser = id => {
		let ruta = `${direccion}/administracion/users/${id}/delete`
		eliminar(ruta,'usuario',tabla)
	};
</script>
@endsection