@extends('adminlte::page')

@section('title', 'Grupos')

{{-- @section('plugins.Sweetalert2',true) --}}

@section('content_header')
<h1 class="font-weight-bold">Grupos Escolares</h1>
@stop

@section('content')

<div class="container mt-4">

    <div class="row justify-content-center align-items-center g-2">

        <div class="col-10">

            <div class="table-responsive table-striped table-bordered table-hover">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#ID</th>
                            <th scope="col">Grado</th>
                            <th scope="col">Nombre Clave</th>
                            <th scope="col">Numero de Alumnos</th>
                            <th scope="col">Ver detalles</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($grupos as $grupo)
                            <tr>
                                <th scope="row">{{$grupo->id}}</th>
                                <td>{{$grupo->grado}}</td>
                                <td>{{$grupo->nombre}}</td>
                                <td>{{$grupo->numAlumnos}}</td>
                                <td class="text-center">
                                    <a class="btn btn-success btn-md col-6" href="{{-- {{route('intercambios.show', $intercambio->id)}} --}}">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

    </div>


</div>

<div class="row mb-3 mt-2">
    <div class="offset-3 col-6 justify-content-center">
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
