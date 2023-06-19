@extends('layouts.app')

@section('template_title')
    {{ $ponderacione->name ?? "{{ __('Show') Ponderacione" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Ponderacione</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('ponderaciones.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Ponderacion:</strong>
                            {{ $ponderacione->ponderacion }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
