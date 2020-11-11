@extends('layout.layoutadmin')
@section('content')
<script src="Semantic-UI-CSS-master/jquery-3.4.1.min.js"></script>
<script src="assetsadmin/js/jquery.unobtrusive-ajax.min.js"></script>
<div class="col-xl-12">
  <div class="card bg-white">
    <div class="card-header bg-default">
      <div class="row align-items-center">
        <div class="col">
          <div class="row">
            <div class="col-lg-4">
              <h6 class="text-light text-uppercase ls-1 mb-1">
                <button data-toggle="modal" data-target="#addcategory" class="btn btn-warning W-100" style="font-size: 15px;"><i class="fa fa-plus">&nbsp;</i>Thêm danh mục</button>
              </h6>
            </div>
            <div class="col-lg-8">
              <input type="text" class="form-control w-100" placeholder="Nhập tên danh mục, mã danh mục,...."/>
            </div>
          </div>
        </div>
        <div class="col">
          <ul class="nav nav-pills justify-content-end">
            <li class="nav-item mr-2 mr-md-0" data-toggle="chart" data-target="#chart-sales-dark" data-update='{"data":{"datasets":[{"data":[0, 20, 10, 30, 15, 40, 20, 60, 60]}]}}' data-prefix="$" data-suffix="k">
              <a href="/vnnews/news-all-admin" class="nav-link py-2 px-3 active" data-toggle="tab" data-ajax="true" data-ajax-method="GET" data-ajax-mode="replace" data-ajax-update="#ajaxNews">
                <span class="d-none d-md-block">Tất cả</span>
                <span class="d-md-none">M</span>
              </a>
            </li>
            <li class="nav-item mr-2 mr-md-0" data-toggle="chart" data-target="#chart-sales-dark" data-update='{"data":{"datasets":[{"data":[0, 20, 10, 30, 15, 40, 20, 60, 60]}]}}' data-prefix="$" data-suffix="k">
              <a href="/vnnews/news-notactive-admin" class="nav-link py-2 px-3" data-toggle="tab" data-ajax="true" data-ajax-method="GET" data-ajax-mode="replace" data-ajax-update="#ajaxNews">
                <span class="d-none d-md-block">Không hoạt động</span>
                <span class="d-md-none">M</span>
              </a>
            </li>
            <li class="nav-item" data-toggle="chart" data-target="#chart-sales-dark" data-update='{"data":{"datasets":[{"data":[0, 20, 5, 25, 10, 30, 15, 40, 40]}]}}' data-prefix="$" data-suffix="k">
              <a href="/vnnews/news-admin" data-toggle="tab" class="nav-link py-2 px-3" data-ajax="true" data-ajax-method="GET" data-ajax-mode="replace" data-ajax-update="#ajaxNews">
                <span class="d-none d-md-block">Thùng rác</span>
                <span class="d-md-none">W</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="" id="ajaxNews">
      <!-- Chart -->
      <table class="table table-striped">
          <thead class="bg-danger text-white">
              <tr>
                  <td>Mã danh mục</td>
                  <td>Ảnh danh mục</td>
                  <td>Tên danh mục</td>
                  <td>Ngày tạo</td>
                  <td>Lượt xem</td>
                  <td>Hoạt động</td>
                  <td>Tùy chọn</td>
              </tr>
          </head>
          <tbody>
              @foreach($data as $row)
                  <tr class="font-weight-bold">
                      <td>{{$row->category_id}}</td>
                      <td><img src="assets/images/{{$row->category_img}}" style="width: 100px; height: 100px;"/></td>
                      <td>{{$row->category_name}}</td>
                      <td>{{$row->category_datecreate}}</td>
                      <td>{{$row->category_view}}</td>
                      <td>
                          @if($row->category_activitie == 1)
                              <b style="color: green;">Hoạt động</b>
                          @else
                              <b style="color: red;">Ngừng hoạt động</b>
                          @endif
                      </td>
                      <td>
                          <i class="fas fa-eye"></i>
                          <i class="fas fa-edit"></i>
                          <i class="fas fa-trash-alt"></i>
                      </td>
                  </tr>
              @endforeach
          </tbody>
      </table>
    </div>
  </div>
</div>
<!-- them danh muc -->
<div class="modal fade" id="addcategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm danh mục</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="form" method="post" action="{{URL::to('/createcategory')}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <b>Tên danh mục</b>
                    <input required type="text" name="category_name" placeholder="Tên danh mục" class="form-control">
                    <br>
                    <b>Lượt xem</b>
                    <input required type="text" value="0" name="category_view" placeholder="Lượt xem" class="form-control">
                    <br>
                    <b>Ảnh danh mục</b>
                    <input style="height: 45px;" accept="image/*" onchange="preview_image(event)" required type="file" name="category_img" placeholder="Lượt xem" class="form-control">
                    <img id="output_image" src="assets/images/th.jpg" style="width: 300px; height: 200px" class="mt-3"/>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                      <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp;Thêm danh mục</button>
                    </div>
                </form>
                <script>
                    function preview_image(event) {
                        var reader = new FileReader();
                        reader.onload = function () {
                            var output = document.getElementById('output_image');
                            output.src = reader.result;
                        }
                        reader.readAsDataURL(event.target.files[0]);
                    }
            </script>
      </div>
    </div>
  </div>
</div>
@endsection
