@extends('adminlte::page')

@section('title', 'Tutorados')

{{-- @section('plugins.Sweetalert2',true) --}}

@section('content_header')
    <h1 class="font-weight-bold">Asignar un Rol</h1>
@stop

@section('content')



    <div class="container-fluid mt-3">

        <div class="row justify-content-center align-items-center g-2">

            <div class="card col-12 p-4">
                <div class="card-body">
                    <p class="h5">Nombre:</p>
                    <p class="form-control">{{ $user->name }}</p>

                    <h2 class="h5">Listado de Roles</h2>

                    <form action="{{route('admin.users.update', $user)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div  class="col-11">
                            @foreach ($roles as $rol)
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" name="rol" value="{{ $rol->id }}">
                                  <label class="form-check-label" for="">
                                    <strong>{{ $rol -> name }}</strong>
                                  </label>
                                </div>
                            @endforeach
                        </div>

                        <div class="mb-1 mt-2 row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-success mt-2">Asignar Rol</button>
                            </div>
                    </div>

                    </form>

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
