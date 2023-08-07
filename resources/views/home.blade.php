@extends('layouts.app')
{{-- VISTA ADMIN --}}
@section('content')
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Bienvenido') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>

                    @endif

                    {{ __('Tu eres administrador!') }}


                </div>

            </div>
        </div>
    </div>
    <br> <br>
    <form action="{{ route('buscarUsuarios') }}" method="GET" role="search">
        <div class="input-group">
            <input type="text" class="form-control" name="query" placeholder="Buscar por nombre, cédula, email o celular">
            <span class="input-group-btn">
                <button type="submit" class="btn btn-default">
                    <i class="fas fa-search"></i> Buscar
                </button>
            </span>
        </div>
    </form>
    <br>
        {{-- Tabla para administrar todos los user --}}
        <table class="table table-striped table-bordered table-hover table-dark" style="margin-left: -100px;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Nombre</th>
                    <th>Celular</th>
                    <th>Cédula</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Edad</th>
                    <th>Código</th>
                    <th>Acceso Completo</th>
                    <th>Email Verificado</th>
                    <th>Token de Recuerdo</th>
                    <th>Fecha de Creación</th>
                    <th>Fecha de Actualización</th>

                    <th>Eliminar</th>
                    <th>Modificar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->celular }}</td>
                        <td>{{ $user->cedula }}</td>
                        <td>{{ $user->fnacimiento }}</td>

                        {{-- CALCULAR EDAD --}}
                        @php
                        $fechaNacimiento = \Carbon\Carbon::parse($user->fnacimiento);
                        $edad = $fechaNacimiento->age;
                        @endphp

                        <td>{{ $edad }}</td>
                        <td>{{ $user->codigo }}</td>
                        <td>{{ $user->fullacces }}</td>
                        <td>{{ $user->email_verified_at }}</td>
                        <td>{{ $user->remember_token }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>{{ $user->updated_at }}</td>

                        <td>
                            <a href="{{ route('eliminarUsuario', $user->id) }}"><i class="fas fa-trash-alt"></i></a>
                        </td>
                        <td>
                            <a href="{{ route('modificarUsuario', $user->id) }}"><i class="fas fa-edit"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- VISUALIZAR PAGINACION DE 10 --}}


</div>
@endsection
