<h4 class="text-center">PRODUCTOS EN ALMACEN</h4>
<div class="col-md-12">
	<div class="form-group">
		{{ Form::label('producto_id', 'Producto') }}
		{{ Form::select('producto_id',$productos,null,['class'=> 'form-control select','id' => 'producto_id', 'placeholder' => 'Seleccione un Producto']) }}
	</div>
</div>
<div class="hidden" id="valoresproducto">
	<div class="col-md-2">
		<div class="form-group">
			{{ Form::label('orden', 'Nro. Orden') }}
			{{ Form::select('orden',[], null,['class'=> 'form-control orden','id' => 'orden','placeholder'=> 'Nro de Orden']) }}
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			{{ Form::label('cantidad_ingreso', 'Cantidad Almacen') }}
			{{ Form::text('cantidad_ingreso',null,['class'=> 'form-control','id' => 'cantidad_ingreso','readonly'=>'readonly']) }}
		</div>
	</div>
	<div class="col-md-2">
		<div class="form-group">
			{{ Form::label('precio_salida', 'Precio') }}
			{{ Form::text('precio_salida',null,['class'=> 'form-control','id' => 'precio_salida', 'readonly'=>'readonly']) }}
		</div>
	</div>
	<div class="col-md-2">
		<div class="form-group">
			{{ Form::label('cantidad_salida', 'Cantidad Salida') }}
			{{ Form::text('cantidad_salida',null,['class'=> 'form-control','id' => 'cantidad_salida']) }}
		</div>
	</div>
	<div class="col-md-2">
		<div class="form-group">
			{{ Form::label('subtotal', 'Subtotal') }}
			{{ Form::text('subtotal',null,['class'=> 'form-control','id' => 'subtotal', 'readonly'=>'readonly']) }}
		</div>
	</div>
	<div class="col-md-1">
		<div class="form-group">
			<a href="#" id="btnagregar" class="btn btn-success" style="margin-top: 24px; "><i class="fa fa-plus"></i></a>
		</div>
	</div>	
</div>

{{-- Detalle de los Productos seleccionados --}}
<div class="col-md-12">
	<h4 class="text-center">DETALLE DE PRODUCTOS SALIENTES</h4>
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
                <th>Nro Orden</th>
                <th width="10px">Accion</th>
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
    <input type="hidden" id="ordenitem" name="ordenitem" value="">
</div>
<div class="text-center">
    <input type="button" class="btn btn-info text-center" id="btn-items" value="CONFIRMAR PRODUCTOS">
</div>
