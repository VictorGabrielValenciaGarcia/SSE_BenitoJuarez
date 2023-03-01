@extends('adminlte::page')

@section('title', 'Alumnos')

{{-- @section('plugins.Sweetalert2',true) --}}

@section('content_header')
<h1 class="font-weight-bold">Alumnos Registrados</h1>
@stop

@section('content')

<div class="container mt-2">

    <div class="row ">

        <div class="col-10">

            <div class="row ">

                <div class="col-12 mb-3">

                    <form action="{{ route('alumnos.index') }}" method="GET">
                        <div class="form-row">
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="texto" id="" placeholder="Nombre o Matricula del Alumno " value="{{ $texto }}">
                            </div>
                            <div class="col-auto">
                                <input class="btn btn-info" type="button" value="Buscar Alumno">
                            </div>
                        </div>
                    </form>

                </div>

                <div class="col-12">
                    <div class="table-responsive table-striped table-bordered table-hover">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Matricula</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Apellidos</th>
                                    <th scope="col">Grupo</th>
                                    <th scope="col">Promedio</th>
                                </tr>
                            </thead>
                            <tbody>

                                @if (count($alumnos)<=0)
                                    <tr>
                                        <td colspan="6">
                                            No hay Resultados
                                        </td>
                                    </tr>
                                @else
                                    @foreach ($alumnos as $alumno)
                                        <tr>
                                            <th scope="row">{{$alumno->matricula}}</th>
                                            <td>{{$alumno->nombre}}</td>
                                            <td>{{$alumno->apellidoP}} {{$alumno->apellidoM}}</td>
                                            <td>{{$alumno->grupo->nombre}}</td>
                                            <td>{{$alumno->promedio}}</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

        </div>

        <div class="col-2">

            <img src="{{asset('img/b1.jpg')}}" class="col-12" height="auto">

        </div>

    </div>


</div>

<div class="row mb-3 mt-2">
    <div class="offset-3 col-9 justify-content-center">
        <div class="d-flex justify-content-center">
            {!! $alumnos->links() !!}
        </div>
    </div>
</div>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
