@hasrole('Super Admin')
<li class="nav-item has-treeview {!! printIfRequestIs('admin/configuracion*', 'menu-open') !!}">
    <a href="#" class="nav-link {!! printIfRequestIs('admin/configuracion*', 'active') !!}">
        <i class="nav-icon fas fa-cog"></i>
        <p>
            Configuración
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{route('admin.dropdowns.index')}}" class="nav-link {!! printIfRequestIn(['admin/configuracion/dropdowns*'], 'active') !!}">
                <i class="far fa-circle nav-icon"></i>
                <p>Dropdowns</p>
            </a>
        </li>
        {{-- <li class="nav-item">
            <a href="{{route('admin.dropdowns.index')}}" class="nav-link {!! printIfRequestIs('configuarion/ubicaciones*', 'active') !!}">
                <i class="far fa-circle nav-icon"></i>
                <p>Ubicaciones</p>
            </a>
        </li> --}}
    </ul>
</li>
@endhasrole
