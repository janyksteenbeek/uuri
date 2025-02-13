<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Entry;
use App\Models\Project;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class  DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'Janyk Steenbeek',
            'email' => 'janyk@webmethod.nl',
        ]);

        // Create clients for the user
        $clients = Client::factory(5)->create([
            'user_id' => $user->id,
        ]);

        // Create projects for each client
        $clients->each(function ($client) {
            $projects = Project::factory(3)->create([
                'client_id' => $client->id,
            ]);

            // Create entries for each project
            $projects->each(function ($project) {
                Entry::factory(10)->create([
                    'project_id' => $project->id,
                ]);
            });
        });
    }
}
