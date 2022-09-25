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
            'role_name' => 'WeddingOrganize',
            'name' => 'WeddingOrganize',
            'email' => 'ceddingOrganize@gmail.com',
            'password' => bcrypt('weddingorganize'),
        ]);

        DB::table('users')->insert([
            'role_name' => 'Client',
            'name' => 'Client',
            'email' => 'client@gmail.com',
            'password' => bcrypt('client'),
        ]);

        DB::table('users')->insert([
            'role_name' => 'Employee',
            'name' => 'Employee',
            'email' => 'employee@gmail.com',
            'password' => bcrypt('employee'),
        ]);
    }
}
