<div class="noidung2">
    <div class="tieude_noidung2">
        <i class="fa fa-fire" style="font-size: 40px; padding-top: 2px;"></i>
        <div class="tieude_noidung2_text">Sản phẩm bán chạy</div>
    </div>
    <div class="noidung2_main">

        @foreach($list as $l)
            <div class="product">
                <div class="product_images">
                    <a href=""><img src="" width="150" height="150"></a>
                </div>

                <div class="product_bottom">
                    <div class="product_name">
                        <a href="" title=""><b>
                        </b></a>
                    </div>
                    <p class="price_text">
                        <span class="glyphicon glyphicon-shopping-cart"></span>
                        <span class="percent">-50%</span>
                        <span class="price">  đ</span>
                        <br><span class="original">100.000 đ</span>
                    </p>
                </div>     
            </div>
        @endforeach
        <div class="xem">
            <button class="button_xemthem">Xem thêm</button>
        </div>
    </div>
</div>  