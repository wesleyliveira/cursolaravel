<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::create([
            'firstName'=>'Wesley',
            'lastName'=>'Reis',
            'email'=>'contato@wesley.com',
            'password'=>bcrypt('9103'),
        ]);

        User::create([
            'firstName'=>'Wesley',
            'lastName'=>'Reis',
            'email'=>'contato@wesleyreis.com',
            'password'=>bcrypt('9103'),
        ]);
    }
}
