@extends('adminlte::page')

@section('title', 'Administradores')

{{-- @section('plugins.Sweetalert2',true) --}}

@section('content_header')
    <h1 class="font-weight-bold">Lista de Usuarios</h1>
@stop

@section('content')

@if (session('info'))
<div class="alert alert-success">
  <strong>{{ session('info') }}</strong>
</div>

@endif

<div class="container mt-5">

    <div class="row justify-content-center align-items-center g-2">

        <div class="col-10">

            <div class="row ">

                <div class="col-12 mb-3">

                    <form action="{{ route('admin.users.index') }}" method="GET">
                        <div class="form-row">
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="texto" id="" placeholder="Nombre o correo del Usuario " value="{{ $texto }}">
                            </div>
                            <div class="col-auto">
                                <input class="btn btn-info" type="button" value="Buscar Usuario">
                            </div>
                        </div>
                    </form>

                </div>

                <div class="col-12">
                    <div class="table-responsive table-striped table-bordered table-hover">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#Id</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">E-mail</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>

                                @if (count($users)<=0)
                                    <tr>
                                        <td colspan="4">
                                            No hay Resultados
                                        </td>
                                    </tr>
                                @else
                                    @foreach ($users as $user)
                                        <tr>
                                            <th scope="row">{{$user->id}}</th>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td class="text-center">

                                                <div class="row justify-content-center align-items-center g-2">

                                                    <div class="col-6">

                                                        <a class="cursor-active btn btn-primary btn-md col-12" href="{{route('admin.users.edit', $user->id)}}">
                                                            <i class="fas fa-pen"></i>
                                                        </a>

                                                    </div>
                                                    {{-- <div class="col-3">
                                                        <a class=" cursor-active btn btn-success btn-md col-12" href="{{route('docentes.edit', $docente->id)}}">
                                                            <i class="fas fa-pen"></i>
                                                        </a>
                                                    </div>

                                                    <div class="col-3">

                                                        <form action="{{route('docentes.destroy', $docente->id)}}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger col-12" role="button" type="submit">
                                                            <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>


                                                    </div> --}}

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

    </div>


</div>

<div class="row mb-3 mt-2">
    <div class="offset-3 col-9 justify-content-center">
        <div class="d-flex justify-content-center">
            {!! $users->links() !!}
        </div>
    </div>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
