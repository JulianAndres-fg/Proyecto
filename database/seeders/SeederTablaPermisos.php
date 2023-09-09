<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//spatie
use Spatie\Permission\Models\Permission;

class SeederTablaPermisos extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permisos = [

            //tabla roles
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',

            //tabla usuarios
            'ver-usuario',
            'crear-usuario',
            'editar-usuario',
            'borrar-usuario',

            //tabla domos
            'ver-domo',
            'crear-domo',
            'editar-domo',
            'borrar-domo',

            //tabla caracteristica
            'ver-caracteristica',
            'crear-caracteristica',
            'editar-caracteristica',
            'borrar-caracteristica',

            //tabla reserva
            'ver-reserva',
            'crear-reserva',
            'editar-reserva',
            'borrar-reserva',

            //tabla clientes
            'ver-cliente',
            'crear-cliente',
            'editar-cliente',
            'borrar-cliente',

            //tabla metodos de pagp
            'ver-metododepago',
            'crear-metododepago',
            'editar-metododepago',
            'borrar-metododepago',

            //tabla  servicios
            'ver-servicio',
            'crear-servicio',
            'editar-servicio',
            'borrar-servicio',
        ];
        foreach ($permisos as $permiso) {
            Permission::create(['name' => $permiso]);
        }
    }
}
