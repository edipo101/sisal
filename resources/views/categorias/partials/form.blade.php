<div class="row">
	<div class="col-md-4">
		<div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
			{{ Form::label('nombre', 'Nombre de la Categoria o grupo') }}
			{{ Form::text('nombre',null,['class'=> 'form-control','id' => 'nombre']) }}

			@if ($errors->has('nombre'))
				<span class="help-block">
					<strong>{{ $errors->first('nombre') }}</strong>
				</span>
			@endif
		</div>
	</div>
	<div class="col-md-8">
		<div class="form-group{{ $errors->has('descripcion') ? ' has-error' : '' }}">
			{{ Form::label('descripcion', 'Descripción') }}
			{{ Form::text('descripcion',null,['class'=> 'form-control','id' => 'descripcion']) }}

			@if ($errors->has('descripcion'))
				<span class="help-block">
					<strong>{{ $errors->first('descripcion') }}</strong>
				</span>
			@endif
		</div>
	</div>
</div>
<div class="form-group">
	{{ Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary']) }}
	<a href="{{ route('categorias.index') }}" class="btn btn-default">Atras</a>
</div>
