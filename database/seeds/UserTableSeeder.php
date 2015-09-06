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
            'firstName' => 'Sam',
            'lastName' => 'Jackson',
            'email' => 'sam@gmail.com',
            'gender' => 'male',
            'dateOfBirth' => '2000-06-06',
            'password' => bcrypt('secret'),
        ]);

        DB::table('users')->insert([
            'firstName' => 'Kristen',
            'lastName' => 'Grey',
            'email' => 'kristen@gmail.com',
            'gender' => 'female',
            'dateOfBirth' => '1993-05-11',
            'password' => bcrypt('secret'),
        ]);

        DB::table('users')->insert([
            'firstName' => 'Joey',
            'lastName' => 'Tribiany',
            'email' => 'joey@gmail.com',
            'gender' => 'male',
            'dateOfBirth' => '2000-09-02',
            'password' => bcrypt('secret'),
        ]);

    }
}
