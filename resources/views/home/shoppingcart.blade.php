@extends('home.index1')
@section('content')

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table" id="cart12">
                        <table id="cart13">
                            <thead>
                                <tr>
                                    <th class="shoping__product">Sản phẩm</th>
                                    <th>Giá bán</th>
                                    <th>Số lượng</th>
                                    <th>Tổng</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (Cart::getContent()  as $item => $product)
                                <tr>
                                    <td class="shoping__cart__item">
                                        <img src="{{ $product->attributes->img }}" style="width:100px;height:100px" alt="">
                                        <h5>{{ $product->name }}</h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        {{ number_format( $product->price)}}₫
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                            <div>
                                                 <input
                                                data-url="{{ route('cart.update',$product->id) }}"
                                                data-id="{{ $product->id }}"
                                                data-token="{{ csrf_token() }}" type="number"
                                                value="{{  Cart::get($product->id)->quantity }}"
                                                onchange="updateCart(this)"
                                                class="btn btn-outline-dark" min="1" max="200" id="quantity{{ $item }}">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="shoping__cart__total ">
                                        {{number_format($product->price * Cart::get($product->id)->quantity)}}₫
                                    </td>

                                    <td class="shoping__cart__item__close">
                                        <form action="{{ route('remove',$product->id) }}"  method="post" >
                                            @csrf
                                            <div class="input-group">
                                                <div class="input-group">
                                                    <button style="font-size:20px" type="submit" class="btn btn-block" ><span class="icon_close"></span></button>
                                                </div>
                                            </div>
                                        </form>

                                    </td>
                                </tr>
                                @endforeach
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
                                <script>
                                    function updateCart(btn){
                                        let id = $(btn).data('id');
                                        $.ajax({
                                            url: $(btn).data('url'),
                                            method: 'post',
                                            data: {
                                                '_token': $(btn).data('token'),
                                                'id': $(btn).data('id'),
                                                'quantity': $(btn).val()
                                            },
                                            success: function(){
                                                $(`#quantity${id}`).load(` #quantity${id}`);
                                                $(`#total${id}`).load(` #total${id}`);
                                                $('#cart12').load(' #cart13');
                                                // location.reload();

                                            },
                                            error: function(){
                                                alert('error');
                                            }
                                        });
                                     }

                                </script>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="{{ route('home.index') }}"    class="primary-btn cart-btn"> ← TIẾP TỤC XEM SẢN PHẨM</a>
                        <a href="{{ route('cart.checkout') }}" class="primary-btn cart-btn cart-btn-right"><span ></span>
                           TIẾP TỤC THANH TOÁN ➙</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Mã Giảm Giá</h5>
                            <form action="#">
                                <input type="text" placeholder="Nhập mã code">
                                <button type="submit" class="site-btn">Áp dụng</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Tổng giỏ hàng</h5>
                        <ul>
                            <li>Tạm tính <span>{{number_format(Cart::getSubTotal())}}₫</span></li>
                            <li>Total <span>{{number_format(Cart::getSubTotal())}}₫</span></li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->



@endsection
@push('index-toastr')
    <script>
        @if (session('success'))
            toastr.success("{{ session()->get('success') }}")
        @endif
    </script>
@endpush
