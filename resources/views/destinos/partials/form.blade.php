<div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
	{{ Form::label('nombre', 'Nombre de la Unidad Ejecutora') }}
	{{ Form::text('nombre','',['class'=> 'form-control','id' => 'nombre','placeholder' => 'Ejemplo: Ingresos']) }}

	@if($errors->has('nombre'))
		<span class="help-block">
			<strong>{{ $errors->first('nombre') }}</strong>
		</span>
	@endif
</div>
<div class="form-group{{ $errors->has('sigla') ? ' has-error' : '' }}">
	{{ Form::label('sigla', 'Código') }}
	{{ Form::text('sigla',null,['class'=> 'form-control','id' => 'sigla','placeholder' => 'Ejemplo: 123']) }}

	@if($errors->has('sigla'))
		<span class="help-block">
			<strong>{{ $errors->first('sigla') }}</strong>
		</span>
	@endif
</div>
<div class="form-group{{ $errors->has('area_id') ? ' has-error' : '' }}">
			{{ Form::label('area_id', 'Área') }}
			{{ Form::select('area_id', $areas, null,['class'=> 'form-control','id' => 'area_id']) }}

			@if ($errors->has('area_id'))
				<span class="help-block">
					<strong>{{ $errors->first('area_id') }}</strong>
				</span>
			@endif
		</div>
<div class="form-group">
	{{ Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary']) }}
	<a href="{{ route('destinos.index') }}" class="btn btn-default">Atras</a>
</div>