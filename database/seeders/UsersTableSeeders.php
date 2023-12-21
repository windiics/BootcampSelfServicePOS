<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
            'name'=>'WindiCS',
            'email'=>'admin@gmail.com',
            'role'=>'admin',
            'password'=> Hash::make('admin1234')
            ],
            [
            'name'=>'Chintya',
            'email'=>'user@gmail.com',
            'role'=>'user',
            'password'=> Hash::make('user1234')
            ]
            ];

    foreach($userData as $key => $val){
        User::create($val);
    }
    }
}
