<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'joshua saavedra',
            'email' => 'joshuainegosaavedra@gmail.com',
            'username' => 'joshuainego',
            'password' => bcrypt('your-password'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
