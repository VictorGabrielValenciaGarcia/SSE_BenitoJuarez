@extends('adminlte::page')

@section('title', 'Tutorados')

{{-- @section('plugins.Sweetalert2',true) --}}

@section('content_header')
<h1 class="font-weight-bold">Asigancioens de Tutorados</h1>
@stop

@section('content')

<div class="container mt-5">

    <div class="row justify-content-center align-items-center g-2">

        <div class="col-11">

            <div class="row ">

                {{-- <div class="col-12 mb-3">

                    <form action="{{ route('docentes.list') }}" method="GET">
                        <div class="form-row">
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="texto" id="" placeholder="Nombre o RFC del Docente " value="{{ $texto }}">
                            </div>
                            <div class="col-auto">
                                <input class="btn btn-info" type="button" value="Buscar Docente">
                            </div>
                        </div>
                    </form>

                </div> --}}

                <div class="col-12">
                    <div class="table-responsive table-striped table-bordered table-hover">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Tutor</th>
                                    <th scope="col">Alumno</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>

                                @if (count($asignaciones)<=0)
                                    <tr>
                                        <td colspan="4">
                                            No hay Resultados
                                        </td>
                                    </tr>
                                @else
                                    @foreach ($asignaciones as $asignacion)
                                        <tr>
                                            <th scope="row">{{$asignacion->id}}</th>
                                            <td>{{$asignacion->tutor->nombre}} {{$asignacion->tutor->apellidoP}} {{$asignacion->tutor->apellidoM}}</td>
                                            <td>{{$asignacion->alumno->nombre}} {{$asignacion->alumno->apellidoP}} {{$asignacion->alumno->apellidoM}}</td>

                                            <td class="text-center">

                                                <div class="row justify-content-center align-items-center g-2">

                                                    <div class="col-5">
                                                        <a class=" cursor-active btn btn-success btn-md col-12" href="{{route('tutores.reassing', $asignacion->id)}}">
                                                            <i class="fas fa-pen"></i>
                                                        </a>
                                                    </div>

                                                    <div class="col-5">

                                                        <form action="{{route('tutores.destroyAssig', $asignacion->id)}}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger col-12" role="button" type="submit">
                                                            <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>


                                                    </div>

                                                </div>

                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

        </div>

    </div>


</div>

<div class="row mb-3 mt-2">
    <div class="offset-3 col-9 justify-content-center">
        <div class="d-flex justify-content-center">
            {!! $asignaciones->links() !!}
        </div>
    </div>
</div>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
