<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        DB::table('users')->insert([
            'name' => 'User',
            'uuid'=> Str::uuid(),
            'email' => 'user@gmail.com',
            'password' => bcrypt('user@123'),
            'mobile'=>'9072047610',
        ]);
    }
}
