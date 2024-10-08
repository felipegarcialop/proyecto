@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Grado
@endsection

@section('content')
    <section class="content container-fluid" style="font-size: 16px;">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Editar') }} semestre</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('grados.update', $grado->id) }}" role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('grado.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
