<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Product_Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cartQuery = Cart::query();
        $cartQuery->orderBy("created_at","desc");

//        if ($request->has("datebetween")){
//            // [0] now     [1] to
//            $dateBetwwen = explode("x",$request->get("datebetween"));
//            $cartQuery->whereDate("created_at",">=",$dateBetwwen[0])->whereDate("created_at","<=",$dateBetwwen[1]);
//        }
//        $cartQuery->orderBy("created_at","desc");
        $listOfCart = $cartQuery->get();

        return view("layouts.cart.dashboard-cart-list",["listOfCart"=>$listOfCart]);
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request){
        $cartQuery = Cart::query();
        if ($request->has("dateFrom") && $request->has("dateTo")){
            if ($request->input("dateFrom") != null && $request->input("dateTo") != null ){
                $dateForm = date("Y-m-d",strtotime($request->input("dateFrom")))." 00:00:00";
                $dateTo = date("Y-m-d",strtotime($request->input("dateTo")))." 23:59:59";
                $cartQuery->where("created_at",">=",$dateForm);
                $cartQuery->where("created_at","<=",  $dateTo);
            }

        }

        if ($request->has("cart_status")){
            $cartQuery->where('cart_status','=',$request->input('cart_status'));
        }
//        if ($request->has("keyword")){
//            $keyword = $request->input("keyword");
//            $cartQuery->where("name","like",("%".$request->get("keyword")."%"));
//        }
        $cartQuery->orderBy("created_at","desc");
//        dd($cartQuery);
        $listOfCart = $cartQuery->get();

        $request->session()->put("filterOption",
            ["dateFrom"=> $request->input("dateFrom"),
                "dateTo"=>$request->input("dateTo"),"selectedOption"=>$request->input('cart_status')]);
        return view("layouts.cart.dashboard-cart-list",["listOfCart"=>$listOfCart]);
//        return view("layouts.cart.dashboard-cart-list",["listOfCart"=>$listOfCart])->with("filteroption",
//            ["dateFrom"=>$dateBetwwen[0],"dateTo"=>$dateBetwwen[1],"keyword"=>$keyword]);
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
        $cart = Cart::query()->where('id','=',$id)->first();
//        dd($cart->product_cart[0]->product);

        $listOfProduct = DB::table("product__carts")
            ->join("products","products.id","=","product__carts.product_id")
            ->where("product__carts.cart_id",'=',$cart->id)->get();
        $cartUserDetail = User::with('role')->find($cart->user_id);
        $cartDetail = ["cart"=>$cart,"userDetail"=>$cartUserDetail,'listOfProduct'=>$listOfProduct];
        return view("layouts.cart.dashboard-cart-edit",["cartDetail"=>$cartDetail]);
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
//        dd($id);
        //

//        dd($request->all('cart_status',));
        $cartInfo = $request->all(['cart_status']);

        $cart = Cart::query()->where('id','=',$id);
        $queryResult = $cart->update($cartInfo);
        if ($queryResult){
            return redirect()->route('carts.show',["cart"=>$id])->with('messages',"Update Cart ID:".$id);
        }
//        $cart->update()
//        dd([$request->input("productID"),$id]);
//        $product = DB::table('product__carts')->where('cart_id','=',$id)->where(
//            "product_id",'=',$request->input("productID")
//        );
//        if ($product->delete()){

//        }
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
        $cart = DB::table('carts')->where('id','=',$id);
        $products_cart = Product_Cart::query()->where('cart_id','=',$id);
        if ($cart){
            $cart->delete();
            $products_cart->delete();
            return redirect()->route('carts.index');
        }

        //
    }

    public function removeproduct($cart,$product)
    {
        $product_cart = Product_Cart::query()
            ->where('cart_id','=',$cart)
            ->where('product_id','=',$product);
        if ($product_cart->delete()){
            return redirect()->route('carts.show',['cart'=>$cart])->with('messages',"Remove Product ID:".$product." from Cart ID:".$cart);;
        }
        //
    }
}
