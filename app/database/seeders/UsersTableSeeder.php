<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([
            'name' => '管理者ユーザ1',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ]);
    }
}
