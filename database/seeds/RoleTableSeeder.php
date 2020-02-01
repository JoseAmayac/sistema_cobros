<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //************ Administrador(1) ***************//
        $role1 = new Role();
        $role1->name = "admin";
        $role1->description = "Este es el rol del administrador";
        $role1->save();

        //************ Cobrador(2) ***************//
        $role2 = new Role();
        $role2->name = "employee";
        $role2->description = "Este es el rol del cobrador";
        $role2->save();

        //************ Cliente(3) ***************//
        $role3 = new Role();
        $role3->name = "client";
        $role3->description = "Este es el rol del cliente";
        $role3->save();

    }
}
