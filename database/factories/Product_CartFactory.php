<?php

namespace Database\Factories;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Product_Cart;
use Illuminate\Database\Eloquent\Factories\Factory;

class Product_CartFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product_Cart::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "cart_id" => Cart::all()->random()->id,
            "product_id"=>Product::all()->random()->id,
            "quantity"=>$this->faker->numberBetween(3,10),
            //
        ];
    }
}
