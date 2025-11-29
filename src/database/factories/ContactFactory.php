<?php

namespace Database\Factories;

use App\Models\Contact;
use App\Models\Category;
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

        //電話番号生成
        $prefix = $this->faker->randomElement(['070','080','090']);
        $telParts = [
            $prefix,
            $this->faker->numberBetween(1000,9999),
            $this->faker->numberBetween(1000,9999),
        ];

        return [
            'last_name' => $this->faker->lastName,'first_name' => $this->faker->firstName,
            'gender' => $this->faker->numberBetween(1,3),
            'email' => $this->faker->unique()->safeEmail,
            'category_id' => Category::inRandomOrder()->first()->id,
            'tel' => implode('-',$telParts),
            'address' =>$this->faker->streetAddress,
            'building' => $this->faker->secondaryAddress,
            'detail' => $this->faker->realText(100)


        ];
    }
}
