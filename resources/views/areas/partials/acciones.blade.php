@can('areas.show')
	<a href="{{ route('areas.show',$id) }}" class="btn btn-flat btn-default btn-sm ayuda" title="VER DATOS"><i class="fa fa-eye"></i></a>
@endcan

@can('areas.edit')
	<a href="{{ route('areas.edit',$id) }}" class="btn btn-flat btn-info btn-sm ayuda" title="EDITAR"><i class="fa fa-edit"></i></a>
@endcan

@can('areas.destroy')
	<a href="" data-target="#modal-delete-{{ $id }}" data-toggle="modal" class="btn btn-flat btn-danger btn-sm ayuda" title="ELIMINAR">
		<i class="fa fa-trash"></i>
	</a>
@endcan


@include('areas.partials.modal')