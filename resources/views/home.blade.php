@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                @role('intendente')
                    <div class="card">
                        <div class="card-header">{{ __('Lista de peticiones pendientes INTENDENTE') }}</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <table class="table">
                                <thead>
                                    <tr>

                                        <th scope="col">Acciones</th>
                                        <th scope="col">Nombre solicitante</th>
                                        <th scope="col">Edificio</th>
                                        <th scope="col">Cubo o lugar</th>
                                        <th scope="col">Planta</th>
                                        <th scope="col">Horario recomendado</th>
                                        <th scope="col">Solicitado el día</th>
                                        <th scope="col">Estatus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach ($datos as $key => $datosSolicitud)
                                            <td>
                                                <div class="flex flex-center">
                                                    <button class="btn btn-success">
                                                        Aceptar
                                                    </button>
                                                </div>
                                            </td>
                                            <td>{{ $datosSolicitud->name }}</td>
                                            <td>{{ $datosSolicitud->edificio }}</td>
                                            <td>{{ $datosSolicitud->nombre_area }}</td>
                                            <td>{{ $datosSolicitud->planta }}</td>
                                            <td>{{ $datosSolicitud->horario }}</td>
                                            <td>{{ $datosSolicitud->created_at }}</td>
                                            <td>{{ $datosSolicitud->estatus }}</td>
                                        @endforeach
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                @endrole
                @role('profesor')
                    <div class="card">
                        <div class="card-header">{{ __('Solicitar limpieza') }}</div>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
                                <div class="col">
                                    <label for="exampleFormControlInput1" class="form-label">Nombre</label>
                                    <input class="form-control" type="text" placeholder="Default input"
                                        aria-label="default input example" value="<?= $datosUsuario[0]->name ?>">
                                </div>

                                <div class="col">
                                    <label for="exampleFormControlInput1" class="form-label">Edificio</label>
                                    <input class="form-control" type="text" placeholder="" aria-label="default input example"
                                        value="<?= $datosUsuario[0]->edificio ?>">
                                </div>

                                <div class="col">
                                    <label for="exampleFormControlInput1" class="form-label">Nombre area</label>
                                    <input class="form-control" type="text" placeholder="Default input"
                                        aria-label="default input example" value="<?= $datosUsuario[0]->nombre_area ?>">
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1" class="form-label">Planta</label>
                                    <input class="form-control" type="text" placeholder="Default input"
                                        aria-label="default input example" value="<?= $datosUsuario[0]->planta ?>">
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1" class="form-label">Horario Recomendado</label>
                                    <input class="form-control" type="text" placeholder="Default input"
                                        aria-label="default input example" value="<?= $datosUsuario[0]->horario ?>">
                                </div>
                                <div class="col">
                                    <button class="col btn btn-success"
                                        onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                        {{ __('Solicitar') }}

                                    </button>

                                </div>
                            </div>


                        </div>
                    </div>
                    <br>
                    <div class="card">
                        <div class="card-header">{{ __('Lista de peticiones pendientes PROFESOR') }}</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Horario recomendado</th>
                                        <th scope="col">Solicitado el día</th>
                                        <th scope="col">Estatus</th>
                                        <th scope="col">Realizo</th>
                                        <th scope="col">Acciones</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach ($datosUsuario as $key => $datosSolicitud)
                                            <td>{{ $datosSolicitud->horario }}</td>
                                            <td>{{ $datosSolicitud->created_at }}</td>
                                            <td>{{ $datosSolicitud->estatus }}</td>
                                            <td>Ramon Gomez Lopez</td>
                                            <td>
                                                <div class="flex flex-center">
                                                    <button class="btn btn-success">
                                                        Confirmar asistencia
                                                    </button>
                                                </div>
                                            </td>
                                        @endforeach
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                @endrole

            </div>
        </div>
    </div>
@endsection
