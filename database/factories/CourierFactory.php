<?php

namespace Database\Factories;

use App\Enums\EmploymentStatus;
use App\Enums\EmploymentType;
use App\Models\Courier;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Courier>
 */
class CourierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "id" => fake()->unique()->uuid(),
            "employee_code" => strtoupper(fake()->unique()->bothify('?#?#?#')),
            "full_name" => fake()->name(),
            "email" => fake()->unique()->freeEmail(),
            "phone_number" => fake()->unique()->phoneNumber(),
            "level" => fake()->numberBetween(1, 5),
            "status" => fake()->randomElement(EmploymentStatus::cases()),
            "employment_type" => fake()->randomElement(EmploymentType::cases()),
            "joined_date" => fake()->dateTime()
        ];
    }
}
