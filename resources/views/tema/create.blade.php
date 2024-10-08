@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Tema
@endsection

@section('content')
    <section class="content container-fluid font-size-16">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Agregar ') }} Tema</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('temas.store') }}" role="form" enctype="multipart/form-data">
                            @csrf

                            @include('tema.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

<style>
    .font-size-16 {
        font-size: 16px;
    }
</style>
