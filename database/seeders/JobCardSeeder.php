<?php

namespace Database\Seeders;

use App\Models\JobCard\JobCard;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobCardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JobCard::create([
            'title' => 'Create a job card system',
            'description' => 'Create it with PHP and Laravel',
            'requirements' => 'Coding skills, PHP & Laravel knowledge',
            'status' => 'open'
        ]);
    }
}
