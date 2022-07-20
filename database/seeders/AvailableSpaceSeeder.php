<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AvailableSpaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('available_spaces')->insert([
            'space_type_id'=>2,
            'user_id'=>3,
            'latitude'=>'26.412806',
            'longitude'=>'70.766330',
            'status'=>false,
            'comments'=>Str::random(20)
        ]);
    }
}
