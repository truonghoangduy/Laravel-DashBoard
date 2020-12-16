<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Role;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $roleArr = ["Admin","Editor","Customer"];
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
//            'role' => $roleArr[array_rand($roleArr)],
            'role_id'=> Role::all()->random()->id,
            'email_verified_at' => now(),
            'password' => '$2y$10$lnwdyN1RuIsv2SmEdLlNcOz5sJkrrNdm4SAg6tFz60v1O8pRYn7N.', // password
            'remember_token' => Str::random(10),
        ];
    }
}
