<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storege;
use DB;

use App\Product;

class adminController extends Controller
{
    //

    public function postAddProduct(Request $request){
        $this->validate($request,

            [
                'name' => 'required|min:3',
                'description' => 'required',
                'unit_price' => 'required',
                'image'=>'required'
            ],
            [
                'name.required' => 'Bạn chưa nhập tên người dùng',
                'description.required'=>'Bạn chưa nhập mô tả',
                'unit_price.required'=>'Bạn chưa nhập giá tiền sản phẩm'
            
            ]);

            $product = new Product;
            $product->name = $request->name;
            $product->description = $request->description;
            $product->unit_price = $request->unit_price;
            $product->image = $request->image;

            $product->save();

            return redirect('add_product') -> with('thongbao','Đăng kí thành công');

    }

    public function listProduct(){
        $list = Db::table('products')->select('products.*')->get();

        return view('list_product',['list'=>$list]);
    }

    
}
