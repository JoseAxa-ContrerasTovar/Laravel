@extends('layout')

@section('title', 'Proyectos | Editar')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-10 col-lg-6 mx-auto">

                @include('partials.validation-errors')

                <form class="bg-white py-3 px-4 shadow rounded" enctype="multipart/form-data" method="POST"
                    action="{{ route('projects.update', $project) }}">
                    @method('PATCH')
                    <h1 class="display-5">Editar proyecto</h1>
                    <hr>
                    @include('projects.form', ['btnText' => 'Actualizar'])
                    <div class="d-grid gap-2">
                        <a class="btn btn-link" href="{{ route('projects.index') }}">
                            Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
