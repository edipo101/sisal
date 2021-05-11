<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Ingreso de Productos al Almacen</title>
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
			<td class="right espacio-right"><strong class="registro">Registro Nro</strong></td>
		</tr>
		<tr>
			<td class="center">
				<h1>INGRESO DE PRODUCTOS AL ALMACEN</h1>
			</td>
			<td class="right espacio-right"><strong class="registro">{{$ingreso->id}}</strong></td>
		</tr>
		<tr>
			<td class="center">
				<h1>{{$almacen->nombre}}</h1>
			</td>
			<td class="right espacio-right"><strong class="gestion">Gestion: {{Carbon\Carbon::now()->year}}</strong></td>
		</tr>
	</table>
	<table class="datos">
		<tr>
			<td><strong>FECHA: </strong></td>
			<td>{{$ingreso->created_at->format('d/m/Y H:i:s')}}</td>
		</tr>
		<tr>
			<td width="15%"><strong>PROVEEDOR: </strong></td>
			<td width="45%">{{ $ingreso->proveedor->nombre }}</td>
			<td width="15%"><strong>NIT: </strong></td>
			<td width="25%">{{ $ingreso->proveedor->nit }}</td>
		</tr>
		<tr>
			<td><strong>NRO DE ORDEN: </strong></td>
			<td>{{ $ingreso->orden }}</td>
			<td><strong>PREVENTIVO: </strong></td>
			<td>{{ $ingreso->preventivo }}</td>
		</tr>
	</table>
	<table class="detalle">
		<tr>
			<td colspan="6" class="detalle_head">DETALLE DE PRODUCTOS ENTRANTES</td>
		</tr>
		<tbody>
			<tr class="detalle_titulos">
				<th>NRO</th>
				<th>PRODUCTO</th>
				<th>PRECIO UNITARIO</th>
				<th>CANTIDAD</th>
				<th>U. MEDIDA</th>
				<th>SUBTOTAL</th>
			</tr>
			@foreach($ingreso->detalleingresos as $detalle)
			<tr>
				<td>{{$detalle->producto->id}}</td>
				<td>{{$detalle->producto->nombre}}</td>
				<td>{{$detalle->precio_ingreso}} Bs.</td>
				<td>{{$detalle->cantidad_ingreso}}</td>
				<td>{{$detalle->producto->umedida->prefijo}}</td>
				<td>{{$detalle->subtotal}} Bs.</td>
			</tr>
			@endforeach
			<tr class="total">
				<td class="right espacio-right" style="background-color: #dfdfdf" colspan="3">TOTAL DE PRODUCTOS</td>
				<td class="center">{{$ingreso->cantidad}}</td>
				<td></td>
				<td class="center">{{$ingreso->total}} Bs.</td>
			</tr>
		</tbody>
	</table>
	<table class="observaciones">
		<tr>
			<td style="background-color: #dfdfdf; padding-left: 10px"><strong>Observaciones:</strong></td>
		</tr>
		<tr>
			<td style="border-top: 1px solid black; padding:10px 10px 30px 10px">
				@if($ingreso->observacion==null)
				Sin Observaciones
				@else
				{{$ingreso->observacion}}
				@endif
			</td>			
		</tr>
	</table>
	<table class="firmas">
		<tr>
			<td class="sellos"></td>
			<td class="sellos"></td>
		</tr>
		<tr>
			<td>
				{{ auth()->user()->nombre }} <br>
				<strong>Encargado</strong></td>
			<td>
				<strong>GERENTE</strong>
			</td>
		</tr>
	</table>
	{{-- <table width="100%" class="fecha">
		<tr>
			<td colspan="5" class="right">Fecha impresa: {{Carbon\Carbon::now()->format('d/m/Y g:i:s a')}}</td>
		</tr>
	</table> --}}
</body>
</html>
