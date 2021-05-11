@extends('layouts.master')

@section('title')
    Editar Unidad Ejecutora
@endsection

@section('head-content')
	<h1>
		<i class="fa fa-btn fa-send"></i>
		UNIDADES EJECUTORAS
		<small>Actualizacion de datos de la Unidad Ejecutora</small>
	</h1>
@endsection

@section('main-content')
<div class="box">
	<div class="box-header with-border">
	 	<h3 class="box-title"><i class="fa fa-btn fa-send"></i> Actualizar datos de la Unidad Ejecutora</h3>

	 	<div class="box-tools">
	 		<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          	</button>
          	<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
          	</button>
	  	</div>
	</div>
	<div class="box-body">
		{!! Form::model($destino, ['route' => ['destinos.update', $destino->id], 'method' => 'PUT']) !!}
			@include('destinos.partials.form')
		{!! Form::close() !!}
    </div>
	<!-- /.box-body -->
</div>

@endsection