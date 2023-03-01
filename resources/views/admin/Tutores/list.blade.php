@extends('adminlte::page')

@section('title', 'Tutores')

{{-- @section('plugins.Sweetalert2',true) --}}

@section('content_header')
<h1 class="font-weight-bold">Tutores Registrados</h1>
@stop

@section('content')

<style>
    .marginName{
        margin-top: -0.7rem;
        font-size: 1.45rem;
        font-weight: 700
    }

    .sizeProfile{
        height: 80%;
        width: 80%;
        margin-left: 10%
    }
</style>

<div class="container">
    <div class="row justify-content-center align-items-center g-2">
        <div class="col-12 mb-3">

            <form action="{{ route('tutores.list') }}" method="GET">
                <div class="form-row">
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="texto" id="" placeholder="Nombre o Apellidos del Tutor" value="{{ $texto }}">
                    </div>
                    <div class="col-auto">
                        <input class="btn btn-info" type="button" value="Buscar Tutor">
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

<div class="container mt-2">
    <div class="row justify-content-center align-items-center g-2">

        @if (count($tutores)<=0)

        <div class="container p-4">
            <div class="row justify-content-center align-items-center g-2">
                <div class="col-8">
                    <div class="card">
                        <div class="card-body text-center p-4">
                            <h1 class="fs-1">No hay Resultados</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @else
            @foreach ($tutores as $tutor)
            <div class="col-3">

                <div class="card">
                    @if ($tutor->sexo == 'H')
                        <img src="{{ asset('img/boy.jpg') }}" class="img-fluid rounded" alt="">
                    @elseif ($tutor->sexo == 'M')
                        <img src="{{ asset('img/girl.jpg') }}" class="img-fluid rounded" alt="">
                    @elseif ($tutor->sexo == 'NB')
                        <img src="{{ asset('img/NO.png') }}" class="img-fluid rounded" alt="">
                    @endif
                    <div class="card-body">
                        <p class="text-center marginName">{{$tutor->nombre}} {{$tutor->apellidoP}} {{$tutor->apellidoM}}</p>
                        <hr>
                        <p class="card-text text-center" style="font-size: 0.9em">{{$tutor->telefono}} | {{$tutor->telefonoCasa}}</p>

                    </div>
                </div>

            </div>
            @endforeach
        @endif



    </div>


    <div class="row mb-3 mt-2">
        <div class="offset-3 col-9 justify-content-center">
            <div class="d-flex justify-content-center">
                {!! $tutores->links() !!}
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
