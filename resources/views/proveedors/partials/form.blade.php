<div class="row">
	<div class="col-md-3">
		<div class="form-group{{ $errors->has('nit') ? ' has-error' : '' }}">
			{{ Form::label('nit', 'NIT') }}
			{{ Form::text('nit',null,['class'=> 'form-control','id' => 'nit']) }}

			@if ($errors->has('nit'))
				<span class="help-block">
					<strong>{{ $errors->first('nit') }}</strong>
				</span>
			@endif
		</div>
	</div>
	<div class="col-md-9">
		<div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
			{{ Form::label('nombre', 'Nombre del Proveedor') }}
			{{ Form::text('nombre',null,['class'=> 'form-control','id' => 'nombre']) }}

			@if ($errors->has('nombre'))
				<span class="help-block">
					<strong>{{ $errors->first('nombre') }}</strong>
				</span>
			@endif
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
			{{ Form::label('direccion', 'Direccion del Proveedor') }}
			{{ Form::text('direccion',null,['class'=> 'form-control','id' => 'direccion']) }}

			@if ($errors->has('direccion'))
				<span class="help-block">
					<strong>{{ $errors->first('direccion') }}</strong>
				</span>
			@endif
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
			{{ Form::label('email', 'E-mail') }}
			{{ Form::text('email',null,['class'=> 'form-control','id' => 'email']) }}

			@if ($errors->has('email'))
				<span class="help-block">
					<strong>{{ $errors->first('email') }}</strong>
				</span>
			@endif
		</div>
	</div>
	<div class="col-md-2">
		<div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
			{{ Form::label('telefono', 'Teléfono') }}
			{{ Form::text('telefono',null,['class'=> 'form-control','id' => 'telefono']) }}

			@if ($errors->has('telefono'))
				<span class="help-block">
					<strong>{{ $errors->first('telefono') }}</strong>
				</span>
			@endif
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group{{ $errors->has('persona_contacto') ? ' has-error' : '' }}">
			{{ Form::label('persona_contacto', 'Persona de Contacto') }}
			{{ Form::text('persona_contacto',null,['class'=> 'form-control','id' => 'persona_contacto']) }}

			@if ($errors->has('persona_contacto'))
				<span class="help-block">
					<strong>{{ $errors->first('persona_contacto') }}</strong>
				</span>
			@endif
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group{{ $errors->has('ciudad') ? ' has-error' : '' }}">
			{{ Form::label('ciudad', 'Ciudad del proveedor') }}
			{{ Form::text('ciudad',null,['class'=> 'form-control','id' => 'ciudad']) }}

			@if ($errors->has('ciudad'))
				<span class="help-block">
					<strong>{{ $errors->first('ciudad') }}</strong>
				</span>
			@endif
		</div>
	</div>
</div>
		<div class="form-group">
			{{ Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary']) }}
			<a href="{{ route('proveedors.index') }}" class="btn btn-default">Atras</a>
		</div>