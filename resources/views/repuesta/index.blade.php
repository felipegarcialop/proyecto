@extends('layouts.app')

@section('template_title')
    Repuesta
@endsection

@section('content')
    <style>
        .font-size-16 {
            font-size: 16px;
        }
    </style>

    <div class="container-fluid font-size-16">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('Repuestas') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('repuestas.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                                    <i class="fa fa-solid fa-plus"></i> {{ __('Add New') }}
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
                                        <th>Respuestas</th>
                                        <th>Valor</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($repuestas as $repuesta)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $repuesta->Respuestas }}</td>
                                            <td>{{ $repuesta->Valor }}</td>
                                            <td>
                                                <form action="{{ route('repuestas.destroy', $repuesta->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-success" href="{{ route('repuestas.edit', $repuesta->id) }}">
                                                        <i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}
                                                    </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}
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
                {!! $repuestas->links() !!}
            </div>
        </div>
    </div>
@endsection
