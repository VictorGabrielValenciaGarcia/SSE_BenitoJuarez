@extends('adminlte::page')

@section('title', 'Materias')

{{-- @section('plugins.Sweetalert2',true) --}}

@section('content_header')
<h1 class="font-weight-bold">Materias Impartidas</h1>
@stop

@section('content')

<div class="container mt-2">

    <div class="row">

        <div class="col-9">

            <div class="row">

                <div class="col-12 mb-3">

                    <form action="{{ route('materias.index') }}" method="GET">
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
                                    <th scope="col">Nombre de la Materia</th>
                                    <th scope="col">Grado de Imparticion</th>
                                </tr>
                            </thead>
                            <tbody>

                                @if (count($materias)<=0)
                                    <tr>
                                        <td colspan="3">
                                            No hay Resultados
                                        </td>
                                    </tr>
                                @else
                                    @foreach ($materias as $materia)
                                        <tr>
                                            <th scope="row">{{$materia->id}}</th>
                                            <td>{{$materia->nombre}}</td>
                                            <td>{{$materia->grado}}</td>
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
