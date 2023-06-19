@extends('layouts.app')

@section('template_title')
    {{ $recuso->name ?? "{{ __('Show') Recuso" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Recuso</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('recusos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $recuso->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Objetivo:</strong>
                            {{ $recuso->objetivo }}
                        </div>
                        <div class="form-group">
                            <strong>Descipcion:</strong>
                            {{ $recuso->descipcion }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
