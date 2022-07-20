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
            'space_name'=>"My Space 2",
            'space_type_id'=>1,
            'user_id'=>3,
            'latitude'=>'76.412806',
            'longitude'=>'80.766330',
            'status'=>true,
            'comments'=>Str::random(20)
        ]);
    }
}
