@extends('layouts.app')

@section('template_title')
    {{ $cuestionario->name ?? "{{ __('Show') Cuestionario" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title" style="font-size: 16px;">{{ __('Show') }} Cuestionario</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('cuestionarios.index') }}" style="font-size: 16px;">{{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong style="font-size: 16px;">Pregunta Id:</strong>
                            <span style="font-size: 16px;">{{ $cuestionario->pregunta_id }}</span>
                        </div>
                        <div class="form-group">
                            <strong style="font-size: 16px;">Repuesta Id:</strong>
                            <span style="font-size: 16px;">{{ $cuestionario->repuesta_id }}</span>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
