<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Salida de Productos del Almacen</title>
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
				<h1>SALIDA DE PRODUCTOS DEL ALMACEN</h1>
			</td>
			<td class="right espacio-right"><strong class="registro">{{$salida->id}}</strong></td>
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
			<td width="15%"><strong>DESTINO: </strong></td>
			<td width="40%"><strong>{{ $salida->destino->sigla }}</strong> - {{ $salida->destino->nombre }}</td>
			<td width="15%"><strong>FECHA: </strong></td>
			<td width="25%">{{$salida->created_at->format('d/m/Y H:i:s')}}</td>
		</tr>
		{{-- <tr>
			<td><strong>{{ strtoupper($salida->mecanico->rubro->nombre) }}: </strong></td>
			<td>{{ $salida->mecanico->nombre }} {{ $salida->mecanico->apellido }}</td>
			<td><strong>CONDUCTOR: </strong></td> --}}
			{{-- <td><strong>{{ strtoupper($salida->conductor->rubro->nombre) }}: </strong></td> --}}
			{{-- <td>{{ $salida->conductor->nombre }} {{ $salida->conductor->apellido }}</td>
		</tr> --}}
		
		<tr>
			<td><strong>TECNICO: </strong></td>
			{{-- <td><strong>{{ strtoupper($salida->mecanico->rubro->nombre) }}: </strong></td> --}}
			<td>{{ $salida->funcionario->nombre }} {{ $salida->funcionario->apellido }}</td>
			<td><strong>CARGO: </strong></td>
			{{-- <td><strong>{{ strtoupper($salida->conductor->rubro->nombre) }}: </strong></td> --}}
			<td>{{ $salida->funcionario->cargo }}</td>
		</tr>
	</table>
	<table class="detalle">
		<tr>
			<td colspan="6" class="detalle_head">DETALLE DE PRODUCTOS SALIENTES</td>
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
			@foreach($salida->detallesalidas as $detalle)
			<tr>
				<td>{{$detalle->detalleingreso->producto->id}}</td>
				<td>{{$detalle->detalleingreso->producto->nombre}}</td>
				<td>{{$detalle->precio_salida}} Bs.</td>
				<td>{{$detalle->cantidad_salida}}</td>
				<td>{{$detalle->detalleingreso->producto->umedida->prefijo}}</td>
				<td>{{$detalle->subtotal}} Bs.</td>
			</tr>
			@endforeach
			<tr class="total">
				<td class="right espacio-right" style="background-color: #dfdfdf" colspan="3">TOTAL DE PRODUCTOS</td>
				<td class="center">{{$salida->cantidad}}</td>
				<td></td>
				<td class="center">{{$salida->total}} Bs.</td>
			</tr>
		</tbody>
	</table>
	<table class="observaciones">
		<tr>
			<td style="background-color: #dfdfdf; padding-left: 10px"><strong>Observaciones:</strong></td>
		</tr>
		<tr>
			<td style="border-top: 1px solid black; padding:10px 10px 30px 10px">
				@if($salida->observacion==null)
				Sin Observaciones
				@else
				{{$salida->observacion}}
				@endif
			</td>			
		</tr>
	</table>
	<table class="firmas">
		<tr>
			<td class="sellos"></td>
			<td class="sellos"></td>
			<td class="sellos"></td>
		</tr>
		<tr>
			<td width="33%">
				{{ $salida->funcionario->nombre }} {{ $salida->funcionario->apellido }} 
				<br>
				{{ $salida->funcionario->carnet }}
				<br>
				<strong>{{ $salida->funcionario->cargo }}</strong>
				{{-- <strong>{{ strtoupper($salida->mecanico->rubro->nombre) }}</strong> --}}
			</td>
			<td width="34%">
				{{ auth()->user()->nombre}}<br>
				<strong>Encargado</strong>
			</td>
			<td width="33%">
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