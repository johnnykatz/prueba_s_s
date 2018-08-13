<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $empleado->id !!}</p>
</div>

<!-- empresa Field -->
<div class="form-group">
    {!! Form::label('empresa', 'Empresa:') !!}
    <p>{!! $empleado->empresa->nombre !!}</p>
</div>

<!-- empresa Field -->
<div class="form-group">
    {!! Form::label('tipo', 'Tipo Empleado:') !!}
    <p>{!! $empleado->tipoEmpleado->nombre !!}</p>
</div>

@if($empleado->tipo_empleado_id==1)
    <!-- empresa Field -->
    <div class="form-group">
        {!! Form::label('lenguaje', 'Lenguaje:') !!}
        <p>{!! $empleado->programador->lenguaje !!}</p>
    </div>
@else
    <!-- diseniador Field -->
    <div class="form-group">
        {!! Form::label('diseniador', 'Tipo Diseñador:') !!}
        <p>{!! $empleado->diseniador->tipo !!}</p>
    </div>
@endif

<!-- Apellido Field -->
<div class="form-group">
    {!! Form::label('apellido', 'Apellido:') !!}
    <p>{!! $empleado->apellido !!}</p>
</div>

<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{!! $empleado->nombre !!}</p>
</div>

<!-- Edad Field -->
<div class="form-group">
    {!! Form::label('edad', 'Edad:') !!}
    <p>{!! $empleado->edad !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $empleado->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $empleado->updated_at !!}</p>
</div>

