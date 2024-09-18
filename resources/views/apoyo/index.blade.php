@extends('layouts.app')

@section('template_title')
    Apoyo
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            
                            <h5 style="font-size: 16px;"><span id="card_title">
                                {{ __('Instituciones de apoyo') }}
                            </span></h5>

                             <div class="float-right">
                                <a href="{{ route('apoyos.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                                <i class="fa fa-regular fa-plus"></i>{{ __('') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p style="font-size: 16px;">{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th style="font-size: 16px;">No</th>
                                        <th style="font-size: 16px;">Nombre</th>
                                        <th style="font-size: 16px;">Descripcion</th>
                                        <th style="font-size: 16px;">Direccion</th>
                                        <th style="font-size: 16px;">Telefono</th>
                                        <th style="font-size: 16px;">Correo</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($apoyos as $apoyo)
                                        <tr>
                                            <td style="font-size: 16px;">{{ ++$i }}</td>
                                            <td style="font-size: 16px;">{{ $apoyo->nombre }}</td>
                                            <td style="font-size: 16px;">{{ $apoyo->descripcion }}</td>
                                            <td style="font-size: 16px;">{{ $apoyo->direccion }}</td>
                                            <td style="font-size: 16px;">{{ $apoyo->telefono }}</td>
                                            <td style="font-size: 16px;">{{ $apoyo->correo }}</td>
                                            <td>
                                                <form action="{{ route('apoyos.destroy',$apoyo->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-success" href="{{ route('apoyos.edit',$apoyo->id) }}" style="font-size: 16px;"><i class="fa fa-fw fa-edit"></i> {{ __('') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" style="font-size: 16px;"><i class="fa fa-thin fa-trash"></i> {{ __('') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $apoyos->links() !!}
            </div>
        </div>
    </div>
@endsection
