<li class="{{ Request::is('empresas*') ? 'active' : '' }}">
    <a href="{!! route('admin.empresas.index') !!}"><i class="fa fa-edit"></i><span>Empresas</span></a>
</li>

<li class="{{ Request::is('empleados*') ? 'active' : '' }}">
    <a href="{!! route('admin.empleados.index') !!}"><i class="fa fa-edit"></i><span>Empleados</span></a>
</li>

