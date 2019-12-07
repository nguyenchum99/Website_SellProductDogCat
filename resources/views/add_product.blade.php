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

            <div class="row" style="margin-left: 200px; width: 100%">
                <h3 style="color:#0059b3; margin-left: 15px">Thêm sản phẩm </h3>
                     {{-- thông báo lỗi --}}
                @if(count($errors) > 0)
                <div class="alert alert-danger" style="width:31%; margin-left: 15px" >
                    @foreach ($errors -> all() as $err)
                        {{$err}}<br>
                    @endforeach
                     
                </div>
                @endif

                @if(session('thongbao'))
                
                <div class="alert alert-success" style="width:31%; margin-left: 15px" >
                    {{session('thongbao')}}
                </div>
                
                @endif
                <div class="col-sm-4">
                    <form method="post" action="{{url("add_product")}}">
        
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
        
                        <div class="form-group">
                            <h5 style="color:#000000">Tên sản phẩm</h5>
                            <input type="text" name="name" class="form-control" />
                        </div>
        
                        <div class="form-group">
                            <h5 style="color:#000000">Mô tả</h5>
                            <textarea type="text" name="description" class="form-control" rows="3" ></textarea>
                        </div>
        
                        <div class="form-group">
                            <h5 style="color:#000000">Giá</h5>
                            <input type="text" name="unit_price" class="form-control"  />
                        </div>
        
                        <div class="form-group">
                            <h5 style="color:#000000">Ảnh sản phẩm</h5>
                            <input type="file" name="image"  >
                        </div>
                        <input type="submit" name="submit" value="Thêm" class="btn btn-primary" />
                    </form>
                </div>
            </div> 
        </div>
    @endif
    

  </body>
</html>