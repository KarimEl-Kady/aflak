<?php

namespace Database\Seeders;

use App\Models\Advantage\Advantage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdvantageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Advantage::factory(5)->create();
    }
}
