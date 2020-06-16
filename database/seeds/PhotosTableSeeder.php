<?php

use Illuminate\Database\Seeder;
use App\Photo;

class PhotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_default = new Photo();
        $user_default->route = "default_photo_sin_coincidencias.png";
        $user_default->save();
    }
}
