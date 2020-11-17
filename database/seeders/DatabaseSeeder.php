<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        for ($x = 0; $x <= 3; $x++) {
            DB::table('products')->insert([
                'name' => Str::random(10),
                'description' => Str::random(10).'@gmail.com',
                'price' => rand(10,100),
            ]);        }
//         \App\Models\User::factory(10)->create();
    }
}
