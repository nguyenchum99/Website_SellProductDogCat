<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Bill;
use App\BillDetail;
use App\Product;

use DB;
class shoppingController extends Controller
{
    //

    public function getListProduct(){

        $list = DB::table('products')
        ->select('products.id','products.name','products.unit_price','products.image')->get();

        return view('index',['list'=>$list]);
    }

    public function getSingleProduct($id){

        $product = Product::find($id);

        $list = DB::table('products')
        ->select('products.id','products.name','products.unit_price','products.image')->get();
        return view('single',['product'=>$product,'list'=>$list]);
    }

}
