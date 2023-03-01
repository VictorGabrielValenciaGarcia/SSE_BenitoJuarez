@extends('adminlte::page')

@section('title', 'Alumnos')

{{-- @section('plugins.Sweetalert2',true) --}}

@section('content_header')
    <h1 class="font-weight-bold">Gestion de Alumnos</h1>
@stop

@section('content')

    <div class="container-fluid mt-2">

        <div class="row justify-content-center align-items-center g-2">

            <div class="card offset-1 col-10 p-4">

                <div class="container-fluid">
                @if(isset($alumno))

                    <form action="{{route('alumnos.update'), $alumno->id}}" method="POST" enctype="multipart/form-data">

                        @csrf
                        @method('PATCH')

                        <h3 class="text-center font-weight-bold">Actualizacion de Alumnos</h3>
                        <hr>

                        <input type="hidden" name="id" value="{{$alumno->id}}">
                        <div class="mb-1 row justify-content-center align-items-center g-2">

                            <div class="col-4">

                                <div class="row justify-content-center align-items-center g-2">

                                    <div class="col-10">
                                        <label class="text-dark mt-3 mb-2">Matricula Escolar</label>
                                        <input type="text" maxlength="11" class="form-control" value="{{$alumno->matricula}}" name="matricula"  id="matricula">

                                        @error ('matricula')

                                        <small class="text-danger">{{$message}}</small>

                                        @enderror
                                    </div>

                                    <div  class="col-10">
                                        <label class="text-dark mt-3 mb-2">Nombre del alumno</label>
                                        <input type="text" maxlength="30" class="form-control" value="{{$alumno->nombre}}" name="nombre"  id="nombre">

                                        @error ('nombre')

                                        <small class="text-danger">{{$message}}</small>

                                        @enderror
                                    </div>

                                    <div  class="col-10">
                                        <label class="text-dark mt-3 mb-2">Apellido paterno del alumno</label>
                                        <input type="text" maxlength="30" class="form-control" value="{{$alumno->apellidoP}}" name="apellidoP"  id="apellidoP">

                                        @error ('apellidoP')

                                        <small class="text-danger">{{$message}}</small>

                                        @enderror
                                    </div>

                                    <div  class="col-10">
                                        <label class="text-dark mt-3 mb-2">Apellido materno del alumno</label>
                                        <input type="text" maxlength="30" class="form-control" value="{{$alumno->apellidoM}}" name="apellidoM"  id="apellidoM">

                                        @error ('apellidoM')

                                        <small class="text-danger">{{$message}}</small>

                                        @enderror
                                    </div>

                                </div>

                            </div>

                            <div class="col-4">

                                <div class="row justify-content-center align-items-center g-2">

                                    <div  class="col-10">
                                        <label class="text-dark mt-2 mb-1">CURP</label>
                                        <input type="text" maxlength="18" class="form-control" value="{{$alumno->CURP}}" name="CURP"  id="CURP">

                                        @error ('CURP')

                                        <small class="text-danger">{{$message}}</small>

                                        @enderror
                                    </div>

                                    <div class="col-10">
                                        <label class="text-dark mt-2 mb-1">Direccion / Domicilio</label>
                                        <input type="text" maxlength="50" class="form-control" value="{{$alumno->direccion}}" name="direccion"  id="direccion" placeholder="">

                                        @error ('matricula')

                                        <small class="text-danger">{{$message}}</small>

                                        @enderror
                                    </div>

                                    <div  class="col-10">
                                        <label class="text-dark mt-2 mb-1">Discapacidad(es)</label>
                                        <input type="text" maxlength="100" class="form-control" value="{{$alumno->discapacidades}}" name="discapacidades"  id="discapacidades">

                                        @error ('discapacidades')

                                        <small class="text-danger">{{$message}}</small>

                                        @enderror
                                    </div>

                                    <div  class="col-10">
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

                                    <div  class="col-10">
                                        <label class="text-dark mt-2 mb-1">Genero</label>
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

                                </div>

                            </div>

                            <div class="col-4">

                                <div class="row justify-content-center align-items-center g-2">

                                    <div class="col-10">
                                        <label class="text-dark mt-3 mb-2">Fecha de Egreso</label>
                                        <input type="date"  class="form-control" name="fechaEgreso"  id="fechaEgreso">

                                        @error ('fechaEgreso')

                                        <small class="text-danger">{{$message}}</small>

                                        @enderror
                                    </div>

                                    <div  class="col-10">
                                        <label class="text-dark mt-3 mb-2">Promedio General</label>
                                        <input type="number" step='0.1' class="form-control" value="{{$alumno->promedio}}" name="promedio"  id="promedio" >

                                        @error ('promedio')

                                        <small class="text-danger">{{$message}}</small>

                                        @enderror
                                    </div>

                                    <div  class="col-10">
                                        <label class="text-dark mt-3 mb-2">Correo del alumno</label>
                                        <input type="text" maxlength="45" class="form-control" value="{{$alumno->correo}}" name="correo"  id="correo">

                                        @error ('correo')

                                        <small class="text-danger">{{$message}}</small>

                                        @enderror
                                    </div>

                                    <div  class="col-10">
                                        <label class="text-dark mt-3 mb-3">Edad del alumno</label>
                                        <input type="number" max="70" min="0" class="form-control" value="{{$alumno->edad}}" name="edad"  id="edad">

                                        @error ('edad')

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
                                    <button type="submit" class="btn btn-success btn-md p-2 widthbutcam opensanscam col-6">Registrar Alumno</button>
                                </div>
                        </div>

                    </form>

                @else

                    <form action="{{route('alumnos.store')}}" method="post" enctype="multipart/form-data">

                        @csrf
                        @method('POST')

                        <h3 class="text-center font-weight-bold">Registro de Alumnos</h3>
                        <hr>

                        <div class="mb-1 row justify-content-center align-items-center g-2">

                            <div class="col-4">

                                <div class="row justify-content-center align-items-center g-2">

                                    <div class="col-10">
                                        <label class="text-dark mt-3 mb-2">Matricula Escolar</label>
                                        <input type="text" maxlength="11" class="form-control" value="{{ old('matricula') }}" name="matricula"  id="matricula">

                                        @error ('matricula')

                                        <small class="text-danger">{{$message}}</small>

                                        @enderror
                                    </div>

                                    <div  class="col-10">
                                        <label class="text-dark mt-3 mb-2">Nombre del alumno</label>
                                        <input type="text" maxlength="30" class="form-control" value="{{ old('nombre') }}" name="nombre"  id="nombre">

                                        @error ('nombre')

                                        <small class="text-danger">{{$message}}</small>

                                        @enderror
                                    </div>

                                    <div  class="col-10">
                                        <label class="text-dark mt-3 mb-2">Apellido paterno del alumno</label>
                                        <input type="text" maxlength="30" class="form-control" value="{{ old('apellidoP') }}" name="apellidoP"  id="apellidoP">

                                        @error ('apellidoP')

                                        <small class="text-danger">{{$message}}</small>

                                        @enderror
                                    </div>

                                    <div  class="col-10">
                                        <label class="text-dark mt-3 mb-2">Apellido materno del alumno</label>
                                        <input type="text" maxlength="30" class="form-control" value="{{ old('apellidoM') }}" name="apellidoM"  id="apellidoM">

                                        @error ('apellidoM')

                                        <small class="text-danger">{{$message}}</small>

                                        @enderror
                                    </div>

                                </div>

                            </div>

                            <div class="col-4">

                                <div class="row justify-content-center align-items-center g-2">

                                    <div  class="col-10">
                                        <label class="text-dark mt-2 mb-1">CURP</label>
                                        <input type="text" maxlength="18" class="form-control" value="{{ old('CURP') }}" name="CURP"  id="CURP">

                                        @error ('CURP')

                                        <small class="text-danger">{{$message}}</small>

                                        @enderror
                                    </div>

                                    <div class="col-10">
                                        <label class="text-dark mt-2 mb-1">Direccion / Domicilio</label>
                                        <input type="text" maxlength="50" class="form-control" value="{{ old('direccion') }}" name="direccion"  id="direccion" placeholder="">

                                        @error ('matricula')

                                        <small class="text-danger">{{$message}}</small>

                                        @enderror
                                    </div>

                                    <div  class="col-10">
                                        <label class="text-dark mt-2 mb-1">Discapacidad(es)</label>
                                        <input type="text" maxlength="100" class="form-control" value="{{ 'Ninguna' }}" name="discapacidades"  id="discapacidades">

                                        @error ('discapacidades')

                                        <small class="text-danger">{{$message}}</small>

                                        @enderror
                                    </div>

                                    <div  class="col-10">
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

                                    <div  class="col-10">
                                        <label class="text-dark mt-2 mb-1">Genero</label>
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

                                </div>

                            </div>

                            <div class="col-4">

                                <div class="row justify-content-center align-items-center g-2">

                                    <div class="col-10">
                                        <label class="text-dark mt-3 mb-2">Fecha de Registro</label>
                                        <input type="date"  class="form-control" value="{{ old('fechaRegistro') }}" name="fechaRegistro"  id="fechaRegistro">

                                        @error ('fechaRegistro')

                                        <small class="text-danger">{{$message}}</small>

                                        @enderror
                                    </div>

                                    <div  class="col-10">
                                        <label class="text-dark mt-3 mb-2">Contraseña inicial</label>
                                        <input type="text" class="form-control" value="{{ old('password') }}" name="password"  id="password"  placeholder="Ej (s0y4lumno)">

                                        @error ('password')

                                        <small class="text-danger">{{$message}}</small>

                                        @enderror
                                    </div>

                                    <div  class="col-10">
                                        <label class="text-dark mt-3 mb-2">Correo del alumno</label>
                                        <input type="text" maxlength="45" class="form-control" value="{{ old('correo') }}" name="correo"  id="correo">

                                        @error ('correo')

                                        <small class="text-danger">{{$message}}</small>

                                        @enderror
                                    </div>

                                    <div  class="col-10">
                                        <label class="text-dark mt-3 mb-3">Edad del alumno</label>
                                        <input type="number" max="70" min="0" class="form-control" value="{{ old('edad') }}" name="edad"  id="edad">

                                        @error ('edad')

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
                                    <button type="submit" class="btn btn-success btn-md p-2 widthbutcam opensanscam col-6">Registrar Alumno</button>
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
