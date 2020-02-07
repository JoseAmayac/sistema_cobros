<?php

use Illuminate\Database\Seeder;
use App\Route;

class RoutesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $route = new Route();
        $route->name = "Ruta ejemplo";
        $route->ammount = 12.2;
        $route->admin_id = 1;
        $route->save();

    }
}
