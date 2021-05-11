@extends('layouts.master')

@section('title')
    Panel de Control
@endsection

@section('head-content')
    <h1>
        <i class="fa fa-dashboard"></i> SISTEMA
        <small>Panel de Control del Sistema</small>
    </h1>
@endsection

@section('main-content')
<div class="row">
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-aqua"><i class="fa fa-bars"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Ingresos</span>
        <span class="info-box-number">-</span>
        <a href="{{ route('ingresos.index') }}" class="btn btn-link">VER DETALLES</a>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-red"><i class="fa fa-building"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Salidas</span>
        <span class="info-box-number">-</span>
        <a href="{{ route('salidas.index') }}" class="btn btn-link">VER DETALLES</a>
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
      <span class="info-box-icon bg-green"><i class="fa fa-users"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Productos</span>
        <span class="info-box-number">-</span>
        <a href="{{ route('productos.index') }}" class="btn btn-link">VER DETALLES</a>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-yellow"><i class="fa fa-th"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Reportes</span>
        <span class="info-box-number">-</span>
        <a href="#" class="btn btn-link">VER DETALLES</a>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
</div>


<div class="row">
  <div class="col-md-12">
    <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-info-circle"></i> SISAL - SISTEMA DE ALMACENES</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
            <h1 class="lead text-center">
           <b> SISTEMA DE CONTROL DE INVENTARIO DE ALMACENES</b>
          </h1>
          <img src="{{ asset('img/logo.png') }}" class="center-block img-responsive logo">
          <p class="lead text-center">
            Sistema web desarrollado para el control de registro de los productos que ingresan y salen del subalmacen FDI. 
          </p>
        </div>
        <!-- /.box-body -->
        <div class="box-footer text-center">
            <!-- texto de pie de bloque aquí -->
        </div>
        <!-- /.box-footer-->
      </div>
  </div>
</div>
@endsection

