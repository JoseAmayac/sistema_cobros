<?php

use Illuminate\Database\Seeder;
use App\User;

class VehicleEmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Los cobradores seeder tienen id 3 y 4.
        $employee = User::find(3);
        $employee->vehicle_id = 1; 
        $employee->save();

        $employee2 = User::find(4);
        $employee2->vehicle_id = 2;
        $employee2->save();
    }
}
