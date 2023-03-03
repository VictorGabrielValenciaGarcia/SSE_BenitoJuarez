
@extends('adminlte::page')

@section('title', 'Tutores')

{{-- @section('plugins.Sweetalert2',true) --}}

@section('content_header')
    <h1 class="font-weight-bold">Gestion de Tutores</h1>
@stop

@section('content')

    <div class="container-fluid mt-2">

        <div class="row justify-content-center align-items-center g-2">

            <div class="card offset-1 col-10 p-4">

                <div class="container-fluid">
                @if(isset($tutor))

                    <form action="{{route('tutores.update'), $tutor->id}}" method="POST" enctype="multipart/form-data">

                        @csrf
                        @method('PATCH')

                        <h3 class="text-center font-weight-bold">Actualizacion de Tutores</h3>
                        <hr>

                        <input type="hidden" name="id" value="{{$tutor->id}}">
                        <div class="mb-1 row justify-content-center align-items-center g-2">

                            <div class="col-6">

                                <div class="row justify-content-center align-items-center g-2">

                                    <div  class="col-10">
                                        <label class="text-dark mt-2 mb-1">Nombre del tutor</label>
                                        <input type="text" maxlength="30" class="form-control" value="{{ $tutor->nombre }}" name="nombre"  id="nombre">

                                        @error ('nombre')

                                        <small class="text-danger">{{$message}}</small>

                                        @enderror
                                    </div>

                                    <div  class="col-10">
                                        <label class="text-dark mt-2 mb-1">Apellido paterno del tutor</label>
                                        <input type="text" maxlength="30" class="form-control" value="{{ $tutor->apellidoP }}" name="apellidoP"  id="apellidoP">

                                        @error ('apellidoP')

                                        <small class="text-danger">{{$message}}</small>

                                        @enderror
                                    </div>

                                    <div  class="col-10">
                                        <label class="text-dark mt-2 mb-1">Apellido materno del tutor</label>
                                        <input type="text" maxlength="30" class="form-control" value="{{ $tutor->apellidoM }}" name="apellidoM"  id="apellidoM">

                                        @error ('apellidoM')

                                        <small class="text-danger">{{$message}}</small>

                                        @enderror
                                    </div>

                                    <div  class="col-10">
                                        <label class="text-dark mt-2 mb-1">Genero</label>
                                        <select class="form-select text-center col-12" name="sexo" id="sexo">

                                            <option selected disabled ></option>
                                            {{-- <option selected disabled value="{{ $tutor->sexo }}">{{ $tutor->sexo }}</option> --}}

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

                            <div class="col-6">

                                <div class="row justify-content-center align-items-center g-2">

                                    <div  class="col-10">
                                        <label class="text-dark mt-3 mb-2">Telefono</label>
                                        <input type="text" maxlength="15" class="form-control" value="{{ $tutor->telefono }}" name="telefono"  id="telefono">

                                        @error ('telefono')

                                        <small class="text-danger">{{$message}}</small>

                                        @enderror
                                    </div>

                                    <div  class="col-10">
                                        <label class="text-dark mt-3 mb-2">Telefono Fijo</label>
                                        <input type="text" maxlength="15" class="form-control" value="{{ $tutor->telefonoCasa }}" name="telefonoCasa"  id="telefonoCasa">

                                        @error ('telefonoCasa')

                                        <small class="text-danger">{{$message}}</small>

                                        @enderror
                                    </div>

                                    <div class="col-10">
                                        <label class="text-dark mt-3 mb-2">Direccion / Domicilio</label>
                                        <input type="text" maxlength="50" class="form-control" value="{{ $tutor->direccion }}" name="direccion"  id="direccion" placeholder="">

                                        @error ('direccion')

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
                                    <button type="submit" class="btn btn-success btn-md p-2 widthbutcam opensanscam col-6">Actualizar Tutor</button>
                                </div>
                        </div>

                    </form>

                @else

                    <form action="{{route('tutores.store')}}" method="post" enctype="multipart/form-data">

                        @csrf
                        @method('POST')

                        <h3 class="text-center font-weight-bold">Registro de Tutores</h3>
                        <hr>

                        <div class="mb-1 row justify-content-center align-items-center g-2">

                            <div class="col-6">

                                <div class="row justify-content-center align-items-center g-2">

                                    <div  class="col-10">
                                        <label class="text-dark mt-2 mb-1">Nombre del tutor</label>
                                        <input type="text" maxlength="30" class="form-control" value="{{ old('nombre') }}" name="nombre"  id="nombre">

                                        @error ('nombre')

                                        <small class="text-danger">{{$message}}</small>

                                        @enderror
                                    </div>

                                    <div  class="col-10">
                                        <label class="text-dark mt-2 mb-1">Apellido paterno del tutor</label>
                                        <input type="text" maxlength="30" class="form-control" value="{{ old('apellidoP') }}" name="apellidoP"  id="apellidoP">

                                        @error ('apellidoP')

                                        <small class="text-danger">{{$message}}</small>

                                        @enderror
                                    </div>

                                    <div  class="col-10">
                                        <label class="text-dark mt-2 mb-1">Apellido materno del tutor</label>
                                        <input type="text" maxlength="30" class="form-control" value="{{ old('apellidoM') }}" name="apellidoM"  id="apellidoM">

                                        @error ('apellidoM')

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

                            <div class="col-6">

                                <div class="row justify-content-center align-items-center g-2">

                                    <div  class="col-10">
                                        <label class="text-dark mt-3 mb-2">Telefono</label>
                                        <input type="text" maxlength="15" class="form-control" value="{{ old('telefono') }}" name="telefono"  id="telefono">

                                        @error ('telefono')

                                        <small class="text-danger">{{$message}}</small>

                                        @enderror
                                    </div>

                                    <div  class="col-10">
                                        <label class="text-dark mt-3 mb-2">Telefono Fijo</label>
                                        <input type="text" maxlength="15" class="form-control" value="{{ old('telefonoCasa') }}" name="telefonoCasa"  id="telefonoCasa">

                                        @error ('telefonoCasa')

                                        <small class="text-danger">{{$message}}</small>

                                        @enderror
                                    </div>

                                    <div class="col-10">
                                        <label class="text-dark mt-3 mb-2">Direccion / Domicilio</label>
                                        <input type="text" maxlength="50" class="form-control" value="{{ old('direccion') }}" name="direccion"  id="direccion" placeholder="">

                                        @error ('direccion')

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
                                    <button type="submit" class="btn btn-success btn-md p-2 widthbutcam opensanscam col-6">Registrar Tutor</button>
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
