@extends('adminlte::page')

@section('title', 'Administradores')

{{-- @section('plugins.Sweetalert2',true) --}}

@section('content_header')
    <h1 class="font-weight-bold">Perfil de {{ $tutor->nombre }}</h1>
@stop

@section('content')

<div class="container ">
    <div class="row justify-content-center align-items-center g-2 pt-3">
        <div class="col-4 text-center">
            @if ($tutor->sexo == 'H')
                    <img src="{{ asset('img/boy.jpg') }}" class="img-fluid rounded" alt="">
            @elseif ($tutor->sexo == 'M')
                    <img src="{{ asset('img/girl.jpg') }}" class="img-fluid rounded" alt="">
            @elseif ($tutor->sexo == 'NB')
                    <img src="{{ asset('img/NO.png') }}" class="img-fluid rounded" alt="">
            @endif

            <a class="btn btn-primary mt-3 col-6" href="{{ url()->previous() }}" role="button">Volver a la lista</a>
        </div>


        <div class="col-8 p-3">

            <div class="card">
                <div class="card-body p-4">
                    <h2 class="font-weight-bold text-center">{{ $tutor->apellidoP }} {{ $tutor->apellidoM }} {{ $tutor->nombre }}</h2>
                    <hr>

                    <div class="row justify-content-center align-items-center g-2">
                        <div class="col-6">
                            <h4 class="mt-3 text-center"><strong>Datos del Tutor</strong></h4>

                            <ul class="list-group list-group-numbered">


                                <li class="list-group-item fs-3"><strong>Direccion: </strong>{{ $tutor->direccion }}</li>
                                <li class="list-group-item fs-3"><strong>Telefono: </strong>{{ $tutor->telefono }}</li>
                                <li class="list-group-item fs-3"><strong>Telfono de Casa: </strong>{{ $tutor->telefonoCasa }}</li>
                                <li class="list-group-item fs-3"><strong>Genero: </strong>
                                    @if ($tutor->sexo == 'H')
                                    Hombre
                                    @elseif ($tutor->sexo == 'M')
                                    Mujer
                                    @elseif ($tutor->sexo == 'NB')
                                    No Binario
                                    @endif
                                </li>
                            </ul>

                        </div>
                        <div class="col-6">
                            <h4 class="mt-3 text-center"><strong>Tutorados</strong></h4>
                            <ul class="list-group list-group-numbered">
                                @foreach ($tutor->alumnos as $key =>$alumno)
                                <li class="list-group-item fs-3"><strong>{{ $key + 1 }}.-</strong> {{ $alumno->nombre }} {{ $alumno->apellidoP }} {{ $alumno->apellidoM }}</li>

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
