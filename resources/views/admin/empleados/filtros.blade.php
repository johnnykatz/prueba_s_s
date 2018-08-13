
{!! Form::model(Request::all(),['route'=>'admin.empleados.index','method'=>'GET','class'=>'form-horizontal','id'=>'form_listado']) !!}

<div class="form-group">
    {!! Form::label('empresa_id', 'Empresa:',['class'=>'col-sm-2 control-label']) !!}
    <div class="col-sm-4">
        {!! Form::select('empresa_id',$empresas,(isset($filtro['empresa_id']))? $filtro['empresa_id']:'',['class'=>'form-control','placeholder'=>'Seleccione...']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('id', 'Id:',['class'=>'col-sm-2 control-label']) !!}
    <div class="col-sm-4">
        {!! Form::number('id',(isset($filtro['id']))? $filtro['id']:'',['class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group col-sm-3 pull-right">
    {!! Form::submit('Buscar', ['class' => 'btn btn-primary']) !!}
</div>
{!! Form::close() !!}