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
                <li><a href="#" style="color:#ffffff">Trang chủ</a></li>
                <li><a href="#" style="color:#ffffff">Sản phẩm </a>
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


        <div id = "main">
            <!-- slide  -->
              <!-- slide  -->
            
              <!-- noidung 2  -->
              @include('product')
            
              @include('footer')
          
    </div>

    
@endif
  </body>
</html>