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
        $category = ['electronic','household','wearable'];
        return [
            "name" => $this->faker->name,
            "description" => $this->faker->name,
            "price" => $this->faker->numberBetween(10,100),
            "quantity"=> $this->faker->numberBetween(30,100),
            "category"=>$category[array_rand($category)],
            "pictureURL"=> asset('assets/img/theme/angular.jpg')
            //
        ];
    }

}
