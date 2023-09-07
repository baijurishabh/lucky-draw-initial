<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' => 'Admin',
            'uuid'=> Str::uuid(),
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin@123'),
            'mobile'=>'9072047610s',
        ]);
    }
}
