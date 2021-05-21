<h4 class="text-center">PRODUCTOS EN ALMACEN</h4>
<div class="col-md-12">
	<div class="form-group">
		{{ Form::label('producto_id', 'Producto') }}
		<select class="form-control select" id="producto_id" name="producto_id">
			<option selected="selected" value="">Seleccione un Producto</option>
			@foreach($productos as $producto)
			<option value="{{$producto->id}}">{{$producto->nombre_descripcion}}</option>
			@endforeach
		</select>
		{{-- {{ Form::select('producto_id',$productos,null,['class'=> 'form-control select','id' => 'producto_id', 'placeholder' => 'Seleccione un Producto']) }} --}}
	</div>
</div>
{{-- <div class="hidden" id="valoresproducto"> --}}
<div id="valoresproducto">
	<div class="col-md-3">
		<div class="form-group">
			{{ Form::label('cantidad_almacen', 'Cantidad en Almacen') }}
			{{ Form::text('cantidad_almacen',null,['class'=> 'form-control','id' => 'cantidad_almacen', 'readonly'=>'readonly']) }}
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			{{ Form::label('cantidad_ingreso', 'Cantidad Ingreso') }}
			{{ Form::number('cantidad_ingreso', 5, ['class'=> 'form-control','id' => 'cantidad_ingreso']) }}
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			{{ Form::label('precio_ingreso', 'Precio Unitario (Bs)') }}
			{{ Form::number('precio_ingreso', 10, ['class'=> 'form-control','id' => 'precio_ingreso']) }}
		</div>
	</div>

	<div class="col-md-1">
		<div class="form-group">
			<button id="btnagregar" class="btn btn-success" style="margin-top: 24px; "><i class="fa fa-plus"></i> Agregar</button> 
		</div>
	</div>	
</div>

{{-- Detalle de los Productos seleccionados --}}
<div class="col-md-12">
	<h4 class="text-center">DETALLE DE PRODUCTOS INGRESADOS</h4>
</div>
<div class="col-md-12">
    <table class="table table-bordered table-striped text-center" >
        <thead class="bg-navy">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>Subtotal</th>
                <th>Accion</th>
            </tr>
        </thead>
        <tbody id="detalleproducto">
            {{-- Aqui se cargar los productos por ajax --}}
        </tbody>
    </table>
    <input type="hidden" id="item" name="item" value="">
    <input type="hidden" id="cantidaditem" name="cantidaditem" value="">
    <input type="hidden" id="precioitem" name="precioitem" value="">
    <input type="hidden" id="totalitem" name="totalitem" value="">
</div>
