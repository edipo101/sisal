@extends('layouts.master')

@section('title')
    Datos de Unidad Ejecutora
@endsection

@section('head-content')
	<h1>
		<i class="fa fa-btn fa-send"></i>
		UNIDADES EJECUTORAS
		<small>Datos de la Unidad Ejecutora</small>
	</h1>
@endsection

@section('main-content')
<div class="box">
	<div class="box-header with-border">
	 	<h3 class="box-title"><i class="fa fa-btn fa-send"></i> Ver datos de la Unidad Ejecutora</h3>

	 	<div class="box-tools">
	 		<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          	</button>
          	<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
          	</button>
	  	</div>
	</div>
	<div class="box-body">
		<p><strong>Nombre de la Unidad Ejecutora: </strong> {{ $destino->nombre }}</p>
		<p><strong>Código: </strong> {{ $destino->sigla }}</p>
		<a href="{{ route('destinos.index') }}" class="btn btn-default">Atras</a>
    </div>
	<!-- /.box-body -->
</div>

@endsection