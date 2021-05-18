$(function(){
    $('.select').select2();
    var cantidadTotal = 0;
    var precioTotal = 0;
    // $('.select').select2();
    // $('.select-item').select2();
    var direccion = 'http://' + window.location.host + '/sisalprod/public';
	var direccion1 = window.location + '/../../';
    // alert('si entro');
    //alert(direccion);
    
    //Obtener la cantidad en stock del producto
    $('#producto_id').change(function(e){
        e.preventDefault();
        $("#valoresproducto").removeClass('hidden');
        $('#cantidad_ingreso').val(0);
        $('#precio_ingreso').val(0);
        $('#subtotal').val(0);

        var id_item = $('#producto_id').val();
        var route = direccion1 + '/productos/almacen/'+ id_item +'/cantidad';
        $.get(route,function(data){
            $('#cantidad_almacen').val(data);
        });
    });
    
    $('#precio_ingreso').change(function(){
        var id_item = $('#producto_id').val();
	var cantidad = $('#cantidad_ingreso').val();
        var precio = $('#precio_ingreso').val();
	var route = direccion1 + '/productos/listar/' + id_item + '/' + cantidad + '/' + precio + '/producto';
	$.get(route, function(data){
		$('#subtotal').val(data.subtotal);
	});
        //$('#subtotal').val(cantidad*precio);
    });

    $('#btnagregar').click(function(){
        var id_item = $('#producto_id').val();
	var cantidad = $('#cantidad_ingreso').val();
	var precio = $('#precio_ingreso').val();
        var route = direccion1 + '/productos/listar/'+ id_item +'/'+cantidad+'/'+precio+'/producto';
        $.get(route,function(data){
            console.log(data);
            var cantidad = parseFloat($("#cantidad_ingreso").val());
            var precio = $("#precio_ingreso").val();
            var subtotal = cantidad*precio;
            $("#detalleproducto").append(
                "<tr><td>"+data.producto.id+"</td><td>"+data.producto.nombre+"</td><td>"+data.cantidad+"</td><td>"+precio+"</td><td>"+data.subtotal+"</td><td><a class='delete btn btn-danger btn-xs'><i class='fa fa-minus'></i></a></td></tr>"
                );
            cantidadTotal +=cantidad;
            precioTotal +=subtotal;
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
        $("#detalleproducto tr").each(function (index) {
            var campo1, campo2,campo3,campo4;
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
                }
                $(this).css("background-color", "#ECF8E0");
            })
            $('.delete').addClass('disabled');
            item.push(campo1);
            cantidad.push(campo2);
            preciounitario.push(campo3);
            subtotal.push(campo4);
        });
        $('#item').val(item);
        $('#cantidaditem').val(cantidad);
        $('#precioitem').val(preciounitario);
        $('#totalitem').val(subtotal);
    });
});
