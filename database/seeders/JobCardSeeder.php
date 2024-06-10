<?php

namespace Database\Seeders;

use App\Models\JobCard;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobCardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::find(2);
        $jobCard = new JobCard();
        $jobCard->title = 'Create a job card system';
        $jobCard->description = 'Create it with PHP and Laravel';
        $jobCard->requirements = 'Coding skills, PHP & Laravel knowledge';
        $jobCard->creator = $user->id;
        $jobCard->status = 'open';
        $jobCard->save();
    }
}
