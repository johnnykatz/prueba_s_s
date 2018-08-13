<table class="table table-responsive" id="empleados-table">
    <caption>Listado de empleados, edad promedio de los empleados visualizados: {!! $promedio !!}</caption>
    <thead>
    <tr>
        <th>Id</th>
        <th>Empresa</th>
        <th>Tipo Empleado</th>
        <th>Herramienta que maneja</th>
        <th>Apellido</th>
        <th>Nombre</th>
        <th>Edad</th>
        <th colspan="3">Acciones</th>
    </tr>
    </thead>
    <tbody>
    @foreach($empleados as $empleado)
        <tr>
            <td>{!! $empleado->id !!}</td>
            <td>{!! $empleado->empresa->nombre !!}</td>
            <td>{!! $empleado->tipoEmpleado->nombre !!}</td>
            <td>{!! isset($empleado->programador)?$empleado->programador->lenguaje:$empleado->diseniador->tipo !!}</td>
            <td>{!! $empleado->apellido !!}</td>
            <td>{!! $empleado->nombre !!}</td>
            <td>{!! $empleado->edad !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.empleados.destroy', $empleado->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.empleados.show', [$empleado->id]) !!}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.empleados.edit', [$empleado->id]) !!}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Desea eliminar el registro?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>