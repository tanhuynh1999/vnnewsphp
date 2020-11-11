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
                    <i class="fas fa-edit"></i>
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
