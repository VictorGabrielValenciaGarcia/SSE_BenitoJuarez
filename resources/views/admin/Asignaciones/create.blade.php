@extends('adminlte::page')

@section('title', 'Tutorados')

{{-- @section('plugins.Sweetalert2',true) --}}

@section('content_header')
    <h1 class="font-weight-bold">Gestion de Docentes</h1>
@stop

@section('content')

    <div class="container-fluid mt-5">

        <div class="row justify-content-center align-items-center g-2">

            <div class="card col-11 p-4">

                <div class="container-fluid">
                @if(isset($asignacion))

                    <form action="{{route('tutores.reassingTutor'), $asignacion->id}}" method="POST" enctype="multipart/form-data">

                        @csrf
                        @method('PATCH')

                        <h3 class="text-center font-weight-bold">Actualizacion de Tutorados</h3>
                        <hr>

                        <input type="hidden" name="id" value="{{$asignacion->id}}">

                        <div class="mb-1 row  align-items-center g-2">

                            <div class="col-4">

                                <div class="row justify-content-center align-items-center g-2">

                                    <div  class="col-11">
                                        <label class="text-dark mt-3 mb-2">Tutor Actual</label>
                                          <input type="text" disabled class="form-control" value="{{ $tutorActual->nombre }} {{ $tutorActual->apellidoP }} {{ $tutorActual->apellidoM }}">
                                    </div>

                                </div>

                            </div>

                            <div class="col-4">

                                <div class="row justify-content-center align-items-center g-2">

                                    <div  class="col-11">
                                        <label class="text-dark mt-3 mb-2">Parentesco Indicado</label>
                                          <input type="text" disabled class="form-control" value="{{ $asignacion->parentesco }}">
                                    </div>

                                </div>

                            </div>

                            {{-- <div class="col-4">

                                <div class="row justify-content-center align-items-center g-2">

                                    <div  class="col-11">
                                        <label class="text-dark mt-3 mb-2">Tutorado Actual</label>
                                          <input type="text" disabled class="form-control" value="{{ $tutoradoActual->nombre }} {{ $tutoradoActual->apellidoP }} {{ $tutoradoActual->apellidoM }}">
                                    </div>

                                </div>

                            </div> --}}

                        </div>

                        <div class="mb-1 row justify-content-center align-items-center g-2">

                            <div class="col-4">

                                <div class="row justify-content-center align-items-center g-2">

                                    <div  class="col-11">
                                        <label class="text-dark mt-3 mb-2">Seleccionar Tutor</label>
                                        <select class="form-select text-center col-12" name="id_tutor" id="id_tutor">

                                            <option selected disabled>-- -- --</option>

                                            @foreach ($tutores as $tutor)
                                                <option value="{{ $tutor->id }}">{{ $tutor->nombre }} {{ $tutor->apellidoP }} {{ $tutor->apellidoM }}</option>
                                            @endforeach

                                        </select>
                                        @error ('id_tutor')

                                        <small class="text-danger">{{$message}}</small>

                                        @enderror
                                    </div>

                                </div>

                            </div>

                            <div class="col-4">

                                <div class="row justify-content-center align-items-center g-2">

                                    <div  class="col-11">
                                        <label class="text-dark mt-4 mb-1">Parentesco</label>
                                        <select class="form-select text-center col-12" name="parentesco" id="parentesco">

                                            <option selected disabled>-- -- --</option>
                                            <option value="PADRE">PADRE</option>
                                            <option value="MADRE">MADRE</option>
                                            <option value="DE CONFIANZA">DE CONFIANZA</option>

                                        </select>
                                        @error ('parentesco')

                                        <small class="text-danger">{{$message}}</small>

                                        @enderror
                                    </div>

                                </div>

                            </div>

                            <div class="col-4">

                                <div class="row justify-content-center align-items-center g-2">

                                    <div  class="col-11">
                                        <label class="text-dark mt-3 mb-2">Tutorado Actual</label>
                                        <input type="text" disabled class="form-control" value="{{ $tutoradoActual->nombre }} {{ $tutoradoActual->apellidoP }} {{ $tutoradoActual->apellidoM }}">
                                        <input type="hidden" name="id_alumno" id="id_alumno" value="{{ $asignacion->id_alumno }}">
                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="mb-1 mt-5 row justify-content-center aling-items-center text-center">
                                <div class="col-6">
                                    <button type="submit" class="btn btn-outline-secondary btn-md p-2 widthbutcam opensanscam disabled">Borrar Formulario</button>
                                </div>

                                <div class="col-6">
                                    <button type="submit" class="btn btn-success btn-md p-2 widthbutcam opensanscam col-6">Asignar Tutor</button>
                                </div>
                        </div>

                    </form>

                @else

                    <form action="{{route('tutores.assingTutor')}}" method="post" enctype="multipart/form-data">

                        @csrf
                        @method('POST')

                        <h3 class="text-center font-weight-bold">Asignación de Tutorados</h3>
                        <hr>

                        <div class="mb-1 row justify-content-center align-items-center g-2">

                            <div class="col-4">

                                <div class="row justify-content-center align-items-center g-2">

                                    <div  class="col-11">
                                        <label class="text-dark mt-3 mb-2">Seleccionar Tutor</label>
                                        <select class="form-select text-center col-12" name="id_tutor" id="id_tutor">

                                            <option selected disabled>-- -- --</option>

                                            @foreach ($tutores as $tutor)
                                                <option value="{{ $tutor->id }}">{{ $tutor->nombre }} {{ $tutor->apellidoP }} {{ $tutor->apellidoM }}</option>
                                            @endforeach

                                        </select>
                                        @error ('id_tutor')

                                        <small class="text-danger">{{$message}}</small>

                                        @enderror
                                    </div>

                                </div>

                            </div>

                            <div class="col-4">

                                <div class="row justify-content-center align-items-center g-2">

                                    <div  class="col-11">
                                        <label class="text-dark mt-4 mb-1">Parentesco</label>
                                        <select class="form-select text-center col-12" name="parentesco" id="parentesco">

                                            <option selected disabled>-- -- --</option>
                                            <option value="PADRE">PADRE</option>
                                            <option value="MADRE">MADRE</option>
                                            <option value="DE CONFIANZA">DE CONFIANZA</option>

                                        </select>
                                        @error ('parentesco')

                                        <small class="text-danger">{{$message}}</small>

                                        @enderror
                                    </div>

                                </div>

                            </div>

                            <div class="col-4">

                                <div class="row justify-content-center align-items-center g-2">

                                    <div  class="col-11">
                                        <label class="text-dark mt-3 mb-2">Seleccionar Tutorado</label>
                                        <select class="form-select text-center col-12" name="id_alumno" id="id_alumno">

                                            <option selected disabled>-- -- --</option>

                                            @foreach ($alumnos as $alumno)
                                                <option value="{{ $alumno->id }}">{{ $alumno->nombre }} {{ $alumno->apellidoP }} {{ $alumno->apellidoM }}</option>
                                            @endforeach

                                        </select>
                                        @error ('id_alumno')

                                        <small class="text-danger">{{$message}}</small>

                                        @enderror
                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="mb-1 mt-5 row justify-content-center aling-items-center text-center">
                                <div class="col-6">
                                    <button type="submit" class="btn btn-outline-secondary btn-md p-2 widthbutcam opensanscam disabled">Borrar Formulario</button>
                                </div>

                                <div class="col-6">
                                    <button type="submit" class="btn btn-success btn-md p-2 widthbutcam opensanscam col-6">Asignar Tutor</button>
                                </div>
                        </div>



                    </form>

                @endif


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
