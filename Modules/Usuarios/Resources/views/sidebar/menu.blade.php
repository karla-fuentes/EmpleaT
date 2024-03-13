@hasrole('Super Admin')
<li class="nav-item has-treeview {!! printIfRequestIs('admin/usuarios*', 'menu-open') !!}">
    <a href="#" class="nav-link {!! printIfRequestIs('admin/usuarios*', 'active') !!}">
        <i class="nav-icon fas fa-users"></i>
        <p>
            Sistema de Usuarios
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{route('dashboard.usuarios.index')}}" class="nav-link {!! printIfRequestIn(['admin/usuarios/usuarios*'], 'active') !!}">
                <i class="far fa-circle nav-icon"></i>
                <p>Usuarios</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('dashboard.roles.index')}}" class="nav-link {!! printIfRequestIs('admin/usuarios/roles*', 'active') !!}">
                <i class="far fa-circle nav-icon"></i>
                <p>Roles</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('dashboard.permisos.index')}}" class="nav-link {!! printIfRequestIs('admin/usuarios/permisos*', 'active') !!}">
                <i class="far fa-circle nav-icon"></i>
                <p>Permisos</p>
            </a>
        </li>
    </ul>
</li>
@else
<li class="nav-item">
    <a href="{{route('dashboard.usuarios.index')}}" class="nav-link {{printIfRequestIs('usuarios*','active')}}">
        <i class="nav-icon far fa-image"></i>
        <p>
            Usuarios
        </p>
    </a>
</li>
@endhasrole
