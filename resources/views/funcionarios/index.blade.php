@extends('layouts.master')

@section('title')
    Funcionarios
@endsection

@section('head-content')
	<h1>
		<i class="fa fa-user-md"></i>
		FUNCIONARIOS
		<small>Listado de Funcionarios registrados en el sistema</small>
	</h1>
@endsection

@section('main-content')
<div class="box">
	<div class="box-header with-border">
	 	<h3 class="box-title"><i class="fa fa-user-md"></i> LISTA DE FUNCIONARIOS REGISTRADOS</h3>

	 	<div class="box-tools">
	 		<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          	</button>
          	<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
          	</button>
	  	</div>
	</div>
	<div class="box-body">
		@can('funcionarios.create')
			<a href="{{ route('funcionarios.create') }}" class="btn btn-flat btn-primary pull-right">
				<i class="fa fa-plus"></i> NUEVO FUNCIONARIO
			</a>
		@endcan
		
		<br><br>
        <table id="funcionarios" class="table table-bordered table-striped table-hover">
        	<thead>
        		<tr class="bg-black">
					<th>CI</th>
                    <th>ITEM</th>
					<th>Nombre del Funcionario</th>
					<th>Cargo</th>
					<th width="110">&nbsp;</th>
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
    $('#funcionarios').DataTable({
    	language: {
            url: "{{ asset('plugins/datatables.net/Spanish.json') }}",
        	searchPlaceholder: "Buscar funcionarios..."
        },
        order: [[ 1, "desc" ]],
        processing: true,
        serverSide: true,
        ajax: '{!! route('funcionarios.apiFuncionarios') !!}',
        columns: [
			{data: 'carnet'},
            {data: 'item'},
			{data: 'nombre'},
			{data: 'cargo'},
            { data: 'action', orderable: false, searchable: false},
        ],
    });
    
  })
</script>
@endsection