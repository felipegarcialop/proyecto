@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Cuestionario
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header custom-card-header">
                        <span class="card-title">{{ __('Editar un') }} cuestionario</span>
                    </div>
                    <div class="card-body custom-card-body">
                        <form method="POST" action="{{ route('cuestionarios.update', $cuestionario->id) }}" role="form" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            @include('cuestionario.form')

                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary custom-btn">
                                    <i class="fa fa-save"></i> {{ __('Guardar') }}
                                </button>
                            </div>
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
