<!-- Empresa Field -->
<div class="form-group col-sm-6">
    {!! Form::label('empresa_id', 'Empresa:') !!}
    {!! Form::select('empresa_id',$empresas ,null, ['class' => 'form-control']) !!}
</div>

<!-- Tipo Empleado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo_empleado_id', 'Tipo empleado:') !!}
    {!! Form::select('tipo_empleado_id',$tiposEmpleados ,null, ['class' => 'form-control','onchange'=>'selectTipoEmpleado()','placeholder'=>'Seleccione..']) !!}
</div>

<div id="programador" class="{!! isset($empleado->programador)?null:'hidden' !!}">
    <!-- Lenguaje Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('lenguaje', 'Lenguaje:') !!}
        {!! Form::select('lenguaje',$lenguajes ,isset($empleado->programador)?$empleado->programador->lenguaje:null, ['class' => 'form-control']) !!}
    </div>
</div>

<div id="diseniador" class="{!! isset($empleado->diseniador)?null:'hidden' !!}">
    <!-- Lenguaje Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('tipo', 'Tipo diseñador:') !!}
        {!! Form::select('tipo',$tiposDiseniadores ,isset($empleado->diseniador)?$empleado->diseniador->tipo:null, ['class' => 'form-control']) !!}
    </div>
</div>
<!-- Apellido Field -->
<div class="form-group col-sm-6">
    {!! Form::label('apellido', 'Apellido:') !!}
    {!! Form::text('apellido', null, ['class' => 'form-control','required']) !!}
</div>

<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control','required']) !!}
</div>

<!-- Edad Field -->
<div class="form-group col-sm-6">
    {!! Form::label('edad', 'Edad:') !!}
    {!! Form::number('edad', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.empleados.index') !!}" class="btn btn-default">Cancelar</a>
</div>
