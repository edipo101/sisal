@extends('layouts.master')

@section('title')
    Proveedores
@endsection

@section('head-content')
	<h1>
		<i class="fa fa-btn fa-truck"></i>
		PROVEEDORES
		<small>Actualizacion de datos del Proveedor</small>
	</h1>
@endsection

@section('main-content')
<div class="box">
	<div class="box-header with-border">
	 	<h3 class="box-title"><i class="fa fa-btn fa-truck"></i> Actualizar datos del Proveedor</h3>

	 	<div class="box-tools">
	 		<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          	</button>
          	<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
          	</button>
	  	</div>
	</div>
	<div class="box-body">
		{!! Form::model($proveedor, ['route' => ['proveedors.update', $proveedor->id], 'method' => 'PUT']) !!}
			@include('proveedors.partials.form')
		{!! Form::close() !!}
    </div>
	<!-- /.box-body -->
</div>

@endsection