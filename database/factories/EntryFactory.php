<?php

namespace Database\Factories;

use App\Models\Entry;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class EntryFactory extends Factory
{
    protected $model = Entry::class;

    public function definition(): array
    {
        $startDate = Carbon::parse($this->faker->date());
        $endDate = $startDate->copy()->addMinutes($this->faker->numberBetween(10, 60 * 3));

        return [
            'is_billable' => $this->faker->boolean(),
            'start_date' => $startDate,
            'end_date' => $endDate,
            'description' => $this->faker->text(),
            'title' => $this->faker->sentence(),
            'rate' => $this->faker->randomFloat(),

            'project_id' => Project::factory(),
        ];
    }
}
