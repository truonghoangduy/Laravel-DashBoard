<?php

namespace Database\Seeders;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Product_Cart;
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
        User::factory(10)->create();
        Product::factory(20)->create();
        Cart::factory(4)->create();
        Product_Cart::factory(4)->create();
//        for ($x = 0; $x <= 3; $x++) {
//            DB::table('products')->insert([
//                'name' => Str::random(10),
//                'description' => Str::random(10).'@gmail.com',
//                'price' => rand(10,100),
//            ]);
//            DB::table('users')->insert([
//                'name' => Str::random(10),
//                'email' => Str::random(10).'@gmail.com',
//                'password' => Str::random(10),
//                'role'=>[User::ADMIN,User::EDITOR,User::CUSTOMER][array_rand([User::ADMIN,User::EDITOR,User::CUSTOMER])],
//            ]);
//
//        }
//         \App\Models\User::factory(10)->create();
    }
}

