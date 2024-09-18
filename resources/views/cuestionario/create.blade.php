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
                    <div class="card-header" style="font-size: 16px;">
                        <span class="card-title">{{ __('Crear un nuevo') }} cuestionario</span>
                    </div>
                    <div class="card-body" style="font-size: 16px;">
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
