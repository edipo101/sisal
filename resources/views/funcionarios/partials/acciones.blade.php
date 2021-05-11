@can('funcionarios.show')
	<a href="{{ route('funcionarios.show',$id) }}" class="btn btn-flat btn-default btn-sm ayuda" title="VER DATOS"><i class="fa fa-eye"></i></a>
@endcan

@can('funcionarios.edit')
	<a href="{{ route('funcionarios.edit',$id) }}" class="btn btn-flat btn-info btn-sm ayuda" title="EDITAR"><i class="fa fa-edit"></i></a>
@endcan

@can('funcionarios.destroy')
	<a href="" data-target="#modal-delete-{{ $id }}" data-toggle="modal" class="btn btn-flat btn-danger btn-sm ayuda" title="ELIMINAR">
		<i class="fa fa-trash"></i>
	</a>
@endcan


@include('funcionarios.partials.modal')