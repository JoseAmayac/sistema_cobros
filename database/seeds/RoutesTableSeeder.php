<?php

use Illuminate\Database\Seeder;
use App\Route;
use App\User;

class RoutesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Ruta #1.
        $route = new Route();
        $route->name = "Ruta ejemplo";
        $route->ammount = 12.2;
        $route->admin_id = 1;
        $route->save();

        // Ruta #2.
        $route2 = new Route();
        $route2->name = "Ruta ejemplo 2";
        $route2->ammount = 1000.2;
        $route2->admin_id = 1;
        $route2->save();

        // Ruta #3.
        $route3 = new Route();
        $route3->name = "Ruta ejemplo 3";
        $route3->ammount = 1020.2;
        $route3->admin_id = 1;
        $route3->save();

        $clients = User::where('role_id', 3)->update(['route_id' => 1]);

    }
}
