<?php

namespace Database\Seeders;

use App\Models\Report;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            Report::STATUS_NOT_PROCESS_YET,
            Report::STATUS_IN_PROGRESS,
            Report::STATUS_NOT_FORWARDED,
            Report::STATUS_COMPLETED,
        ];

        $types = [
            Report::TYPE_AIR_CONDITIONING,
            Report::TYPE_FURNITURE,
            Report::TYPE_TOILET,
            Report::TYPE_INTERNET,
            Report::TYPE_TEACHING_AIDS,
        ];

        $users = User::where('role', User::TYPE_USER)->pluck('id')->toArray();
        $technicians = User::where('role', User::TYPE_TECHNICIAN)->pluck('id')->toArray();

        if (empty($users) || empty($technicians)) {
            // Handle the case where there are no users or technicians
            echo "No users or technicians found to seed reports.";
            return;
        }

        for ($i = 1; $i <= 10; $i++) {
            Report::create([
                'name' => 'Report ' . $i,
                'reporting_id' => rand(1000, 9000),
                'title' => 'Sample Report Title ' . $i,
                'description' => 'This is a description for report ' . $i,
                'type' => $types[array_rand($types)],
                'attachment' => null,
                'status' => $statuses[array_rand($statuses) != 0],
                'user_id' => $users[array_rand($users) != 0],
                'technician_id' => $technicians[array_rand($technicians) != 0],
            ]);
        }
    }
}
