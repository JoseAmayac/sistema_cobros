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
        //$vehicle->admin_id = User::where('name','admin')->first()->id;
        $vehicle->admin_id = 1;
        $vehicle->save();

        $vehicle2 = new Vehicle();
        $vehicle2->license_plate = "DEF-456";
        $vehicle2->mark = "Suzuki";
        $vehicle2->model = "2014";
        $vehicle2->cylindering = "125";
        $vehicle2->papers_due_date = "2021-01-14 14:57:08"; 
        //$vehicle2->admin_id = User::where('name','admin')->first()->id;
        $vehicle2->admin_id = 1;
        $vehicle2->save();

        $vehicle3 = new Vehicle();
        $vehicle3->license_plate = "LUC-001";
        $vehicle3->mark = "Yamaha";
        $vehicle3->model = "2020";
        $vehicle3->cylindering = "100";
        $vehicle3->papers_due_date = "1999-01-14 14:57:08"; 
        $vehicle3->admin_id = 2;
        $vehicle3->save();

    }
}
