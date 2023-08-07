<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class TodosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        //Cargar el usuario admin seeder con los siguientes datos
            $useradmin=User::create([
                'email' => 'administrador@gmail.com', //gmail
                'password' => Hash::make('administrador'), //contraseña encriptada con Hash
                'name' => 'Administrador',//nombre del usuario
                'celular' => '3012690047',//celular
                'cedula' => '1007560555',//cc
                'fnacimiento' => Carbon::now()->subYears(rand(18, 60)),//fecha de nacimiento aleatoria entre 18 a 60 años
                'codigo' => '7600',//codigo de ciudad
                'fullacces' => 'yes', //acceso admin
            ]);
    }
}
