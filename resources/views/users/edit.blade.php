@extends('layouts.app')

@section('content')
<style>
    /* Estilos personalizados para el formulario de edición */
    .form-title {
        font-size: 24px; /* Tamaño de letra para el título del formulario */
        font-weight: bold;
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group strong {
        display: block;
        margin-bottom: 5px;
        font-size: 16px; /* Tamaño de letra para las etiquetas del formulario */
    }

    .form-control {
        font-size: 14px; /* Tamaño de letra para los campos del formulario */
    }

    .btn-primary {
        font-size: 16px; /* Tamaño de letra para los botones */
    }
</style>

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2 class="form-title">Editar usuario</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('users.index') }}"> Regresar</a>
        </div>
    </div>
</div>

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Nombre:</strong>
                {!! Form::text('name', null, ['placeholder' => 'Nombre','class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Correo:</strong>
                {!! Form::text('email', null, ['placeholder' => 'Correo electrónico','class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Contraseña:</strong>
                {!! Form::password('password', ['placeholder' => 'Contraseña','class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Confirmar contraseña:</strong>
                {!! Form::password('confirm-password', ['placeholder' => 'Confirmar contraseña','class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Grado y Grupo:</strong>
                {!! Form::select('grado_id', $grados, null, ['placeholder' => 'Seleccione un Grado', 'class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Escuela:</strong>
                {!! Form::select('institucion_id', $instituciones, null, ['placeholder' => 'Seleccione una escuela', 'class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Rol:</strong>
                {!! Form::select('roles[]', $roles, $userRole, ['class' => 'form-control', 'multiple']) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </div>
{!! Form::close() !!}
@endsection
