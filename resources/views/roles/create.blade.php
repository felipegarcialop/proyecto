@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Crear nuevo rol</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('roles.index') }}"> Regresar</a>
        </div>
    </div>
</div>

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Hubo algunos problemas con tu entrada.<br><br>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif

{!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nombre:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Nombre','class' => 'form-control')) !!}
        </div>
    </div>
    
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Permisos:</strong>
            <br/>
            <div class="row">
                <!-- Columna "Crear" -->
                <div class="col-md-3">
                    <h4>Permisos de Crear</h4>
                    @foreach($permission->filter(function($perm) { return str_contains($perm->name, 'crear') || str_contains($perm->name, 'create'); }) as $value)
                        <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                        {{ $value->name }}</label><br/>
                    @endforeach
                </div>

                <!-- Columna "Editar" -->
                <div class="col-md-3">
                    <h4>Permisos de Editar</h4>
                    @foreach($permission->filter(function($perm) { return str_contains($perm->name, 'editar') || str_contains($perm->name, 'edit'); }) as $value)
                        <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                        {{ $value->name }}</label><br/>
                    @endforeach
                </div>

                <!-- Columna "Ver" -->
                <div class="col-md-3">
                    <h4>Permisos de Visualizar</h4>
                    @foreach($permission->filter(function($perm) { return str_contains($perm->name, 'ver') || str_contains($perm->name, 'view') || str_contains($perm->name, 'list'); }) as $value)
                        <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                        {{ $value->name }}</label><br/>
                    @endforeach
                </div>

                <!-- Columna "Eliminar" -->
                <div class="col-md-3">
                    <h4>Permisos de Eliminar</h4>
                    @foreach($permission->filter(function($perm) { return str_contains($perm->name, 'eliminar') || str_contains($perm->name, 'delete'); }) as $value)
                        <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                        {{ $value->name }}</label><br/>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>
{!! Form::close() !!}
<p class="text-center text-primary"><small></small></p>
@endsection
