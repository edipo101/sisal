@extends('layouts.master')

@section('title')
    Almacenes
@endsection

@section('head-content')
	<h1>
		<i class="fa fa-btn fa-stack-overflow"></i>
		ALMACENES
		<small>Actualizacion de datos del Almacen</small>
	</h1>
@endsection

@section('main-content')
<div class="box">
	<div class="box-header with-border">
	 	<h3 class="box-title"><i class="fa fa-btn fa-stack-overflow"></i> Actualizar datos del Almacen</h3>

	 	<div class="box-tools">
	 		<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          	</button>
          	<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
          	</button>
	  	</div>
	</div>
	<div class="box-body">
		{!! Form::model($almacen, ['route' => ['almacenes.update', $almacen->id], 'method' => 'PUT']) !!}
			@include('almacenes.partials.form')
		{!! Form::close() !!}
    </div>
	<!-- /.box-body -->
</div>
@endsection
