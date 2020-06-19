@extends('admin.index')

@section('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.css" integrity="sha256-He3QEBKoL/nMXlVsoM7S2C2kjFQqS5L+mgA+F8LpG+U=" crossorigin="anonymous" />
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>



<body class="hold-transition sidebar-mini">

<!-- Site wrapper -->
<div class="wrapper">
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Projects</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Projects</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">
        <a class="btn btn-primary btn-sm" href="{{ route('product.create') }}">
            <i class="fas fa-plus-circle">
            </i>
            Thêm
        </a>

        {{-- <a class="btn btn-primary btn-sm" onclick="Cr.create()" style="color:white">
            <i class="fas fa-folder">
            </i> Create
        </a>   --}}
    </h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          #
                      </th>
                      <th style="width: 20%">
                         Tên
                      </th>
                      <th style="width: %">
                         Hình ảnh
                      </th>
                      <th>
                         Giá bán
                      </th>
                      <th>
                        Giảm giá
                     </th>
                      <th style="width: 8%" class="text-center">
                        Bán chạy
                      </th>
                      <th style="width: 20%">

                      </th>
                  </tr>
              </thead>
              <tbody>
                  @if (count($products) == 0)
               <th>    Không có dữ liệu</th>
                  @else
                 @foreach ($products as $key => $product)
                  <tr>
                      <td>
                          {{ ++$key }}
                      </td>
                      <td>
                          <a>
                              {{ $product->name }}
                          </a>
                          <br/>
                          <small>
                              Tạo {{ $product->created_at }}
                          </small>
                      </td>
                      <td>
                          <ul class="list-inline">
                              <li class="list-inline-item">
                                  <img alt="Avatar" class="table-avatar" src="{{ $product->image }}" style="height:100px;width:100px">
                              </li>
                          </ul>
                      </td>
                      <td>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                {{ number_format($product->price) }} VNĐ
                            </li>
                        </ul>
                    </td>

                    <td>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                {{ number_format($product->promotion_price) }} VNĐ
                            </li>
                        </ul>
                    </td>


                      <td class="project-state">
                          <span class="badge badge-success">Success</span>
                      </td>
                      <td class="project-actions text-right">


                           <a class="btn btn-info btn-sm" onclick="Cr.show({{ $product->id }})" style="color:white">

                            <i class="fas fa-folder">
                            </i> Xem

                        </a>

                          <a class="btn btn-info btn-sm" href="{{ route('product.edit',$product->id) }}">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Sửa
                          </a>
                          <a class="btn btn-danger btn-sm" href="#">
                              <i class="fas fa-trash">
                              </i>
                              Xóa
                          </a>
                      </td>

                  </tr>
                  @endforeach
                  @endif
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
        {{ $products->links() }}
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->


<!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Sản Phẩm</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
            <table>
                <tr>
                    <td>Loại sản phẩm :</td>
                    <td for="" id="category_id"></td>
                </tr>
                <tr>
                    <td>Loại phụ kiện :</td>
                    <td for="" id="acce_id"></td>
                </tr>
                <tr>
                    <td>Loại gặm nhắm :</td>
                    <td for="" id="nawing_id"></td>
                </tr>
                <tr>
                    <td>Loại bò sát : </td>
                    <td for="" id="type_id"></td>
                </tr>
            </table>
        </div>
       <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Trở về</button>
        </div>

      </div>
    </div>
  </div>


  <!-- The Modal -->
<div class="modal" id="modal">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Sản Phẩm</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
            <div class="form-group">
                <span>Tên</span><br>
                <input class="form-control col" type="text" name="name">
            </div>
            <div class="form-group">
                <span>Mô tả</span><br>
                <input class="form-control col" type="text" name="description">
            </div>
            <div class="form-group">
                <span>Giá bán</span><br>
                <input class="form-control col" type="text" name="price">
            </div>
            <div class="form-group">
                <span>Giá khuyến mãi</span><br>
                <input class="form-control col" type="text" name="promotion_price">
            </div>
            <div class="form-group">
                <span>Hình ảnh</span><br>
                <input class="form-control col" type="file" name="image">
            </div>
            <div class="form-group">
                <span>Loại sản phẩm</span><br>
                <input class="form-control col" type="text" name="category_id">
            </div>
            <div class="form-group">
                <span>Loại phụ kiện</span><br>
                <input class="form-control col" type="text" name="acce_id">
            </div>
            <div class="form-group">
                <span>Loại gặm nhắm</span><br>
                <input class="form-control col" type="text" name="nawing_id">
            </div>
            <div class="form-group">
                <span>Loại phụ kiện</span><br>
                <input class="form-control col" type="text" name="type_id">
            </div>
        </div>
       <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Trở về</button>
        </div>
        <div class="modal-footer">
            <button type="button" id="btn-save" class="btn btn-waring"
                onclick="Cr.save(this)">
                <i class="fa fa-save"></i> Save
            </button>
        </div>

      </div>
    </div>
  </div>




</body>


@if(session()->has('success'))
  <script >
Swal.fire({
  position: 'top-start',
  icon: 'success',
  title: 'Your work has been saved',
  showConfirmButton: false,
  timer: 2000
})
  </script>
  @endif




{{-- @if(session()->has('success'))
  <script >
$.toast({
    heading: '#',
    text:  'Chúc mừng bạn đã sửa thành công',
    bgColor: '#FF1356',
    position: 'mid-center',
    stack: false

})
  </script>
  @endif --}}



@endsection

<script src="js/crud.js"></script>
