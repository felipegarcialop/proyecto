@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Cuestionario
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header custom-card-header">
                        <span class="card-title">{{ __('Crear un nuevo') }} cuestionario</span>
                    </div>
                    <div class="card-body custom-card-body">
                        <form method="POST" action="{{ route('cuestionarios.store') }}" role="form" enctype="multipart/form-data">
                            @csrf

                            @include('cuestionario.form')

                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('styles')
    <style>
        .custom-card-header {
            font-size: 16px;
        }
        .custom-card-body {
            font-size: 16px;
        }
        .custom-btn {
            font-size: 16px;
        }
    </style>
@endsection
