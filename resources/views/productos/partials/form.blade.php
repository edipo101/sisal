<div class="row">
	<div class="col-md-6">
		{{-- <div class="form-group{{ $errors->has('nro_sigma') ? ' has-error' : '' }}">
			{{ Form::label('nro_sigma', 'Nro. Sigma') }}
			{{ Form::text('nro_sigma',null,['class'=> 'form-control','id' => 'nro_sigma']) }}

			@if ($errors->has('nro_sigma'))
				<span class="help-block">
					<strong>{{ $errors->first('nro_sigma') }}</strong>
				</span>
			@endif
		</div> --}}
		<div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
			{{ Form::label('nombre', 'Nombre del producto') }}
			{{ Form::text('nombre',null,['class'=> 'form-control','id' => 'nombre']) }}

			@if ($errors->has('nombre'))
				<span class="help-block">
					<strong>{{ $errors->first('nombre') }}</strong>
				</span>
			@endif
		</div>
		<div class="form-group{{ $errors->has('descripcion') ? ' has-error' : '' }}">
			{{ Form::label('descripcion', 'Descripcion de Producto') }}
			{{ Form::textarea('descripcion',null,['class'=> 'form-control','id' => 'descripcion','rows' => '3']) }}

			@if ($errors->has('descripcion'))
				<span class="help-block">
					<strong>{{ $errors->first('descripcion') }}</strong>
				</span>
			@endif
		</div>
		<div class="form-group{{ $errors->has('categoria_id') ? ' has-error' : '' }}">
			{{ Form::label('categoria_id', 'Categoria') }}
			{{ Form::select('categoria_id', $categorias, null,['class'=> 'form-control','id' => 'categoria_id']) }}

			@if ($errors->has('categoria_id'))
				<span class="help-block">
					<strong>{{ $errors->first('categoria_id') }}</strong>
				</span>
			@endif
		</div>
		<div class="form-group{{ $errors->has('umedida_id') ? ' has-error' : '' }}">
			{{ Form::label('umedida_id', 'Unidad de medida') }}
			{{ Form::select('umedida_id', $umedidas, null,['class'=> 'form-control','id' => 'umedida_id']) }}

			@if ($errors->has('umedida_id'))
				<span class="help-block">
					<strong>{{ $errors->first('umedida_id') }}</strong>
				</span>
			@endif
		</div>
	</div>
	<div class="col-md-6">
		@if(isset($producto))
    	<div class="block text-center">
    		<img src="{{ asset('/img/productos/'.$producto->imagen) }}" class="img-responsive img-thumbnail" width="250px">
    	</div>
    	@else
    	<div class="block text-center">
    		<img src="{{ asset('/img/productos/default.jpg') }}" class="img-responsive img-thumbnail" width="250px">
    	</div>
    	@endif
    	<br>
    	<div class="form-group{{ $errors->has('foto') ? ' has-error' : '' }}">
			{{ Form::label('foto','Foto del Producto') }}
			{{ Form::file('foto',['class'=>'form-control']) }}

			@if ($errors->has('foto'))
				<span class="help-block">
					<strong>{{ $errors->first('foto') }}</strong>
				</span>
			@endif
		</div>
	</div>
</div>
<div class="form-group text-center">
	{{ Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary']) }}
	<a href="{{ route('productos.index') }}" class="btn btn-default">Atras</a>
</div>