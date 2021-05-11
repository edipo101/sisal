@extends('layouts.master')

@section('title')
    Usuarios
@endsection

@section('head-content')
	<h1>
		<i class="fa fa-users"></i>
		Usuarios
		<small>@yield('subtitle')</small>
	</h1>
@endsection

@section('main-content')
<div class="box">
	<div class="box-header with-border">
	 	<h3 class="box-title"><i class="fa fa-users"></i> @yield('title')</h3>

	 	<div class="box-tools">
            @yield('buttons')
	  	</div>
	</div>
	<div class="box-body">
        @yield('body')
    </div>
	<!-- /.box-body -->
</div>
@endsection