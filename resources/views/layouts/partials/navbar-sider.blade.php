<section class="sidebar">

  <!-- Sidebar user panel (optional)  -->
  <div class="user-panel">
    <div class="pull-left image">
      <img src="{{ asset('img/users/user.png') }}" class="img-circle" alt="Imagen Usuario">
    </div>
    <div class="pull-left info">
      <p>{{ auth()->user()->nombre }}</p>
      <p><b>Almacen: </b>{{ auth()->user()->nombrealmacen }}</p>
      <!-- Status -->
      @can('users.perfil')
      <a href="{{ route('users.perfil') }}"><i class="fa fa-circle text-success"></i>En linea</a>
      @endcan
    </div>
  </div>

  <!-- Sidebar Menu -->
  <ul class="sidebar-menu" data-widget="tree">
    <li class="header">MENU PRINCIPAL</li>
    <!-- Optionally, you can add icons to the links -->
    <li class="{{ active('home') }}">
      <a href="{{ url('/home') }}">
        <i class="fa fa-dashboard"></i> <span>PANEL DE CONTROL</span>
      </a>
    </li>
    @can('ingresos.index')
      <li class="{{ active('ingresos') }}">
        <a href="{{ route('ingresos.index') }}">
          <i class="fa fa-sign-in"></i> <span>INGRESOS</span>
        </a>
      </li>
    @endcan
    
    @can('salidas.index')
      <li class="{{ active('salidas') }}">
        <a href="{{ route('salidas.index') }}">
          <i class="fa fa-sign-out"></i> <span>SALIDAS</span>
        </a>
      </li>
    @endcan
    
    @can('productos.index')
      <li class="{{ active('productos') }}">
        <a href="{{ route('productos.index') }}">
          <i class="fa fa-archive"></i> <span>PRODUCTOS</span>
        </a>
      </li>
    @endcan
    
    <li class="{{ active('reportes') }}">
      <a href="{{ route('reportes.index') }}">
        <i class="fa fa-file"></i> <span>REPORTES</span>
      </a>
    </li>
    @canatleast(['empresas.index', 'alamcenes.index', 'categorias.index', 'umedidas.index', 'funcionarios.index', 'proveedors.index', 'destinos.index', 'areas.index'])
    <li class="treeview {{ active('configuracion/*') }}">
      <a href="#"><i class="fa fa-cogs"></i> <span>CONFIGURACIÓN</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
      </a>
      <ul class="treeview-menu">
        @can('empresas.index')
        <li class="{{ active('configuracion/empresas') }}">
          <a href="{{ route('empresas.index') }}">
            <i class="fa fa-bank"></i> Perfil Empresa
          </a>
        </li>
        @endcan
		    @can('almacenes.index')
        <li class="{{ active('configuracion/almacenes') }}">
          <a href="{{ route('almacenes.index') }}">
            <i class="fa fa-btn fa-home"></i> Almacenes
          </a>
        </li>
        @endcan
        @can('categorias.index')
          <li class="{{ active('configuracion/categorias') }}">
            <a href="{{ route('categorias.index') }}">
              <i class="fa fa-btn fa-th"></i> Categorias
            </a>
          </li>
        @endcan
        
        @can('umedidas.index')
          <li class="{{ active('configuracion/umedidas') }}">
            <a href="{{ route('umedidas.index') }}">
              <i class="fa fa-btn fa-stack-overflow"></i> Unidades de Medida
            </a>
          </li>
        @endcan
        
        {{-- <li class="{{ active('configuracion/rubros') }}">
          <a href="{{ route('rubros.index') }}">
            <i class="fa fa-btn fa-sitemap"></i> Rubros
          </a>
        </li> --}}
        @can('funcionarios.index')
          <li class="{{ active('configuracion/funcionarios') }}">
            <a href="{{ route('funcionarios.index') }}">
              <i class="fa fa-user-md"></i> Funcionarios
            </a>
          </li>
        @endcan
        
        @can('proveedors.index')
          <li class="{{ active('configuracion/proveedors') }}">
            <a href="{{ route('proveedors.index') }}">
              <i class="fa fa-btn fa-truck"></i> Proveedores
            </a>
          </li>
        @endcan
        
        @can('destinos.index')
          <li class="{{ active('configuracion/destinos') }}">
            <a href="{{ route('destinos.index') }}">
              <i class="fa fa-btn fa-send"></i> Unidades Ejecutoras
            </a>
          </li>
        @endcan
        
        @can('areas.index')
          <li class="{{ active('configuracion/areas') }}">
            <a href="{{ route('areas.index') }}">
              <i class="fa fa-btn fa-tablet"></i> Áreas
            </a>
          </li>
        @endcan
      </ul>
    </li>
    @endcanatleast
    @canatleast(['users.index','roles.index'])
    <li class="treeview {{ active('administracion/*') }}">
      <a href="#"><i class="fa fa-lock"></i> <span>SEGURIDAD</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        @can('users.index')
        <li class="{{ active('administracion/users*') }}">
          <a href="{{ route('users.index') }}">
            <i class="fa fa-users"></i> Usuarios
          </a>
        </li>
        @endcan
        @can('roles.index')
        <li class="{{ active('administracion/roles*') }}">
          <a href="{{ route('roles.index') }}">
            <i class="fa fa-code-fork"></i> Roles
          </a>
        </li>
        @endcan
      </ul>
    </li>
    @endcanatleast
  </ul>
  <!-- /.sidebar-menu -->
</section>
<!-- /.sidebar -->