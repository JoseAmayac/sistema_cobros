<?php

use Illuminate\Database\Seeder;
use App\RouteUser;

class RouterUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ru = new RouteUser();
        $ru->user_id = 1;
        $ru->route_id = 1;
        $ru->save();

        $ru2 = new RouteUser();
        $ru2->user_id = 2;
        $ru2->route_id = 1;
        $ru2->save();
    }
}
