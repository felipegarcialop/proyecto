@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Tema
@endsection

@section('content')
    <section class="content container-fluid font-size-16">
        <div class="col-md-12">

            @includeif('partials.errors')

            <div class="card card-default">
                <div class="card-header">
                    <span class="card-title">{{ __('Editar') }} tema</span>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('temas.update', $tema->id) }}" role="form" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        @csrf

                        @include('tema.form')

                    </form>
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
