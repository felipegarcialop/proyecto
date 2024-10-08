@extends('layouts.app')

@section('template_title')
    Tema
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title" class="font-size-16">
                                {{ __('Tema') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('temas.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                                    <i class="fa fa-solid fa-plus"></i> {{ __('') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success font-size-16">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover font-size-16">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>Nombre</th>
                                        <th>Descripcion</th>
                                        <th>Fecha</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($temas as $tema)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $tema->Nombre }}</td>
                                            <td>{{ $tema->descripcion }}</td>
                                            <td>{{ $tema->fecha }}</td>
                                            <td>
                                                <form action="{{ route('temas.destroy',$tema->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-success font-size-16" href="{{ route('temas.edit',$tema->id) }}">
                                                        <i class="fa fa-fw fa-edit"></i> {{ __('') }}
                                                    </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm font-size-16">
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
                {!! $temas->links() !!}
            </div>
        </div>
    </div>
@endsection

<style>
    .font-size-16 {
        font-size: 16px;
    }
</style>
