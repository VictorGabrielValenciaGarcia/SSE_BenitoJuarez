@extends('adminlte::page')

@section('title', 'Materias')

{{-- @section('plugins.Sweetalert2',true) --}}

@section('content_header')
<h1 class="font-weight-bold">Materias Impartidas</h1>
@stop

@section('content')

<style>
    .cursor-active{
        cursor: pointer !important;
    }
</style>

<div class="container mt-4">

    <div class="row justify-content-center align-items-center g-2">

        <div class="col-10 mb-3">

            <form action="{{ route('materias.list') }}" method="GET">
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

        <div class="col-10">

            <div class="table-responsive table-striped table-bordered table-hover">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#ID</th>
                            <th scope="col">Nombre de la Materia</th>
                            <th scope="col">Grado de Imparticion</th>
                            <th scope="col">Ver detalles</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($materias)<=0)
                        <tr>
                            <td colspan="5">
                                No hay Resultados
                            </td>
                        </tr>
                        @else
                            @foreach ($materias as $materia)
                                <tr>
                                    <th scope="row">{{$materia->id}}</th>
                                    <td>{{$materia->nombre}}</td>
                                    <td>{{$materia->grado}}</td>
                                    <td class="text-center">

                                        <div class="row justify-content-center align-items-center g-2">

                                            <div class="col-3">

                                                <a class="cursor-active btn btn-primary btn-md col-12" href="{{route('materias.show', $materia->id)}}">
                                                    <i class="fas fa-eye"></i>
                                                </a>

                                            </div>
                                            <div class="col-3">
                                                <a class=" cursor-active btn btn-success btn-md col-12" href="{{route('materias.edit', $materia->id)}}">
                                                    <i class="fas fa-pen"></i>
                                                </a>
                                            </div>

                                            <div class="col-3">

                                                <form action="{{route('materias.destroy', $materia->id)}}" method="POST">
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

<div class="row mb-3 mt-2">
    <div class="offset-3 col-9 justify-content-center">
        <div class="d-flex justify-content-center">
            {!! $materias->links() !!}
        </div>
    </div>
</div>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
