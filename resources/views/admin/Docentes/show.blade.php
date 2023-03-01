@extends('adminlte::page')

@section('title', 'Docentes')

{{-- @section('plugins.Sweetalert2',true) --}}

@section('content_header')
    <h1 class="font-weight-bold">Detalles del Docente</h1>
@stop

@section('content')

    <div class="container ">
        <div class="row justify-content-center align-items-center g-2 pt-3">
            <div class="col-4 text-center">
                @if ($docente->sexo == 'H')
                        <img src="{{ asset('img/boy.jpg') }}" class="img-fluid rounded" alt="">
                @elseif ($docente->sexo == 'M')
                        <img src="{{ asset('img/girl.jpg') }}" class="img-fluid rounded" alt="">
                @elseif ($docente->sexo == 'NB')
                        <img src="{{ asset('img/NO.png') }}" class="img-fluid rounded" alt="">
                @endif

                <a class="btn btn-primary mt-3 col-6" href="{{ url()->previous() }}" role="button">Volver a la lista</a>
            </div>


            <div class="col-8 p-3">

                <div class="card">
                    <div class="card-body p-4">
                        <h2 class="font-weight-bold text-center">{{ $docente->apellidoP }} {{ $docente->apellidoM }} {{ $docente->nombre }}</h2>
                        <h4 class="card-text text-center">{{ $docente->RFC }}</h4>
                        <hr>

                        <div class="row justify-content-center align-items-center g-2">
                            <div class="col-6">
                                <h4 class="mt-3 text-center"><strong>Datos del docente</strong></h4>

                                <ul class="list-group list-group-numbered">


                                    <li class="list-group-item fs-3"><strong>Direccion: </strong>{{ $docente->direccion }}</li>
                                    <li class="list-group-item fs-3"><strong>Telefono: </strong>{{ $docente->telefono }}</li>
                                    <li class="list-group-item fs-3"><strong>Correo: </strong>{{ $docente->correo }}</li>
                                    <li class="list-group-item fs-3"><strong>Genero: </strong>
                                        @if ($docente->sexo == 'H')
                                        Hombre
                                        @elseif ($docente->sexo == 'M')
                                        Mujer
                                        @elseif ($docente->sexo == 'NB')
                                        No Binario
                                        @endif
                                    </li>
                                </ul>

                            </div>
                            <div class="col-6">
                                <h4 class="mt-3 text-center"><strong>Datos Profesionales</strong></h4>
                                <ul class="list-group list-group-numbered">

                                    <li class="list-group-item fs-3"><strong>Area de Formacion: </strong>{{ $docente->areaFormacion }}</li>
                                    <li class="list-group-item fs-3"><strong>Fecha de Ingreso: </strong>{{ $docente->fechaIngreso }}</li>
                                    <li class="list-group-item fs-3"><strong>Fecha de Baja: </strong>{{ $docente->fechaBaja }}</li>

                                    <li class="list-group-item fs-3"><strong>Materia Encargada: </strong>{{ $materia->nombre }}</li>
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
