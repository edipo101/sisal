@can('destinos.show')
	<a href="{{ route('destinos.show',$id) }}" class="btn btn-flat btn-default btn-sm ayuda" title="VER DATOS"><i class="fa fa-eye"></i></a>
@endcan

@can('destinos.edit')
	<a href="{{ route('destinos.edit',$id) }}" class="btn btn-flat btn-info btn-sm ayuda" title="EDITAR"><i class="fa fa-edit"></i></a>
@endcan

@can('destinos.destroy')
	<a href="" data-target="#modal-delete-{{ $id }}" data-toggle="modal" class="btn btn-flat btn-danger btn-sm ayuda" title="ELIMINAR">
		<i class="fa fa-trash"></i>
	</a>
@endcan


@include('destinos.partials.modal')