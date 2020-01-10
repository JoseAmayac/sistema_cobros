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
        return Role::create([
            'name' => 'admin',
            'description' => 'Este es el rol del administrador'
        ]);
    }
}
