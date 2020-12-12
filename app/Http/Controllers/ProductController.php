<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use MongoDB\Driver\Query;
use phpDocumentor\Reflection\Types\Nullable;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
//     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
//        $products = DB::table('products')->get()->toArray();
//        $products = Product::all()->toArray();

        $listOfProduct = Product::query();

        if ($request->has("keyword")){
            $listOfProduct->where("name","like",("%".$request->get("keyword")."%"));
        }
        if ($request->has("date")){
            $listOfProduct->whereDate("created_at","==",$request->get("date"));
        }


//        dd($listOfProduct);
        $listOfProduct->orderBy("created_at",'DESC');
        $products = $listOfProduct->get();
        //
        return view('layouts.dashboard-product-list',['listOfProduct'=>$products])->with("jsAlert","321321312321");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('layouts.dashboard-product-add');

        //
    }
    public function store(Request $request)
    {
        $validateResult =  $request->validate([
            'product-upload-image'=> 'nullable|mimes:jpg,jpeg,png,xlx,xls,pdf|max:2048'
        ]);
        if ($request->hasFile('product-upload-image')){
            $uploadedFile = $request->file('product-upload-image');
            $uploadFilePath= $uploadedFile->storeAs('uploads',
                $uploadedFile->getClientOriginalName(), 'public');

            if ($uploadFilePath){
                if ($validateResult){
                    $fileToURL = '/storage/' . $uploadFilePath;
                    $product = new Product(
                        array('name'=>$request->input('name'),
                            'description'=>$request->input('description'),
                            'pictureURL'=>$fileToURL,
                            'price'=>$request->input('price')));

                    $insertReuslt =  $product->save();
//                    $product->name = $request->name();
//                    $product->description = $request->description();
//                    $product->save();
                    return redirect()->route('products.index')->with("messages","Create product successful");
                }
            }
        }

        //

//        if ($request->hasFile('product-upload-image')){
//            dd("TRUE");
//        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $product = DB::table('products')->find($id);
        return view('layouts.dashboard-product-view-detail',['productDetail'=>$product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = DB::table('products')->find($id);
        return view('layouts.dashboard-product-edit',['productDetail'=>$product]);
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
        $product =  Product::query();
        $productUpdatedInfo = $request->all(['name','description','price','pictureURL']);
//        dd($productUpdatedInfo);
        if ($request->hasFile('product-upload-image')) {
            $uploadedFile = $request->file('product-upload-image');
            $uploadFilePath = $uploadedFile->storeAs('uploads',
                $uploadedFile->getClientOriginalName(), 'public');


            if ($uploadFilePath) {
                $fileToURL = '/storage/' . $uploadFilePath;
                $productUpdatedInfo["pictureURL"] = $fileToURL;

            }
        }
        DB::table('products')->where('id','=',$id)->update($productUpdatedInfo);
        return redirect()->route('products.index')->with("messages","Update Product ID:$id");
//
//                $product = new Product()-;
//
//                $insertReuslt =  $product->save();
//                    $product->name = $request->name();
//                    $product->description = $request->description();
//                    $product->save();
//                return redirect()->route('products.index')->with("result",$insertReuslt);
        //
    }

//    /**
//     * Remove the specified resource from storage.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
    public function destroy($id)
    {
        $product = DB::table('products')->where('id','=',$id);
        if ($product->delete()){
            return redirect()->route('products.index')->with("messages","Delete Product ID:$id");
        }
    }
}
