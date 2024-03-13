
<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
        data-accordion="false">
        <li class="nav-item">
            <a href="{{route('home')}}" class="nav-link {{printIfRequestIs('admin/dashboard','active')}}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
            </a>
        </li>
        @foreach(Module::getOrdered('asc') as $module)
        @if(View::exists(strtolower($module->getName()).'::sidebar.menu'))
        @include(strtolower($module->getName()).'::sidebar.menu')
        @endif
        @endforeach
    </ul>
</nav>
<!-- /.sidebar-menu -->
