@extends('adminlte::page')

@section('title', 'Tutorados')

{{-- @section('plugins.Sweetalert2',true) --}}

@section('content_header')
    <h1 class="font-weight-bold">Gestion de Docentes</h1>
@stop

@section('content')

    <div class="container-fluid mt-5">

        <div class="row justify-content-center align-items-center g-2">

            <div class="card offset-1 col-10 p-4">

                <div class="container-fluid">
                {{-- @if(isset($docente))

                    <form action="{{route('docentes.update'), $docente->id}}" method="POST" enctype="multipart/form-data">

                        @csrf
                        @method('PATCH')

                        <h3 class="text-center font-weight-bold">Actualizacion de Docentes</h3>
                        <hr>

                        <input type="hidden" name="id" value="{{$docente->id}}">

                        <div class="mb-1 row justify-content-center align-items-center g-2">

                            <div class="col-4">

                                <div class="row justify-content-center align-items-center g-2">

                                    <div class="col-10">
                                        <label class="text-dark mt-3 mb-2">RFC</label>
                                        <input type="text" maxlength="13" class="form-control" value="{{ $docente->RFC }}" name="RFC"  id="RFC">

                                        @error ('RFC')

                                        <small class="text-danger">{{$message}}</small>

                                        @enderror
                                    </div>

                                    <div  class="col-10">
                                        <label class="text-dark mt-3 mb-2">Nombre del docente</label>
                                        <input type="text" maxlength="30" class="form-control" value="{{ $docente->nombre }}" name="nombre"  id="nombre">

                                        @error ('nombre')

                                        <small class="text-danger">{{$message}}</small>

                                        @enderror
                                    </div>

                                    <div  class="col-10">
                                        <label class="text-dark mt-3 mb-2">Apellido paterno del docente</label>
                                        <input type="text" maxlength="30" class="form-control" value="{{ $docente->apellidoP }}" name="apellidoP"  id="apellidoP">

                                        @error ('apellidoP')

                                        <small class="text-danger">{{$message}}</small>

                                        @enderror
                                    </div>

                                    <div  class="col-10">
                                        <label class="text-dark mt-3 mb-2">Apellido materno del docente</label>
                                        <input type="text" maxlength="30" class="form-control" value="{{$docente->apellidoM }}" name="apellidoM"  id="apellidoM">

                                        @error ('apellidoM')

                                        <small class="text-danger">{{$message}}</small>

                                        @enderror
                                    </div>

                                </div>

                            </div>

                            <div class="col-4">

                                <div class="row justify-content-center align-items-center g-2">

                                    <div  class="col-10">
                                        <label class="text-dark mt-3 mb-2">Telefono</label>
                                        <input type="text" maxlength="15" class="form-control" value="{{ $docente->telefono }}" name="telefono"  id="telefono">

                                        @error ('telefono')

                                        <small class="text-danger">{{$message}}</small>

                                        @enderror
                                    </div>

                                    <div class="col-10">
                                        <label class="text-dark mt-3 mb-2">Direccion / Domicilio</label>
                                        <input type="text" maxlength="50" class="form-control" value="{{ $docente->direccion }}" name="direccion"  id="direccion" placeholder="">

                                        @error ('matricula')

                                        <small class="text-danger">{{$message}}</small>

                                        @enderror
                                    </div>


                                    <div  class="col-10">
                                        <label class="text-dark mt-3 mb-2">Genero</label>
                                        <select class="form-select text-center col-12" name="sexo" id="sexo">

                                            <option selected disabled>-- -- --</option>

                                            <option value="H">Hombre</option>
                                            <option value="M">Mujer</option>
                                            <option value="NB">No binario</option>

                                        </select>
                                        @error ('sexo')

                                        <small class="text-danger">{{$message}}</small>

                                        @enderror
                                    </div>

                                    <div class="col-10">
                                        <label class="text-dark mt-4 mb-2">Fecha de Baja</label>
                                        <input type="date"  class="form-control"  name="fechaBaja"  id="fechaBaja">

                                        @error ('fechaBaja')

                                        <small class="text-danger">{{$message}}</small>

                                        @enderror
                                    </div>

                                </div>

                            </div>

                            <div class="col-4">

                                <div class="row justify-content-center align-items-center g-2">

                                    <div  class="col-10">
                                        <label class="text-dark mt-4 mb-1">Area de Formacion</label>
                                        <select class="form-select text-center col-12" name="areaFormacion" id="areaFormacion">

                                            <option selected disabled>-- -- --</option>
                                            <option value="Docencia de la Psicologia">Docencia de la Psicología</option>
                                            <option value="Desarrollo de Comunidades">Desarrollo de Comunidades</option>
                                            <option value="Desarrollo Psicologico">Desarrollo Psicologíco</option>
                                            <option value="Educacion Especial">Educación Especial</option>
                                            <option value="Organizacional">Organizacional</option>
                                            <option value="Investigacion">Investigación</option>
                                            <option value="Educacion">Educación</option>
                                            <option value="Clinica">Clínica</option>
                                            <option value="Social">Social</option>
                                            <option value="Salud">Salud</option>

                                        </select>
                                        @error ('areaFormacion')

                                        <small class="text-danger">{{$message}}</small>

                                        @enderror
                                    </div>

                                    <div  class="col-10">
                                        <label class="text-dark mt-4 mb-1">Materia Asignada</label>
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

                                    <div  class="col-10">
                                        <label class="text-dark mt-3 mb-2">Contraseña inicial</label>
                                        <input type="text" class="form-control" value="{{ $docente->password }}" name="password"  id="password"  placeholder="Ej (s0y4lumno)">

                                        @error ('password')

                                        <small class="text-danger">{{$message}}</small>

                                        @enderror
                                    </div>

                                    <div  class="col-10">
                                        <label class="text-dark mt-3 mb-2">Correo del docente</label>
                                        <input type="text" maxlength="45" class="form-control" value="{{ $docente->correo }}" name="correo"  id="correo">

                                        @error ('correo')

                                        <small class="text-danger">{{$message}}</small>

                                        @enderror
                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="mb-1 mt-4 row justify-content-center aling-items-center text-center">
                                <div class="col-6">
                                    <button type="submit" class="btn btn-outline-secondary btn-md p-2 widthbutcam opensanscam disabled">Borrar Formulario</button>
                                </div>

                                <div class="col-6">
                                    <button type="submit" class="btn btn-success btn-md p-2 widthbutcam opensanscam col-6">Actualizar Docente</button>
                                </div>
                        </div>

                    </form>

                @else --}}

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

                {{-- @endif --}}


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
