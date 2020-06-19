@extends('admin.index')
@section('content')

<div class="wrapper">
<div class="content-wrapper">


    <!-- Main content -->
       <section class="content">
         <div class="row">
           <div class="col-12">
             <div class="card">
               <div class="card-header">
               </div>
               <!-- /.card-header -->
               <div class="card-body">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                   <a  class="btn btn-primary btn-sm text-light" class="nav nav-pills mb-3" onclick="Cu.create()" >
                 <i class="fas fa-plus-circle">
                </i> Thêm
            </a>
                </ul>

                   <table id="fs-table" class="table table-bordered table-hover">
                   <thead class="btn-dark">
                   <tr>
                       <th>#</th>
                       <th>Họ</th>
                       {{-- <th>Mô tả</th> --}}
                       <th>Giá</th>
                       <th>Giá khuyến mãi</th>
                       <th>Hình ảnh</th>
                       {{-- <th>Category</th>
                       <th>Acce</th>
                       <th>Nawing</th>
                       <th>Type</th> --}}
                       <th>Action</th>
                  </tr>
                   </thead>
                   <tbody>
                   </tbody>
                   <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Họ</th>
                        {{-- <th>Mô tả</th> --}}
                        <th>Giá</th>
                        <th>Giá khuyến mãi</th>
                        <th>Hình ảnh</th>
                        {{-- <th>Category</th>
                        <th>Acce</th>
                        <th>Nawing</th>
                        <th>Type</th> --}}
                        <th>Action</th>
                   </tr>
                    </tr>
                </tfoot>
                 </table>
               </div>
               <!-- /.card-body -->
             </div>
             <!-- /.card -->
           </div>
           <!-- /.col -->
         </div>
         <!-- /.row -->
       </section>
       <!-- /.content -->
   </div>
   <!-- /.content-wrapper -->
</div>
   <div id="fs-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title"
   data-backdrop="static" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
       <div class="modal-content">
           <form id="form">
               @method('put')
               <div class="modal-header">
                   <h5 class="modal-title text-center" id="fs-modal-title">Create Factor Salary</h5>
                   <button class="btn btn-dark" type="button" aria-label="Close"
                       onclick="confirm()?$('#fs-modal').modal('hide'):''">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <div class="modal-body container">
                <div class="container">
                    <span>Tên</span><br>
                    <input class="form-control col" type="text"  name="name" >
                </div>
                <div class="container">
                    <span>Mô tả</span><br>
                    <input class="form-control col" type="text"  name="description" >
                </div>
                <div class="container">
                    <span>Giá</span><br>
                    <input class="form-control col" type="text"  name="price" >
                </div>
                <div class="container">
                    <span>Giá khuyễn mãi</span><br>
                    <input class="form-control col" type="text"  name="promotion_price" >
                </div>
                <div class="container">
                       <span>Hình ảnh</span><br>
                       <input class="form-control col" type="file"  name="image" >
                </div>
                <div class="container">
                    <div class="container">
                        <img id="imageEdit" src="#" alt="" srcset="" width="250">
                 </div>
             </div>

                <div class="container">
                    <span>Category</span><br>
                    <select name="category_id" id="category_id" class="form-control position select2" style="width: 100%;">
                    </select>
                    <span class="invalid-feedback">
                        <strong class="alert-MaCV"></strong>
                    </span>
                </div>
                <div class="container">
                    <span>Acce</span><br>
                    <select name="acce_id" id="acce_id" class="form-control position select2" style="width: 100%;">
                    </select>
                    <span class="invalid-feedback">
                        <strong class="alert-MaCV"></strong>
                    </span>
                </div>
                <div class="container">
                    <span>Nawing</span><br>
                    <select name="nawing_id" id="nawing_id" class="form-control position select2" style="width: 100%;">
                    </select>
                    <span class="invalid-feedback">
                        <strong class="alert-MaCV"></strong>
                    </span>
                </div>
                <div class="container">
                    <span>Type</span><br>
                    <select name="type_id" id="type_id" class="form-control position select2" style="width: 100%;">
                    </select>
                    <span class="invalid-feedback">
                        <strong class="alert-MaCV"></strong>
                    </span>
                </div>

                <div class="modal-footer">
                       <button type="button" id="btn-save" class="btn btn-warning btn-block"
                           onclick="Cu.save(this)">
                           <i class="fa fa-save"></i> Save
                       </button>
                </div>
               </div>
           </form>
       </div>
   </div>
</div>


<!-- The Modal -->
<div class="modal" id="dx-modal">
<div class="modal-dialog">
  <div class="modal-content">

    <!-- Modal Header -->
    <div class="modal-header">
      <h4 class="modal-title">Chi tiết</h4>
      <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>

    <!-- Modal body -->
    <div class="modal-body">
        <table>
            <tr>
                <td>Category: </td>
                <td for="" id="category_id"></td>
            </tr>

            <tr>
                <td>Acce: </td>
                <td for="" id="acce_id"></td>
            </tr>

            <tr>
                <td>Nawing: </td>
                <td for=""  id="nawing_id"></td>
            </tr>

            <tr>
                <td>Type: </td>
                <td for="" id="type_id"></td>
            </tr>

            <tr>
                <td>Mô tả:</td>
                <td for="" id="description"></td>
            </tr>


            <tr>
                <td>Hình ảnh: </td>
                <td for=""><img id="ImageShow" src="#" alt="" srcset="" width="250"></td>
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

@push('js')

{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.0/css/bootstrap.min.css" /> --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.20/css/jquery.dataTables.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.serializeJSON/2.9.0/jquery.serializejson.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.0/js/bootstrap.bundle.min.js"></script>

<script src="js/product.js"></script>
@endpush
