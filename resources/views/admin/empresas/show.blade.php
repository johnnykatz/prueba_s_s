@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Empresa
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('admin.empresas.show_fields')
                    <a href="{!! route('admin.empresas.index') !!}" class="btn btn-default">Volver</a>
                </div>
            </div>
        </div>
    </div>
@endsection
