<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /* For One User */ 
         User::insert([
            'name'    =>'Sunny Kumar',
            'email'   =>'sunnyk.kongu@gmail.com',
            'email_verified_at' => now(),
            'mobile'   =>'9546860752',
            'password'=>Hash::make('12345678') // <---- check this
        ]);
    }
}
