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
		{!! Form::open(['route' => 'salidas.store']) !!}
			@include('salidas.partials.form')
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
				$('#precio_salida').val('');
			}
		});

		$('#precio_salida').keypress(function(e){
			if(e.which == 13){
				$('#btnagregar').focus();
			}
		});


		$('#btnagregar').click(function(e){
			e.preventDefault();
			let product_id = parseInt($('#producto_id').val());
			if (product_id != "" && validateFields()){
				console.log('product_id: '+product_id);
				var route = "{{route('productos.detalle_ingresos')}}";
				var data = "id="+product_id;
				$.get(route, data, function(result){
					console.log(result);
					result.forEach(function(value){
						console.log('id: '+value.id);
					});
					// $('#cantidad_almacen').val(result);
				});
				return 0;
				let product_name = $('#producto_id option:selected').text();
				let quantity = parseFloat($('#cantidad_salida').val());
				let price = parseFloat($('#precio_salida').val());
				let subtotal = quantity * price;

				let product = {
					id: product_id,
					name: product_name,
					quantity: quantity,
					price: price,
					subtotal: subtotal
				}
				if (!updateProduct(product, quantity)){
					rows.push(product);
				}
				refreshTable();
					
				$('#cantidad_salida').val('');
				$('#precio_salida').val('');
			}
		});

		function updateProduct(product, quantity){
			for (let i = 0; i < rows.length; i++) {
				if (product.id == rows[i].id){
					rows.splice(i, 1, product); 
					return true;
				}
			}
			return false;
		}

		function refreshTable(){
			$('#detalleproducto').empty();
			let totalQuantity = 0;
			let subTotal = 0;
			rows.forEach(function(value){
				$('#detalleproducto').append(
					"<tr data-id = '"+value.id+"'>"+
					"<td>"+value.id+"</td>"+
					"<td style='text-align: left'>"+value.name+"</td>"+
					"<td style='text-align: right;'>"+value.price.toFixed(2)+"</td>"+
					"<td style='text-align: right;'>"+value.quantity+"</td>"+
					"<td style='text-align: right;'>"+value.subtotal.toFixed(2)+"</td>"+
					'<td><button type="button" class="btn btn-danger btn-xs delete"><i class="fa fa-remove"></i> Eliminar</button></td>'+
					"</tr>"
				);
				totalQuantity += value.quantity;
				subTotal += value.subtotal;
			});
			$('#table-foot tr').find("td:eq(1)").text(totalQuantity);
			$('#table-foot tr').find("td:eq(2)").text(subTotal.toFixed(2));
			// $('#total').text(subTotal);

			$('#cantidad').val(totalQuantity);
			$('#total').val(subTotal);
			
			if (rows.length > 0)
				$('#btn-save').removeAttr('disabled');
			else
				$('#btn-save').attr('disabled', 'disabled');
		}

		$(document).on('click', '.delete', function(){
			let product_id = $(this).parent().parent().data('id');
			let product = rows.find(prod => prod.id === product_id); 
			let index = rows.indexOf(product);
			rows.splice(index, 1);
   		$(this).closest("tr").remove();
   		refreshTable();
		});

		function validateFields(){
			var quantity = parseFloat($('#cantidad_salida').val());
			var quantity_almacen = $('#cantidad_almacen').val();
			var price = parseFloat($('#precio_salida').val());
			if (isNaN(quantity)) return false;
			if (quantity > quantity_almacen){
				alert('La cantidad solicitada es mayor a la de Almacen');
				return false;
			}
			if (quantity <= 0) return false;
			if (isNaN(price)) return false;
			if (price <= 0) return false;
			return true;
		}

		function setDetails(){
			str_details = JSON.stringify(rows);
	    	$('#details').val(str_details);
	    	// console.log($('#details').val());
	  }

    $('#form_ingreso').submit(function(e){
    	setDetails();
    	return true;
    });


	});	

</script>
@endsection