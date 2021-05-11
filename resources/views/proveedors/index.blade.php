@extends('layouts.master')

@section('title')
    Proveedores
@endsection

@section('head-content')
	<h1>
		<i class="fa fa-btn fa-truck"></i>
		PROVEEDORES
		<small>Listado de Proveedores registrados en el sistema</small>
	</h1>
@endsection

@section('main-content')
<div class="box">
	<div class="box-header with-border">
	 	<h3 class="box-title"><i class="fa fa-btn fa-truck"></i> LISTA DE PROVEEDORES REGISTRADOS</h3>

	 	<div class="box-tools">
	 		<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          	</button>
          	<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
          	</button>
	  	</div>
	</div>
	<div class="box-body">
		@can('proveedors.create')
			<a href="{{ route('proveedors.create') }}" class="btn btn-flat btn-primary pull-right">
				<i class="fa fa-plus"></i> NUEVO PROVEEDOR
			</a>
		@endcan
		
		<br><br>
        <table id="proveedors" class="table table-bordered table-striped table-hover">
        	<thead>
        		<tr class="bg-black">
					<th>Nit</th>
					<th>Nombre del proveedor</th>
					<th>Direccion</th>
                    <th>Teléfono</th>
					<th width="110">&nbsp;</th>
        		</tr>
        	</thead> 
        </table>
    </div>
	<!-- /.box-body -->
</div>

@endsection

@section('scripts')
<script>
  $(function () {
    $('#proveedors').DataTable({
    	language: {
            url: "{{ asset('plugins/datatables.net/Spanish.json') }}",
        	searchPlaceholder: "Buscar proveedores..."
        },
        order: [[ 1, "desc" ]],
        processing: true,
        serverSide: true,
        ajax: '{!! route('proveedors.apiProveedors') !!}',
        columns: [
			{data: 'nit'},
			{data: 'nombre'},
			{data: 'direccion'},
            {data: 'telefono'},
            { data: 'action', orderable: false, searchable: false},
        ],
    });
    
  })
</script>
@endsection