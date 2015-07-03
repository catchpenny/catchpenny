<?php

use Illuminate\Database\Seeder;

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
            'firstName' => 'sam',
            'lastName' => 'jackson',
            'email' => 'sam@gmail.com',
            'gender' => 'male',
            'dateOfBirth' => '2000-06-06',
            'password' => bcrypt('secret'),
        ]);

        DB::table('users')->insert([
            'firstName' => 'sam',
            'lastName' => 'jackson 2',
            'email' => 'sam2@gmail.com',
            'gender' => 'male',
            'dateOfBirth' => '2000-06-06',
            'password' => bcrypt('secret'),
        ]);

    }
}
