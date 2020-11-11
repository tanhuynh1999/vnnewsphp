
<!--
Author: W3layouts
Author URL: http://w3layouts.com
-->
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Design Blog a Blog Category Bootstrap Responsive Website Template | Home : W3layouts</title>

    <link href="https://fonts.googleapis.com/css2?family=Cabin:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&display=swap" rel="stylesheet">

    <!-- Template CSS -->

    <script src="Semantic-UI-CSS-master/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet"  href="Semantic-UI-CSS-master/semantic.min.css">
    <script src="Semantic-UI-CSS-master/semantic.min.js"></script>
    <link rel="stylesheet" href="assets/css/style-starter.css">
    <script data-ad-client="ca-pub-6341809618883100" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script async custom-element="amp-auto-ads"
        src="https://cdn.ampproject.org/v0/amp-auto-ads-0.1.js">
    </script>
</head>

<body>
    <!-- header -->
    <header class="w3l-header">
        <!--/nav-->
        <nav class="navbar navbar-expand-lg navbar-light fill px-lg-0 py-0 px-3">
            <div class="container">
                <a class="navbar-brand" href="/vnnews">
                    <span class="fa fa-edit"></span> vnnews</a>
                <!-- if logo is image enable this
						<a class="navbar-brand" href="#index.html">
							<img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
						</a> -->
                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <!-- <span class="navbar-toggler-icon"></span> -->
                    <span class="fa icon-expand fa-bars"></span>
                    <span class="fa icon-close fa-times"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        @foreach($category as $key => $cate)
                            <li class="nav-item @@contact__active">
                                <a class="nav-link" href="{{URL::to('/searchcate-'.$cate->category_id)}}">{{$cate->category_name}}</a>
                            </li>
                        @endforeach
                        <li class="nav-item dropdown @@category__active">
                            <a class="nav-link" href="/vnnews/allnews">
                                Tất cả
                            </a>
                        </li>
                    </ul>

                    <!--/search-right-->
                    <div class="search-right mt-lg-0 mt-2">
                        <a href="#search" title="search"><span class="fa fa-search" aria-hidden="true"></span></a>
                        <!-- search popup -->
                        <div id="search" class="pop-overlay">
                            <div class="popup">
                                <h3 class="hny-title two">Tin tức mới nhất</h3>
                                <form action="#" method="Get" class="search-box">
                                    <input type="search" placeholder="Search for blog posts" name="search"
                                        required="required" autofocus="">
                                    <button type="submit" class="btn">Search</button>
                                </form>
                                <a class="close" href="#close">×</a>
                            </div>
                        </div>
                        <!-- /search popup -->
                    </div>
                    <!--//search-right-->
                    @if(session('user_email') == true)
                        <div class="header-author d-flex ml-lg-4 pl-2 mt-lg-0 mt-3">
                            <a class="img-circle img-circle-sm" href="author.html">
                                @if(session('user_avatar') != null)
                                  <img src="{{session('user_avatar')}}" class="img-fluid" alt="...">
                                @else
                                  <img src="./assets/images/nennen.png" class="img-fluid" alt="...">
                                @endif
                            </a>
                            <div class="align-self ml-3">
                                <a href="author.html"><h5>{{session('user_name')}}</h5></a>
                                <span>
                                    <div class="ui dropdown">
                                        <div class="text">Tài khoản</div>
                                        <i class="dropdown icon"></i>
                                        <div class="menu">
                                            <div class="item">
                                              <a href="/vnnews/all-favourite"><i class="fa fa-heart text-danger">&nbsp;</i>Tin yêu thích</a>
                                            </div>
                                            <div class="item">
                                              <a href="/vnnews/all-comment"><i class="comments icon text-dark">&nbsp;</i>Bình luận của bạn</a>
                                            </div>
                                            <div class="item">
                                              <a href="/vnnews/user-setting"><i class="user icon text-success">&nbsp;</i>Cài đặt hồ sơ</a>
                                            </div>
                                            <div class="item"><a href="/vnnews/logout"><i class="fa fa-sign-out">&nbsp;</i>Đăng xuất</a></div>
                                        </div>
                                        </div>
                                </span>
                            </div>
                        </div>
                        <script>
                            $('.ui.dropdown')
                            .dropdown()
                            ;
                        </script>
                    @else
                        <!-- author -->
                        <div class="header-author d-flex ml-lg-4 pl-2 mt-lg-0 mt-3">
                            <div class="align-self ml-3">
                                <a href="#" data-toggle="modal" data-target="#login"><span>Đăng nhập</span></a>
                            </div>
                        </div>
                    @endif
                    <!-- // author-->
                </div>

                <!-- toggle switch for light and dark theme -->
                <div class="mobile-position">
                    <nav class="navigation">
                        <div class="theme-switch-wrapper">
                            <label class="theme-switch" for="checkbox">
                                <input type="checkbox" id="checkbox">
                                <div class="mode-container">
                                    <i class="gg-sun"></i>
                                    <i class="gg-moon"></i>
                                </div>
                            </label>
                        </div>
                    </nav>
                </div>
                <!-- //toggle switch for light and dark theme -->
            </div>
        </nav>
        <!--//nav-->
    </header>
    <!-- //header -->
    <div class="w3l-homeblock1 py-5">
        <div class="container pt-lg-5 pt-md-4">
            <!-- block -->
            <div class="row">
                <div class="col-lg-9">
                    <h3 class="section-title-left">Tin tức mới nhất </h3>
                    <div class="row">
                        <div class="col-lg-5 col-md-6 item">
                            <div class="card">
                                @foreach($dataone as $key => $newsone)
                                    <div class="card-header p-0 position-relative">
                                        <a href="#blog-single">
                                            <img class="card-img-bottom d-block radius-image" src="assets/images/{{$newsone->news_img}}"
                                                alt="Card image cap">
                                        </a>
                                    </div>
                                    <div class="card-body p-0 blog-details">
                                        <a href="{{URL::to('/detailnews-'.$newsone->news_id)}}" class="blog-desc">
                                            {{$newsone->news_name}}
                                        </a>
                                        <p>
                                            Thuộc: {{$newsone->category_name}}
                                        </p>
                                        <div class="author align-items-center mt-3 mb-1">
                                            <a href="#author">Tấn huỳnh</a> in <a href="#url">Design</a>
                                        </div>
                                        <ul class="blog-meta">
                                            <li class="meta-item blog-lesson">
                                                <span class="meta-value"> Đăng lúc: {{$newsone->news_datecreate}} </span>
                                            </li>
                                            <li class="meta-item blog-students">
                                                <span class="meta-value"><i class="fa fa-eye"></i> {{$newsone->news_view}}
                                                <i class="fa fa-heart"></i> {{$newsone->news_like}}
                                            </span>
                                            </li>
                                        </ul>
                                        <a href="#featuredposts" class="btn btn-style btn-outline mt-4">Xem chi tiết</a>
                                    </div>
                                @endforeach
                            </div>
                          
                        </div>
                        <div class="col-lg-7 col-md-6 mt-md-0 mt-5">
                            <div class="list-view list-view1">
                                @foreach($new as $key => $new)
                                    <div class="grids5-info mt-1">
                                        <a href="{{URL::to('/detailnews-'.$new->news_id)}}" class="d-block zoom"><img src="assets/images/{{$new->news_img}}" alt=""
                                                class="img-fluid radius-image news-image" style="height: 145px;"></a>
                                        <div class="blog-info align-self">
                                            <a href="#blog-single" class="blog-desc1">
                                                {{$new->news_name}}
                                            </a>
                                            <div class="author align-items-center mt-3 mb-1">
                                                <a href="#author">Thuộc: {{$new->category_name}}</a></a>
                                            </div>
                                            <ul class="blog-meta">
                                                <li class="meta-item blog-lesson">
                                                    <span class="meta-value"> Đăng ngày: {{$new->news_datecreate}} </span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 trending mt-lg-0 mt-5">
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
            <!-- //block -->


            <!-- block -->
            <div class="item mt-5 pt-4">
                <div class="row">
                    <div class="col-lg-6">
                        <a href="#blog-single">
                            <img class="card-img-bottom d-block radius-image" src="assets/images/p3.jpg"
                                alt="Card image cap">
                        </a>
                    </div>
                    <div class="col-lg-6 blog-details align-self mt-lg-0 mt-sm-5 mt-4">
                        <a href="#blog-single" class="blog-desc-big">
                            ĐỌC TIN TỨC MIỂN PHÍ TRÊN VNNEWS
                        </a>
                        <p>Cập nhật các tin tức tại Việt Nam và Thới Giới nhanh nhất.</p>
                        <ul class="blog-meta">
                            <li class="meta-item blog-lesson">
                                <br>
                                <button class="btn btn-danger">XEM TẤT CẢ TIN TỨC MỚI NHẤT</button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- //block-->

            <!-- block -->
            <div class="item mt-5 pt-lg-5">
                <h3 class="section-title-left"> Tin tức hot </h3>
                <div class="row">
                    <div class="col-lg-5 col-md-6">
                        <div class="list-view list-view1">
                            @foreach($newshotview as $key => $newshotview)
                                <div class="grids5-info mt-3">
                                    <a href="{{URL::to('/detailnews-'.$newshotview->news_id)}}" class="d-block zoom"><img src="assets/images/{{$newshotview->news_img}}" alt=""
                                            class="img-fluid radius-image news-image"></a>
                                    <div class="blog-info align-self">
                                        <a href="{{URL::to('/detailnews-'.$newshotview->news_id)}}" class="blog-desc1">
                                            {{$newshotview->news_name}}
                                        </a>
                                        <div class="author align-items-center mt-3 mb-1">

                                        </div>
                                        <ul class="blog-meta">
                                            <li class="meta-item blog-students">
                                                <span class="meta-value"> Đăng ngày: {{$newshotview->news_datecreate}} </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-lg-5 col-md-6 mt-md-0 mt-5">
                        <div class="list-view list-view1">
                        @foreach($newshotlike as $key => $newshotlike)
                                <div class="grids5-info mt-3">
                                    <a href="{{URL::to('/detailnews-'.$newshotlike->news_id)}}" class="d-block zoom"><img src="assets/images/{{$newshotlike->news_img}}" alt=""
                                            class="img-fluid radius-image news-image"></a>
                                    <div class="blog-info align-self">
                                        <a href="{{URL::to('/detailnews-'.$newshotlike->news_id)}}" class="blog-desc1">
                                            {{$newshotlike->news_name}}
                                        </a>
                                        <div class="author align-items-center mt-3 mb-1">

                                        </div>
                                        <ul class="blog-meta">
                                            <li class="meta-item blog-students">
                                                <span class="meta-value"> Đăng ngày: {{$newshotlike->news_datecreate}} </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-lg-2 col-sm-6 mt-lg-0 mt-5">
                        <div class="ad-img">
                            <a href="#ad-img"><img src="assets/images/ad1.jpg" class="img-fluid" alt="ad image" /></a>
                        </div>
                    </div>

                </div>
            </div>
            <!-- //block-->

            <!-- block -->
            <div class="row mt-5 pt-5">
                <div class="col-lg-9 most-recent">
                    <h3 class="section-title-left">Tin thế giới gần đây</h3>
                    <div class="list-view ">
                        @foreach($newstg as $key => $newstg)
                            <div class="grids5-info img-block-mobile mt-3">
                                <div class="blog-info align-self">
                                    <a href="{{URL::to('/detailnews-'.$newstg->news_id)}}" class="blog-desc mt-0">
                                        {{$newstg->news_name}}
                                    </a>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt tenetur accusamus
                                        voluptas. Mollitia, natus ipsam maiores placeat elit.</p>
                                    <div class="author align-items-center mt-3 mb-1">
                                        <a href="#author">Đang bởi vnnews</a> - <a href="#url">
                                            <i class="fa fa-eye text-primary">&nbsp;</i>{{$newstg->news_view}}
                                            <i class="fa fa-heart text-danger">&nbsp;</i>{{$newstg->news_like}}
                                        </a>
                                    </div>
                                    <ul class="blog-meta">
                                        <li class="meta-item blog-students">
                                            <span class="meta-value"> Đăng ngày: {{$newstg->news_datecreate}} </span>
                                        </li>
                                    </ul>
                                </div>
                                <a href="#blog-single" class="d-block zoom mt-md-0 mt-3"><img src="assets/images/{{$newstg->news_img}}"
                                        alt="" class="img-fluid radius-image news-image"></a>
                            </div>
                        @endforeach

                        <div class="row most-recent-inner my-5 py-lg-4">
                            <div class="col-md-6">
                                <div class="list-view list-view1">
                                    @foreach($newstt as $key => $newstt)
                                        <div class="grids5-info mt-3">
                                            <a href="{{URL::to('/detailnews-'.$newstt->news_id)}}" class="d-block zoom"><img style="height: 120px; width: 100%;" src="assets/images/{{$newstt->news_img}}"
                                                    alt="" class="img-fluid radius-image news-image"></a>
                                            <div class="blog-info align-self">
                                                <a href="{{URL::to('/detailnews-'.$newstt->news_id)}}" class="blog-desc1">
                                                    {{$newstt->news_name}}
                                                </a>
                                                <div class="author align-items-center mt-3 mb-1">
                                                <a href="#author">Đang bởi vnnews</a> - <a href="#url">
                                                    <i class="fa fa-eye text-primary">&nbsp;</i>{{$newstg->news_view}}
                                                    <i class="fa fa-heart text-danger">&nbsp;</i>{{$newstg->news_like}}
                                                </a>
                                                </div>
                                                <ul class="blog-meta">
                                                    <li class="meta-item blog-students">
                                                        <span class="meta-value"> Đăng ngày: {{$newstt->news_datecreate}} </span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="col-md-6 mt-md-0 mt-5">
                                <div class="list-view list-view1">
                                @foreach($newssk as $key => $newssk)
                                        <div class="grids5-info mt-3">
                                            <a href="{{URL::to('/detailnews-'.$newssk->news_id)}}" class="d-block zoom"><img style="height: 120px; width: 100%;" src="assets/images/{{$newssk->news_img}}"
                                                    alt="" class="img-fluid radius-image news-image"></a>
                                            <div class="blog-info align-self">
                                                <a href="{{URL::to('/detailnews-'.$newssk->news_id)}}" class="blog-desc1">
                                                    {{$newssk->news_name}}
                                                </a>
                                                <div class="author align-items-center mt-3 mb-1">
                                                <a href="#author">Đang bởi vnnews</a> - <a href="#url">
                                                    <i class="fa fa-eye text-primary">&nbsp;</i>{{$newssk->news_view}}
                                                    <i class="fa fa-heart text-danger">&nbsp;</i>{{$newssk->news_like}}
                                                </a>
                                                </div>
                                                <ul class="blog-meta">
                                                    <li class="meta-item blog-students">
                                                        <span class="meta-value"> Đăng ngày: {{$newssk->news_datecreate}} </span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        @foreach($newscn as $key=>$newscn)
                        <div class="grids5-info img-block-mobile mt-5">
                            <div class="blog-info align-self">
                                <a href="{{URL::to('/detailnews-'.$newscn->news_id)}}" class="blog-desc mt-0">
                                    {{$newscn->news_name}}
                                </a>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt tenetur accusamus
                                    voluptas. Mollitia, natus ipsam maiores beatae elit.</p>
                                <div class="author align-items-center mt-3 mb-1">
                                    <a href="#author">Johnson smith</a> in <a href="#url">Design</a>
                                </div>
                                <ul class="blog-meta">
                                    <li class="meta-item blog-lesson">
                                        <span class="meta-value"> April 13, 2020 </span>
                                    </li>
                                    <li class="meta-item blog-students">
                                        <span class="meta-value"> 6min read</span>
                                    </li>
                                </ul>
                            </div>
                            <a href="{{URL::to('/detailnews-'.$newscn->news_id)}}" class="d-block zoom mt-md-0 mt-3"><img src="assets/images/{{$newscn->news_img}}"
                                    alt="" class="img-fluid radius-image news-image"></a>
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
                <div class="col-lg-3 trending mt-lg-0 mt-5 mb-lg-5">
                    <div class="pos-sticky">
                        <h3 class="section-title-left">Tất cả danh mục </h3>
                        @foreach($cateall as $key => $cateall)
                            <div class="grids5-info">
                            <h4></h4>
                                <div class="blog-info">
                                    <a href="#blog-single" class="blog-desc1">
                                        <img src="assets/images/{{$cateall->category_img}}" style="width: 100%; height: 100px;"/>
                                        <br>
                                        <br>
                                        <center>
                                        {{$cateall->category_name}}
                                        </center>
                                    </a>
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

    <!-- footer -->
    <footer class="w3l-footer-16">
        <div class="footer-content py-lg-5 py-4 text-center">
            <div class="container">
                <div class="copy-right">
                    <h6>© 2020 Design Blog . Made with vnnews </h6>
                </div>
                <button onclick="topFunction()" id="movetop" title="Go to top">
                    <span class="fa fa-angle-up"></span>
                </button>
            </div>
        </div>

        <!-- move top -->
        <script>
            // When the user scrolls down 20px from the top of the document, show the button
            window.onscroll = function () {
                scrollFunction()
            };

            function scrollFunction() {
                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                    document.getElementById("movetop").style.display = "block";
                } else {
                    document.getElementById("movetop").style.display = "none";
                }
            }

            // When the user clicks on the button, scroll to the top of the document
            function topFunction() {
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            }
        </script>
        <!-- //move top -->
    </footer>
    <!-- //footer -->
    <!-- Modal -->
    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Đăng nhập</a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Đăng ký</a>
                </div>
                <div class="tab-content mt-5" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="row">
                        <div class="col-lg-6">
                                <h4 class="text-danger text-center">Đăng nhập bằng email</h3>
                                <form class="ui form" role="form" method="post" action="{{URL::to('/loginpost')}}">
                                    {{csrf_field()}}
                                    <div class="field"> <label>Email</label>
                                        <input class="form-control" type="text" name="user_email" placeholder="Nhập email vnnews">
                                    </div>
                                    <div class="field"> <label>Mật khẩu</label>
                                        <input class="" type="text" name="user_pass" placeholder="Nhập mật khẩu vnnews">
                                    </div>
                                    <div class="row px-3 mb-4">
                                        <div class="custom-control custom-checkbox custom-control-inline"> <input id="chk1" type="checkbox" name="chk" class="custom-control-input"> <label for="chk1" class="custom-control-label text-sm">Nhớ mật khẩu</label> </div> <a href="#" class="ml-auto mb-0 text-sm">Quên mật khẩu?</a>
                                    </div>

                                    <div class="row mb-3 px-3"> <button type="submit" class="ui primary submit button w-100">Đăng nhập</button> </div>
                                    <div class="ui error message"></div>
                                </form>
                                <script>
                                    $('.ui.form')
                                    .form({
                                        fields: {
                                            user_email: {
                                            identifier: 'user_email',
                                            rules: [
                                            {
                                                type   : 'empty',
                                                prompt : 'Vui lòng nhập email'
                                            },
                                            {
                                                type   : 'email',
                                                prompt : 'Vui lòng nhập email đúng định dạng'
                                            }
                                            ]
                                        },
                                        user_pass: {
                                            identifier: 'user_pass',
                                            rules: [
                                            {
                                                type   : 'empty',
                                                prompt : 'Vui lòng nhập mật khẩu'
                                            },{
                                                type   : 'minLength[6]',
                                                prompt : 'Mật khẩu phải trên 6 ký tự'
                                            }
                                            ]
                                        }
                                        }
                                    });
                                </script>
                            </div>
                            <div class="col-lg-6">
                                <h4 class="text-danger text-center">Đăng nhập bằng</h3>
                                <button class="ui facebook button w-100 mt-4" onclick="window.location.href='/vnnews/login/facebook'">
                                    <i class="facebook icon"></i>
                                    Facebook
                                </button>
                                <button class="ui google plus button w-100 mt-2">
                                    <i class="google plus icon"></i>
                                    Google Plus
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="row">
                        <div class="col-lg-6">
                                <h4 class="text-danger text-center">Đăng ký bằng email</h3>
                                <form class="ui form" role="form" method="post" action="{{URL::to('/regpost')}}" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="field"> <label>Tên hiển thị</label>
                                        <input class="form-control" type="text" name="user_name" placeholder="Nhập tên hiển thị">
                                    </div>
                                    <div class="field"> <label>Email</label>
                                        <input class="form-control" type="text" name="user_email" placeholder="Nhập email vnnews">
                                    </div>
                                    <div class="field"> <label>Mật khẩu</label>
                                        <input class="form-control" type="password" name="user_pass" placeholder="Nhập mật khẩu vnnews">
                                    </div>
                                    <div class="row px-3 mb-4">
                                        <div class="custom-control custom-checkbox custom-control-inline"> <input id="chk1" type="checkbox" name="chk" class="custom-control-input"> <label for="chk1" class="custom-control-label text-sm">Thỏa thuận</label> </div> <a href="#" class="ml-auto mb-0 text-sm">Quên mật khẩu?</a>
                                    </div>

                                    <div class="row mb-3 px-3"> <button type="submit" class="ui primary submit button w-100">Đăng ký</button> </div>

                                    <div class="ui error message"></div>
                                    <script async custom-element="amp-auto-ads"
                                            src="https://cdn.ampproject.org/v0/amp-auto-ads-0.1.js">
                                    </script>
                                    <amp-auto-ads type="adsense"
                                            data-ad-client="ca-pub-6341809618883100">
                                    </amp-auto-ads>
                                </form>
                                <script>
                                    $('.ui.form')
                                    .form({
                                        on: 'blur',
                                        fields: {
                                            user_email: {
                                            identifier: 'user_email',
                                            rules: [
                                            {
                                                type   : 'empty',
                                                prompt : 'Vui lòng nhập email đúng định dạng'
                                            }
                                            ]
                                        },
                                        user_pass: {
                                            identifier: 'user_pass',
                                            rules: [
                                            {
                                                type   : 'empty',
                                                prompt : 'Vui lòng nhập mật khẩu'
                                            }
                                            ]
                                        },
                                        user_name: {
                                            identifier: 'user_name',
                                            rules: [
                                            {
                                                type   : 'empty',
                                                prompt : 'Vui lòng nhập tên'
                                            }
                                            ]
                                        },
                                        username: {
                                            identifier: 'username',
                                            rules: [
                                            {
                                                type   : 'empty',
                                                prompt : 'Please enter a username'
                                            }
                                            ]
                                        },
                                        user_pass: {
                                            identifier: 'user_pass',
                                            rules: [
                                            {
                                                type   : 'empty',
                                                prompt : 'Mật khẩu không để trống'
                                            },
                                            {
                                                type   : 'minLength[6]',
                                                prompt : 'Mật khẩu phải trên {ruleValue} ký tự'
                                            }
                                            ]
                                        },
                                        user_passres: {
                                            identifier: 'user_passres',
                                            rules: [
                                            {
                                                type   : 'empty',
                                                prompt : 'Xác nhân mật khẩu không được để trống'
                                            },
                                            {
                                                type   : 'minLength[6]',
                                                prompt : 'Your password must be at least {ruleValue} characters'
                                            }
                                            ]
                                        },
                                        terms: {
                                            identifier: 'terms',
                                            rules: [
                                            {
                                                type   : 'checked',
                                                prompt : 'You must agree to the terms and conditions'
                                            }
                                            ]
                                        }
                                        }
                                    });
                                </script>
                            </div>
                            <div class="col-lg-6">
                                <h4 class="text-danger text-center">Đăng nhập bằng</h3>
                                <button class="ui facebook button w-100 mt-4" onclick="window.location.href='/vnnews/login/facebook'">
                                    <i class="facebook icon"></i>
                                    Facebook
                                </button>
                                <button class="ui google plus button w-100 mt-2">
                                    <i class="google plus icon"></i>
                                    Google Plus
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Template JavaScript -->
    <script src="assets/js/theme-change.js"></script>

    <script src="assets/js/jquery-3.3.1.min.js"></script>

    <!-- disable body scroll which navbar is in active -->
    <script>
        $(function () {
            $('.navbar-toggler').click(function () {
                $('body').toggleClass('noscroll');
            })
        });
    </script>
    <!-- disable body scroll which navbar is in active -->

    <script src="assets/js/bootstrap.min.js"></script>

</body>

</html>
