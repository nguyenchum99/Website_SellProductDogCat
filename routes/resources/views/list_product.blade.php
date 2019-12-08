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

                       <li><a href="#" style="color:#ffffff">Sản phẩm </a>
                       </li>
                       <li><a href="#" style="color:#ffffff">Tin tức</a></li>
                     </ul>
                     <ul class="nav navbar-nav navbar-right" style="color:#ffffff; margin-right: 40px">
                       <li><a href="#"  style="color:#ffffff">Quản trị viên</a></li>
                       <li ><a href="#"  style="color:#ffffff" class="dropdown-toggle" data-toggle="dropdown" 
                           role="button" aria-expanded="false"
                           ><span class="glyphicon glyphicon-user"></span>  {{Auth::user()->name}}<span class="caret"></span></a>
           
                           <ul class="dropdown-menu" role="menu" >
                            
                      
                               <li><a href="{{url("logout")}}"><i class="fa fa-sign-out fa-fw" ></i>Đăng xuất</a>
                               </li>
                             </ul>
                       </li>
                     </ul>
                </div>
            </nav>

            <div class="row" style="margin-left: 100px; width: 100%">
                     {{-- thông báo lỗi --}}

                <div class="left col-sm-3">
                    <div class="bg-light border-right" id="sidebar-wrapper" style="margin-top: 30px">
                        <div class="list-group list-group-flush">
                            <a href="{{url("add_product")}}" class="list-group-item list-group-item-action bg-light">Thêm sản phẩm</a>
                            <a href="{{url("list_product")}}" class="list-group-item list-group-item-action bg-light">Danh sách sản phẩm</a>
                            <a href="" class="list-group-item list-group-item-action bg-light">Quản lý tin tức</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-7 right">
                    <h3 style="color:#0059b3;">Danh mục sản phẩm </h3>
                    <table  class="table table-striped">
                            <tr id="tbl-first-row" style="font-weight: bold;">
                               
                                <td width="5%">Ảnh sản phẩm</td>
                                <td width="10%">Tên sản phẩm</td>
                                <td width="5%">Đơn giá (đồng)</td>
                                <td width="20%">Mô tả</td>
                                <td width="5%">Xóa</td>
                            </tr>
                        
                    
                            {{-- lấy dữ liệu từ database hiện thị lên view --}}
                            @foreach ($list as $l)
                                <tr>
                                    <td><center><img src="{{URL::asset('/img/banhang/'.$l->image)}}"
                                         width="70" height="70"></center></td>
                                    <td>{{$l->name}}</td>
                                    <td>{{$l->unit_price}} </td>
                                    <td>{{$l->description}} </td>
                                    <td> Xóa
                                    </td>
                                </tr>
                            @endforeach
                            
                    </table>
                </div>
            </div> 
        </div>
    @endif
    

  </body>
</html>