<!-- Header Section Begin -->
<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__left">
                        <ul>
                            <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                            <li>Free Shipping for all Order of $99</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__right">
                        <div class="header__top__right__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-pinterest-p"></i></a>
                        </div>
                        <div class="header__top__right__language">
                            <img src="img/language.png" alt="">
                            <div>English</div>
                            <span class="arrow_carrot-down"></span>
                            <ul>
                                <li><a href="#">Spanis</a></li>
                                <li><a href="#">English</a></li>
                            </ul>
                        </div>
                        <div class="header__top__right__auth">
                            <a href="#"><i class="fa fa-user"></i> Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="header__logo">
                    <a href="{{ route('home.index') }}" style="font-size:20px;color:green"  class="lead font-italic"><img src="img/257.jpg" style="width:119px;height:50px" alt="" >G-TURTLE</a>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="header__menu">
                    <ul >
                        {{-- <li class="active"><a href="./index.html">Trang chủ</a></li> --}}
                        <li><a href="#">Pet Gặm Nhắm</a>
                            <ul class="header__menu__dropdown">
                                @foreach ($nawing as $na)
                                <li><a href=" {{ route('loaign',$na->id) }} " >{{$na->name}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li><a href="#">Phụ Kiện</a>
                            <ul class="header__menu__dropdown">
                                @foreach ($acce as $ac)
                                <li><a href="{{ route('loaipk',$ac->id) }}">{{$ac->name}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li><a href="./contact.html">Khuyến mãi</li>
                        <li><a href="./blog.html">Kỹ Thuật</a></li>
                 </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__cart">
                    <ul>
                        <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                        <li><a href="{{ route('cart.shopping') }}"><i class="fa fa-shopping-bag"></i> <span>{{Cart::getContent()->count()}}</span></a></li>
                    </ul>
                    <div class="header__cart__price">tổng: <span>{{number_format(Cart::getSubTotal())}}₫</span></div>
                </div>
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
<!-- Header Section End -->
