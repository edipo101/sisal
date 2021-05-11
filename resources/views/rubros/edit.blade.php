@extends('layouts.master')

@section('title')
    Rubros
@endsection

@section('head-content')
	<h1>
		<i class="fa fa-btn fa-sitemap"></i>
		RUBROS
		<small>Actualizacion de datos del Rubro</small>
	</h1>
@endsection

@section('main-content')
<div class="box">
	<div class="box-header with-border">
	 	<h3 class="box-title"><i class="fa fa-btn fa-sitemap"></i> Actualizar datos del Rubro</h3>

	 	<div class="box-tools">
	 		<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          	</button>
          	<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
          	</button>
	  	</div>
	</div>
	<div class="box-body">
		{!! Form::model($rubro, ['route' => ['rubros.update', $rubro->id], 'method' => 'PUT']) !!}
			@include('rubros.partials.form')
		{!! Form::close() !!}
    </div>
	<!-- /.box-body -->
</div>

@endsection