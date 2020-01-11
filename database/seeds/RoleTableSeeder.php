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
        $role1 = new Role();
        $role1->name = "admin";
        $role1->description = "Este es el rol del administrador";
        $role1->save();

        // return Role::create([
        //     'name' => 'admin',
        //     'description' => 'Este es el rol del administrador'
        // ]);
    }
}
