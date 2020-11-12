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
            <div class="col-lg-3">
              <h6 class="text-light text-uppercase ls-1 mb-1">
                <button onclick="window.location.href='createnews'" class="btn btn-warning W-100" style="font-size: 15px;"><i class="fa fa-plus">&nbsp;</i>Thêm tin tức</button>
              </h6>
            </div>
            <div class="col-lg-9">
              <input type="text" class="form-control w-100" placeholder="Nhập tên tin tức, mã tin tức,...."/>
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
              <a href="#" class="nav-link py-2 px-3" data-toggle="tab">
                <span class="d-none d-md-block">Tin tức của biên tập viên</span>
                <span class="d-md-none">W</span>
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
              <tr class="font-weight-bold">
                  <td>Mã tin tức</td>
                  <td>Ảnh tin tức</td>
                  <td>Tên tin tức</td>
                  <td>Ngày tạo</td>
                  <td>Danh mục</td>
                  <td>Lượt xem</td>
                  <td>Lượt thích</td>
                  <td>Hoạt động</td>
                  <td>Tùy chọn</td>
              </tr>
          </head>
          <tbody>
              @foreach($news as $key => $news)
                  <tr class="text-dark">
                      <td>{{$news->news_id}}</td>
                      <td><img src="assets/images/{{$news->news_img}}" style="width: 100px; height: 100px;"/></td>
                      <td>{{$news->news_name}}</td>
                      <td>{{$news->news_datecreate}}</td>
                      <td>{{$news->category_name}}</td>
                      <td>{{$news->news_view}}</td>
                      <td>{{$news->news_like}}</td>
                      <td>
                          @if($news->news_active == 1)
                              <b>Hoạt động</b>
                          @else
                              <b>Ngừng hoạt động</b>
                          @endif
                      </td>
                      <td>
                          <a target="_blank" href="/vnnews/detailnews-{{$news->news_id}}"><i class="fas fa-eye"></i></a>
                          <a href="/vnnews/editnews-{{$news->news_id}}" class="text-warning"><i class="fas fa-edit"></i></a>
                          <a href="" class="text-red" data-toggle="modal" data-target="#de{{$news->news_id}}"><i class="fas fa-trash-alt"></i></a>
                      </td>
                  </tr>
                  <!-- Xóa -->
                    <div class="modal fade" id="de{{$news->news_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Xóa tin tức "{{$news->news_name}}"</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            Chọn thao tác và thực hiện.
                        </div>
                        <div class="modal-footer">
                          <button onclick="window.location.href='/vnnews/del-news-{{$news->news_id}}'" type="button" class="btn btn-default">Chuyển vào thùng rác</button>
                          <button onclick="window.location.href='/vnnews/delete-news-{{$news->news_id}}'" type="button" class="btn btn-danger">Xóa vĩnh viển</button>
                        </div>
                      </div>
                    </div>
                    </div>
              @endforeach
          </tbody>
      </table>
    </div>
  </div>
</div>

@endsection
