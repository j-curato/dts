<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class products extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {		
    	  $faker = Faker::create();
    	  foreach (range(1, 10) as $index) {
          DB::table('products')->insert([
            'log_ref_number' => $faker ->name,
            'date_received' => $faker ->date,
            'type_of_transmittal' => $faker ->username,
            'origin' => $faker ->name,
            'subject' => $faker ->name,
            'rds_instruction' => $faker ->name,
            'route_to' => $faker->name,
            'date_released' =>$faker->name,
            'action'=>$faker->name,
            'year'=>$faker->year,
        ]);
    }
  }
}
