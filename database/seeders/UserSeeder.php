<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seedData = Faker::create();
        
        for ($i = 0; $i < 1500; $i++) {
            User::insert([
                'profile_img' => $seedData->imageUrl(200, 200),
                'name' => $seedData->name,
                'email' => $seedData->unique()->safeEmail,
                'email_verified_at' => now(),
                'mobile' => $seedData->phoneNumber,
                'father_name' => $seedData->firstNameMale . ' ' . $seedData->lastName,
                'mother_name' => $seedData->firstNameFemale . ' ' . $seedData->lastName,
                'address' => $seedData->address,
                'city' => $seedData->city,
                'post_code' => $seedData->postcode,
                'password' => Hash::make('12345678'),
            ]);
        }        
    }
}
