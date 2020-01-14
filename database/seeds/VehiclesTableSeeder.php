<?php

use Illuminate\Database\Seeder;
use App\Vehicle;

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

        $vehicle->save();
    }
}
