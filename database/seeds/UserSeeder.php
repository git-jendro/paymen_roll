<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin1',
            'email' => 'admin1@gmail.com',
            'password' => Hash::make('123123'),
            'role' => 1,
        ]);
        User::create([
            'name' => 'Finance',
            'email' => 'finance@gmail.com',
            'password' => Hash::make('123123'),
            'role' => 3,
        ]);
        User::create([
            'name' => 'Direktur',
            'email' => 'direktur@gmail.com',
            'password' => Hash::make('123123'),
            'role' => 2,
        ]);
    }
}
