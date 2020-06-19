@extends('home.index')
@section('content')


<!-- Categories Section Begin -->


<!-- Categories Section End -->

 <!-- Featured Section Begin -->


 <section class="categories ">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                 {{-- <div class="section-title">
                    <h2>Featured Product</h2>
                </div> --}}
                <div class="featured__controls">
                    <ul>
                        {{-- <li class="active" data-filter="*">Tất cả</li> --}}
                        <li data-filter=".oranges" class="btn btn-outline-warning">Bò sát cảnh</li>
                        <li data-filter=".fresh-meat" class="btn btn-outline-warning">Pet gặm nhắm</li>
                        <li data-filter=".vegetables" class="btn btn-outline-warning">Phụ kiện</li>
                        {{-- <li data-filter=".fastfood">Fastfood</li> --}}
                    </ul>
                </div>
            </div>
        </div>

        <div class="row featured__filter">

            @foreach ($bosats as $bosat)

            <div class="col-lg-3 col-md-4 col-sm-6 mix oranges" >
                <div class="featured__item" >
                    <a href="{{ route('ct',$bosat->id) }}">
                  <div   class="featured__item__pic set-bg"  data-setbg="{{ $bosat->image }}"  style="width:265px;height:170px">

                    <ul class="featured__item__pic__hover">
                            {{-- <li><a href="{{ route('ct',$bosat->id) }}"><i class="fa fa-heart"></i></a></li> --}}
                        <form action="{{ route('cart.add') }}" method="post" >
                          @csrf
                            <input type="hidden" name="productId" value="{{ $bosat->id }}">
                            <span class="card-text text-muted inline-block">
                                <input type="hidden"  class="btn btn-outline-dark" min="1" max="200" name="quantity" value="1">
                                <button type="submit" class="btn btn-outline-warning">
                                    <span class="glyphicon glyphicon-shopping-cart"><i class="fa fa-shopping-cart"></i></span>
                                    </button></span>
                        </form>

                        </ul>
                    </div>
                </a>
                    <div class="featured__item__text"  style="width:265px;height:170px">
                        <h6><a href="#" class="text-uppercase">{{ $bosat->name }}</a></h6>
                        <h5>{{ number_format($bosat->price) }}₫</h5>
                    </div>
                </div>
            </div>

             @endforeach


             @foreach ( $gamnhams as $gamnham)
            <div class="col-lg-3 col-md-4 col-sm-6 mix fresh-meat">
                <div class="featured__item">
                    <a href="{{ route('ct',$gamnham->id) }}">
                    <div class="featured__item__pic set-bg" data-setbg="{{  $gamnham->image }}" style="width:265px;height:170px">
                        <ul class="featured__item__pic__hover">
                            <form action="{{ route('cart.add') }}" method="post" >
                                @csrf
                                  <input type="hidden" name="productId" value="{{ $gamnham->id }}">
                                  <span class="card-text text-muted inline-block">
                                      <input type="hidden"  class="btn btn-outline-dark" min="1" max="200" name="quantity" value="1">
                                      <button type="submit" class="btn btn-outline-warning">
                                          <span class="glyphicon glyphicon-shopping-cart"><i class="fa fa-shopping-cart"></i></span>
                                          </button></span>
                              </form>
                        </ul>
                    </div>
                    <div class="featured__item__text" style="width:265px;height:170px">
                        <h6><a href="#" class="text-uppercase">{{ $gamnham->name }}</a></h6>
                        <h5>{{  number_format($gamnham->price) }}₫</h5>
                    </div>
                </a>
                </div>
            </div>

            @endforeach
            @foreach ($phukiens  as $phukien)
            <div class="col-lg-3 col-md-4 col-sm-6 mix vegetables">
                <div class="featured__item">
                    <a href="{{ route('ct',$phukien->id) }}">
                    <div class="featured__item__pic set-bg" data-setbg="{{  $phukien->image }}" style="width:265px;height:170px">
                        <ul class="featured__item__pic__hover">
                            <form action="{{ route('cart.add') }}" method="post" >
                                @csrf
                                  <input type="hidden" name="productId" value="{{ $phukien->id }}">
                                  <span class="card-text text-muted inline-block">
                                      <input type="hidden"  class="btn btn-outline-dark" min="1" max="200" name="quantity" value="1">
                                      <button type="submit" class="btn btn-outline-warning">
                                          <span class="glyphicon glyphicon-shopping-cart"><i class="fa fa-shopping-cart"></i></span>
                                          </button></span>
                              </form>
                        </ul>
                    </div>
                    <div class="featured__item__text" style="width:265px;height:170px">
                        <h6><a href="#" class="text-uppercase">{{$phukien->name}}</a></h6>
                        <h5>{{ number_format($phukien->price) }}₫</h5>
                    </div>
                </a>
                </div>
            </div>
             @endforeach

      </div>

    </div>

</section>

   <!-- The Modal -->
   <div class="modal" id="dx-modal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Modal Heading</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            <table>
                <tr>
                    <td>Name Position: </td>
                    <td for="" id="first_name"></td>
                </tr>

                <tr>
                    <td>Job: </td>
                    <td for="" id="last_name"></td>
                </tr>
            </table>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>

@endsection
@push('index-toastr')
    <script>
        @if (session('success'))
            toastr.error("{{ session()->get('success') }}")
        @endif
    </script>
@endpush
