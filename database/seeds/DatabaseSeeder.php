<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleTableSeeder::class);   
        $this->call(UsersTableSeeder::class);  
        $this->call(VehiclesTableSeeder::class); 
        $this->call(VehicleEmployeeSeeder::class);                
        $this->call(RoutesTableSeeder::class);
        $this->call(PhotosTableSeeder::class);
        $this->call(PaymentPlatformsSeeder::class);
        $this->call(CurrencesSeeder::class);
    }
}
