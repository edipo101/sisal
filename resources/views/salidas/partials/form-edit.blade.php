<div class="form-group">
	{{ Form::label('created_at', 'Fecha') }}
	<div class='input-group date'>
		{{ Form::text('created_at',null,['class'=> 'form-control date','id' => 'created_at']) }}
        <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
        </span>
    </div>
</div>

<div class="form-group text-center">
	{{ Form::submit('Actualizar', ['class'=>'btn btn-sm btn-primary']) }}
	<a href="{{ route('salidas.index') }}" class="btn btn-default">Atras</a>
</div>

@section('scripts')
<script>
	
</script>
@endsection