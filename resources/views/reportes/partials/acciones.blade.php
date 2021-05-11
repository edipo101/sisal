{{-- <a href="{{ route('rubros.edit',$id) }}" class="btn btn-flat btn-info btn-sm ayuda" title="EDITAR"><i class="fa fa-edit"></i></a> --}}


<a href="{{ route('reportes.informe',$id) }}" target="_blank" onclick="window.open(this.href, this.target, 'width=1000,height=800'); return false;" class="btn btn-sm btn-info">
	<i class="fa fa-file"></i>
</a>