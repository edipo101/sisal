@extends('users.box')

@section('subtitle','Actualizacion de datos del usuario')

@section('breadcrumbs')
	{{ breadcrumbs('usersedit') }}		
@endsection

@section('title','Actualizar datos del usuario')

@section('body')
	{!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'PUT']) !!}
		@include('users.partials.form')
	{!! Form::close() !!}
@endsection