@extends('adminlte::page')

@section('title', 'Grupos')

{{-- @section('plugins.Sweetalert2',true) --}}

@section('content_header')
<h1 class="font-weight-bold">Grupos Escolares</h1>
@stop

@section('content')

<div class="container mt-2">

    <div class="row">

        <div class="col-9">

            <div class="row">

                <div class="col-12 mb-3">

                    <form action="{{ route('grupos.index') }}" method="GET">
                        <div class="form-row">
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="texto" id="" placeholder="Nombre o Grado del Grupo " value="{{ $texto }}">
                            </div>
                            <div class="col-auto">
                                <input class="btn btn-info" type="button" value="Buscar Grupo">
                            </div>
                        </div>
                    </form>

                </div>

                <div class="col-12">
                    <div class="table-responsive table-striped table-bordered table-hover">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#ID</th>
                                    <th scope="col">Grado</th>
                                    <th scope="col">Nombre Clave</th>
                                    <th scope="col">Numero de Alumnos</th>
                                </tr>
                            </thead>
                            <tbody>

                                @if (count($grupos)<=0)
                                    <tr>
                                        <td colspan="4">
                                            No hay Resultados
                                        </td>
                                    </tr>
                                @else
                                    @foreach ($grupos as $grupo)
                                        <tr>
                                            <th scope="row">{{$grupo->id}}</th>
                                            <td>{{$grupo->grado}}</td>
                                            <td>{{$grupo->nombre}}</td>
                                            <td>{{$grupo->numAlumnos}}</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

        </div>

        <div class="col-3">

            <img src="{{asset('img/b1.jpg')}}" class="col-10" height="auto">

        </div>

    </div>


</div>

<div class="row mb-3 mt-2">
    <div class="offset-3 col-9 justify-content-center">
        <div class="d-flex justify-content-center">
            {!! $grupos->links() !!}
        </div>
    </div>
</div>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
