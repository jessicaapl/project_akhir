<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

User::create([
    'name' => 'piket',
    'email' => 'gurupiket@mail.com',
    'password' => Hash::make('123456'),
    'api_token' => Str::random(60),
]);

class InitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    }
}