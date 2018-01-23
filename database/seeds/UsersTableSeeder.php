<?php

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
        DB::table('users')->truncate();
        
        DB::table('users')->insert([
            'name' => 'Admin User',
            'email' => 'admin@test.com',
            'password' => bcrypt('secret'),
            'is_admin' => 1
        ]);
    }
}
