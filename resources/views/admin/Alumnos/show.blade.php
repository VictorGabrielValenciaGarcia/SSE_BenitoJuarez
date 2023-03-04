@extends('adminlte::page')

@section('title', 'Administradores')

{{-- @section('plugins.Sweetalert2',true) --}}

@section('content_header')
    <h1 class="font-weight-bold">Detalles del Grupo</h1>
@stop

@section('content')

    <style>
        .listAlum{
            font-size: 0.95rem;
        }
    </style>

    <div class="container ">
        <div class="row justify-content-center align-items-center g-2 pt-3">
            <div class="col-4 text-center">
                @if ($alumno->sexo == 'H')
                        <img src="{{ asset('img/boy.jpg') }}" class="img-fluid rounded" alt="">
                @elseif ($alumno->sexo == 'M')
                        <img src="{{ asset('img/girl.jpg') }}" class="img-fluid rounded" alt="">
                @elseif ($alumno->sexo == 'NB')
                        <img src="{{ asset('img/NO.png') }}" class="img-fluid rounded" alt="">
                @endif

                <a class="btn btn-primary mt-3 col-6" href="{{ url()->previous() }}" role="button">Volver a la lista</a>
            </div>


            <div class="col-8 p-3">

                <div class="card">
                    <div class="card-body p-4">
                        <h2 class="font-weight-bold text-center">{{ $alumno->apellidoP }} {{ $alumno->apellidoM }} {{ $alumno->nombre }}</h2>
                        <h5 class="card-text text-center">{{ $alumno->matricula }}</h5>
                        <hr>

                        <div class="row justify-content-center align-items-center g-2">
                            <div class="col-6">
                                <h4 class="mt-3 text-center"><strong>Datos del alumno</strong></h4>

                                <ul class="list-group list-group-numbered mt-3">
                                    <li class="list-group-item listAlum"><strong>CURP: </strong>{{ $alumno->CURP }}</li>
                                    <li class="list-group-item listAlum"><strong>Direccion: </strong>{{ $alumno->direccion }}</li>
                                    <li class="list-group-item listAlum"><strong>Discapacidades: </strong>{{ $alumno->discapacidades }}</li>
                                    <li class="list-group-item listAlum"><strong>Genero: </strong>
                                        @if ($alumno->sexo == 'H')
                                        Hombre
                                        @elseif ($alumno->sexo == 'M')
                                        Mujer
                                        @elseif ($alumno->sexo == 'NB')
                                        No Binario
                                        @endif
                                    </li>
                                    <li class="list-group-item listAlum"><strong>Edad: </strong>{{ $alumno->edad }} años</li>
                                </ul>

                            </div>
                            <div class="col-6">
                                <h4 class="mt-3 text-center"><strong>Datos Escolares</strong></h4>
                                <ul class="list-group list-group-numbered mt-3">
                                    <li class="list-group-item listAlum"><strong>Grupo: </strong>{{ $grupo->nombre }}</li>
                                    <li class="list-group-item listAlum"><strong>Fecha de Ingreso: </strong>{{ $alumno->fechaRegistro }}</li>
                                    <li class="list-group-item listAlum"><strong>Fecha de Egreso: </strong>{{ $alumno->fechaEgreso }}</li>
                                    <li class="list-group-item listAlum"><strong>Correo: </strong>{{ $alumno->correo }}</li>
                                    <li class="list-group-item listAlum"><strong>Promedio: </strong>{{ $alumno->promedio }}</li>
                                </ul>

                            </div>
                            </div>

                            <div class="mt-3">
                                <h4 class="mt-3 text-center"><strong>Tutores</strong></h4>
                                <ul class="list-group list-group-numbered">
                                    @foreach ($alumno->tutores as $key =>$tutor)
                                    <li class="list-group-item fs-3"><strong>{{ $key + 1 }}.-</strong> <a href="{{route('tutores.show', $tutor->id)}}">{{ $tutor->nombre }} {{ $tutor->apellidoP }} {{ $tutor->apellidoM }}</a></li>

                                    @endforeach
                                </ul>

                            </div>



                        </div>

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
