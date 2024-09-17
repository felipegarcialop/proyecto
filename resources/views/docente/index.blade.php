@extends('layouts.app')

@section('template_title')
    Docente
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('Docente') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('docentes.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                                    {{ __('Crear Docente') }}
                                </a>
                            </div>
                        </div>
                    </div>

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <!-- Formulario de búsqueda -->
                        <form method="GET" action="{{ route('docentes.index') }}" class="mb-3">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Buscar docentes..." value="{{ request()->input('search') }}">
                                <button class="btn btn-primary" type="submit">Buscar</button>
                            </div>
                        </form>

                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>Usuario</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($docentes as $docente)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $docente->user->name }}</td>
                                            <td>
                                                <form action="{{ route('docentes.destroy', $docente->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary" href="{{ route('docentes.show', $docente->id) }}">
                                                        <i class="fa fa-fw fa-eye"></i> 
                                                    </a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('docentes.edit', $docente->id) }}">
                                                        <i class="fa fa-fw fa-edit"></i>
                                                    </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-fw fa-trash"></i> 
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $docentes->links() !!}
            </div>
        </div>
    </div>
@endsection
