<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'role_name' => 'WeddingOrganize',
            'role_slug' => 'WeddingOrganize',
        ]);
        
        DB::table('roles')->insert([
            'role_name' => 'Client',
            'role_slug' => 'Client',
        ]);
        
        DB::table('roles')->insert([
            'role_name' => 'employee',
            'role_slug' => 'employee',
        ]);
    }
}
