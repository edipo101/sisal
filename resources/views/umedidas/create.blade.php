@extends('layouts.master')

@section('title')
    Unidades de Medida
@endsection

@section('head-content')
	<h1>
		<i class="fa fa-btn fa-stack-overflow"></i>
		UNIDADES DE MEDIDA
		<small>Nuevo registro</small>
	</h1>
@endsection

@section('main-content')
<div class="box">
	<div class="box-header with-border">
	 	<h3 class="box-title"><i class="fa fa-btn fa-stack-overflow"></i> Registrar Nueva Unidad de Medida</h3>

	 	<div class="box-tools">
	 		<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          	</button>
          	<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
          	</button>
	  	</div>
	</div>
	<div class="box-body">
		{!! Form::open(['route' => 'umedidas.store']) !!}
			@include('umedidas.partials.form')
		{!! Form::close() !!}
    </div>
	<!-- /.box-body -->
</div>
@endsection
