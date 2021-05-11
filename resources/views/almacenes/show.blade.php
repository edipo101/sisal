@extends('layouts.master')

@section('title')
    Almacenes
@endsection

@section('head-content')
	<h1>
		<i class="fa fa-btn fa-stack-overflow"></i>
		ALMACENES
		<small>Datos del Almacen</small>
	</h1>
@endsection

@section('main-content')
<div class="box">
	<div class="box-header with-border">
	 	<h3 class="box-title"><i class="fa fa-btn fa-stack-overflow"></i> Ver datos del Almacen</h3>

	 	<div class="box-tools">
	 		<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          	</button>
          	<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
          	</button>
	  	</div>
	</div>
	<div class="box-body">
		<p><strong>Nombre del Almacen: </strong> {{ $almacen->nombre }}</p>
		<a href="{{ route('almacenes.index') }}" class="btn btn-default">Atras</a>
    </div>
	<!-- /.box-body -->
</div>
@endsection
