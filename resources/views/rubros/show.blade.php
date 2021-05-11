@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					Ver Rubro
				</div>
				<div class="panel-body">
					<p><strong>Nombre del Rubro: </strong> {{ $rubro->nombre }}</p>
					<a href="{{ route('rubros.index') }}" class="btn btn-default">Atras</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection