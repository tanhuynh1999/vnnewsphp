@extends('layout.bladeindex')

@section('content')


<nav id="breadcrumbs" class="breadcrumbs">
	<div class="container page-wrapper">
		<a href="/vnnews">Trang chủ</a> / Tất cả tin tức </span>
	</div>
</nav>  
<div class="w3l-searchblock w3l-homeblock1 py-5">
    <div class="container py-lg-4 py-md-3">
        <!-- block -->
        <div class="row">
            <div class="col-lg-8 most-recent">
                <h3 class="section-title-left">Tất cả tin tức mới nhất</h3>
               
                <div class="row">
                    @foreach($detail as $key => $detail)
                    <div class="col-lg-6 col-md-6 item mt-5">
                        <div class="card">
                            <div class="card-header p-0 position-relative">
                                <a href="{{URL::to('/detailnews-'.$detail->news_id)}}">
                                    <img class="card-img-bottom d-block radius-image" src="assets/images/{{$detail->news_img}}" style="width: 100%; height: 260px;" alt="Card image cap">
                                </a>
                            </div>
                            <div class="card-body p-0 blog-details">
                                <a href="{{URL::to('/detailnews-'.$detail->news_id)}}" class="blog-desc">
                                    {{$detail->news_name}}
                                </a>
                                <p>Lorem ipsum dolor sit amet consectetur ipsum adipisicing elit. Qui eligendi
                                    vitae sit.</p>
                                <div class="author align-items-center mt-3 mb-1">
                                    <a href="#author">Chuyên đề: {{$detail->category_name}}</a>
                                </div>
                                <ul class="blog-meta">
                                    <li class="meta-item blog-students">
                                        <span class="meta-value"> Đăng ngày: {{$detail->news_datecreate}}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- pagination -->
                <div class="pagination-wrapper mt-5">
                    <ul class="page-pagination">
                        <li><span aria-current="page" class="page-numbers current">1</span></li>
                        <li><a class="page-numbers" href="#url">2</a></li>
                        <li><a class="page-numbers" href="#url">3</a></li>
                        <li><a class="page-numbers" href="#url">4</a></li>
                        <li><a class="page-numbers" href="#url">....</a></li>
                        <li><a class="page-numbers" href="#url">15</a></li>
                        <li><a class="next" href="#url"><span class="fa fa-angle-right"></span></a></li>
                    </ul>
                </div>
                <!-- //pagination -->
            </div>
            <div class="col-lg-4 trending mt-lg-0 mt-5 mb-lg-5">
                <div class="pos-sticky">
                    <h3 class="section-title-left">Tin tức đáng chú ý </h3>
                    @foreach($newsview as $key=>$newsview)
                        <div class="grids5-info">
                            <h4>>></h4>
                            <div class="blog-info">
                                <a href="{{URL::to('/detailnews-'.$newsview->news_id)}}" class="blog-desc1"> {{$newsview->news_name}}
                                </a>
                                <div class="author align-items-center mt-2 mb-1">
                                <a href="#author">Thuộc: {{$newsview->category_name}}</a></a>
                                </div>
                                <ul class="blog-meta">
                                    <li class="meta-item blog-students">
                                    <span class="meta-value"> Đăng ngày: {{$newsview->news_datecreate}} </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- //block-->

        <!-- ad block -->
        <div class="ad-block text-center mt-5">
            <a href="#url"><img src="assets/images/ad.gif" class="img-fluid" alt="ad image" /></a>
        </div>
        <!-- //ad block -->
    </div>
</div>


@endsection