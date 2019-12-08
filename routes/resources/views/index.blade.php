

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
                <li ><a href="{{url("register")}}"  style="color:#ffffff">Đăng kí</a></li>
                <li><a href="{{url("login")}}"  style="color:#ffffff">Đăng nhập</a></li>
              </ul>
            </div>
          </nav>


        <div id = "main">
            <!-- slide  -->
            @include('hot_new')
            <!-- noidung 2  -->
            <div class="noidung2">
              <div class="tieude_noidung2">
                  <i class="fa fa-fire" style="font-size: 40px; padding-top: 2px;"></i>
                  <div class="tieude_noidung2_text">Sản phẩm bán chạy</div>
              </div>
              <div class="noidung2_main">
          
                  @foreach($list as $l)
                      <div class="product">
                          <div class="product_images">
                              <a href=""><img src="{{URL::asset('/img/banhang/'.$l->image)}}" width="150" height="150"></a>
                          </div>
          
                          <div class="product_bottom">
                              <div class="product_name">
                                  <a href="" title="{{$l->name}}"><b>{{$l->name}}
                                  </b></a>
                              </div>
                              <p class="price_text">
                                  <span class="glyphicon glyphicon-shopping-cart"></span>
                                  {{-- <span class="percent">-50%</span> --}}
                                  <span class="price">{{$l->unit_price}}  đ</span>
                                  {{-- <br><span class="original">100.000 đ</span> --}}
                              </p>
                          </div>     
                      </div>
                  @endforeach
              </div>
          </div>  
           @include('footer')

        </div>
 </div>

  </body>
</html>
