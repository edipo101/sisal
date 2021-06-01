<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Kardex del Producto Nro. {{$producto->id}}</title>
	<link rel="stylesheet" href="{{asset('css/print.css')}}">
</head>
<body>
	<table id="header">
		<tr>
			<td width="15%" rowspan="3" class="center">
				<img src="{{asset('img/gams/logo.jpg')}}" width='50px' id="logos">
			</td>
			<td width="70%" class="center">
				<h1>GOBIERNO AUTONOMO MUNICIPAL DE SUCRE</h1>
			</td>
			<td class="right espacio-right"><strong class="registro">Item Nro</strong></td>
		</tr>
		<tr>
			<td class="center">
				<h1>KARDEX DE PRODUCTO</h1>
			</td>
			<td class="right espacio-right"><strong class="registro">{{$producto->id}}</strong></td>
		</tr>
		{{-- <tr>
			<td class="center">
				<h1>FDI - HOTIFRUTICOLA</h1>
			</td>
			<td class="right espacio-right"><strong class="gestion">Gestion:{{Carbon\Carbon::now()->year}}</strong></td>
		</tr> --}}
	</table>
	<table class="datos">
		<tr>
			<td><strong>PRODUCTO: </strong></td><td colspan="2">{{ $producto->nombre_descripcion }}</td>
			<td></td>
		</tr>
		<tr>
			<td width="15%"><strong>CATEGORIA: </strong></td><td width="35%">{{ $producto->categoria->nombre }}</td>
			<td></td><td></td>
		</tr>
		<tr>
			<td><strong>Unidad de medida: </strong></td><td>{{ $producto->umedida->nombre }} Bs.</td>
			<td><strong>Stock actual: </strong></td><td>{{ $producto->stock_actual }}</td>
		</tr>
	</table>
	
	@if ($detalles->count() > 0)
	<table class="detalle">
		<tr>
			<td colspan="14" class="detalle_head">MOVIMIENTOS DE PRODUCTO</td>
		</tr>
		<tbody>
			<tr class="detalle_titulos">
				<th rowspan="2">Id</th>
				<th rowspan="2">Fecha</th>
				<th rowspan="2">Ingreso_id</th>
				<th rowspan="2">Salida_id</th>
				<th rowspan="2">Stock inicial</th>
				<th rowspan="2">Saldo inicial</th>
				<th colspan="3">INGRESOS</th>
				<th colspan="3">SALIDAS</th>
				<th colspan="3">SALDOS</th>
			</tr>
			<tr class="detalle_titulos">
				<th>Cantidad</th>
				<th>Precio</th>
				<th>Subtotal</th>
				<th>Cantidad</th>
				<th>Precio</th>
				<th>Subtotal</th>
				<th>Cantidad</th>
				<th>Importe</th>
			</tr>
			@foreach($detalles as $detalle)
			 {{-- @php
			 if($detalle->ingreso->almacen_id!=auth()->user()->almacen_id)
			 	continue;
			 @endphp --}}
			<tr>
				<td>{{ $detalle->id }}</td>
				<td>{{ $detalle->created_at->format('d/m/Y h:i:s a') }}</td>
				<td>{{ $detalle->ingreso_id }}</td>
				<td>{{ $detalle->salida_id }}</td>
				<td>{{number_format($detalle->stock_inicial, 2)}}</td>
				<td>{{number_format($detalle->saldo_inicial, 2)}}</td>
				@php 
				@endphp
				@if ($detalle->ingreso_id)
					<td>{{number_format($detalle->cantidad, 2)}}</td>
					<td>{{number_format($detalle->precio, 2)}}</td>
					<td>{{number_format($detalle->subtotal, 2)}}</td>
					@php
					$stock_final = $detalle->stock_inicial + $detalle->cantidad;
					$saldo_final = $detalle->saldo_inicial + $detalle->subtotal;
					@endphp
					<td></td>
					<td></td>
					<td></td>
				@else 
					<td></td>
					<td></td>
					<td></td>
					<td>{{number_format($detalle->cantidad, 2)}}</td>
					<td>{{number_format($detalle->precio, 2)}}</td>
					<td>{{number_format($detalle->subtotal, 2)}}</td>
					@php
					$stock_final = $detalle->stock_inicial - $detalle->cantidad;
					$saldo_final = $detalle->saldo_inicial - $detalle->subtotal;
					@endphp
				@endif
				<td style="font-weight: bold;">{{number_format($stock_final, 2)}}</td>
				<td style="font-weight: bold">{{number_format($saldo_final, 2)}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	@endif

</body>
</html>

<script src="{{ asset('vendor/jquery/jquery.min.js') }}" type="text/javascript"></script>
<script>
	$( document ).ready(function() {
	    window.print();
	});
</script>
