@extends('roles.box')

@section('subtitle','Nuevo registro')

@section('breadcrumbs')
    {{ breadcrumbs('rolescreate') }}
@endsection

@section('title','Registrar nuevo rol')

@section('body')
	{!! Form::open(['route' => 'roles.store']) !!}
		@include('roles.partials.form')
	{!! Form::close() !!}
@endsection