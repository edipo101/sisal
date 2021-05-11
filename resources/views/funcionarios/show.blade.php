@extends('layouts.master')

@section('title')
    Funcionarios
@endsection

@section('head-content')
	<h1>
		<i class="fa fa-user-md"></i>
		FUNCIONARIOS
		<small>Datos del Funcionario</small>
	</h1>
@endsection

@section('main-content')
<div class="box">
	<div class="box-header with-border">
	 	<h3 class="box-title"><i class="fa fa-user-md"></i> Ver datos del Funcionario</h3>

	 	<div class="box-tools">
	 		<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          	</button>
          	<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
          	</button>
	  	</div>
	</div>
	<div class="box-body">
			<p><strong>Carnet: </strong> {{ $funcionario->carnet }}</p>
			<p><strong>Nombre del Funcionario: </strong> {{ $funcionario->nombre }} {{ $funcionario->apellido }}</p>
			<p><strong>Cargo: </strong> {{ $funcionario->cargo }}</p>
			<a href="{{ route('funcionarios.index') }}" class="btn btn-default">Atras</a>
    </div>
	<!-- /.box-body -->
</div>

@endsection