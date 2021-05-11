@extends('layouts.master')

@section('title')
    Salidas
@endsection

@section('head-content')
	<h1>
		<i class="fa fa-sign-out"></i>
		SALIDAS
		<small>Actualizacion de datos de la salida</small>
	</h1>
@endsection

@section('main-content')
<div class="box">
	<div class="box-header with-border">
	 	<h3 class="box-title"><i class="fa fa-sign-out"></i> Actulizacion de datos de Salida</h3>

	 	<div class="box-tools">
	 		<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          	</button>
          	<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
          	</button>
	  	</div>
	</div>
	<div class="box-body">
		{!! Form::model($salida, ['route' => ['salidas.update', $salida->id], 'method' => 'PUT']) !!}
			@include('salidas.partials.form')
		{!! Form::close() !!}
    </div>
	<!-- /.box-body -->
</div>

@endsection

@section('css')
	<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.css') }}">
@endsection

@section('scripts')
	<script src="{{ asset('plugins/select2/js/select2.js') }}"></script>
	<script src="{{asset('js/script-salidas.js')}}"></script>
@endsection