@extends('layouts.master')

@section('title')
    Unidades de Medida
@endsection

@section('head-content')
	<h1>
		<i class="fa fa-btn fa-stack-overflow"></i>
		UNIDADES DE MEDIDA
		<small>Listado de Unidades de Medida registrados en el sistema</small>
	</h1>
@endsection

@section('main-content')
<div class="box">
	<div class="box-header with-border">
	 	<h3 class="box-title"><i class="fa fa-btn fa-stack-overflow"></i> LISTA DE UNIDADES DE MEDIDA REGISTRADOS</h3>

	 	<div class="box-tools">
	 		<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          	</button>
          	<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
          	</button>
	  	</div>
	</div>
	<div class="box-body">
		@can('umedidas.create')
			<a href="{{ route('umedidas.create') }}" class="btn btn-flat btn-primary pull-right">
				<i class="fa fa-plus"></i> NUEVA UNIDAD
			</a>
		@endcan
		
		<br><br>
        <table id="umedidas" class="table table-bordered table-striped table-hover">
        	<thead>
        		<tr class="bg-black">
					<th>Nombre de la Unidad de medida</th>
					<th>Abreviación</th>
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
    $('#umedidas').DataTable({
    	language: {
            url: "{{ asset('plugins/datatables.net/Spanish.json') }}",
        	searchPlaceholder: "Buscar unidad de medidas..."
        },
        order: [[ 1, "desc" ]],
        processing: true,
        serverSide: true,
        ajax: '{!! route('umedidas.apiUmedidas') !!}',
        columns: [
			{data: 'nombre'},
			{data: 'prefijo'},
            { data: 'action', orderable: false, searchable: false},
        ],
    });
    
  })
</script>
@endsection