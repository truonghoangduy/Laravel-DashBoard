<?php

namespace Database\Factories;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CartFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cart::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $arrCartStatus = ['pending','shipping','received'];
        return [
            "user_id"=> User::all()->random()->id,
            "cart_status"=> $arrCartStatus[array_rand($arrCartStatus)]
        ];
    }
}
