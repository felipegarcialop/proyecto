@extends('layouts.app')

@section('content')
<style>
    .font-size-16 {
        font-size: 16px;
    }
    .font-size-32 {
        font-size: 26px;
    }
</style>

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2 class="font-size-32">Gestion de Roles</h2>
        </div>
        <div class="pull-right">
        @can('role-create')
            <a class="btn btn-success font-size-16" href="{{ route('roles.create') }}"> Crear nuevo rol</a>
            @endcan
        </div>
    </div>
</div>
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p class="font-size-16">{{ $message }}</p>
    </div>
@endif
<table class="table table-bordered">
    <thead>
        <tr>
            <th class="font-size-16">No.</th>
            <th class="font-size-16">Nombre</th>
            <th class="font-size-16" width="280px">Accion</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($roles as $key => $role)
        <tr>
            <td class="font-size-16">{{ ++$i }}</td>
            <td class="font-size-16">{{ $role->name }}</td>
            <td class="font-size-16">
                <a class="btn btn-info font-size-16" href="{{ route('roles.show',$role->id) }}">Ver</a>
                @can('role-edit')
                    <a class="btn btn-primary font-size-16" href="{{ route('roles.edit',$role->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                @endcan
                @can('role-delete')
                {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id], 'style' => 'display:inline']) !!}
                    <button type="submit" class="btn btn-danger font-size-16">
                        <i class="fas fa-trash"></i>
                    </button>
                {!! Form::close() !!}
                @endcan
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{!! $roles->render() !!}
@endsection
