@extends('layouts.master')

@section('title')
    Productos
@endsection

@section('head-content')
	<h1>
		<i class="fa fa-archive"></i>
		PRODUCTOS
		<small>Listado de Productos registrados en el sistema</small>
	</h1>
@endsection

@section('main-content')
<div class="box">
	<div class="box-header with-border">
	 	<h3 class="box-title"><i class="fa fa-archive"></i> LISTA DE PRODUCTOS REGISTRADOS</h3>

	 	<div class="box-tools">
	 		<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          	</button>
          	<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
          	</button>
	  	</div>
	</div>
	<div class="box-body">
		<!-- filtrar datos por almacen -->
		<div class="row">
			<div class="col-md-6">
				@can('almacenes.varios')
					{{ Form::label('almacen_id', 'Almacen asignado') }} 
					{{ Form::select('almacen_id', $almacenes, $almacenid,['class'=> 'form-control','id' => 'almacen_id']) }}
				@endcan
			</div>
			<div class="col-md-6">
				@can('productos.create')
					<a href="{{ route('productos.create') }}" class="btn btn-flat btn-primary pull-right">
					<i class="fa fa-plus"></i> NUEVO PRODUCTO
					</a>
				@endcan
				
			</div>
		</div>
		
		<br><br>
        <table id="productos" class="table table-bordered table-striped table-hover">
        	<thead>
        		<tr class="bg-black">
					<th>ID</th>
					<th>Foto</th>
					<th>Producto</th>
					<th>Descripcion</th>
					<th>Categoria</th>
					<th>U. Medida</th>
					<th>Cantidad</th>
					<th>Precio Promedio</th>
					<th width="108">&nbsp;</th>
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
    $('#productos').DataTable({
    	language: {
        url: "{{ asset('plugins/datatables.net/Spanish.json') }}",
      	searchPlaceholder: "Buscar productos..."},
      order: [[ 1, "desc" ]],
      processing: true,
      serverSide: true,
			destroy: true,
      ajax: '{!! route('productos.apiProductos') !!}', 
      columns: [
			{data: 'id'},
			{data: 'imagen'},
			{data: 'nombre'},
			{data: 'descripcion'},
			{data: 'categoria.nombre'},
			{data: 'umedida.prefijo'},
			{data: 'cantidadtotal'},
			{data: 'promedio'},
            {data: 'action', orderable: false, searchable: false},
        ],
    });
    
  })
  	$('#almacen_id').change(function(e){
		e.preventDefault();
		var id_alma = $('#almacen_id').val();
		alert("Id de almacen: "+id_alma);
		$('#productos').DataTable({
			language: {
				url: "{{ asset('plugins/datatables.net/Spanish.json') }}",
				searchPlaceholder: "Buscar productos..."
			},
			order: [[ 1, "desc" ]],
			processing: true,
			serverSide: true,
			destroy:true,
			ajax: '{!! route('productos.ProductosAlmacen',['id_almacen' => 2]) !!}', 
			columns: [
				{data: 'id'},
				{data: 'imagen'},
				{data: 'nombre'},
				{data: 'descripcion'},
				{data: 'categoria.nombre'},
				{data: 'umedida.prefijo'},
				{data: 'cantidadtotal'},
				{data: 'promedio'},
				{data: 'action', orderable: false, searchable: false},
			],
		});	
  	});
</script>
@endsection