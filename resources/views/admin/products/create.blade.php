@extends('admin.index')
@section('content')


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.css" integrity="sha256-He3QEBKoL/nMXlVsoM7S2C2kjFQqS5L+mgA+F8LpG+U=" crossorigin="anonymous" />


 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Thêm sản phẩm</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Project Add</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
 <form action="{{ route('product.store') }}" enctype="multipart/form-data" method="POST">
    @csrf
    @method('POST')
    {{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}

    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Sản phẩm</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Tên </label>
                <input type="text" name="name" value="Bán chạy" class="form-control">
              </div>
              @error('name')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
              @enderror

              <div class="form-group">
                <label for="inputDescription">Mô tả</label>
                <textarea name="description" class="form-control" rows="4"></textarea>
              </div>
              @error('description')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
              @enderror
                <div class="form-group">
                <label for="inputStatus">Sản phẩm</label>
                <select class="form-control custom-select" name="category_id">
                @foreach ($categorys as $item)
                  <option    value="{{ $item->id }}">{{ $item->name }}</option>
                 @endforeach
               </select>
              </div>
              <div class="form-group">
                <label for="inputStatus">Loại bò sát</label>
                <select class="form-control custom-select" name="type_id">
                    <option >--- Chọn ---</option>
                @foreach ($types as $item)
                  <option  value="{{ $item->id }}" >{{ $item->name }}</option>
                @endforeach
                </select>
              </div>
               <div class="form-group">
                <label for="inputStatus">Loại phụ kiện</label>
                <select class="form-control custom-select" name="acce_id">
                    <option >--- Chọn ---</option>
                @foreach ($acces as $item)
                 <option  value="{{ $item->id }}" >{{ $item->name }}</option>
                @endforeach
                </select>
              </div>
               <div class="form-group">
                <label for="inputStatus">Loại gặm nhắm</label>
                <select class="form-control custom-select" name="nawing_id">
                    <option >--- Chọn ---</option>
                @foreach ($nawings as $item)
                  <option  value="{{ $item->id }}" >{{ $item->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class="col-md-6">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title"></h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputEstimatedBudget">Giá bán</label>
                <input type="number" name="price" class="form-control">
              </div>
              @error('price')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
              @enderror
              <div class="form-group">
                <label for="inputSpentBudget">Giá khuyến mãi</label>
                <input type="number" name="promotion_price" class="form-control">
              </div>
              @error('promotion_price')
              <div class="alert alert-danger">
                  {{ $message }}
              </div>
            @enderror
              <div class="form-group">
                <label for="exampleInputFile">Hình ảnh</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="image" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
              </div>
              @error('image')
              <div class="alert alert-danger">
                  {{ $message }}
              </div>
            @enderror
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <a href="{{ route('product.index') }}" class="btn btn-secondary">Trở về</a>
          <button type="submit" class="btn btn-success swalDefaultSuccess">
            Thêm
          </button>
        </div>
      </div>
    </section>
</form>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  @if(session()->has('success'))
  <script >
$.toast({
    heading: 'Success',
    text:  'Chúc mừng bạn đã thêm thành công',
    bgColor: '#FF1356',
    position: 'mid-center',
    stack: false

})
  </script>
  @endif



@endsection

