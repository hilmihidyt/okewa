<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name'      => 'Admin',
                'email'     => 'admin@gmail.com',
                'password'  => bcrypt('password')
            ],
            [
                'name'      => 'Demo',
                'email'     => 'demo@gmail.com',
                'password'  => bcrypt('password')
            ]
        ];
        DB::table('users')->insert($data);
    }
}
