@extends('layouts.app')

@section('content')
<style>
    .font-size-16 {
        font-size: 16px;
    }
</style>

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2 class="font-size-16">Editar Rol</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary font-size-16" href="{{ route('roles.index') }}"> Regresar</a>
        </div>
    </div>
</div>

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong class="font-size-16">Whoops!</strong> <span class="font-size-16">There were some problems with your input.</span><br><br>
        <ul class="font-size-16">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif

{!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong class="font-size-16">Name:</strong>
            {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control font-size-16']) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong class="font-size-16">Permission:</strong>
            <br/>
            @foreach($permission as $value)
                <label class="font-size-16">{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, ['class' => 'name']) }}
                {{ $value->name }}</label>
            <br/>
            @endforeach
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary font-size-16">Guardar</button>
    </div>
</div>
{!! Form::close() !!}
@endsection
