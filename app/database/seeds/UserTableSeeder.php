<?php

class UserTableSeeder extends Seeder {

    public function run()
    {

        DB::table('users')->delete();
        $usuario = new User;

        $usuario->login = 'admin';
        $usuario->email = 'soporte@microbit.com';
        $usuario->password = Hash::make('Ninguna123');

        $usuario->nombre = '';
        $usuario->primer_apellido = '';
        $usuario->segundo_apellido = '';

        $usuario->id_rol = 1; //1 siempre es administrador
        $usuario->estatus = 1; //1 siempre es activo

        $usuario->save();

    }

}
