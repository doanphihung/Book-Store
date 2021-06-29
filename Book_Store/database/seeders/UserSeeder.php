<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
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
        $user = new User();
        $user->name = 'Hung Doan';
        $user->email = 'admin@gmail.com';
        $user->password = Hash::make('123456');
        $user->avatar = 'hung111.jpg';
        $user->save();

        $user = new User();
        $user->name = 'Hung Doan';
        $user->email = 'user@gmail.com';
        $user->password = Hash::make('123456');
        $user->avatar = 'user.JPG';
        $user->save();
    }
}
