@extends('layout.layoutadmin')

@section('content')

<div class="statistics">
    <div class="row">
    <div class="col-xl-12 pr-xl-2">
        <div class="row">
        <div class="col-sm-12 pr-sm-2 statistics-grid">
            <div class="card card_border border-primary-top p-4">
                <button onclick="window.location.href='createnews'" class="btn btn-danger" style="width: 400px;"><i class="fas fa-plus"></i> Thêm tin tức</button>
                <hr>
                <table class="table table-striped">
                    <thead class="bg-primary text-white">
                        <tr>
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
                            <tr>
                                <td>{{$news->news_id}}</td>
                                <td><img src="assets/images/{{$news->news_img}}" style="width: 100px; height: 100px;"/></td>
                                <td>{{$news->news_name}}</td>
                                <td>{{$news->news_datecreate}}</td>
                                <td>{{$news->category_id}}</td>
                                <td>{{$news->news_view}}</td>
                                <td>{{$news->news_like}}</td>
                                <td>
                                    @if($news->news_active == 1)
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