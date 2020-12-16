<?php

namespace Database\Seeders;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Product_Cart;
use App\Models\Profile;
use App\Models\Role;
use App\Models\User;
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
        $roleArr = ["admin","editor","customer"];

        for ($x = 0; $x < 3; $x++) {
            DB::table('roles')->insert([
               'name'=> $roleArr[$x],
               'description' => Str::random(10).'@gmail.com',
            ]);
        }
        User::factory(3)->create();
        Product::factory(20)->create();
        Cart::factory(4)->create();
        Product_Cart::factory(10)->create();
    }
}

