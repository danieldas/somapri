<?php

use Illuminate\Database\Seeder;
use App\Models\Usuario;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Usuario::create([
            'nombre' => 'Roberto Carlos',
            'apellido_paterno' => 'Fernandez',
            'apellido_materno' => 'Apaza',
            'ci' => '7282523',
            'cuenta' => 'admin',
            'password' => '123456',
        ]);

        Usuario::create([
            'nombre' => 'Carlos Eduardo',
            'apellido_paterno' => 'Caballero',
            'apellido_materno' => 'Flores',
            'ci' => '7205493',
            'cuenta' => 'carlos',
            'password' => '123456',
        ]);
   }
}