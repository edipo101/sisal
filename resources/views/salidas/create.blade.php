@extends('layouts.master')

@section('title')
Salidas
@endsection

@section('head-content')
	<h1><i class="fa fa-sign-out"></i> SALIDAS <small>Registro de salidas de productos</small></h1>
@endsection

@section('main-content')
<div class="box">
	<div class="box-header with-border">
	 	<h3 class="box-title"><i class="fa fa-sign-out"></i> Registrar nueva salida</h3>
	</div>
	<div class="box-body">
		{!! Form::open(['route' => 'salidas.store', 'id'=>'form_salida']) !!}
			@include('salidas.partials.form')
			<input type="hidden" id="details" name="detalles">
		{!! Form::close() !!}
    </div>
	<!-- /.box-body -->
</div>

@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.css') }}">
@endsection

@section('scripts')
<script src="{{ asset('plugins/select2/js/select2.js') }}"></script>

<script type="text/javascript">
	$(document).ready(function(){
		var rows = [];

		$('#producto_id').change(function(e){
			e.preventDefault();
			var product_id = $(this).val();
			if (product_id != ""){
				var route = "{{route('productos.stock')}}";
				var data = "id="+product_id;
				$.get(route, data, function(result){
					$('#cantidad_almacen').val(result);
				});
				$('#cantidad_salida').val('');
			}
		});

		$('#cantidad_salida').keypress(function(e){
			if(e.which == 13){
				$('#btnagregar').focus();
			}
		});


		$('#btnagregar').click(function(e){
			e.preventDefault();
			// rows = [];
			let product_id = parseInt($('#producto_id').val());
			if (product_id != "" && validateFields()){
				// console.log('product_id: '+product_id);
				let quantity = parseFloat($('#cantidad_salida').val());
				var route = "{{route('productos.detalle_ingresos')}}";
				var data = "id="+product_id;
				$.get(route, data, function(result){
					// console.log(result);
					// console.log(result.detalles.length);
					let sum = 0;
					// console.log('quantity: ' + quantity);
					removeProduct(product_id);
					for (let i = 0; i < result.detalles.length; i++) {
						// console.log('stock_ingreso: ' + result.detalles[i].stock_ingreso);
						// console.log('sum: ' + sum);
						let product_name = $('#producto_id option:selected').text();
						let product = {
							id: product_id,
							name: product_name,
							quantity: quantity,
							price: result.detalles[i].precio,
							subtotal: 0,
							detalle_ingreso_id: result.detalles[i].id
						}
						if (quantity <= (result.detalles[i].stock_ingreso + sum)){
							product.quantity = quantity - sum;
							product.subtotal = product.quantity * result.detalles[i].precio; 
							rows.push(product);
							break;
						}
						else{
							product.quantity = result.detalles[i].stock_ingreso;
							product.subtotal = product.quantity * product.price;
							rows.push(product);
							sum += result.detalles[i].stock_ingreso;
						}
					}
					// console.log(rows);
					// console.log('end function');
					refreshTable();
					// $('#cantidad_salida').val('');
				});
			}
		});

		function removeProduct(product_id){
			rows = rows.filter(function(item){
				return item.id !== product_id;
			})
		}

		function refreshTable(){
			$('#detalleproducto').empty();
			let totalQuantity = 0;
			let subTotal = 0;
			let id = -1;
			let button = '<button type="button" class="btn btn-danger btn-xs delete"><i class="fa fa-remove"></i> Eliminar</button>';
			rows.forEach(function(value){
				if (value.id == id) button = '';
				else{ 
					button = '<button type="button" class="btn btn-danger btn-xs delete"><i class="fa fa-remove"></i> Eliminar</button>';
					id = value.id;
				}
				$('#detalleproducto').append(
					$('<tr data-id="'+value.id+'">').append(
						$('<td>').text(value.id),
						$('<td style="text-align: left">').text(value.name),
						$('<td style="text-align: right">').text(value.price.toFixed(2)),
						$('<td style="text-align: right">').text(value.quantity.toFixed(2)),
						$('<td style="text-align: right">').text(value.subtotal.toFixed(2)),
						$('<td>').html(button)
					)
				);
				totalQuantity += value.quantity;
				subTotal += value.subtotal;
			});
			$('#table-foot tr').find("td:eq(1)").text(totalQuantity.toFixed(2));
			$('#table-foot tr').find("td:eq(2)").text(subTotal.toFixed(2));

			$('#cantidad').val(totalQuantity);
			$('#total').val(subTotal);
			
			if (rows.length > 0) $('#btn-save').removeAttr('disabled');
			else $('#btn-save').attr('disabled', 'disabled');
		}

		$(document).on('click', '.delete', function(){
			let product_id = $(this).parent().parent().data('id');
   			removeProduct(product_id);
   			refreshTable();
		});

		function validateFields(){
			var quantity = parseFloat($('#cantidad_salida').val());
			var quantity_almacen = $('#cantidad_almacen').val();
			if (isNaN(quantity)) return false;
			if (quantity > quantity_almacen){
				alert('La cantidad solicitada es mayor a la de Almacen');
				return false;
			}
			if (quantity <= 0) return false;
			return true;
		}

		function setDetails(){
			str_details = JSON.stringify(rows);
	    	$('#details').val(str_details);
	    	console.log($('#details').val());
	  }

    $('#form_salida').submit(function(e){
    	setDetails();
    	return true;
    });


	});	

</script>
@endsection