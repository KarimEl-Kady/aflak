<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = Factory::create();
        // for ($i = 0; $i < 3; $i++) {

            $data["name"] = 'karim';
            $data["password"] = Hash::make(123123123);
            $data["email"] = 'karim@admin.com';
            $data["email_verifiy"] = 1;
            $data["status"] = 2;
            $data["phone"] = '123123132';
            $data["company_name"] = $faker->text(15);
            $data["company_address"] = $faker->text(50); //
            $data["commercial_register_number"] = $faker->text(15);
            $data["company_website"] = $faker->text(20);
            $data["tax_number"] = $faker->text(15);

            User::create($data);
        // }
    }
}
