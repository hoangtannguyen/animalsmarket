@extends('home.index1')
@section('content')

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h6><span class="icon_tag_alt"></span> Có phiếu giảm giá? <a href="#">Nhấn vào</a> đây để nhập mã của bạn
                    </h6>
                </div>
            </div>
            <div class="checkout__form">
                <h4>THÔNG TIN THANH TOÁN</h4>
                <form action="{{ route('cart.store') }}" enctype="multipart/form-data" method="POST">
                   @csrf
                   @method('POST')
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="checkout__input">
                                <p>Họ và tên <span>*</span></p>
                                <input type="text"  name="name" placeholder="Nhập đầy đủ họ và tên">
                            </div>
                            <div class="checkout__input">
                                <p>Tỉnh/Thành phố <span>*</span></p>
                                <input type="text" list="browsercity" id="browser"  name="city" class="checkout__input__add">
                            </div>
                            <div class="checkout__input">
                                <p>Địa chỉ <span>*</span></p>
                                <input type="text" list="browsers" id="browser" name="address" placeholder="Ví dụ : 97 Ngô Đức Kế , Phường Thuận Lộc">
                            </div>
                            <div class="checkout__input">
                                <p>Số điện thoại<span>*</span></p>
                                <input type="text" name="phone">
                            </div>
                            <div class="checkout__input">
                                <p>Địa chỉ Email<span>*</span></p>
                                <input type="email" name="email">
                            </div>
                            <div class="checkout__input">
                                <p>THÔNG TIN BỔ SUNG <span>*</span></p>
                                <textarea class="form-control" name="additional" id="exampleFormControlTextarea1" placeholder="Ghi chú về đơn hàng,ví dụ:thời gian hay chỉ dẫn địa chỉ giao hàng tốt hơn" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>ĐƠN HÀNG </h4>
                                <div class="checkout__order__products">SẢN PHẨM<span>TỔNG</span></div>
                                <ul>

                                    @foreach(Cart::getContent() as $product)
                                    <li class=" d-flex justify-content-between ">
                                        <div>
                                            <h6 class="my-0 text-uppercase">{{$product->name}}</h6>
                                            <small class="text-muted">{{$product->quantity . ' x ' . number_format($product->price)}}₫</small>
                                        </div>
                                        <span class="text-muted">{{number_format($product->price * $product->quantity)}}₫</span>
                                    </li>
                                    @endforeach

                                    {{-- <li>Vegetable’s Package <span>$75.99</span></li>
                                    <li>Fresh Vegetable <span>$151.99</span></li>
                                    <li>Organic Bananas <span>$53.99</span></li> --}}
                                </ul>
                                <div class="checkout__order__subtotal">Tạm tính <span>{{number_format(Cart::getSubTotal())}}₫</span></div>
                                <div class="checkout__order__total">Tổng <span>{{number_format(Cart::getSubTotal())}}₫</span></div>
                                <div class="checkout__input__checkbox">
                                    <label for="payment">
                                        Ship & Trả tiền mặt khi nhận hàng
                                        <input type="checkbox" id="payment" name="paymentMethod" value="Ship & Trả tiền mặt khi nhận hàng">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <p>Shop sẽ liên hệ xác nhận đơn hàng và báo giá ship: 0₫ <br>
                                    Ước tính for Ha Noi , Việt Nam.</p>
                                <div class="checkout__input__checkbox">
                                    <label for="paypal">
                                        Chuyển khoản ngân hàng
                                        <input type="checkbox" id="paypal" name="paymentMethod" value="Chuyển khoản ngân hàng" >
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <button type="submit" class="site-btn">ĐẶT HÀNG</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->
    <datalist id="browsercity">
        <option value="An Giang">
        <option value="Bà Rịa – Vũng Tàu">
        <option value="Bắc Giang">
        <option value="Bắc Kạn">
        <option value="Bạc Liêu">
        <option value="Bến Tre">
        <option value="Bình Dương">
        <option value="Bình Thuận">
        <option value="Cà Mau">
        <option value="Cần Thơ">
        <option value="Cao Bằng">
        <option value="Đà Nẵng">
        <option value="Đắk Lắk">
        <option value="Đắk Nông">
        <option value="Điện Biên">
        <option value="Đồng Nai">
        <option value="Đồng Tháp">
        <option value="Gia Lai">
        <option value="Hà Giang">
        <option value="Hà Nam">
        <option value="Hà Nội">
        <option value="Hà Tĩnh">
        <option value="Hải Dương">
        <option value="Hải Phòng">
        <option value="Hậu Giang">
        <option value="Hòa Bình">
        <option value="Hưng Yên">
        <option value="Huế">
        </datalist>
        <datalist id="browsers">
            <option value="Xóm 3, xã Hoằng Quỳ, huyện Hoằng Hóa">
            <option value="Thôn Đông Nam, xã Hoằng Quỳ, huyện Hoằng Hóa">
            <option value="Ngách 71D, ngõ 32, đường Nguyễn Cơ Thạch, phường Mỹ Đình, quận Nam Từ Liêm">
            <option value="No 8, 15 lane, Ly Nhan Tong street, Hai Ba Trung district">
            <option value="Số nhà 8, ngõ 15, đường Lý Nhân Tông, Quận Hai Bà Trưng">
            <option value="81, 6th street, Ward 15, Tan Binh district">
            <option value="ong Nam Hamlet, Hoang Quy commune, Hoang Hoa district">
          </datalist>

@endsection
