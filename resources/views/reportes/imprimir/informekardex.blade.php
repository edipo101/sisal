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
				<h1>KARDEX DEL PRODUCTO</h1>
			</td>
			<td class="right espacio-right"><strong class="registro">{{$producto->id}}</strong></td>
		</tr>
		<tr>
			<td class="center">
				<h1>FDI - HOTIFRUTICOLA</h1>
			</td>
			<td class="right espacio-right"><strong class="gestion">Gestion:{{Carbon\Carbon::now()->year}}</strong></td>
		</tr>
	</table>
	<table class="datos">
		<tr>
			<td><strong>PRODUCTO: </strong></td>
			<td>{{ $producto->nombre }}</td>
		</tr>
		<tr>
			<td width="15%"><strong>CANTIDAD: </strong></td>
			<td width="35%">{{ $producto->cantidadtotal }} {{ $producto->umedida->prefijo }}</td>
			{{--<td width="20%"><strong>PRECIO UNITARIO: </strong></td>
			<td width="30%">{{ $producto->detalle_ingresos->avg('precio_ingreso') }} Bs.</td>--}}
		</tr>
		<tr>
			<td><strong>TOTAL: </strong></td>
			<td>{{ $producto->total }} Bs.</td>
			<td><strong>CATEGORIA: </strong></td>
			<td>{{ $producto->categoria->nombre }}</td>
		</tr>
	</table>
	@if ($detalleingresos->count() > 0)
	<table class="detalle">
		<tr>
			<td colspan="6" class="detalle_head">MOVIMIENTOS DE INGRESOS DEL PRODUCTO</td>
		</tr>
		<tbody>
			<tr class="detalle_titulos">
				<th>FECHA</th>
				<th>REGISTRO NRO</th>
				<th>PROVEEDOR</th>
				<th>CANTIDAD</th>
				<th>PRECIO</th>
				<th>SALDO</th>
			</tr>
			@foreach($detalleingresos as $detalle)
			 @php
			 if($detalle->ingreso->almacen_id!=auth()->user()->almacen_id)
			 	continue;
			 @endphp
			<tr>
				<td>{{ $detalle->created_at->format('d/m/Y h:i:s a') }}</td>
				<td>{{ $detalle->id }}</td>
                <td>{{ $detalle->ingreso->proveedor->nombre }}</td>
				<td>{{ $detalle->cantidad_ingreso }} {{$producto->umedida->prefijo}}</td>
				<td>{{ $detalle->precio_ingreso }} Bs.</td>
				<td>{{ $detalle->subtotal }} Bs.</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	@endif

	@foreach($detalleingresos as $detalle)
	@if ($detalle->detallesalidas->count() > 0)
	<table class="detalle">
		<tr>
			<td colspan="8" class="detalle_head">MOVIMIENTOS DE SALIDA DEL PRODUCTO</td>
		</tr>
		<tbody>
			<tr class="detalle_titulos">
				<th>FECHA</th>
				<th>REGISTRO NRO</th>
				<th>DESTINO</th>
				<th>FUNCIONARIO</th>
				{{-- <th>MECANICO</th>
				<th>CONDUCTOR</th> --}}
				<th>CANTIDAD</th>
				<th>PRECIO</th>
				<th>SALDO</th>
			</tr>
				@foreach($detalle->detallesalidas as $detallesalida)
				@php
			 if($detallesalida->salida->almacen_id!=auth()->user()->almacen_id)
			 	continue;
			 @endphp
				<tr>
					<td>{{ $detallesalida->created_at->format('d/m/Y h:i:s a') }}</td>
					<td>{{ $detallesalida->id }}</td>
	                <td>{{ $detallesalida->salida->destino->nombre }}</td>
	                <td>{{ $detallesalida->salida->funcionario->fullnombre }}</td>
	                {{-- <td>{{ $detallesalida->salida->mecanico->fullnombre }}</td>
	                <td>{{ $detallesalida->salida->conductor->fullnombre }}</td> --}}
					<td>{{ $detallesalida->cantidad_salida }} {{$producto->umedida->prefijo}}</td>
					<td>{{ $detallesalida->precio_salida }} Bs.</td>
					<td>{{ $detallesalida->subtotal }} Bs.</td>
				</tr>
				@endforeach
		</tbody>
	</table>
	@endif
	@endforeach
	{{-- <table width="100%" class="fecha">
		<tr>
			<td colspan="5" class="right">Fecha impresa: {{Carbon\Carbon::now()->format('d/m/Y h:i:s a')}}</td>
		</tr>
	</table> --}}
</body>
</html>

<script src="{{ asset('vendor/jquery/jquery.min.js') }}" type="text/javascript"></script>
<script>
	$( document ).ready(function() {
	    window.print();
	});
</script>
