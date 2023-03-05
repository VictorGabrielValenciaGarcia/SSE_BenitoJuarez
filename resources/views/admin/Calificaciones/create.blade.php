@extends('adminlte::page')

@section('title', 'Calificaciones')

{{-- @section('plugins.Sweetalert2',true) --}}

@section('content_header')
<h1 class="font-weight-bold">Generar Boleta de Calificaciones</h1>
{{-- <h1 class="font-weight-bold">Asignación Grupal de Calificaciones</h1> --}}
@stop

@section('content')

    <div class="container mt-3">
        <div class="row justify-content-center align-items-center g-2 pt-3">



            @if ($materia && $grupo)

                <div class="container">
                    <div class="row align-items-center g-2">

                        <div class="col-3">
                            <label class="text-dark mt-2 mb-1">Asignatura:</label>
                            <label class="text-dark form-control text-center">{{ $materia->nombre }}</label>
                        </div>

                        <div class="col-3">
                            <label class="text-dark mt-2 mb-1">Grupo:</label>
                            <label class="text-dark form-control text-center">{{ $grupo->nombre }}</label>
                        </div>

                        <div class="col-2">
                            <label class="text-dark mt-2 mb-1">Grado:</label>
                            <label class="text-dark form-control text-center">{{ $grupo->grado }}</label>
                        </div>

                        <div class="col-3 offset-0 pt-4">
                            <a class="btn btn-primary" href="{{ route('calif.create') }}" role="button">Regresar a la
                                seleccion</a>
                        </div>
                    </div>

                    <div class="row mt-4 justify-content-center align-items-center g-2">

                        <div class="col-11">

                            <form action="{{route('calif.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('POST')

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

                                            @foreach ($alumnos as $alumno)
                                                <input type="hidden" name="id_materia" id="id_materia" value="{{ $materia->id }}">
                                                <input type="hidden" name="id_alumno[]" id="id_alumno" value="{{ $alumno->id }}">
                                                <tr class="">
                                                    <td scope="row">{{ $alumno->nombre }} {{ $alumno->apellidoP }} {{ $alumno->apellidoM }}</td>

                                                    <td>
                                                        <input type="number" max="10" min="0" class="form-control parcial"
                                                            value="0" name="parcialUno[]" id="parcial_1" step=".1" required>
                                                        {{-- <input type="number" max="10" min="0" class="form-control parcial" value="{{ old('parcialUno') }}"
                                                        name="parcialUno[]" id="parcial_1" onchange="sumar();"> --}}
                                                        @error ('parcialUno')
                                                            <small class="text-danger">{{$message}}</small>
                                                        @enderror
                                                    </td>

                                                    <td>
                                                        <input type="number" max="10" min="0" class="form-control parcial" disabled
                                                            value="0" name="parcialDos[]" id="parcial_2" step=".1" required>
                                                        {{-- <input type="number" max="10" min="0" class="form-control parcial" value="{{ old('parcialDos') }}"
                                                        name="parcialDos[]" id="parcial_2" onchange="sumar();"> --}}
                                                        @error ('parcialDos')
                                                        <small class="text-danger">{{$message}}</small>
                                                        @enderror
                                                    </td>

                                                    <td>
                                                        <input type="number" max="10" min="0" class="form-control parcial" disabled
                                                            value="0" name="parcialTres[]" id="parcial_3" step=".1" required>
                                                        {{-- <input type="number" max="10" min="0" class="form-control parcial" value="{{ old('parcialTres') }}"
                                                        name="parcialTres[]" id="parcial_3" onchange="sumar();"> --}}
                                                        @error ('parcialTres')
                                                        <small class="text-danger">{{$message}}</small>
                                                        @enderror
                                                    </td>

                                                    <td>
                                                        <input type="number" max="10" min="0" class="form-control" disabled value="0" name="promedioFinal[]"
                                                            id="promedioFinal" step=".1" required>
                                                        {{-- <input type="hidden" class="form-control" value="0" name="promedioFinal[]"
                                                            id="promedioFinal" step=".1"> --}}
                                                        {{-- @error ('promedioFinal')
                                                            <small class="text-danger">{{$message}}</small>
                                                        @enderror --}}
                                                    </td>
                                                </tr>
                                            @endforeach

                                            </tbody>
                                        </table>
                                    </div>

                                <input type="submit" value="Subir Calificaciones" class="btn btn-success col-4 offset-4">
                            </form>

                        </div>
                    </div>

                </div>

            @else
                <div class="col-12 mb-3">

                    <form action="{{ route('calif.create') }}" method="GET">
                        <div class="form-row align-items-center">

                            <div class="col-sm-3">
                                <label class="text-dark mt-2 mb-1">Materia</label>
                                <select class="form-select text-center col-12" name="id_materia" id="id_materia">

                                    <option selected disabled>-- -- --</option>
                                    @foreach ($materias as $materia)
                                    <option value="{{ $materia->id }}">{{ $materia->nombre}}</option>
                                    @endforeach

                                </select>
                                @error ('id_grupo')

                                <small class="text-danger">{{$message}}</small>

                                @enderror
                            </div>

                            <div class="col-sm-3">
                                <label class="text-dark mt-2 mb-1">Grupo</label>
                                <select class="form-select text-center col-12" name="id_grupo" id="id_grupo">

                                    <option selected disabled>-- -- --</option>
                                    @foreach ($grupos as $grupo)
                                    <option value="{{ $grupo->id }}">{{ $grupo->nombre}}</option>
                                    @endforeach

                                </select>
                                @error ('id_grupo')

                                <small class="text-danger">{{$message}}</small>

                                @enderror
                            </div>
                            <div class="col-auto pt-4">
                                <button class="btn btn-info" type="submit">Buscar Boleta</button>
                            </div>
                        </div>
                    </form>

                </div>
            @endif


        </div>
    </div>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
{{-- <script>

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

            $promedio.value = subtotal/3;
        }

    </script> --}}
@stop
