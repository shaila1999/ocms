<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//use Illuminate\Database\Seeders\Seederf;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([

            'name'=>'admin',
            'role'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('12345'),
            'status'=>'active',
            "image" => "admin.png"

            
        ]);
    }
}
