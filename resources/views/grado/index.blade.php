@extends('layouts.app')

@section('template_title')
    Grado
@endsection

@section('content')
    <style>
        .card-header, .card-body, .table th, .table td, .btn {
            font-size: 16px;
        }
        .alert-success {
            font-size: 16px;
        }
    </style>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('Semestres') }}
                            </span>
                            <div class="float-right">
                                <a href="{{ route('grados.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                                    <i class="fa fa-regular fa-plus"></i>
                                    {{ __('') }}
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
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>Descripcion</th>
                                        <th>Grupo</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($grados as $grado)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $grado->descripcion }}</td>
                                            <td>{{ $grado->grupo->descripcion }}</td>
                                            <td>
                                                <form action="{{ route('grados.destroy',$grado->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-success" href="{{ route('grados.edit',$grado->id) }}">
                                                        <i class="fa fa-fw fa-edit"></i> {{ __('') }}
                                                    </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-fw fa-trash"></i> {{ __('') }}
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
                {!! $grados->links() !!}
            </div>
        </div>
    </div>
@endsection
