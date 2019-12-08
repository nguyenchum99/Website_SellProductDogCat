<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Bill;
use App\BillDetail;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storege;

use DB;
class shoppingController extends Controller
{
    //

    public function getListProduct(){

        $list = DB::table('products')
        ->select('products.id','products.name','products.unit_price','products.image')->get();

        return view('index',['list'=>$list]);
    }

    public function getSingleProduct($b,$id){

        $product = Product::find($id);

        $list = DB::table('products')
        ->select('products.id','products.name','products.unit_price','products.image')->get();

        $bill= Bill::find($b);

        return view('single',['product'=>$product,'list'=>$list, 'bill'=>$bill]);
    }

    public function addToCart($b,$id){
        
       $product = Product::find($id);

       $bill_detail = new BillDetail;
       $bill_detail->id_bill = $b;
       $bill_detail->id_product = $id;
       $bill_detail->quantity = 1;
       $bill_detail->unit_price = $product->unit_price;

       $bill_detail->save();

       return redirect('home/'.$b);
         
    }

    public function getCart($id){
        
        $detail = DB::table('products')
        ->join('bill_detail','products.id','=','bill_detail.id_product')
        ->join('bills','bills.id','=','bill_detail.id_bill')
        ->select('products.image','products.unit_price','products.name','bill_detail.id')
        ->where('bills.id',$id)
        ->get();

        $bill_detail = Db::table('bill_detail') ->where('bill_detail.id_bill',$id)
        ->sum(\DB::raw(
            'bill_detail.unit_price
           '));

        $bill = Bill::find($id);

        $bills= DB::table('bills')
        ->select('bills.*')
        ->where('bills.user_id',Auth::user()->id)
        ->get();

        return view('cart',['detail'=>$detail,'total'=>$bill_detail,'bill'=>$bill,'bills'=>$bills]);

        
    }

    public function deleteBillDetail($b,$id){

        $bill_detail = BillDetail::find($id);

        $bill_detail->delete();

        $bill = Bill::find($b);

         return redirect('cart/'.$bill->id)->with('thongbao','Xóa thành công');
    }

    public function postOrder(Request $request,$id, $total){

        $bill = Bill::find($id);
        $bill->total = $total;
        // $bill->payment = $request->payment;
        $bill->save();


        return redirect('cart/'.$id)->with('thongbao','Đặt hàng thành công');
    }

}
