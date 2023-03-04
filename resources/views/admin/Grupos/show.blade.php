@extends('adminlte::page')

@section('title', 'Grupos')

{{-- @section('plugins.Sweetalert2',true) --}}

@section('content_header')
    <h1 class="font-weight-bold">Detalles del Grupo</h1>
@stop

@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center align-items-center g-2 pt-3">

            <div class="col-6 p-3">

                <div class="card">
                    <div class="card-body">
                        <h2 class="font-weight-bold text-center">{{ $grupo -> nombre }}</h2>
                        <p class="card-text text-center">{{ $grupo -> grado }}</p>
                        <hr>
                        <p class="mt-3 text-center"><strong>Cantidad de Alumnos Esperada:</strong> {{ $grupo -> numAlumnos }}</p>

                    </div>
                </div>

            </div>

            <div class="col-6 p-3">

                <div class="card">
                    <div class="card-body">

                        <h5 class="text-center"><strong>Listado de Alumnos</strong></h5>
                        <hr>
                        @if (count($alumnos)<=0)
                            <ul class="list-group list-group-numbered">
                                <li class="list-group-item fs-3 text-center"><strong>No hay alumnos registrados en este grupo</strong></li>
                            </ul>
                        @else
                            <ul class="list-group list-group-numbered">
                                @foreach ($alumnos as $alumno)
                                <li class="list-group-item fs-3 "><strong>{{ $loop->index+1 }}.-</strong> {{ $alumno->nombre }} {{ $alumno->apellidoP }} {{ $alumno->apellidoM }}</li>
                                @endforeach
                            </ul>
                        @endif

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
