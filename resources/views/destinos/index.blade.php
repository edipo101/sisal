@extends('layouts.master')

@section('title')
    Unidades Ejecutoras
@endsection

@section('head-content')
	<h1>
		<i class="fa fa-btn fa-send"></i>
		UNIDADES EJECUTORAS
		<small>Listado de Unidades Ejecutoras registrados en el sistema</small>
	</h1>
@endsection

@section('main-content')
<div class="box">
	<div class="box-header with-border">
	 	<h3 class="box-title"><i class="fa fa-btn fa-send"></i> LISTA DE UNIDADES EJECUTORAS REGISTRADOS</h3>

	 	<div class="box-tools">
	 		<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          	</button>
          	<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
          	</button>
	  	</div>
	</div>
	<div class="box-body">
		@can('destinos.create')
			<a href="{{ route('destinos.create') }}" class="btn btn-flat btn-primary pull-right">
				<i class="fa fa-plus"></i> NUEVA UNIDAD EJECUTORA
			</a>
		@endcan
		<br><br>
        <table id="destinos" class="table table-bordered table-striped table-hover">
        	<thead>
        		<tr class="bg-black">
					<th>Nombre de la Unidad Ejecutora</th>
					<th>Código</th>
                    <th>Área</th>
					<th width="107">&nbsp;</th>
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
    $('#destinos').DataTable({
    	language: {
            url: "{{ asset('plugins/datatables.net/Spanish.json') }}",
        	searchPlaceholder: "Buscar destinos..."
        },
        order: [[ 1, "desc" ]],
        processing: true,
        serverSide: true,
        ajax: '{!! route('destinos.apiDestinos') !!}',
        columns: [
			{data: 'nombre'},
			{data: 'sigla'},
            {data: 'area.nombre'},
            { data: 'action', orderable: false, searchable: false},
        ],
    });
    
  })
</script>
@endsection