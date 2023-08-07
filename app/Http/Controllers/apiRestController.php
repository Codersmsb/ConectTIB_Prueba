<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class apiRestController extends Controller
{
    public function getUserPosts($userId)
    {
        //el api rest se visualiza por medio de la siguiente ruta = /users/{userId}/posts
        // Ejemplo : http://127.0.0.1:8000/users/8/posts
        $url = "https://jsonplaceholder.typicode.com/posts?userId=" . $userId;
        $posts = json_decode(file_get_contents($url));

        // Obtener información del usuario por su ID
        $userUrl = "https://jsonplaceholder.typicode.com/users/" . $userId;
        $userData = json_decode(file_get_contents($userUrl));

        return view('apirest', compact('userData', 'posts'));
    }
}
