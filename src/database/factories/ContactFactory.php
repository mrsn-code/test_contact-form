<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition()
  {
    $date = $this->faker->date();
    return [
      'category_id' => $this->faker->numberBetween(1, 5),
      'first_name' => $this->faker->firstName(),
      'last_name' => $this->faker->lastName(),
      'gender' => $this->faker->numberBetween(1,3),
      'email' => $this->faker->safeEmail(),
      'tel' => $this->faker->randomElement(['090', '080', '070', '060', '050']).$this->faker->numerify('########'),
      'address' => $this->faker->randomElement(['北海道', '青森', '東京', '名古屋', '大阪', '鹿児島', '沖縄'])
                    .$this->faker->city().$this->faker->streetAddress(),
      'building' => $this->faker->randomElement(['〇〇ビル', '△△ビル', '××ビル']),
      'detail' => $this->faker->randomElement(['質問1', '質問2', '質問3', '質問4']),
      'created_at' => $date,
      'updated_at' => $date,
    ];
  }
}
