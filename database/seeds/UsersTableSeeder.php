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
            'name' => 'Dave Samojlenko',
            'email' => 'dave.samojlenko@tbs-sct.gc.ca',
            'password' => bcrypt('secret'),
        ]);
        DB::table('users')->insert([
            'name' => 'Melissa Poon',
            'email' => 'melissa.poon@tbs-sct.gc.ca',
            'password' => bcrypt('secret')
        ]);
    }
}
