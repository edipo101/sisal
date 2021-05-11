<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Lista de Productos</title>
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
			{{-- <td class="right espacio-right"><strong class="registro">Registro Nro</strong></td> --}}
		</tr>
		<tr>
			<td class="center">
				<h1>ALMACEN</h1>
			</td>
			{{-- <td class="right espacio-right"><strong class="registro">1</strong></td> --}}
		</tr>
		<tr>
			<td class="center">
				<h1>{{$almacen->nombre}}</h1>
			</td>
			<td class="right espacio-right"><strong class="gestion">Gestion: {{Carbon\Carbon::now()->year}}</strong></td>
		</tr>
	</table>
	<table class="detalle">
		<tr>
			<td colspan="6" class="detalle_head">LISTA DE PRODUCTOS EN ALMACEN</td>
		</tr>
		<tbody>
			<tr class="detalle_titulos">
				<th>Nro Item</th>
				<th>Producto</th>
				
				<th>Cantidad</th>
				<th>Unidad</th>
				<th>Total</th>
			</tr>
			
			@foreach($productos as $producto)
			@php
				if($producto->cantidadtotal==0)
					continue;
			@endphp
			<tr>
				<td style="border-bottom: 1px solid black; padding: 0">{{ $producto->id }}</td>
				<td style="border-bottom: 1px solid black; padding: 0">{{ $producto->nombre }}</td>
				
				<td style="border-bottom: 1px solid black; padding: 0">{{ $producto->cantidadtotal }}</td>
				<td style="border-bottom: 1px solid black; padding: 0">{{ $producto->umedida->prefijo }}</td>
				<td style="border-bottom: 1px solid black; padding: 0">{{ $producto->preciounitario }} Bs.</td>
			</tr>
			@endforeach
			<tr class="total">
				<td class="right espacio-right" style="background-color: #dfdfdf" colspan="2">TOTAL DE PRODUCTOS</td>
				<td class="center">{{$productos->sum('cantidadtotal')}}</td>
				<td></td>
				<td class="center">{{$productos->sum('preciounitario')}} Bs.</td>
			</tr>
		</tbody>
	</table>
	{{-- <table width="100%" class="fecha">
		<tr>
			<td colspan="5" class="right">Fecha impresa: {{Carbon\Carbon::now()->format('d/m/Y g:i:s a')}}</td>
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
