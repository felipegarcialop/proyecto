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
                            <span id="card_title" style="font-size: 16px;">
                                {{ __('Docente') }}
                            </span>
                        </div>
                    </div>

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success" style="font-size: 16px;">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <!-- Formulario de búsqueda -->
                        <form method="GET" action="{{ route('docentes.index') }}" class="mb-3">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Buscar docentes..." value="{{ request()->input('search') }}" style="font-size: 16px;">
                                <button class="btn btn-primary" type="submit" style="font-size: 16px;">Buscar</button>
                            </div>
                        </form>

                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th style="font-size: 16px;">No</th>
                                        <th style="font-size: 16px;">Usuario</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($docentes as $docente)
                                        <tr>
                                            <td style="font-size: 16px;">{{ ++$i }}</td>
                                            <td style="font-size: 16px;">{{ $docente->user->name }}</td>
                                            <td>
                                                <form action="{{ route('docentes.destroy', $docente->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" style="font-size: 16px;">
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
