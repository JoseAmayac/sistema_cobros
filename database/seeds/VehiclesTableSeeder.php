<?php

use Illuminate\Database\Seeder;
use App\Vehicle;
use App\User;

class VehiclesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vehicle = new Vehicle();
        $vehicle->license_plate = "ABC-123";
        $vehicle->mark = "Amasada";
        $vehicle->model = "2010";
        $vehicle->cylindering = "200";
        $vehicle->papers_due_date = "2020-01-14 14:57:08"; 
        $vehicle->admin_id = User::where('name','admin')->first()->id;
        $vehicle->save();

        $vehicle2 = new Vehicle();
        $vehicle2->license_plate = "DEF-456";
        $vehicle2->mark = "Suzuki";
        $vehicle2->model = "2014";
        $vehicle2->cylindering = "125";
        $vehicle2->papers_due_date = "2021-01-14 14:57:08"; 
        $vehicle2->admin_id = User::where('name','admin')->first()->id;
        $vehicle2->save();
    }
}
