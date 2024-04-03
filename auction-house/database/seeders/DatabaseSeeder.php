<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//         Database seeder for admin

        User::firstOrCreate([ 'email' => 'aucadmin@gmail.com'],[
            'first_name' => 'admin',
            'last_name' => 'admin',
            'address' => 'Kathmandu',
            'password' => Hash::make('password'),
            'phone_number' => '+977-9841678632',
            'role' => 'admin',
            'email' => 'aucadmin@gmail.com',
            'status' => 'verified',
        ]);
    }
}
