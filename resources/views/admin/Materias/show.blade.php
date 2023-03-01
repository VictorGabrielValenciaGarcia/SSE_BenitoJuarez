@extends('adminlte::page')

@section('title', 'Grupos')

{{-- @section('plugins.Sweetalert2',true) --}}

@section('content_header')
    <h1 class="font-weight-bold">Detalles del Grupo</h1>
@stop

@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center align-items-center g-2 pt-3">

            {{-- <div class="col-6 text-center">
                <img src="https://picsum.photos/400/400" class="img-fluid rounded" alt="">
            </div> --}}

            <div class="col-6 p-3">

                <div class="card">
                    <div class="card-body">
                        <h2 class="font-weight-bold text-center">{{ $grupo -> nombre }}</h2>
                        <p class="card-text text-center">{{ $grupo -> grado }}</p>
                        <hr>
                        <h5 class="mt-3 text-center"><strong>Cantidad de Alumnos:</strong> {{ $grupo -> numAlumnos }}</h5>
                    </div>
                </div>

            </div>

        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
