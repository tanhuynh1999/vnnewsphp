@extends('layout.layoutadmin')

@section('content')
<script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
<style>
    .ck.ck-editor__editable_inline>:last-child {
    height: 600px;
}
</style>
@foreach($detail as $key=>$detail)
<div class="col-xl-12">
  <div class="">
    <div class="">
      <!-- Chart -->
      <form role="form" method="post" action="{{URL::to('/editnews-post')}}" enctype="multipart/form-data">
        <div class="row">
          <div class="col-lg-9">
              <div class="card card_border border-primary-top p-4">
                  {{csrf_field()}}
                  <a href="/vnnews/indexnews" class="text-danger"><i class="fas fa-arrow-alt-circle-left">&nbsp;</i>Quản lý tin tức</a>
                  <hr />
                  <b>Tên tin tức</b>
                  <input type="text" name="news_name" value="{{$detail->news_name}}" class="form-control" placeholder="Tên tin tức" required>
                  <br>
                  <b>Nội dung tin tức</b>
                  <textarea id="editor" name="news_content">
                    {{$detail->news_content}}
                  </textarea>
              </div>
          </div>
          <div class="col-lg-3">
              <div class="card card_border border-primary-top p-4">
                  <b>Ảnh tin tức</b>
                  <input type="hidden" name="news_img" value="{{$detail->news_img}}" />
                  <input type="hidden" name="news_id" value="{{$detail->news_id}}" />
                  <input type="file" accept="image/*" onchange="preview_image(event)" name="news_imgedit" class="form-control" style="height: 43px;" >
                  <img id="output_image" src="assets/images/{{$detail->news_img}}" style="width: 100%; height: 200px" class="mt-3"/>
                  <br>
                  <b>Lượt xem</b>
                  <input type="number" value="{{$detail->news_view}}" name="news_view" class="form-control">
                  <br>
                  <b>Lượt thích</b>
                  <input type="number" value="{{$detail->news_like}}" name="news_like" class="form-control">
                  <br>
                  <b>Danh mục</b>
                  <select class="form-control" name="category_id">
                      <option>{{$detail->category_name}}</option>
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
                  <button type="submit" class="btn btn-primary" style="height: 100px;font-size: 30px;">Lưu thay đổi</button>
              </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endforeach
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
