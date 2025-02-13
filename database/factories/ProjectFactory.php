<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ProjectFactory extends Factory
{
    protected $model = Project::class;

    public function definition(): array
    {
        $startDate = Carbon::parse($this->faker->date());
        $endDate = $startDate->copy()->addDays($this->faker->numberBetween(7, 7 * 8));

        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'external_id' => $this->faker->uuid(),
            'start_date' => $startDate,
            'end_date' => $endDate,
            'rate' => $this->faker->randomFloat(),

            'client_id' => Client::factory(),
        ];
    }
}
