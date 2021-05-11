@extends('layouts.master')

@section('title')
    Proveedores
@endsection

@section('head-content')
	<h1>
		<i class="fa fa-btn fa-truck"></i>
		PROVEEDORES
		<small>Datos del Proveedor</small>
	</h1>
@endsection

@section('main-content')
<div class="box">
	<div class="box-header with-border">
	 	<h3 class="box-title"><i class="fa fa-btn fa-truck"></i> Ver datos del Proveedor</h3>

	 	<div class="box-tools">
	 		<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          	</button>
          	<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
          	</button>
	  	</div>
	</div>
	<div class="box-body">
		<p><strong>NIT : </strong> {{ $proveedor->nit }}</p>
		<p><strong>Nombre del Proveedor : </strong> {{ $proveedor->nombre }}</p>
		<p><strong>Direccion : </strong> {{ $proveedor->direccion }}</p>

		<p><strong>Teléfono : </strong> {{ $proveedor->telefono }}</p>
		<p><strong>email : </strong> {{ $proveedor->email }}</p>
		<p><strong>ciudad : </strong> {{ $proveedor->ciudad }}</p>
		<p><strong>persona_contacto : </strong> {{ $proveedor->persona_contacto }}</p>
		<a href="{{ route('proveedors.index') }}" class="btn btn-default">Atras</a>
    </div>
	<!-- /.box-body -->
</div>

@endsection