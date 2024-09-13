@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} A Aula
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} A Aula</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('a-aulas.update', $aAula->id) }}" role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('a-aula.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
