@extends('layouts.master')

@section('title')
    Reportes
@endsection

@section('head-content')
	<h1>
		<i class="fa fa-file"></i>
		REPORTES
		<small>Listado de reportes en el sistema</small>
	</h1>
@endsection

@section('main-content')
<div class="box">
	<div class="box-header with-border">
	 	<h3 class="box-title"><i class="fa fa-file"></i> LISTA DE REPORTES</h3>

	 	<div class="box-tools">
	 		<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          	</button>
          	<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
          	</button>
	  	</div>
	</div>
	<div class="box-body">
        <p class="lead text-center">
            En esta Seccion ud. podra imprimir y/o visualizar los reportes del sistema
        </p>
    </div>
	<!-- /.box-body -->
</div>

<div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-archive"></i></span>
      
            <div class="info-box-content">
                <span class="info-box-text">REPORTE DE PRODUCTOS</span>
                <span class="info-box-number">-</span>
                <a href="{{ route('reportes.productos') }}" target="_blank" onclick="window.open(this.href, this.target, 'width=1000,height=800'); return false;" class="btn btn-flat btn-primary">Imprimir</a>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-file"></i></span>
      
            <div class="info-box-content">
              <span class="info-box-text">Kardex de un Producto</span>
              <span class="info-box-number">-</span>
              <a href="{{ route('reportes.kardex') }}" class="btn btn-link">INGRESAR</a>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      
        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>
      
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-bar-chart"></i></span>
      
            <div class="info-box-content">
              <span class="info-box-text">Reporte Estadisticos</span>
              <span class="info-box-number">-</span>
              <a href="{{ route('reportes.index') }}" class="btn btn-link" disabled="disabled">INGRESAR</a>

            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-database"></i></span>
      
            <div class="info-box-content">
              <span class="info-box-text">Otros Reportes</span>
              <span class="info-box-number">-</span>
              <a href="{{ route('reportes.index') }}" class="btn btn-link" disabled="disabled">INGRESAR</a>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>

@endsection