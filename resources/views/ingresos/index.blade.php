@extends('layouts.master')

@section('title')
    Ingresos
@endsection

@section('head-content')
	<h1>
		<i class="fa fa-sign-in"></i>
		INGRESOS
		<small>Listado de ingresos registrados en el sistema</small>
	</h1>
@endsection

@section('main-content')
<div class="box">
	<div class="box-header with-border">
	 	<h3 class="box-title"><i class="fa fa-sign-in"></i> LISTA DE INGRESOS REGISTRADOS</h3>

	 	<div class="box-tools">
	 		<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          	</button>
          	<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
          	</button>
	  	</div>
	</div>
	<div class="box-body">
		@can('ingresos.create')
			<a href="{{ route('ingresos.create') }}" class="btn btn-flat btn-primary pull-right">
				<i class="fa fa-plus"></i> NUEVO INGRESO
			</a>
		@endcan
		
		<br><br>
        <table id="ingresos" class="table table-bordered table-striped table-hover">
        	<thead>
        		<tr class="bg-black">
					<th>ID</th>
					<th>Fecha</th>
					<th>Nro de Orden</th>
					<th>Preventivo</th>
					<th>U. Ejecutora</th>
					<th>Cantidad</th>
					<th>P. Total</th>
					<th>Usuario</th>
					<th width="106">&nbsp;</th>
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
    $('#ingresos').DataTable({
    	language: {
            url: "{{ asset('plugins/datatables.net/Spanish.json') }}",
        	searchPlaceholder: "Buscar ingresos..."
        },
        order: [[ 1, "desc" ]],
        processing: true,
        serverSide: true,
        ajax: '{!! route('ingresos.apiIngresos') !!}',
        columns: [
			{data: 'id'},
			{data: 'created_at'},
			{data: 'orden'},
			{data: 'preventivo'},
			{data: 'destino.nombre'},
			//{data: 'proveedor.nombre'},
			{data: 'cantidad'},
			{data: 'total'},
			{data: 'user.nombre'},
            { data: 'action', orderable: false, searchable: false},
        ],
    });
    
  })
</script>
@endsection