@extends('layouts.app')

@section('template_title')
    {{ $apoyo->name ?? "{{ __('Show') Apoyo" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Ver la Institucion de') }} Apoyo</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('apoyos.index') }}"> {{ __('Regresar') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $apoyo->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $apoyo->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Direccion:</strong>
                            {{ $apoyo->direccion }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono:</strong>
                            {{ $apoyo->telefono }}
                        </div>
                        <div class="form-group">
                            <strong>Correo:</strong>
                            {{ $apoyo->correo }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
