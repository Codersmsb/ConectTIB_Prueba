@extends('layouts.app')
{{-- VISTA USER PARA EDITAR --}}
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar Informacion') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Edite la informacion de los usuarios admin!') }}
                    <div class="card-body">
                        <form method="POST" action="{{ route('actualizarUsuario', $user->id) }}">
                            @csrf
                            @method('PUT') <!-- Agregamos el método PUT para indicar que es una actualización -->

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- EMPIEZA --}}
                            {{-- CELULAR --}}
                            <div class="row mb-3">
                                <label for="celular" class="col-md-4 col-form-label text-md-end">{{ __('Celular') }}</label>

                                <div class="col-md-6">
                                    <input id="celular" type="text" class="form-control @error('celular') is-invalid @enderror" name="celular" value="{{ $user->celular }}" required autocomplete="celular" autofocus>

                                    @error('celular')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- CEDULA --}}
                            <div class="row mb-3">
                                <label for="cedula" class="col-md-4 col-form-label text-md-end">{{ __('Cedula') }}</label>

                                <div class="col-md-6">
                                    <input id="cedula" type="text" class="form-control @error('cedula') is-invalid @enderror" name="cedula" value="{{ $user->cedula }}" disabled autocomplete="cedula" autofocus>

                                    @error('cedula')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- CODIGO --}}
                            <div class="row mb-3">
                                <label for="codigo" class="col-md-4 col-form-label text-md-end">{{ __('Codigo Ciudad') }}</label>

                                <div class="col-md-6">
                                    <input id="codigo" type="text" class="form-control @error('codigo') is-invalid @enderror" name="codigo" value="{{ $user->codigo }}" required autocomplete="codigo" autofocus>

                                    @error('codigo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- FNACIMIENTO --}}
                            <div class="row mb-3">
                                <label for="fnacimiento" class="col-md-4 col-form-label text-md-end">{{ __('Fecha de Nacimiento') }}</label>

                                <div class="col-md-6">
                                    <input id="fnacimiento" type="date" class="form-control @error('fnacimiento') is-invalid @enderror" name="fnacimiento" value="{{ $user->fnacimiento ? \Carbon\Carbon::parse($user->fnacimiento)->format('Y-m-d') : '' }}" required autocomplete="fnacimiento" autofocus>

                                    @error('fnacimiento')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- FULLACCES --}}
                            <div class="row mb-3">
                                <label for="fullacces" class="col-md-4 col-form-label text-md-end">{{ __('Acceso Completo') }}</label>

                                <div class="col-md-6">
                                    <select id="fullacces" class="form-control @error('fullacces') is-invalid @enderror" name="fullacces" required>
                                        <option value="yes" @if($user->fullacces === 'yes') selected @endif>Yes</option>
                                        <option value="no" @if($user->fullacces === 'no') selected @endif>No</option>
                                    </select>

                                    @error('fullacces')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" disabled autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Guardar Cambios') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
