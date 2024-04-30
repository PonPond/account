<?php

namespace Database\Factories;
use App\Models\Debtor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
class DebtorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Debtor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'debtors_name' => $this->faker->name(['stang']),
            'debtors_address' => $this->faker->address(['test']),
            'debtors_id' => Str::random(10),
            'debtors_phone' => $this->faker->phoneNumber(['0812345667']),
            'debtors_id_image' => 'path/to/image',
            'type' => $this->faker->randomElement(['รายวัน']),
            'per' => $this->faker->randomElement(['5', '10']),
            'total_debts' => $this->faker->numberBetween(1000, 1000000),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
