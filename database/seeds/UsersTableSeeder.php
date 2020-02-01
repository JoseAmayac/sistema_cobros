<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //************** ADMINISTRADORES **********************
        $admin = new User(); // id => 1
        $admin->name = "Admin";
        $admin->lastname = 'admin';
        $admin->email = 'admin@gmail.com';
        $admin->password = 'admin'; 
        $admin->role_id = Role::where('name', 'admin')->first()->id;
        //$admin->role_id = 1;
        $admin->save();

        $admin2 = new User(); // id => 2
        $admin2->name = "Admin2";
        $admin2->lastname = 'admin2';
        $admin2->email = 'admin2@gmail.com';
        $admin2->password = 'admin2'; 
        $admin2->role_id = Role::where('name', 'admin')->first()->id;
        //$admin2->role_id = 1;
        $admin2->save();

        // ************** COBRADORES **********************
        $employee = new User(); // id => 3
        $employee->name = "cobrador 1";
        $employee->lastname = "Apellidos 1";
        $employee->dni = "1234563564";
        $employee->cellphone = "3114707230";
        $employee->address = "Cra 7 # 8-21";
        $employee->role_id = Role::where('name', 'employee')->first()->id;
        //$employee->role_id = 2;
        $employee->state = true;
        // $employee->vehicle_id = 1; =====> seeder "VehicleEmployeeSeeder"
        $employee->admin_id = 1;
        $employee->save();

        $employee2 = new User(); // id => 4
        $employee2->name = "cobrador 2";
        $employee2->lastname = "Apellidos 2";
        $employee2->dni = "12342454";
        $employee2->cellphone = "3114707231";
        $employee2->address = "Cra 7 # 9-21";
        $employee2->role_id = Role::where('name', 'employee')->first()->id;
        //$employee2->role_id = 2;
        $employee2->state = true;
        // $employee->vehicle_id = 2; =====> seeder "VehicleEmployeeSeeder"
        $employee2->admin_id = 1;
        $employee2->save();

        // ************** CLIENTES **********************
        $client = new User(); // id => 5
        $client->name = "cliente 1";
        $client->lastname = "Apellidos 1";
        $client->dni = "1234567890";
        $client->cellphone = "3113457536";
        $client->address = "Cra 6 # 7-21";
        $client->role_id = Role::where('name', 'client')->first()->id;
        //$client->role_id = 3;
        $client->admin_id = 1;
        $client->save();

        $client2 = new User(); // id => 6
        $client2->name = "cliente 2";
        $client2->lastname = "Apellidos 2";
        $client2->dni = "123456323";
        $client2->cellphone = "3114707230";
        $client2->address = "Cra 7 # 8-21";
        $client2->role_id = Role::where('name', 'client')->first()->id;
        //$client2->role_id = 3;
        $client2->admin_id = 1;
        $client2->save();

        
    }
}
