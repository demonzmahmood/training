<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
     $user= User::create([
            'username'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('1234'),
            'role'=>'admin'
        ]);
        $user->assignRole('admin');



    }
}
