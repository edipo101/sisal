@extends('layouts.master')

@section('title')
    Ingresos
@endsection

@section('head-content')
	<h1>
		<i class="fa fa-sign-in"></i>
		INGRESOS
		<small>Nuevo Ingreso</small>
	</h1>
@endsection

@section('main-content')
<div class="box">
	<div class="box-header with-border">
	 	<h3 class="box-title"><i class="fa fa-sign-in"></i> Registrar Nuevo Ingreso</h3>

	 	<div class="box-tools pull-right">
	 		<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
	      		<i class="fa fa-minus"></i>
	      	</button>
	    	<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
	      		<i class="fa fa-times"></i>
	      	</button>
	  	</div>
	</div>
	<div class="box-body">
		{!! Form::open(['route' => 'ingresos.store']) !!}
			@include('ingresos.partials.form')
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
<script src="{{asset('js/script-ingresos.js')}}"></script>

<script type="text/javascript">{{-- 
$(document).ready(function(){
	var route = "{{route('roles.index')}}";
	console.log(route);
});	
 --}}
</script>
@endsection