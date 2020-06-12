@extends('admin.index')
@section('content')


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
 <form action="{{ route('product.update',$products->id) }}" enctype="multipart/form-data" method="POST">
    @csrf
    @method('PUT')
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
                <label for="inputName">Tên</label>
                <input type="text" name="name" class="form-control" value="{{ $products->name }}">
              </div>
              @error('name')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
              @enderror
              <div class="form-group">
                <label for="inputDescription">Mô tả</label>
                <textarea name="description"  class="form-control" rows="4" >{{ $products->description }}</textarea>
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
                  <option  {{ $item->id == $products->category_id  ? 'selected':'' }}  value="{{ $item->id }}" >{{ $item->name }}</option>
                 @endforeach

                </select>
              </div>
              <div class="form-group">
                <label for="inputStatus">Loại bò sát</label>
                <select class="form-control custom-select" name="type_id">
                    <option ></option>
                @foreach ($types as $item)
                  <option  {{ $item->id == $products->type_id   ? 'selected':'' }} value="{{ $item->id }}" >{{ $item->name }}</option>
                @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="inputStatus">Loại phụ kiện</label>
                <select class="form-control custom-select" name="acce_id">
                    <option ></option>
                @foreach ($acces as $item)
                 <option   {{ $item->id == $products->acce_id   ? 'selected':'' }} value="{{ $item->id }}" >{{ $item->name }}</option>
                @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="inputStatus">Loại gặm nhắm</label>
                <select class="form-control custom-select" name="nawing_id">
                    <option ></option>
                @foreach ($nawings as $item)
                  <option {{ $item->id == $products->nawing_id    ? 'selected':'' }} value="{{ $item->id }}" >{{ $item->name }}</option>
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
                <input type="number" name="price" class="form-control" value="{{ $products->price }}">
              </div>
              @error('price')
              <div class="alert alert-danger">
                  {{ $message }}
              </div>
            @enderror
              <div class="form-group">
                <label for="inputSpentBudget">Giá khuyến mãi</label>
                <input type="number" name="promotion_price" class="form-control" value="{{ $products->promotion_price }}">
              </div>
              @error('promotion_price')
              <div class="alert alert-danger">
                  {{ $message }}
              </div>
            @enderror
              <div class="form-group">
                <label for="inputEstimatedDuration">Hình ảnh</label>
                <input type="file" name="image" class="form-control">
              </div>
              @error('image')
              <div class="alert alert-danger">
                  {{ $message }}
              </div>
            @enderror
              <div  class="form-group">
                <img src="{{ $products->image }}" alt="" style="height:250px;width:250px;">
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <a href="{{ route('product.index') }}" class="btn btn-secondary">Trở về</a>
          <input type="submit" value="Sửa" class="btn btn-success float-none">
        </div>
      </div>
    </section>
</form>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->




@endsection
