<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Offer\Offer;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

        //
    public function run()
    {
        $admin = Admin::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'phone' => '123123123',
            'password' => Hash::make(123123123),
            "image" => "uploads/default.jpg"
                ]);
    }
}

