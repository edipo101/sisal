@extends('layouts.master')

@section('title')
    Salidas
@endsection

@section('head-content')
	<h1>
		<i class="fa fa-sign-out"></i>
		SALIDAS
		<small>Detalle de Salida</small>
	</h1>
@endsection

@section('main-content')
<div class="box">
	<div class="box-header with-border">
	 	<h3 class="box-title"><i class="fa fa-sign-out"></i> Ver detalle de Salida</h3>

	 	<div class="box-tools">
	 		<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          	</button>
          	<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
          	</button>
	  	</div>
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-md-12">
				<p>
					<strong>DESTINO:</strong> {{ $salida->destino->nombre }}
				</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<p>
					<strong>FUNCIONARIO:</strong> {{ $salida->funcionario->nombre }} {{ $salida->funcionario->apellido }}
				</p>
			</div>
			{{-- <div class="col-md-6">
				<p>
					<strong>MECANICO:</strong> {{ $salida->mecanico->nombre }} {{ $salida->mecanico->apellido }}
				</p>
			</div>
			<div class="col-md-6">
				<p>
					<strong>CONDUCTOR:</strong> {{ $salida->conductor->nombre }} {{ $salida->conductor->apellido }}
				</p>
			</div> --}}
		</div>
		<div class="row">
			<div class="col-md-6">
				<p>
					<strong>Cantidad Total:</strong> {{ $salida->cantidad }}
				</p>
			</div>
			<div class="col-md-6">
				<p>
					<strong>Precio Total:</strong> {{ number_format($salida->total,2) }}
				</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<p>
					<strong>OBSERVACION:</strong> 
					@if($salida->observacion==null)
						Sin Observacion
					@else
						{{ str_limit($salida->observacion,50) }}
					@endif
				</p>
			</div>
		</div>
		<h4 class="text-center">Detalle de los Productos Salientes</h4>
		<table class="table table-striped table-hover">
			<thead>
				<tr class="info">
					<th width="10px">ID</th>
					<th>Producto</th>
					<th class="text-right">Precio</th>
                    <th class="text-right">Cantidad</th>
                    <th class="text-right">Subtotal</th>
				</tr>
			</thead>
			<tbody>
				@foreach($salida->detalle_salidas as $detalle)
				<tr>
					<td>{{ $detalle->producto->id }}</td>
					<td>{{ $detalle->producto->nombre_descripcion }}</td>
					<td class="text-right">{{ number_format($detalle->cantidad, 2) }}</td>
					<td class="text-right">{{ number_format($detalle->precio, 2) }}</td>
					<td class="text-right">{{ number_format($detalle->subtotal,2) }}</td>
				</tr>
				@endforeach
			</tbody>
			<tfoot>
                <tr style="background-color: #eee; font-weight: bold;">
                    <td colspan="3">TOTAL</td>
                    <td class="text-right">{{number_format($salida->cantidad, 2)}}</td>
                    <td class="text-right">{{number_format($salida->total, 2)}}</td>
                </tr>
            </tfoot>
		</table>
		<p></p>
		<a href="{{ route('salidas.reportesalida',$salida->id) }}" class="btn btn-primary" target="_blank" onclick="window.open(this.href, this.target, 'width=800,height=600'); return false;">
							<i class="fa fa-print"></i> Imprimir Reporte
						</a>
		<a href="{{ route('salidas.index') }}" class="btn btn-default">Atras</a>
    </div>
	<!-- /.box-body -->
</div>

@endsection