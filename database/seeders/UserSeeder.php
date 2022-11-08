<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $postData = [
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' =>  Hash::make('123456'), 
            'remember_token' => Str::random(10),
        ];

      User::create($postData);

    }
}
