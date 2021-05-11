@extends('layouts.master')

@section('title')
    Almacenes
@endsection

@section('head-content')
	<h1>
		<i class="fa fa-btn fa-stack-overflow"></i>
		ALMACENES
		<small>Listado de Almacenes registrados en el sistema</small>
	</h1>
@endsection

@section('main-content')
<div class="box">
	<div class="box-header with-border">
	 	<h3 class="box-title"><i class="fa fa-btn fa-stack-overflow"></i> LISTA DE ALMACENES REGISTRADOS</h3>

	 	<div class="box-tools">
	 		<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          	</button>
          	<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
          	</button>
	  	</div>
	</div>
	<div class="box-body">
		@can('almacenes.cretate')
			<a href="{{ route('almacenes.create') }}" class="btn btn-flat btn-primary pull-right">
				<i class="fa fa-plus"></i> NUEVO ALMACEN
			</a>
		@endcan
		<br><br>
        <table id="almacenes" class="table table-bordered table-striped table-hover">
        	<thead>
        		<tr class="bg-black">
					<th>Nombre Almacen</th>
					<th width="84">&nbsp;</th>
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
    $('#almacenes').DataTable({
        language: {
            url: "{{ asset('plugins/datatables.net/Spanish.json') }}",
            searchPlaceholder: "Buscar almacen..."
        },
        order: [[ 1, "desc" ]],
        processing: true,
        serverSide: true,
        ajax: '{!! route('almacenes.apiAlmacenes') !!}',
        columns: [
            {data: 'nombre'},
            { data: 'action', orderable: false, searchable: false},
        ],
    });
    
  })
</script>
@endsection