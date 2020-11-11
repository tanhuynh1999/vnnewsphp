@extends('layout.layoutadmin')

@section('content')
<script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
<style>
    .ck.ck-editor__editable_inline>:last-child {
    height: 600px;
}
</style>
<div class="col-xl-12">
  <div class="">
    <div class="">
      <!-- Chart -->
      <form role="form" method="post" action="{{URL::to('/postaddnews')}}" enctype="multipart/form-data">
        <div class="row">
          <div class="col-lg-9">
              <div class="card card_border border-primary-top p-4">
                  {{csrf_field()}}
                  <a href="/vnnews/indexnews" class="text-danger"><i class="fas fa-arrow-alt-circle-left">&nbsp;</i>Quản lý tin tức</a>
                  <hr />
                  <b>Tên tin tức</b>
                  <input type="text" name="news_name" class="form-control" placeholder="Tên tin tức" required>
                  <br>
                  <b>Nội dung tin tức</b>
                  <textarea id="editor" name="news_content"></textarea>
              </div>
          </div>
          <div class="col-lg-3">
              <div class="card card_border border-primary-top p-4">
                  <b>Ảnh tin tức</b>
                  <input type="file" accept="image/*" onchange="preview_image(event)" name="news_img" class="form-control" style="height: 43px;" required>
                  <img id="output_image" src="assets/images/th.jpg" style="width: 100%; height: 200px" class="mt-3"/>
                  <br>
                  <b>Lượt xem</b>
                  <input type="number" value="1" name="news_view" class="form-control">
                  <br>
                  <b>Lượt thích</b>
                  <input type="number" value="1" name="news_like" class="form-control">
                  <br>
                  <b>Danh mục</b>
                  <select class="form-control" name="category_id">
                      <option value="">Chọn danh mục</option>
                      @foreach($category as $key => $cate)
                          <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                      @endforeach
                  </select>
                  <br>
                  <b>Hoạt động</b>
                  <select class="form-control" name="news_active">
                      <option value="true">Cho phép hiển thị sau khi tạo</option>
                      <option value="false">Cho phép không hiển thị sau khi tạo</option>
                  </select>
                  <hr>
                  <button type="submit" class="btn btn-primary" style="height: 100px;font-size: 30px;">Đăng bài</button>
              </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>



<script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
</script>
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
@endsection
