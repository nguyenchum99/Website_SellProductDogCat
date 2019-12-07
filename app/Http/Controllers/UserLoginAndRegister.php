<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Bill;
use App\BillDetail;
use App\Product;

use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storege;

class UserLoginAndRegister extends Controller
{
    //

    public function view(){
        return view('index');
    }

    public function getHome(){
        
        $list = DB::table('products')
        ->select('products.id','products.name',
        'products.unit_price','products.image','products.description')->get();
        return view('home',['list'=>$list]);
    }

    public function getLogin(){
        return view('login');
    }

 
    public function login(Request $request){

        $this->validate($request,
        [
            'name'=>'required',
            'password'=>'required'
        ],
        [
            'name.required'=>'Bạn chưa nhập tên đăng nhập',
            'password.required'=>'Bạn chưa nhập mật khẩu'

        ]);


        $credentials = [
            'name' => $request['name'],
            'password' => $request['password']
            
        ];


        if(Auth::attempt([ 'name' => $request->name,
        'password' => $request->password]))
        {
            if(Auth::user()->level == 0)
                return redirect('home');
            else{
                return redirect('add_product');
            }
          
        }
        else{

            return redirect('login') ->with('thongbao','Đăng nhập không thành công');
        }
    }


    public function getLogout(){
        Auth::logout();
        return redirect('index');
    }

    public function getRegister(){
        return view('register');
    }


    public function register(Request $request){

        $this->validate($request,

            [
                'name_re' => 'required|min:3',
                'email' => 'required|email|unique:users,email',
                'pass'=> 'required|min:3|max:30',
                'cpassword' => 'required|same:pass'

            ],
            [
                'name_re.required' => 'Bạn chưa nhập tên người dùng',
                'name_re.min' => 'Tên người dùng phải ít nhất 3 kí tự',
                'email.required' => 'Bạn chưa nhập email',
                'email.email'=> 'Bạn chưa nhập đúng định dạng email',
                'email.unique'=> 'Email đã tồn tại',
                'pass.required'=> 'Bạn chưa nhập mật khẩu',
                'pass.min' => 'Mật khẩu có ít nhất 3 kí tự',
                'pass.max' => 'Mât khẩu có nhiều nhất 30 kí tự',
                'cpassword.required'=> 'Bạn chưa nhập lại mật khẩu',
                'cpassword.same' => 'Mật khẩu bạn nhập lại chưa khớp'

            ]);

            $user = new User;
            $user -> name = $request -> name_re;
            $user -> email = $request -> email;
            $user -> password = bcrypt($request -> pass);
            $user-> level = 0;
            $user->save();

            return redirect('login') -> with('thongbao','Đăng kí thành công');
    }
    
    public function getEditInfo($id){
      
        return view('edit_info');
    }

    public function postEditInfo(Request $request,$id){
        $user = User::find($id);

        $this->validate($request,

        [
            'name' => 'required|min:3',
            'password'=> 'required|min:3',
            'passAgain' => 'required|same:password'

        ],
        [
            'name.required' => 'Bạn chưa nhập tên người dùng',
            'name.min' => 'Tên người dùng phải ít nhất 3 kí tự',
            'password.required'=> 'Bạn chưa nhập mật khẩu',
            'password.min' => 'Mật khẩu có ít nhất 3 kí tự',
            'passAgain.required'=> 'Bạn chưa nhập mật khẩu',
            'passAgain.same' => 'Mật khẩu bạn nhập lại chưa khớp'

        ]);

            $user -> name = $request -> name;
            $user -> password = $request -> password;
            $user->save();
            
            return redirect('login') -> with('thongbao','Sửa thành công');
    }
}
