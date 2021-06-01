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
					<th>Id</th>
					<th>Fecha</th>
					<th width="15px">Nro Orden</th>
					<th width="15px">Preventivo</th>
					<th width="25%">Unidad Ejecutora</th>
					<th>Cantidad</th>
					<th>Importe</th>
					<th>Tipo</th>
					<th>Usuario</th>
					<th width="106px">&nbsp;</th>
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
			{data: 'id', className: 'text-right'},
			{data: 'created_at'},
			{data: 'orden', className: 'text-right'},
			{data: 'preventivo', className: 'text-right'},
			{data: 'destino.nombre'},
			{data: 'cantidad', className: 'text-right'},
			{data: 'total', className: 'text-right'},
			{data: 'tipo'},
			{data: 'user.nickname'},
            {data: 'action', orderable: false, searchable: false},
        ],
    });
    
  })
</script>
@endsection