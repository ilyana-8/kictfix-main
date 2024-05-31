<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'matric_id' => 0000,
            'phone_number' => '0123456789',
            'password' => Hash::make('password'),
            'role' => User::TYPE_ADMIN,
            'profile_image' => null,
            'email_verified_at' => null,
            'remember_token' => null,
        ]);

        User::create([
            'name' => 'Technician (Not Yet Assigned)',
            'email' => 'technician@example.com',
            'matric_id' => 9011,
            'phone_number' => '0145678912',
            'password' => Hash::make('password'),
            'role' => User::TYPE_TECHNICIAN,
            'profile_image' => null,
            'email_verified_at' => null,
            'remember_token' => null,
        ]);

        User::create([
            'name' => 'Ali (Aircond Technician)',
            'email' => 'ali.technician@example.com',
            'matric_id' => 9012,
            'phone_number' => '0134567890',
            'password' => Hash::make('password'),
            'role' => User::TYPE_TECHNICIAN,
            'profile_image' => null,
            'email_verified_at' => null,
            'remember_token' => null,
        ]);

        User::create([
            'name' => 'Abu (Furniture Technician)',
            'email' => 'abu.technician@example.com',
            'matric_id' => 9013,
            'phone_number' => '0156781234',
            'password' => Hash::make('password'),
            'role' => User::TYPE_TECHNICIAN,
            'profile_image' => null,
            'email_verified_at' => null,
            'remember_token' => null,
        ]);

        User::create([
            'name' => 'Chia (Piping Technician)',
            'email' => 'chia.technician@example.com',
            'matric_id' => 9014,
            'phone_number' => '0145678912',
            'password' => Hash::make('password'),
            'role' => User::TYPE_TECHNICIAN,
            'profile_image' => null,
            'email_verified_at' => null,
            'remember_token' => null,
        ]);

        User::create([
            'name' => 'Muhammad',
            'email' => 'muhammad@example.com',
            'matric_id' => 5678,
            'phone_number' => '0102347890',
            'password' => Hash::make('password'),
            'role' => User::TYPE_USER,
            'profile_image' => null,
            'email_verified_at' => null,
            'remember_token' => null,
        ]);

        User::create([
            'name' => 'Danial',
            'email' => 'danial@example.com',
            'matric_id' => 5679,
            'phone_number' => '0113458901',
            'password' => Hash::make('password'),
            'role' => User::TYPE_USER,
            'profile_image' => null,
            'email_verified_at' => null,
            'remember_token' => null,
        ]);

        User::create([
            'name' => 'Haziq',
            'email' => 'haziq@example.com',
            'matric_id' => 5680,
            'phone_number' => '0124569012',
            'password' => Hash::make('password'),
            'role' => User::TYPE_USER,
            'profile_image' => null,
            'email_verified_at' => null,
            'remember_token' => null,
        ]);
    }
}
