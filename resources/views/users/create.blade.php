@extends('users.box')

@section('subtitle','Nuevo registro')

@section('breadcrumbs')
    {{ breadcrumbs('userscreate') }}
@endsection

@section('title','Registrar nuevo usuario')

@section('body')
	{!! Form::open(['route' => 'users.store']) !!}
		@include('users.partials.form')
	{!! Form::close() !!}
@endsection
