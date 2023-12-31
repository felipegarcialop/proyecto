@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Gestion de Roles</h2>
        </div>
        <div class="pull-right">
        @can('role-create')
            <a class="btn btn-success" href="{{ route('roles.create') }}"> Crear nuevo rol</a>
            @endcan
        </div>
    </div>
</div>
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
<table class="table table-bordered">
    <tr>
        <th>No.</th>
        <th>Nombre</th>
        <th width="280px">Accion</th>
    </tr>
    
    @foreach ($roles as $key => $role)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $role->name }}</td>
        <td>
            <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Ver</a>
            @can('role-edit')
                <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}"><i class="fa fa-fw fa-edit"></i></a>
            @endcan
            @can('role-delete')
            {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id], 'style' => 'display:inline']) !!}
                <button type="submit" class="btn btn-danger">
                    <i class="fas fa-trash"></i>
                </button>
            {!! Form::close() !!}

            @endcan
        </td>
    </tr>
    @endforeach
</table>
{!! $roles->render() !!}
@endsection