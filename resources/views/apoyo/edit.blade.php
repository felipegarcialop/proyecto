@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Apoyo
@endsection

@section('content')
    <section class="content container-fluid" style="font-size: 16px;">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header" style="font-size: 16px;">
                        <span class="card-title">{{ __('Editar institucion de ') }} apoyo</span>
                    </div>
                    <div class="card-body" style="font-size: 16px;">
                        <form method="POST" action="{{ route('apoyos.update', $apoyo->id) }}" role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('apoyo.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
