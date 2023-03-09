@extends('adminlte::page')

@section('title', 'Docentes')

{{-- @section('plugins.Sweetalert2',true) --}}

@section('content_header')
<h1 class="font-weight-bold">Plantilla de Docentes</h1>
@stop

@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="container mt-5">

    <div class="row justify-content-center align-items-center g-2">

        <div class="col-11">

            <div class="row ">

                <div class="col-12 mb-3">

                    <form action="{{ route('docentes.list') }}" method="GET">
                        <div class="form-row">
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="texto" id="" placeholder="Nombre o RFC del Docente " value="{{ $texto }}">
                            </div>
                            <div class="col-auto">
                                <input class="btn btn-info" type="button" value="Buscar Docente">
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
                                    <th scope="col">Apellidos</th>
                                    <th scope="col">RFC</th>
                                    <th scope="col">Materia</th>
                                    <th scope="col">Ver detalles</th>
                                </tr>
                            </thead>
                            <tbody>

                                @if (count($docentes)<=0)
                                    <tr>
                                        <td colspan="6">
                                            No hay Resultados
                                        </td>
                                    </tr>
                                @else
                                    @foreach ($docentes as $docente)
                                        <tr>
                                            <th scope="row">{{$docente->id}}</th>
                                            <td>{{$docente->nombre}}</td>
                                            <td>{{$docente->apellidoP}} {{$docente->apellidoM}}</td>
                                            <td>{{$docente->RFC}}</td>
                                            <td>{{$docente->materia->nombre}}</td>
                                            <td class="text-center">

                                                <div class="row justify-content-center align-items-center g-2">

                                                    <div class="col-4">

                                                        <a class="cursor-active btn btn-primary btn-md" href="{{route('docentes.show', $docente->id)}}">
                                                            <i class="fas fa-eye"></i>
                                                        </a>

                                                    </div>
                                                    <div class="col-4">
                                                        <a class=" cursor-active btn btn-success btn-md" href="{{route('docentes.edit', $docente->id)}}">
                                                            <i class="fas fa-pen"></i>
                                                        </a>
                                                    </div>

                                                    <div class="col-4">

                                                        <form action="{{route('docentes.destroy', $docente->id)}}" method="POST" class="formeliminar">
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

    </div>


</div>

<div class="row mb-3 mt-2">
    <div class="offset-3 col-9 justify-content-center">
        <div class="d-flex justify-content-center">
            {!! $docentes->links() !!}
        </div>
    </div>
</div>

<script>

    @if (session('eliminar') == 'Listo')

    Swal.fire(
        '¡Eliminado!',
        'El registro ha sido eliminado con éxito!',
        'success'
    )

    @endif

    $(".formeliminar").on("submit", function(e) {

            e.preventDefault();

                Swal.fire({
                    title: '¿Estas seguro?',
                    text: "¡Este registro se eliminará definitivamente!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '¡Sí, elimínalo!',
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
