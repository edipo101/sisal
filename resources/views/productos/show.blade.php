@extends('layouts.master')

@section('title')
    Productos
@endsection

@section('head-content')
	<h1>
		<i class="fa fa-archive"></i>
		PRODUCTOS
		<small>Datos del Producto</small>
	</h1>
@endsection

@section('main-content')
<div class="box">
	<div class="box-header with-border">
	 	<h3 class="box-title"><i class="fa fa-archive"></i> Ver datos del Producto</h3>

	 	<div class="box-tools">
	 		<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          	</button>
          	<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
          	</button>
	  	</div>
	</div>
	<div class="box-body">
		<div class="col-md-4">
			<img src="{{ asset('/img/productos/'. $producto->imagen) }}" class="img-responsive img-thumbnail">
		</div>
		<div class="col-md-8">
			<dl>
				{{-- <dt>Nro Sigma:</dt>
				<dd>{{ $producto->nro_sigma }}</dd> --}}
				<dt>Nombre del Producto:</dt>
				<dd>{{ $producto->nombre }}</dd>
				<dt>Descripcion:</dt>
				<dd>{{ $producto->descripcion }}</dd>
				<dt>Categoria:</dt>
				<dd>{{ $producto->categoria->nombre }}</dd>
				<dt>Unidad de Medida:</dt>
				<dd>{{ $producto->umedida->nombre }} <span class="label label-success">{{ $producto->umedida->prefijo }}</span></dd>
			</dl>
			<a href="{{ route('productos.index') }}" class="btn btn-default">Atras</a>
		</div>
    </div>
	<!-- /.box-body -->
</div>

@endsection