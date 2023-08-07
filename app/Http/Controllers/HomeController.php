<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('soloadmin',['only'=>'index']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::select('id', 'email', 'name', 'celular', 'cedula', 'fnacimiento', 'codigo', 'fullacces', 'email_verified_at', 'remember_token', 'created_at', 'updated_at')
        ->get();

        //paginacion 10 usuarios
        $userss = User::paginate(10);

        return view('home',compact('users','userss')); // para el administrador
    }

    public function getUser()
    {
        return view('user'); // para usuarios registrados
    }

    public function eliminarUsuario($id)
    {
        $user = User::find($id);
        if (!$user) {
            // Si no se encuentra el usuario, puedes redirigir a una página de error o mostrar un mensaje
            return redirect()->route('home')->with('error', 'Usuario no encontrado');
        }
        $user->delete();
        return redirect()->route('home')->with('success', 'Usuario eliminado correctamente');
    }

    public function mostrarFormularioModificar($id)
    {
        $user = User::find($id);
        if (!$user) {
            // Si no se encuentra el usuario, puedes redirigir a una página de error o mostrar un mensaje
            return redirect()->route('home')->with('error', 'Usuario no encontrado');
        }

        return view('edit', compact('user')); // Vista para editar al usuario
    }

    public function actualizarUsuario(Request $request, $id)
    {
        $user = User::find($id);
        if (!$user) {
            // Si no se encuentra el usuario, puedes redirigir a una página de error o mostrar un mensaje
            return redirect()->route('home')->with('error', 'Usuario no encontrado');
        }

        // Validar los datos del formulario
        $request->validate([
            'email' => 'required|email|unique:users,email,' . $id,
            'name' => 'required|string|max:100',
            'celular' => 'required|string|size:10',
            'cedula' => 'required|string|size:11',
            'fnacimiento' => 'nullable|date',
            'codigo' => 'required|string|unique:users,codigo,' . $id,
            'fullacces' => 'nullable|in:yes,no',
            'email_verified_at' => 'nullable|date_format:Y-m-d\TH:i',
            // Agrega aquí las validaciones para los demás campos que deseas editar
        ]);

        // Actualizar los datos del usuario con los datos del formulario
        $user->email = $request->input('email');
        $user->name = $request->input('name');
        $user->celular = $request->input('celular');
        $user->cedula = $request->input('cedula');
        $user->fnacimiento = $request->input('fnacimiento');
        $user->codigo = $request->input('codigo');
        $user->fullacces = $request->input('fullacces');
        $user->email_verified_at = $request->input('email_verified_at');
        // Actualiza aquí los demás campos que deseas editar

        $user->save();

        return redirect()->route('home')->with('success', 'Usuario actualizado correctamente');
    }
    //Funcion para consultar usuarios por nombre, cedula, email o celular
    public function buscarUsuarios(Request $request)
    {
        $query = $request->input('query');

        $users = User::where('name', 'LIKE', "%$query%")
            ->orWhere('cedula', 'LIKE', "%$query%")
            ->orWhere('email', 'LIKE', "%$query%")
            ->orWhere('celular', 'LIKE', "%$query%")
            ->get();

        return view('home', ['users' => $users]);
    }
    public function getUserPosts($userId)
    {
        $url = "https://jsonplaceholder.typicode.com/posts?userId=" . $userId;
        $posts = json_decode(file_get_contents($url));

        // Obtener información del usuario por su ID
        $userUrl = "https://jsonplaceholder.typicode.com/users/" . $userId;
        $userData = json_decode(file_get_contents($userUrl));

        return view('homee', compact('userData', 'posts'));
    }



}
