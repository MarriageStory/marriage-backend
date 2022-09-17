<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id' => '1',
            'name' => 'WeddingOrganize',
            'email' => 'ceddingOrganize@gmail.com',
            'password' => bcrypt('weddingorganize'),
        ]);

        DB::table('users')->insert([
            'role_id' => '2',
            'name' => 'Client',
            'email' => 'client@gmail.com',
            'password' => bcrypt('client'),
        ]);

        DB::table('users')->insert([
            'role_id' => '3',
            'name' => 'employee',
            'email' => 'employee@gmail.com',
            'password' => bcrypt('employee'),
        ]);
    }
}
