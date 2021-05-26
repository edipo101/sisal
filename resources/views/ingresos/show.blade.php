@extends('layouts.master')

@section('title')
    Ingresos
@endsection

@section('head-content')
	<h1>
		<i class="fa fa-sign-in"></i>
		INGRESOS
		<small>Detalle del Ingreso</small>
	</h1>
@endsection

@section('main-content')
<div class="box">
	<div class="box-header with-border">
	 	<h3 class="box-title"><i class="fa fa-sign-in"></i> Ver detalle del Ingreso</h3>

	 	<div class="box-tools pull-right">
	 		<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
	      		<i class="fa fa-minus"></i>
	      	</button>
	    	<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
	      		<i class="fa fa-times"></i>
	      	</button>
	  	</div>
	</div>
	<div class="box-body">
        <div class="row">
            <div class="col-md-12">
                <p>
                    <strong>PROVEEDOR:</strong> {{ $ingreso->proveedor->nombre }}
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <p>
                    <strong>Nro DE ORDEN:</strong> {{ $ingreso->orden }}
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <strong>PREVENTIVO:</strong> {{ $ingreso->preventivo }}
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <p>
                    <strong>Cantidad Total:</strong> {{ $ingreso->cantidad }}
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <strong>Precio Total:</strong> {{ number_format($ingreso->total,2) }}
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p>
                    <strong>OBSERVACION:</strong> 
                    @if($ingreso->observacion==null)
                        Sin Observacion
                    @else
                        {{ str_limit($ingreso->observacion,50) }}
                    @endif
                </p>
            </div>
        </div>
        <h4 class="text-center">Detalle de productos ingresados</h4>
        <table class="table table-striped table-hover">
            <thead>
                <tr class="info">
                    <th width="10px">Id</th>
                    <th>Producto</th>
                    <th class="text-right">Precio</th>
                    <th class="text-right">Cantidad</th>
                    <th class="text-right">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ingreso->detalle_ingresos as $detalle)
                <tr>
                    <td>{{ $detalle->producto->id }}</td>
                    <td>{{ $detalle->producto->nombre_descripcion }}</td>
                    <td class="text-right">{{ number_format($detalle->precio, 2) }}</td>
                    <td class="text-right">{{ number_format($detalle->cantidad, 2) }}</td>
                    <td class="text-right">{{ number_format($detalle->subtotal, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr style="background-color: #eee; font-weight: bold;">
                    <td colspan="3">TOTAL</td>
                    <td class="text-right">{{number_format($ingreso->cantidad, 2)}}</td>
                    <td class="text-right">{{number_format($ingreso->total, 2)}}</td>
                </tr>
            </tfoot>
        </table>
        <p></p>
        <a href="{{ route('ingresos.reporteingreso',$ingreso->id) }}" class="btn btn-primary" target="_blank" onclick="window.open(this.href, this.target, 'width=800,height=600'); return false;">
                            <i class="fa fa-print"></i> Imprimir Reporte
                        </a>
        <a href="{{ route('ingresos.index') }}" class="btn btn-default">Atras</a>

    </div>
	<!-- /.box-body -->
</div>

@endsection