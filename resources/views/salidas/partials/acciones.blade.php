@can('salidas.show')
	<a href="{{ route('salidas.show',$id) }}" class="btn btn-flat btn-default btn-sm ayuda" title="VER DATOS"><i class="fa fa-eye"></i></a>
@endcan

@can('salidas.index')
	<a href="{{ route('salidas.reportesalida',$id) }}" class="btn btn-sm btn-primary" target="_blank" onclick="window.open(this.href, this.target, 'width=800,height=600'); return false;">
			<i class="fa fa-print"></i>
	</a>
@endcan

{{-- <a href="{{ route('salidas.edit',$id) }}" class="btn btn-flat btn-info btn-sm ayuda" title="EDITAR"><i class="fa fa-edit"></i></a> --}}
@can('salidas.destroy')
	<a href="" data-target="#modal-delete-{{ $id }}" data-toggle="modal" class="btn btn-flat btn-danger btn-sm ayuda" title="ELIMINAR">
		<i class="fa fa-trash"></i>
	</a>
@endcan

@include('salidas.partials.modal')