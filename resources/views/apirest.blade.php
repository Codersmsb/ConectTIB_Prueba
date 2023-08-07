@extends('layouts.app')
{{-- VISTA ADMIN --}}
@section('content')
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

        </div>
    </div>
    <br> <br>

        {{-- INFORMACION DE LOS POSTS DE LOS USUARIOS POR USER ID --}}
        <head>
            <title>Posts de {{ $userData->name }}</title>
        </head>
        <body>
            <h1>Información del usuario:</h1>
            <p>Nombre: {{ $userData->name }}</p>
            <p>Email: {{ $userData->email }}</p>
            <!-- Aquí puedes mostrar más información relacionada al usuario si lo deseas -->

            <h1>Posts realizados por {{ $userData->name }}</h1>
            <ul>
                @foreach ($posts as $post)
                    <li>
                        <strong>{{ $post->title }}</strong>
                        <p>{{ $post->body }}</p>
                    </li>
                @endforeach
            </ul>
        </body>


</div>
@endsection
