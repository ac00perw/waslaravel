<?php

use Illuminate\Database\Seeder;
use App\Models\Waste;

class WasteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Models\Waste::class, 30)->create();
    }
}
