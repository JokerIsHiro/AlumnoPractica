<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfesorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            DB::table("profesor")->insert([
                "name" => fake()->name(),
                "phone" => fake()->phoneNumber(),
                "age" => fake()->numberBetween(6,  60),
                "passwd" => fake()->password(),
                "email" => fake()->unique()->safeEmail(),
                "gender" => fake()->randomElement(["Male", "Female"]),
            ]);
        }
    }
}
