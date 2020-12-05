<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listOfCart = Cart::all();
        return view("layouts.cart.dashboard-cart-list",["listOfCart"=>$listOfCart]);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cart = DB::table('carts')->find($id);

        $cartProductList = DB::table("product__carts")
            ->where('cart_id','=',$cart->id)->get()->toArray();

        $listOfProductId = array_map(function ($product){
            return $product->product_id;
        },$cartProductList);

        $productAsosiateWithCart = DB::table("products")->whereIn("id",$listOfProductId)->get();
//        $test = DB::table("products")->join("product__carts","products.id",'')
//        dd($productAsosiateWithCart);
        $listOfProduct = DB::table("product__carts")->join("products","products.id","=","product__carts.product_id")
            ->where("product__carts.cart_id",'=',$cart->id)->get();
//        $test =  DB::table("products")->whereIn("id",[])
//        dd($test);

//        dd($listOfProduct);
        $cartUserDetail = DB::table("users")->find($cart->user_id);

//        dd($listOfProduct);
        $cartDetail = ["cart"=>$cart,"userDetail"=>$cartUserDetail,'listOfProduct'=>$listOfProduct];
        return view("layouts.cart.dashboard-cart-edit",["cartDetail"=>$cartDetail]);


        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
//        dd([$request->input("productID"),$id]);
        $product = DB::table('product__carts')->where('cart_id','=',$id)->where(
            "product_id",'=',$request->input("productID")
        );
        if ($product->delete()){

            return redirect()->route('carts.show',["cart"=>$id]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param  int $productID
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


        //
    }
}
