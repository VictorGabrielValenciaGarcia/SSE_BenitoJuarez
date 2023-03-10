@extends('adminlte::page')

@section('title', 'Calificaciones')

@section('plugins.Sweetalert2',true)

@section('content_header')
    <h1 class="font-weight-bold">Boletas de Calificaciones</h1>
@stop

@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        .cursor-active{
            cursor: pointer !important;
        }
    </style>

    <div class="container mt-4">

        <div class="row justify-content-center align-items-center g-2">

            <div class="col-10 mb-3">

                <form action="{{ route('calif.index') }}" method="GET">
                    <div class="form-row align-items-center">

                        <div class="col-sm-3">
                            <label class="text-dark mt-2 mb-1">Materia</label>
                            <select class="form-select text-center col-12" name="id_materia" id="id_materia">

                                <option selected disabled>-- -- --</option>
                                @foreach ($materias as $materia)
                                <option value="{{ $materia->id }}">{{ $materia->nombre}}</option>
                                @endforeach

                            </select>
                            @error ('id_materia')

                            <small class="text-danger">{{$message}}</small>

                            @enderror
                        </div>

                        <div class="col-sm-5">
                            <label class="text-dark mt-2 mb-1">Alumno</label>
                            <select class="form-select text-start col-12" name="id_alumno" id="id_alumno">

                                <option selected disabled>-- -- --</option>
                                @foreach ($alumnos as $alumno)
                                <option value="{{ $alumno->id }}">{{ $alumno->nombre}} {{ $alumno->apellidoP}} {{ $alumno->apellidoM}}</option>
                                @endforeach

                            </select>
                            @error ('id_alumno')

                            <small class="text-danger">{{$message}}</small>

                            @enderror
                        </div>
                        <div class="col-auto pt-4">
                            <button class="btn btn-info" type="submit">Buscar Boleta</button>
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
                                <th scope="col">Materia</th>
                                <th scope="col">Alumno</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($calificaciones)<=0)
                            <tr>
                                <td colspan="4">
                                    No hay Resultados
                                </td>
                            </tr>
                            @else
                                @foreach ($calificaciones as $calificacion)
                                    <tr>
                                        <th scope="row">{{$calificacion->id}}</th>
                                        <td>{{$calificacion->materia->nombre}}</td>
                                        <td>{{$calificacion->alumno->nombre}} {{$calificacion->alumno->apellidoP}} {{$calificacion->alumno->apellidoM}}</td>
                                        <td class="text-center">

                                            <div class="row justify-content-center align-items-center g-2">

                                                <div class="col-4">
                                                    <a class=" cursor-active btn btn-success btn-md" href="{{route('calif.edit', $calificacion->id)}}">
                                                        <i class="fas fa-pen"></i>
                                                    </a>
                                                </div>

                                                <div class="col-4">

                                                    <form action="{{route('calif.destroy', $calificacion->id)}}" method="POST" class="formeliminar">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger" role="button" type="submit">
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
                {!! $calificaciones->links() !!}
            </div>
        </div>
    </div>

    <script>

        @if (session('eliminar') == 'Listo')

        Swal.fire(
            '??Eliminado!',
            'El registro ha sido eliminado con ??xito!',
            'success'
        )

        @endif

        $(".formeliminar").on("submit", function(e) {

                e.preventDefault();

                    Swal.fire({
                        title: '??Estas seguro?',
                        text: "??Este registro se eliminar?? definitivamente!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: '??S??, elim??nalo!',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Swal.fire(
                            // 'Eliminado!',
                            // 'El producto ha sido eliminado',
                            // 'success'
                            // )

                            this.submit();
                        }
                    });
            })

    </script>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
