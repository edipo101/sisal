<div class="row">
	<div class="col-md-6">
		<div class="form-group{{ $errors->has('destino_id') ? ' has-error' : '' }}">
			{{ Form::label('destino_id', 'Unidad Ejecutora') }}
			{{ Form::select('destino_id',$destinos,null,['class'=> 'form-control select','id' => 'destino_id', 'placeholder' => 'Seleccione Unidad Ejecutora']) }}

			@if ($errors->has('destino_id'))
				<span class="help-block">
					<strong>{{ $errors->first('destino_id') }}</strong>
				</span>
			@endif
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group{{ $errors->has('funcionario_id') ? ' has-error' : '' }}">
			{{ Form::label('funcionario_id', 'Funcionario') }}
			{{ Form::select('funcionario_id',$funcionarios ,null,['class'=> 'form-control select','id' => 'funcionario_id']) }}

			@if ($errors->has('funcionario_id'))
				<span class="help-block">
					<strong>{{ $errors->first('funcionario_id') }}</strong>
				</span>
			@endif
		</div>
	</div>
	{{-- <div class="col-md-6">
		<div class="form-group{{ $errors->has('mecanico_id') ? ' has-error' : '' }}">
			{{ Form::label('mecanico_id', 'Mecanico') }}
			{{ Form::select('mecanico_id',$mecanicos ,null,['class'=> 'form-control select','id' => 'mecanico_id']) }}

			@if ($errors->has('mecanico_id'))
				<span class="help-block">
					<strong>{{ $errors->first('mecanico_id') }}</strong>
				</span>
			@endif
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group{{ $errors->has('conductor_id') ? ' has-error' : '' }}">
			{{ Form::label('conductor_id', 'Conductor') }}
			{{ Form::select('conductor_id', $conductors, null,['class'=> 'form-control select','id' => 'conductor_id']) }}

			@if ($errors->has('conductor_id'))
				<span class="help-block">
					<strong>{{ $errors->first('conductor_id') }}</strong>
				</span>
			@endif
		</div>
	</div> --}}
</div>
<div class="row">
	@include('salidas.partials.detalle')
</div>

<div class="col-md-12">
	<div class="form-group">
	    {{ Form::label('observacion','Observaciones',['class'=>'form-label'])}}
	    {{ Form::textarea('observacion',null,['class'=>'form-control', 'rows'=>'3'])}}
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<div class="form-group{{ $errors->has('cantidad') ? ' has-error' : '' }}">
			{{ Form::label('cantidad', 'Cantidad') }}
			{{ Form::text('cantidad',null,['class'=> 'form-control','id' => 'cantidad','readonly'=>'readonly']) }}

			@if ($errors->has('cantidad'))
				<span class="help-block">
					<strong>{{ $errors->first('cantidad') }}</strong>
				</span>
			@endif
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group{{ $errors->has('total') ? ' has-error' : '' }}">
			{{ Form::label('total', 'Precio total') }}
			{{ Form::text('total',null,['class'=> 'form-control','id' => 'total','readonly'=>'readonly']) }}

			@if ($errors->has('total'))
				<span class="help-block">
					<strong>{{ $errors->first('total') }}</strong>
				</span>
			@endif
		</div>
	</div>
</div>


<div class="form-group text-center">
	{{ Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary']) }}
	<a href="{{ route('salidas.index') }}" class="btn btn-default">Atras</a>
</div>