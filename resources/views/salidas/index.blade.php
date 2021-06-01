@extends('layouts.master')

@section('title')
    Salidas
@endsection

@section('head-content')
	<h1>
		<i class="fa fa-sign-out"></i>
		SALIDAS
		<small>Listado de salidas registrados en el sistema</small>
	</h1>
@endsection

@section('main-content')
<div class="box">
	<div class="box-header with-border">
	 	<h3 class="box-title"><i class="fa fa-sign-out"></i> LISTA DE SALIDAS REGISTRADOS</h3>

	 	<div class="box-tools">
	 		<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          	</button>
          	<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
          	</button>
	  	</div>
	</div>
	<div class="box-body">
		@can('salidas.create')
			<a href="{{ route('salidas.create') }}" class="btn btn-flat btn-primary pull-right">
				<i class="fa fa-plus"></i> NUEVA SALIDA
			</a>
		@endcan
		
		<br><br>
        <table id="salidas" class="table table-bordered table-striped table-hover">
        	<thead>
        		<tr class="bg-black">
					<th>ID</th>
					<th>Fecha</th>
					<th>U. Ejecutora</th>
					<th>Funcionario</th>
					<th>Cantidad</th>
					<th>Total</th>
					<th>Observaciones</th>
					<th>Usuario</th>
					<th width="12%">&nbsp;</th>
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
    $('#salidas').DataTable({
    	language: {
            url: "{{ asset('plugins/datatables.net/Spanish.json') }}",
        	searchPlaceholder: "Buscar salidas..."
        },
        order: [[ 1, "desc" ]],
        processing: true,
        serverSide: true,
        ajax: '{!! route('salidas.apiSalidas') !!}',
        columns: [
			{data: 'id'},
			{data: 'created_at'},
			{data: 'destino.sigla'},
			{data: 'funcionario'},
			{data: 'cantidad', className: 'text-right'},
			{data: 'total', className: 'text-right'},
			{data: 'observacion'},
			{data: 'user.nickname'},
            { data: 'action', orderable: false, searchable: false},
        ],
    });
    
  })
</script>
@endsection