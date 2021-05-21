@extends('layouts.master')

@section('title')
Ingresos
@endsection

@section('head-content')
<h1>
	<i class="fa fa-sign-in"></i>
	INGRESOS
	<small>Nuevo Ingreso</small>
</h1>
@endsection

@section('main-content')
<div class="box">
	<div class="box-header with-border">
		<h3 class="box-title"><i class="fa fa-sign-in"></i> Registrar Nuevo Ingreso</h3>

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
		{!! Form::open(['route' => 'ingresos.store', 'id' => 'form_ingreso']) !!}
		@include('ingresos.partials.form')
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
<script src="{{asset('js/script-ingresos.js')}}"></script>

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
				$('#cantidad_ingreso').val('');
				$('#precio_ingreso').val('');
			}
		});

		$('#precio_ingreso').keypress(function(e){
			if(e.which == 13){
				$('#btnagregar').focus();
			}
		});


		$('#btnagregar').click(function(e){
			e.preventDefault();
			let product_id = parseInt($('#producto_id').val());
			if (product_id != "" && validateFields()){
				let product_name = $('#producto_id option:selected').text();
				let quantity = parseFloat($('#cantidad_ingreso').val());
				let price = parseFloat($('#precio_ingreso').val());
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
					
				$('#cantidad_ingreso').val('');
				$('#precio_ingreso').val('');
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
					"<td>"+value.quantity+"</td>"+
					"<td>"+value.price+"</td>"+
					"<td>"+value.subtotal+"</td>"+
					'<td><button type="button" class="btn btn-danger btn-xs otro"><i class="fa fa-remove"></i> Eliminar</button></td>'+
					"</tr>"
				);
				totalQuantity += value.quantity;
				subTotal += value.subtotal;
			});
			$('#cantidad').val(totalQuantity);
			$('#total').val(subTotal);
		}

		$('.otro').on("click", function(e) {
			e.preventDefault();
			console.log('eliminar');
			// console.log($(this).parent().parent().data('id'));
   			// $(this).parent().remove();
		});

		function validateFields(){
			var quantity = parseFloat($('#cantidad_ingreso').val());
			var price = parseFloat($('#precio_ingreso').val());
			if (isNaN(quantity)) return false;
			if (quantity <= 0) return false;
			if (isNaN(price)) return false;
			if (price <= 0) return false;
			return true;
		}

		function setDetails(){
			str_details = JSON.stringify(rows);
	    	$('#details').val(str_details);
	    	console.log($('#details').val());
	    }

	    $('#form_ingreso').submit(function(e){
	    	setDetails();
	    	return false;
	    });


	});	

</script>
@endsection