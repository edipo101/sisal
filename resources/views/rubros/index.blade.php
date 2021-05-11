@extends('layouts.master')

@section('title')
    Rubros
@endsection

@section('head-content')
	<h1>
		<i class="fa fa-btn fa-sitemap"></i>
		RUBROS
		<small>Listado de Rubros registrados en el sistema</small>
	</h1>
@endsection

@section('main-content')
<div class="box">
	<div class="box-header with-border">
	 	<h3 class="box-title"><i class="fa fa-btn fa-sitemap"></i> LISTA DE RUBROS REGISTRADOS</h3>

	 	<div class="box-tools">
	 		<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          	</button>
          	<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
          	</button>
	  	</div>
	</div>
	<div class="box-body">
		<a href="{{ route('rubros.create') }}" class="btn btn-flat btn-primary pull-right">
			<i class="fa fa-plus"></i> NUEVO RUBRO
		</a><br><br>
        <table id="rubros" class="table table-bordered table-striped table-hover">
        	<thead>
        		<tr class="bg-black">
					<th>Nombre del Rubro</th>
					<th width="8%">&nbsp;</th>
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
    $('#rubros').DataTable({
    	language: {
            url: "{{ asset('plugins/datatables.net/Spanish.json') }}",
        	searchPlaceholder: "Buscar rubros..."
        },
        order: [[ 1, "desc" ]],
        processing: true,
        serverSide: true,
        ajax: '{!! route('rubros.apiRubros') !!}',
        columns: [
			{data: 'nombre'},
            { data: 'action', orderable: false, searchable: false},
        ],
    });
    
  })
</script>
@endsection