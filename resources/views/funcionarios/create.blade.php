@extends('layouts.master')

@section('title')
    Funcionarios
@endsection

@section('head-content')
	<h1>
		<i class="fa fa-user-md"></i>
		FUNCIONARIOS
		<small>Nuevo registro</small>
	</h1>
@endsection

@section('main-content')
<div class="box">
	<div class="box-header with-border">
	 	<h3 class="box-title"><i class="fa fa-user-md"></i> Registrar Nuevo Funcionario</h3>

	 	<div class="box-tools">
	 		<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          	</button>
          	<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
          	</button>
	  	</div>
	</div>
	<div class="box-body">
			{!! Form::open(['route' => 'funcionarios.store']) !!}
			@include('funcionarios.partials.form')
		{!! Form::close() !!}
    </div>
	<!-- /.box-body -->
</div>

@endsection