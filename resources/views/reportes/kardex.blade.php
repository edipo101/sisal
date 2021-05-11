@extends('layouts.master')

@section('title')
    Kardex
@endsection

@section('head-content')
	<h1>
		<i class="fa fa-file"></i>
		KARDEX
		<small>Listado de kardex en el sistema</small>
	</h1>
@endsection

@section('main-content')
<div class="box">
	<div class="box-header with-border">
	 	<h3 class="box-title"><i class="fa fa-file"></i> LISTA DE KARDEX</h3>

	 	<div class="box-tools">
	 		<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          	</button>
          	<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
          	</button>
	  	</div>
	</div>
	<div class="box-body">
        <table id="kardexs" class="table table-bordered table-striped table-hover">
            <thead>
                <tr class="info">
                    <th>ID</th>
                    <th>Foto</th>
                    {{-- <th>Nro Sigma</th> --}}
                    <th>Producto</th>
                    <th>Descripcion</th>
                    <th>Categoria</th>
                    <th width="10%">&nbsp;</th>
                </tr>
            </thead>
        </table>
    </div>
	<!-- /.box-body -->
</div>

@endsection

@section('scripts')
<script>
    $(function () {
        $('#kardexs').DataTable({
            language: {
                url: "{{ asset('plugins/datatables.net/Spanish.json') }}",
                searchPlaceholder: "Buscar kardexs..."
            },
            order: [[ 1, "desc" ]],
            processing: true,
            serverSide: true,
            ajax: '{!! route('kardexs.apiKardexs') !!}',
            columns: [
                {data: 'id'},
                {data: 'imagen'},
                {data: 'nombre'},
                {data: 'descripcion'},
                {data: 'categoria.nombre'},
                { data: 'action', orderable: false, searchable: false},
            ],
        });
        
    })
</script>
@endsection