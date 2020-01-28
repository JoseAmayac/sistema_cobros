<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //************** ADMINISTRADORES **********************
        $admin = new User();
        $admin->name = "Admin";
        $admin->lastname = 'admin';
        $admin->email = 'admin@gmail.com';
        $admin->password = 'admin'; 
        $admin->role_id = Role::where('name', 'admin')->first()->id;
        $admin->save();

        //************** CLIENTES **********************
        $client = new User();
        $client->name = "cliente 1";
        $client->lastname = "Apellidos 1";
        $client->dni = "1234567890";
        $client->cellphone = "3113457536";
        $client->address = "Cra 6 # 7-21";
        $client->role_id = Role::where('name', 'client')->first()->id;
        $client->save();

        $client2 = new User();
        $client2->name = "cliente 2";
        $client2->lastname = "Apellidos 2";
        $client2->dni = "123456323";
        $client2->cellphone = "3114707230";
        $client2->address = "Cra 7 # 8-21";
        $client2->role_id = Role::where('name', 'client')->first()->id;
        $client2->save();

    }
}
