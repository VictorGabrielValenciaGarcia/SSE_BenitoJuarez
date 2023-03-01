@extends('adminlte::page')

@section('title', 'Materias')

{{-- @section('plugins.Sweetalert2',true) --}}

@section('content_header')
    <h1 class="font-weight-bold">Gestion de Grupos</h1>
@stop

@section('content')

    <div class="container-fluid mt-5">

        <div class="row justify-content-center align-items-center g-2">

            <div class="card offset-1 col-4 p-4">

                <div class="container-fluid">
                @if(isset($materia))

                    <form action="{{route('materias.update'), $materia->id}}" method="POST" enctype="multipart/form-data">

                        @csrf
                        @method('PATCH')

                        <h3 class="text-center font-weight-bold">Actualizacion de Materias</h3>

                        <input type="hidden" name="id" value="{{$materia->id}}">

                        <div class="mb-1 row justify-content-center align-items-center g-2">

                            <div class="col-11">

                                <label class="text-dark mt-3 mb-2">Nombre de la Materias</label>
                                <input type="text" class="form-control" value="{{$materia->nombre}}" name="nombre"  id="nombre"  placeholder="Ej (Formacion Civica II)">

                                @error ('nombre')

                                <small class="text-danger">{{$message}}</small>

                                @enderror
                            </div>
                        </div>

                        <div class="mb-1 row justify-content-center align-items-center g-2">

                            <div class="col-11">

                                <label class="text-dark mt-3 mb-2">Grado de Imparticion</label>

                                <select class="form-select text-center col-12" name="grado" id="grado">

                                    <option selected disabled>-- Selecciona el Grado --</option>

                                    <option value="PRIMERO">PRIMERO</option>
                                    <option value="SEGUNDO">SEGUNDO</option>
                                    <option value="TERCERO">TERCERO</option>

                                </select>
                                @error ('grado')

                                <small class="text-danger">{{$message}}</small>

                                @enderror

                            </div>

                        </div>

                        <div class="mb-1 mt-5 row justify-content-center aling-items-center text-center">
                                <div class="col-6">
                                    <button type="submit" class="btn btn-outline-secondary btn-md p-2 widthbutcam opensanscam disabled">Borrar Formulario</button>
                                </div>

                                <div class="col-6">
                                    <button type="submit" class="btn btn-success btn-md p-2 widthbutcam opensanscam col-12">Actualizar Materia</button>
                                </div>
                        </div>



                    </form>

                @else

                    <form action="{{route('materias.store')}}" method="post" enctype="multipart/form-data">

                        @csrf

                        <h3 class="text-center font-weight-bold">Registro de Materias</h3>

                        <div class="mb-1 row justify-content-center align-items-center g-2">

                            <div class="col-11">

                                <label class="text-dark mt-3 mb-2">Nombre de la Materias</label>
                                <input type="text" class="form-control" value="{{ old('nombre') }}" name="nombre"  id="nombre"  placeholder="Ej (Formacion Civica II)">

                                @error ('nombre')

                                <small class="text-danger">{{$message}}</small>

                                @enderror
                            </div>
                        </div>

                        <div class="mb-1 row justify-content-center align-items-center g-2">

                            <div class="col-11">

                                <label class="text-dark mt-3 mb-2">Grado de Imparticion</label>

                                <select class="form-select text-center col-12" name="grado" id="grado">

                                    <option selected disabled>-- -- --</option>

                                    <option value="PRIMERO">PRIMERO</option>
                                    <option value="SEGUNDO">SEGUNDO</option>
                                    <option value="TERCERO">TERCERO</option>

                                </select>
                                @error ('grado')

                                <small class="text-danger">{{$message}}</small>

                                @enderror

                            </div>

                        </div>

                        <div class="mb-1 mt-5 row justify-content-center aling-items-center text-center">
                                <div class="col-6">
                                    <button type="submit" class="btn btn-outline-secondary btn-md p-2 widthbutcam opensanscam disabled">Borrar Formulario</button>
                                </div>

                                <div class="col-6">
                                    <button type="submit" class="btn btn-success btn-md p-2 widthbutcam opensanscam col-12">Registrar Materia</button>
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
