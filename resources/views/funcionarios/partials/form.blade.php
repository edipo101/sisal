<div class="row">
	<div class="col-md-3">
		<div class="form-group{{ $errors->has('carnet') ? ' has-error' : '' }}">
			{{ Form::label('carnet', 'Documento de Identidad') }}
			{{ Form::text('carnet',null,['class'=> 'form-control','id' => 'carnet']) }}

			@if ($errors->has('carnet'))
				<span class="help-block">
					<strong>{{ $errors->first('carnet') }}</strong>
				</span>
			@endif
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group{{ $errors->has('item') ? ' has-error' : '' }}">
			{{ Form::label('item', 'ITEM') }}
			{{ Form::text('item',null,['class'=> 'form-control','id' => 'item']) }}

			@if ($errors->has('ite,'))
				<span class="help-block">
					<strong>{{ $errors->first('item') }}</strong>
				</span>
			@endif
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-4">
		<div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
			{{ Form::label('nombre', 'Nombre del Funcionario') }}
			{{ Form::text('nombre',null,['class'=> 'form-control','id' => 'nombre']) }}

			@if ($errors->has('nombre'))
				<span class="help-block">
					<strong>{{ $errors->first('nombre') }}</strong>
				</span>
			@endif
		</div>
	</div>
	<div class="col-md-5">
		<div class="form-group{{ $errors->has('apellido') ? ' has-error' : '' }}">
			{{ Form::label('apellido', 'Apellido del Funcionario') }}
			{{ Form::text('apellido',null,['class'=> 'form-control','id' => 'apellido']) }}

			@if ($errors->has('apellido'))
				<span class="help-block">
					<strong>{{ $errors->first('apellido') }}</strong>
				</span>
			@endif
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group{{ $errors->has('cargo') ? ' has-error' : '' }}">
			{{ Form::label('cargo', 'Cargo') }}
			{{ Form::text('cargo',null,['class'=> 'form-control','id' => 'cargo']) }}

			@if ($errors->has('cargo'))
				<span class="help-block">
					<strong>{{ $errors->first('cargo') }}</strong>
				</span>
			@endif
		</div>
	</div>
</div>

<div class="form-group">
	{{ Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary']) }}
	<a href="{{ route('funcionarios.index') }}" class="btn btn-default">Atras</a>
</div>