<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('users')->insert([
        //     'name'=>Str::random(5),
        //     'email'=>Str::random(5).'@gmail.com',
        //     'password'=>Hash::make('tamal123')
        // ]);

        DB::table('users')->insert([
            'name'=>'Rahi',
            'email'=>'rahi@gmail.com',
            'password'=>Hash::make('tamal123')
        ]);
    }
}
