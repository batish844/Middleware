<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use App\Models\Student;

class StudentSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            Student::Create([
                'name' => $faker->name,
                'age' => $faker->numberBetween(12, 20), 
                'is_graduate' => $faker->boolean(30)
            ]);
        }
    }
}
