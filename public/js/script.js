const opcionesToastr = {
    "closeButton" : true,
    "debug" : false,
    "newestOnTop" : false,
    "progressBar" : true,
    "positionClass" : "toast-top-center",
    "preventDuplicates" : true,
    "onclick" : null,
    "showDuration" : "300",
    "hideDuration" : "1000",
    "timeOut" : "5000",
    "extendedTimeOut" : "1000",
    "showEasing" : "swing",
    "hideEasing" : "linear",
    "showMethod" : "fadeIn",
    "hideMethod" : "fadeOut"
}
toastr.options = opcionesToastr;

let direccion = location.origin;

if(direccion === 'http://localhost')
    direccion +='/sisalprod/public'; //Esto se debe cambiar al nombre de la app

const confDataTable = (ruta,data,nombre,order = [[0,"asc"]]) => {
    return {
        responsive: true,
		autoWidth:false,
    	language: {
            url: `${direccion}/plugins/datatables.net/Spanish.json`,
        	searchPlaceholder: `Buscar ${nombre}...`
        },
        order: order,
        processing: true,
        serverSide: true,
        ajax: ruta,
        columns: data,
    }
}

//Metodo para agregar datos de un modulo
const add = (ruta, data,formulario,tabla,modal=null)=>{
    const formGroups= document.querySelectorAll('.form-group');
    axios({
        method: 'post',
        url: ruta,
        data: data,
    }).then(response=>{
        let mensaje = `${response.data.mensaje}`;
        toastr.success(mensaje,'Agregado!');
        tabla.ajax.reload(null,false);
        formulario.reset();
        limpiar(formGroups)
        if(modal)
            $(modal).modal('hide');
    }).catch( error => {
        if(error.response.status === 422){
            const errors = error.response.data.errors;
            limpiar(formGroups);
            cargarErrors(errors);
        }
        else{
            alert(error.response.status);
            console.log(error);
        }
        
    });
};

// Metodo para cargar los datos de edicion de un modulo
const edit = (ruta,modal) => {
    axios({
        method: 'get',
        url: ruta,
    }).then(response=>{
        for(let data in response.data){
            let valor = document.getElementById(data);
            if(valor)
                valor.value = response.data[data]
        }
        $(modal).modal('show');
    });
}

// Metodo para actualizar datos de un modulo
const update = (ruta, formulario,tabla,modal=null) =>{
    const formGroups= document.querySelectorAll('.form-group');
    const data = toJSONString(formulario);
    limpiar(formGroups)
    axios({
        method: 'put',
        url: ruta,
        data: data,
        headers: {'Content-Type': 'application/json'}
    }).then(response=>{
        let mensaje = `${response.data.mensaje}`;
        toastr.info(mensaje,'Actualizado!');
        tabla.ajax.reload(null,false);
        formulario.reset();
        limpiar(formGroups)
        if(modal)
            $(modal).modal('hide');
    }).catch( error => {
        if(error.response.status === 422){
            const errors = error.response.data.errors;
            limpiar(formGroups);
            cargarErrors(errors);
        }
        else{
            alert(error.response.status);
            console.log(error);
        }
    });
}

// Metodo para eliminar cualquier dato de cualquier modulo
const eliminar = (ruta,nombre,tabla,tituloMensaje='Eliminado!',titulo='Eliminar') =>{
    swal({
        title: `${titulo} ${nombre}`,
        text: `SEGURO QUE DESEA ${titulo.toUpperCase()} ESTE(A) ${nombre.toUpperCase()}?`,
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#7a7a7a',
        confirmButtonText: 'Aceptar'
    }).then((result) => {
        if(result.value){
            axios({
                method: 'delete',
                url: ruta,
            }).then(response=>{
                let mensaje = `${response.data.mensaje}`;
                toastr.error(mensaje,tituloMensaje);
                tabla.ajax.reload(null,false);
            }).catch(function (error) {
                alert(error);
                console.log(error);
            });
        }
    });
};

//Metodo para limpiar los form-group que tienen activado la clase has-error
const limpiar = formG =>{
    formG.forEach(grupo => {
        grupo.classList.remove('has-error');
        let ultimo = grupo.children[grupo.children.length-1];
        ultimo.textContent = '';
    })
}
//Metodo para cargar todos los errores de validacions
const cargarErrors = errors =>{
    $.each(errors, function(key,value){
        let error = document.getElementById(`${key}-error`)
        error.textContent = '(*)' + value[0];
        let formGroup = error.parentNode
        formGroup.classList.add('has-error');
    });
}

// Metodo para transformar los datos del formulario en JSON
const toJSONString = (form) => {
    let obj = {};
    let elements = form.querySelectorAll( "input, select, textarea" );
    for( let i = 0; i < elements.length; ++i ) {
        let element = elements[i];
        let name = element.name;
        let value = element.value;
        if( name ) {
            obj[ name ] = value;
        }
    }
    return JSON.stringify( obj );
}

//Datos dinamicamente en un select
const cargar = (ruta,selector) => {
    let opciones = '<option selected="selected" value="">Seleccione una opcion</option>'
    axios.get(ruta)
    .then(function (response) {
        response.data.map(dato =>{
            let opcion= `<option value=${dato.id}>${dato.nombre}</option>`;
            opciones = opciones + opcion;
            document.getElementById(selector).innerHTML = opciones;
        })
    })
    .catch(function (error) {
        alert(error.response.status);
        console.log(error);
    });
}

//Cargado de autocompletado cargando datos dinamicamente
const autocompletado = (ruta, selector) => {
    axios.get(ruta)
    .then(function (response) {
        let data = response.data
        $(`#${selector}`).typeahead({
            source:data,
            displayText: function(data){ return data.nombre;},
        });
    })
    .catch(function (error) {
        alert(error.response.status);
        console.log(error);
    });
}

//Metodo para importar datos de cualquier modulo
const importar = (ruta, data,formulario,tabla,modal=null) =>{
    axios({
        url:ruta,
        data: data,
        method: 'POST',
        cache: false,
        contentType: false,
        processData: false,
    }).then(response=>{
        let mensaje = `${response.data.mensaje}`;
        toastr.success(mensaje,'Importar!'); 
        formulario.reset();
        tabla.ajax.reload(null,false);
        if(modal)
            $(modal).modal('hide');
    })
    .catch(error=>{
        alert(error.response.status);
        console.log(error);
    });
}
//Metodo para visualizar el metodo imprimir de un modulo en un modal
const imprimir = (ruta,modal='#modal-imprimir') => {
    const pdfFrame = document.getElementById('pdf')
    pdfFrame.setAttribute('src','');
    setTimeout(()=>{
      pdfFrame.setAttribute('src',ruta);
      $(modal).modal('show')
    },200)
}