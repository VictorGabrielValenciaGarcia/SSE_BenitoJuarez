@extends('adminlte::page')

@section('title', 'Calificaciones')

{{-- @section('plugins.Sweetalert2',true) --}}

@section('content_header')
<h1 class="font-weight-bold">Generar Boleta de Calificaciones</h1>
{{-- <h1 class="font-weight-bold">Asignación Grupal de Calificaciones</h1> --}}
@stop

@section('content')

    <div class="container">
        <div class="row align-items-center g-2">

            <div class="col-auto">
                <label class="text-light mt-2 mb-1">-</label>
                <label class="text-dark form-control text-center">Registro No. {{ $calificacion->id }}</label>
            </div>

            <div class="col-auto">
                <label class="text-dark mt-2 mb-1">Asignatura:</label>
                <label class="text-dark form-control text-center">{{ $calificacion->materia->nombre }}</label>
            </div>

            <div class="col-auto">
                <label class="text-dark mt-2 mb-1">Grado:</label>
                <label class="text-dark form-control text-center">{{ $calificacion->materia->grado }}</label>
            </div>

            <div class="col-auto">
                <label class="text-dark mt-2 mb-1">Grupo:</label>
                <label class="text-dark form-control text-center">{{ $calificacion->alumno->grupo->nombre }}</label>
            </div>

            <div class="col-auto offset-0 pt-4">
                <a class="btn btn-primary" href="{{ route('calif.index') }}" role="button">Regresar a la
                    lista</a>
            </div>
        </div>

        <div class="row mt-4 justify-content-center align-items-center g-2">

            <div class="col-11">

                <form action="{{route('calif.update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">

                                <thead>
                                    <tr>
                                        <th scope="col">Estudiante</th>
                                        <th scope="col">Parcial 1</th>
                                        <th scope="col">Parcial 2</th>
                                        <th scope="col">Parcial 3</th>
                                        <th scope="col">Promedio</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <input type="hidden" name="id" id="id" value="{{ $calificacion->id }}">
                                    <input type="hidden" name="id_materia" id="id_materia" value="{{ $calificacion->materia->id }}">
                                    <input type="hidden" name="id_alumno" id="id_alumno" value="{{ $calificacion->alumno->id }}">
                                    <tr class="">
                                        <td scope="row">{{ $calificacion->alumno->nombre }} {{ $calificacion->alumno->apellidoP }} {{ $calificacion->alumno->apellidoM }}</td>

                                        <td>
                                            {{-- <input type="number" max="10" min="0" class="form-control parcial"
                                                value="0" name="parcialUno" id="parcial_1" step=".1"> --}}
                                            <input type="number" max="10" min="0" class="form-control parcial" value="{{ $calificacion->parcialUno }}"
                                            name="parcialUno" id="parcial_1" step=".1">
                                            @error ('parcialUno')
                                                <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </td>

                                        <td>
                                            {{-- <input type="number" max="10" min="0" class="form-control parcial" disabled
                                                value="0" name="parcialDos[]" id="parcial_2" step=".1"> --}}
                                            <input type="number" max="10" min="0" class="form-control parcial" value="{{ $calificacion->parcialDos }}"
                                            name="parcialDos" id="parcial_2" step=".1">
                                            @error ('parcialDos')
                                            <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </td>

                                        <td>
                                            {{-- <input type="number" max="10" min="0" class="form-control parcial" disabled
                                                value="0" name="parcialTres[]" id="parcial_3" step=".1"> --}}
                                            <input type="number" max="10" min="0" class="form-control parcial" value="{{ $calificacion->parcialTres }}"
                                            name="parcialTres" id="parcial_3" onchange="sumar();" step=".1">
                                            @error ('parcialTres')
                                            <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </td>

                                        <td>
                                            <input type="number" max="10" min="0" class="form-control" disabled value="{{ $calificacion->promedioFinal }}"
                                                id="promedioFinal" step=".1">
                                            <input type="hidden" class="form-control" value="{{ $calificacion->promedioFinal }}" name="promedioFinal"
                                                id="promedioFinal" step=".1">
                                            @error ('promedioFinal')
                                                <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>

                    <input type="submit" value="Subir Calificaciones" class="btn btn-success col-4 offset-4">
                </form>

            </div>
        </div>

    </div>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>

        function sumar(){
            const $promedio = document.getElementById('promedioFinal');
            let subtotal = 0;

            [ ...document.getElementsByClassName( "parcial" ) ].forEach( function ( element ) {
                if(element.value !== '') {
                    if (parseFloat(element.value)>=0 && parseFloat(element.value)<=10) {
                        subtotal += parseFloat(element.value);
                    }
                }
            });
            subtotal = subtotal/3;
            subtotal = Math.round(subtotal * 10) / 10;
            $promedio.value = subtotal;
        }

    </script>
@stop
