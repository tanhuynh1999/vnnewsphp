@extends('layout.layoutadmin')

@section('content')

<div class="statistics">
    <div class="row">
    <div class="col-xl-12 pr-xl-2">
        <div class="row">
        <div class="col-sm-4 pr-sm-2 statistics-grid">
            <div class="card card_border border-primary-top p-4">
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
                    <br>
                    <button class="btn btn-danger mt-3"><i class="fas fa-plus"></i> Thêm danh mục</button>
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
        <div class="col-sm-8 pr-sm-2 statistics-grid">
            <div class="card card_border border-primary-top p-4">
                <table class="table table-striped">
                    <thead class="bg-primary text-white">
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
                            <tr>
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
    </div>
    </div>
</div>

@endsection