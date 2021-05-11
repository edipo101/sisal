$(function(){
    let opcionesToastr ={
        "closeButton":true,
        "debug":false,
        "newestOnTop":false,
        "progressBar":true,
        "positionClass":"toast-top-center",
        "preventDuplicates":true,
        "onclick":null,
        "showDuration":"300",
        "hideDuration":"1000",
        "timeOut":"5000",
        "extendedTimeOut":"1000",
        "showEasing":"swing",
        "hideEasing":"linear",
        "showMethod":"fadeIn",
        "hideMethod":"fadeOut"
    }
    $('.select').select2();
    var cantidadTotal = 0;
    var precioTotal = 0;
    // $('.select').select2();
    // $('.select-item').select2();
    var direccion = 'http://' + window.location.host + '/sisalprod/public/';
	var direccion1 = window.location + '/../../';
	//alert("Estamos en: "+direccion1);
	//para cargar combo producto
	$('#destino_id').change(function(e){
		e.preventDefault();
		$('.producto_id').select2();
		
		var id_dest = $('#destino_id').val();
		var ruta = direccion1 + 'ingresos/producto/'+ id_dest+'/destino';
		
		$.get(ruta,function(datos){
			$("#producto_id").empty();
			$("#orden").empty();
			$("#orden").append('<option selected="selected">Nro de Orden</option>');
			$("#producto_id").append('<option selected="selected">Seleccione un producto</option>');
			$.each(datos,function(key, productos){
				$("#producto_id").append('<option value='+productos.id+'>'+productos.producto+'</option>');
			}
			);
		}			
		);
	});
    $('#producto_id').change(function(e){
        e.preventDefault();
        $("#valoresproducto").removeClass('hidden');
        $('.orden').select2();
		$('.destino_id').select2();
        $('#cantidad_ingreso').val(0);
        $('#cantidad_salida').val(0);
        $('#precio_salida').val(0);
        $('#subtotal').val(0);

        var id_item = $('#producto_id').val();
		var id_ue = $('#destino_id').val();
        //var path = 'http://localhost/sismaes/public';
        //var route = direccion + 'ingresos/detalle/'+ id_item +'/ingreso';
		//modif x jose para sacar datos segun UE
		var route = direccion1 + 'ingresos/detalle/producto/'+ id_item +'/'+id_ue+'/destino';
        $.get(route,function(data){
            $("#orden").empty();
            $("#orden").append('<option selected="selected">Nro de Orden</option>');
            $.each(data,function(key, registro) {
                $("#orden").append('<option value='+registro.id+'>'+registro.orden+'</option>');
            });
        });
    });

    $('#orden').change(function(e){
        e.preventDefault();
        $('#cantidad_salida').val(0);
        $('#precio_salida').val(0);
        $('#subtotal').val(0);
        var id_detalle = $('#orden').val();
        var id_item = $('#producto_id').val();
        //var path = 'http://localhost/sismaes/public';
        var route = direccion1 + 'ingresos/cantidad/'+ id_detalle +'/'+ id_item +'/producto';
        $.get(route,function(data){
            $('#cantidad_ingreso').val(data['cantidad']);
            $('#precio_salida').val(data['precio_ingreso']);
        });
    });

    $('#cantidad_salida').change(function(){

        var id_item = $('#producto_id').val();
        var cantidad = $("#cantidad_salida").val();
        var precio = $("#precio_salida").val();
        var route = direccion1 + '/productos/listar/'+ id_item +'/'+cantidad+'/'+precio+'/producto';
        $.get(route,function(data){
            $('#subtotal').val(data.subtotal);
        });
    });

    $('#btnagregar').click(function(e){
    	if($('#orden').val()=="Nro de Orden"){
            toastr.options = opcionesToastr;
            let mensaje = 'Seleccione número de orden';
            toastr.error(mensaje,'Error');
            exit();
        }

        if($('#cantidad_salida').val()=="0"){
            toastr.options = opcionesToastr;
            let mensaje = 'La cantidad de salida no puede ser 0';
            toastr.error(mensaje,'Error');
            exit();
        }
        
        var id_item = $('#producto_id').val();
        var orden = $('#orden').val();
        var cantidad = $("#cantidad_salida").val();
        var precio = $("#precio_salida").val();
        var subtotal = cantidad*precio;
        var route = direccion1 + '/productos/listar/'+ id_item +'/'+cantidad+'/'+precio+'/producto';
        $.get(route,function(data){
            
            $("#detalleproducto").append(
                "<tr><td>"+data.producto.id+"</td><td>"+data.producto.nombre+"</td><td>"+data.cantidad+"</td><td>"+precio+"</td><td>"+data.subtotal+"</td><td>"+orden+"</td><td><a class='delete btn btn-danger btn-xs'><i class='fa fa-minus'></i></a></td></tr>"
                );
            cantidadTotal +=parseFloat(data.cantidad);
            precioTotal +=parseFloat(data.subtotal);
            $('#cantidad').val(cantidadTotal);
            $('#total').val(precioTotal);
        });
    });

    $(document).on('click', '.delete', function (event) {
        event.preventDefault();
        $(this).closest('tr').remove();
        cantidadTotal = 0;
        precioTotal = 0;
        $('#total').val(precioTotal);
        $('#cantidad').val(cantidadTotal);
        $("#detalleproducto tr").find('td:eq(3)').each(function () {
         //obtenemos el valor de la celda
        valor = parseFloat($(this).html());
        cantidadTotal +=valor;
        $('#cantidad').val(cantidadTotal);
        });
        $("#detalleproducto tr").find('td:eq(5)').each(function () {
         //obtenemos el valor de la celda
        valor = parseFloat($(this).html());
        precioTotal +=valor;
        $('#total').val(precioTotal);
        });
    });

    $("#btn-items").click(function () {
        var item = [];
        var cantidad = [];
        var preciounitario = [];
        var subtotal = [];
        var orden = [];
        $("#detalleproducto tr").each(function (index) {
            var campo1, campo2,campo3,campo4,campo5;
            $(this).children("td").each(function (index2) {
                switch (index2) {
                    case 0:
                    campo1 = $(this).text();
                    break;
                    case 2:
                    campo2 = $(this).text();
                    break;
                    case 3:
                    campo3 = $(this).text();
                    break;
                    case 4:
                    campo4 = $(this).text();
                    break;
                    case 5:
                    campo5 = $(this).text();
                    break;
                }
                $(this).css("background-color", "#ECF8E0");
            })
            $('.delete').addClass('disabled');
            item.push(campo1);
            cantidad.push(campo2);
            preciounitario.push(campo3);
            subtotal.push(campo4);
            orden.push(campo5);
        });
        $('#item').val(item);
        $('#cantidaditem').val(cantidad);
        $('#precioitem').val(preciounitario);
        $('#totalitem').val(subtotal);
        $('#ordenitem').val(orden);
    });
});
