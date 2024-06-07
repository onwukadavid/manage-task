<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Task::factory()
        ->count(5)
        ->state(new Sequence(
            ['status' => 'not started', 'importance' => 'low'],
            ['status' => 'ongoing', 'importance' => 'medium'],
            ['status' => 'done', 'importance' => 'high']
        ))
        ->create();
    }
}
