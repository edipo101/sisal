@extends('roles.box')

@section('subtitle','Actualizacion de datos del rol')

@section('breadcrumbs')
	{{ breadcrumbs('rolesedit') }}		
@endsection

@section('title','Actualizar datos del rol')

@section('body')
	{!! Form::model($role, ['route' => ['roles.update', $role->id], 'method' => 'PUT']) !!}
		@include('roles.partials.form')
	{!! Form::close() !!}
@endsection