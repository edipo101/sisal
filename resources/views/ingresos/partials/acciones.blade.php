@can('ingresos.show')
	<a href="{{ route('ingresos.show',$id) }}" class="btn btn-flat btn-default btn-sm ayuda" title="VER DATOS"><i class="fa fa-eye"></i></a>
@endcan

@can('ingresos.index')
	<a href="{{ route('ingresos.reporteingreso',$id) }}" class="btn btn-sm btn-primary" target="_blank" onclick="window.open(this.href, this.target, 'width=800,height=600'); return false;">
			<i class="fa fa-print"></i>
	</a>
@endcan

{{-- <a href="{{ route('ingresos.edit',$id) }}" class="btn btn-flat btn-info btn-sm ayuda" title="EDITAR"><i class="fa fa-edit"></i></a> --}}
@can('ingresos.destroy')
	<a href="" data-target="#modal-delete-{{ $id }}" data-toggle="modal" class="btn btn-flat btn-danger btn-sm ayuda" title="ELIMINAR">
		<i class="fa fa-trash"></i>
	</a>
@endcan

@include('ingresos.partials.modal')