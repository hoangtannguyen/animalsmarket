 <!-- Hero Section Begin -->
@include('home.partials.css.css')
 <section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span >Bò sát cảnh</span>
                    </div>
                    <ul>
                    @foreach ($types as $ty)
                        <li><a href="{{ route('loaibs',$ty->id) }}" >{{$ty->name}}</a></li>
                     @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="#">
                            <div class="hero__search__categories">
                                Tất cả danh mục
                                <span class="arrow_carrot-down"></span>
                            </div>
                            <input type="text" placeholder="Bạn muốn tìm .....">
                            <button type="submit" class="site-btn">Tìm</button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5 ><a class="text-dark" href="{{ route('contact') }}">LIÊN HỆ</a></h5>
                            <span>012.345.6879</span>
                        </div>
                    </div>
                </div>
                <div class="hero__item set-bg" data-setbg="img/b1.jpg">
                    <div class="hero__text">
                        <span class="text-success">Nguyen Hoang Pet</span>
                        <h2 class="text-success">Aligator Snapping <br />100% Amazzon</h2>
                        <p class="text-success">97 Ngô Đức Kế - Phường Thuận Lộc - Tỉnh Thừa Thiên Huế</p>
                        <a href="" class="btn btn-warning">Cửa Hàng</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->
