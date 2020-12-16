<?php

namespace Database\Factories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Role::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $roleArr = ["admin","editor","customer"];

        return [
            "name"=> $roleArr[array_rand($roleArr,1)],
            'description' => $this->faker->paragraph(random_int(3, 5))
            //
        ];
    }
}
