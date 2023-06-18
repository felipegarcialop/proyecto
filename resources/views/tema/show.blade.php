@extends('layouts.app')

@section('template_title')
    {{ $tema->name ?? "{{ __('Show') Tema" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Tema</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('temas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $tema->Nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $tema->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $tema->Fecha }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
