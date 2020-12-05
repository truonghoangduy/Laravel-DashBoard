<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\URL;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            "name" => $this->faker->name,
            "description" => $this->faker->name,
            "price" => $this->faker->numberBetween(10,100),
            "pictureURL"=> asset('assets/img/theme/angular.jpg')
            //
        ];
    }

}
