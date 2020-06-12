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
<<<<<<< HEAD
        // $this->call(RoleTableSeeder::class);   
        // $this->call(UsersTableSeeder::class);  
        // $this->call(VehiclesTableSeeder::class); 
        // $this->call(VehicleEmployeeSeeder::class);                
        // $this->call(RoutesTableSeeder::class);
=======
        $this->call(RoleTableSeeder::class);   
        $this->call(UsersTableSeeder::class);  
        $this->call(VehiclesTableSeeder::class); 
        $this->call(VehicleEmployeeSeeder::class);                
        $this->call(RoutesTableSeeder::class);
>>>>>>> b553db4662c5bf294f5e88ebdc15c900d1936c32
        $this->call(PhotosTableSeeder::class);
        $this->call(PaymentPlatformsSeeder::class);
        $this->call(CurrencesSeeder::class);
    }
}
