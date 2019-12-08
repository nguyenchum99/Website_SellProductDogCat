<!doctype html>
<html lang="en">
  <head>
    <title>Chăm sóc thú cưng</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('css/home.css')}}">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  </head>

  <body>

@if(Auth::check())
    <div id = "container">
        <nav class="navbar navbar-inverse"
         style="background: #0066cc; border-color:#0066cc;">
            <div class="container-fluid" style="margin-left: 40px">
              <div class="navbar-header">
                <a class="navbar-brand" href="#" style="color:#ffffff">Nhom10</a>
              </div>
              <ul class="nav navbar-nav" >
                <li><a href="{{url("home/{$bill->id}")}}" style="color:#ffffff">Trang chủ</a></li>
                <li><a href="{{url("shopping")}}" style="color:#ffffff">Sản phẩm </a>
                </li>
                <li><a href="#" style="color:#ffffff">Tin tức</a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right" style="color:#ffffff; margin-right: 40px">
                <li><a href="#"  style="color:#ffffff"><span class="glyphicon glyphicon-shopping-cart"></span> Giỏ hàng</a></li>
                <li ><a href="#"  style="color:#ffffff" class="dropdown-toggle" data-toggle="dropdown" 
                    role="button" aria-expanded="false"
                    ><span class="glyphicon glyphicon-user"></span> {{Auth::user()->name}}<span class="caret"></span></a>
    
                    <ul class="dropdown-menu" role="menu" >
                        <li><a href="{{url('edit_info/'.Auth::user()->id)}}">
                        <i class="fa fa-gear fa-fw" ></i> Thông tin cá nhân</a>
                        </li>
        
                        <li class="divider"></li>
                        <li><a href="{{url("logout")}}"><i class="fa fa-sign-out fa-fw" ></i>Đăng xuất</a>
                        </li>
                      </ul>
                </li>

              </ul>
            </div>
          </nav>

          <div id = "main" style="margin-left: 100px; margin-top: 50px">

              <div class="row">

                <div class="left col-sm-7">
                <h3><b>Giỏ hàng của bạn</b></h3>
                @if(session('thongbao'))
                
                <div class="alert alert-success" style="width: 40%">
                    {{session('thongbao')}}
                </div>
                
                @endif
                <table  class="table table-striped">
                        <tr id="tbl-first-row" style="font-weight: bold;">
                           
                            <td width="5%">Ảnh sản phẩm</td>
                            <td width="20%">Tên sản phẩm</td>
                            <td width="5%">Đơn giá (đồng)</td>
                            <td width="5%">Xóa</td>
                        </tr>
                    
                
                        {{-- lấy dữ liệu từ database hiện thị lên view --}}
                        @foreach ($detail as $l)
                            <tr>
                                <td><center><img src="{{URL::asset('/img/banhang/'.$l->image)}}" width="70" height="70"></center></td>
                                <td>{{$l->name}}</td>
                                <td>{{$l->unit_price}} </td>
                                <td><a  onclick="return xacnhanxoa('Bạn Có Chắc Là Muốn Xóa Không?')" href="{{url("delete/{$bill->id}/{$l->id}")}}"> Xóa</a>
                                </td>
                            </tr>
                        @endforeach
                        
                </table>

                <h4 style="color: red"><b>Tổng tiền: {{$total}} đồng</b></h4>
                <label>Phương thức thanh toán </label>
                <select style="padding:3px;background-color: #ededed;margin-bottom: 10px"
                id ="select" name="option" value="{{$bill->payment}}" >
                    <option  value="Thẻ">Thẻ</option>
                    <option value="Tiền mặt">Tiền mặt</option>
                </select>

                <br><button type="submit" class="btn btn-primary" ><a href="{{url("order/{$bill->id}/{$total}")}}" 
                   style="text-decoration: none; color: #ffffff">Đặt hàng</a></button>
                {{-- <form action="#" method="post">
                    <label>Phương thức thanh toán </label>
                    <select style="padding:3px;background-color: #ededed;
                    "id ="select" name="option" value="{{$bill->payment}}" >
                        <option  value="Thẻ">Thẻ</option>
                        <option value="Tiền mặt">Tiền mặt</option>
                    </select>
                    <br><input type="submit" value="Đặt hàng"  class="btn btn-primary" >
                </form> --}}
                </div>
                <div class="col-sm-4 right" style="margin-top: 20px">
                    <h4>Đơn hàng đã đặt</h4>
                    <table border="2" class="table table-striped">
                        <tr id="tbl-first-row" style="font-weight: bold;">
                           
                            <td width="5%">Mã đơn hàng</td>
                            <td width="10%">Ngày đặt</td>
                            <td width="5%">Tổng tiền (đồng)</td>
                        </tr>
                    
                
                        {{-- lấy dữ liệu từ database hiện thị lên view --}}
                        @foreach ($bills as $b)
                         @if($b->total != 0)
                            <tr>
                                <td>{{$b->id}}</td>
                                <td>{{$b->updated_at}}</td>
                                <td>{{$b->total}}</td>
                            </tr>
                          @endif
                        @endforeach
                        
                </table>

                  

                </div>
        
        </div>
    </div>
</div>

    
@endif

<script>
  function xacnhanxoa (xoa){

      if (window.confirm(xoa)) {
          return true;
      }
      return false;
  }
  $("div.alert").delay(1000).slideUp();
</script>

  </body>
</html>