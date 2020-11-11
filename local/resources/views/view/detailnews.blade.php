@extends('layout.bladeindex')

@section('content')

@foreach($detail as $key => $detail)
<nav id="breadcrumbs" class="breadcrumbs">
	<div class="container page-wrapper">
		<a href="/vnnews">Trang chủ</a> / {{$detail->category_name}} /<span class="breadcrumb_last" aria-current="page">{{$detail->news_name}}</span>
	</div>
</nav>
<div class="w3l-searchblock w3l-homeblock1 py-5">
    <div class="container py-lg-4 py-md-3">
        <!-- block -->
        <div class="row">
            <div class="col-lg-8 most-recent">
                <h3 class="section-title-left">{{$detail->news_name}}</h3>

                <div class="row">
                    <div class="col-md-12 item">
                        <i class="fa fa-eye text-primary">&nbsp;</i>{{$detail->news_view}} lượt xem
                        <i class="fa fa-heart text-danger">&nbsp;</i>{{session('countlike')}} lượt thích
                        <div class="card mt-3">
                            <div class="card-header p-0 position-relative">
                                <a href="#blog-single">
                                    <img class="card-img-bottom d-block radius-image" src="assets/images/{{$detail->news_img}}" alt="Card image cap">
                                </a>
                            </div>
                            <div class="card-body p-0 blog-details">
                                <a href="#blog-single" class="blog-desc">Xem tất cả tin <b style="color: var(--primary-color);">{{$detail->category_name}}</b> liên quan
                                </a>
                                <style>
                                    .image img{
                                        width: 100%;
                                    }
                                </style>
                                <p class="imgage">
                                    {!! $detail->news_content !!}
                                </p>
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
                        </div>
                    </div>
										<div class="col-lg-12">
											<section class="blog-post-main w3l-homeblock1">
											    <!--/blog-post-->
											    <div class="blog-content-inf pb-5">
											        <div class="">
											            <div class="single-post-content">
											                <div class="comments mt-5">
											                   <h4 class="side-title ">Bình luận ({{session('countcomment')}})</h4>
											                   @if(session('countcomment') == 0)
																				 		<h5>Hãy là người bình luận đầu tiên {{session('user_name')}} nhé</h5>
																				 @else
																						 @foreach($comment as $key => $comment)
																							 <div class="media mt-4">
																									<div class="img-circle">
																											@if($comment->user_image == null)
																													<img src="./assets/images/nennen.png" class="img-fluid" alt="...">
																											@else
																													<img src="{{$comment->user_image}}" class="img-fluid" alt="...">
																											@endif
																									</div>
																									<div class="media-body">

																											<ul class="time-rply mb-2">
																													<li>
																															<a href="#URL" class="name mt-0 mb-2 d-block">{{$comment->user_name}}</a>
																															Cập nhật lúc: {{$comment->comment_dateupdate}}

																													</li>
																													@if($comment->user_email == session('user_email'))
																															<li class="reply-last">
																																	<a href="#reply" class="reply">
																																			<i class="edit icon"></i>Sửa
																																	</a>
																																	<a href="#reply" class="reply  text-danger">
																																			<i class="trash icon"></i>Xóa
																																	</a>
																															</li>
																													@else
																															<li class="reply-last">
																																	<a href="#reply" class="reply">
																																			Trả lời
																																	</a>
																															</li>
																													@endif
																											</ul>
																											<p>
																												{{$comment->comment_content}}
																											</p>
																									</div>
																							</div>
																						 @endforeach
																				 @endif

											                    <div class="media">
											                        <div class="img-circle">
											                            <img src="assets/images/c2.jpg" class="img-fluid" alt="...">
											                        </div>
											                        <div class="media-body">
											                            <ul class="time-rply mb-2">
											                                <li>
											                                    <a href="#URL" class="name mt-0 mb-2 d-block">James Harper</a>


											                                </li>
											                                <li class="reply-last">
											                                    <a href="#reply" class="reply">
											                                        Reply
											                                    </a>
											                                </li>
											                            </ul>
											                            <p>
											                                Lorem ipsum dolor, sit amet consectetur adipisicing. Ea consequuntur illum facere aperiam sequi optio consectetur adipisicing elitFuga,
											                                suscipit totam animi.....
											                            </p>
											                            <div class="media second mt-4 p-0 pt-2">
											                                <a class="img-circle img-circle-sm" href="#url">
											                                    <img src="assets/images/c3.jpg" class="img-fluid" alt="...">
											                                </a>
											                                <div class="media-body">
											                                    <ul class="time-rply mb-2">
											                                        <li>
											                                            <a href="#URL" class="name mt-0 mb-2 d-block">Jackson Wyatt</a>
											                                            April 15th, 2020 - 14:20 pm

											                                        </li>
											                                        <li class="reply-last">
											                                            <a href="#reply" class="reply"> Reply</a>
											                                        </li>
											                                    </ul>
											                                    <p>
											                                        At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis
											                                        corrupti quos dolores et. Lorem ipsum dolor sit amet......
											                                    </p>
											                                </div>
											                            </div>
											                        </div>
											                    </div>
											                </div>

											                <div class="leave-comment-form mt-5" id="reply">
											                    <h4 class="side-title mb-2">Ý kiến</h4>
											                    <p class="mb-4">
											                        Hãy để lại ý kiến cho tin tức "{{$detail->news_name}}" *
											                    </p>
											                    <form action="{{URL::to('/comment-id')}}" method="post">
																						{{csrf_field()}}
											                        <div class="form-group">
																									<input type="hidden" name="news_id" value="{{$detail->news_id}}" />
											                            <textarea name="comment_content" class="form-control" placeholder="Ý kiến của bạn*" required=""
											                                      spellcheck="false"></textarea>
											                        </div>

											                        <div class="submit text-right">
											                            <button class="btn btn-style btn-primary">Gửi </button>
											                        </div>
											                    </form>
											                </div>

											                <!-- related posts -->
											                <div class="item mt-5 pt-lg-5">
											                    <h3 class="section-title-left">Maybe You are Interested in </h3>
											                    <div class="row">
											                        <div class="col-md-6">
											                            <div class="list-view list-view1">
											                                <div class="grids5-info">
											                                    <a href="blog-single.html" class="d-block zoom"><img src="assets/images/4.jpg" alt="" class="img-fluid radius-image news-image"></a>
											                                    <div class="blog-info align-self">
											                                        <a href="blog-single.html" class="blog-desc1">
											                                            Edit/proofread your post, and fix your formatting.
											                                        </a>
											                                        <div class="author align-items-center mt-3 mb-1">
											                                            <a href="author.html">Johnson smith</a> in <a href="#url">Design</a>
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
											                                </div>
											                            </div>
											                        </div>

											                        <div class="col-md-6 mt-md-0 mt-5">
											                            <div class="list-view list-view1">
											                                <div class="grids5-info">
											                                    <a href="blog-single.html" class="d-block zoom"><img src="assets/images/6.jpg" alt="" class="img-fluid radius-image news-image"></a>
											                                    <div class="blog-info align-self">
											                                        <a href="blog-single.html" class="blog-desc1">How to Create your blog domain to make it live</a>
											                                        <div class="author align-items-center mt-3 mb-1">
											                                            <a href="author.html">Johnson smith</a> in <a href="#url">Design</a>
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
											                                </div>
											                            </div>
											                        </div>
											                    </div>
											                </div>
											                <!-- //related posts -->
											            </div>
											         </div>
										        </div>
										        <!--//blog-post-->
											</section>
										</div>
                    <div class="col-lg-6 col-md-6 item mt-5 pt-lg-3">
                        <div class="card">
                            <div class="card-header p-0 position-relative">
                                <a href="#blog-single">
                                    <img class="card-img-bottom d-block radius-image" src="assets/images/p1.jpg" alt="Card image cap">
                                </a>
                            </div>
                            <div class="card-body p-0 blog-details">
                                <a href="#blog-single" class="blog-desc">How to Start a Blog and make money every Month from it
                                </a>
                                <p>Lorem ipsum dolor sit amet consectetur ipsum adipisicing elit. Qui eligendi
                                    vitae sit.</p>
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
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 item mt-5 pt-lg-3">
                        <div class="card">
                            <div class="card-header p-0 position-relative">
                                <a href="#blog-single">
                                    <img class="card-img-bottom d-block radius-image" src="assets/images/p4.jpg" alt="Card image cap">
                                </a>
                            </div>
                            <div class="card-body p-0 blog-details">
                                <a href="#blog-single" class="blog-desc">What’s better than following your passion and making income
                                </a>
                                <p>Lorem ipsum dolor sit amet consectetur ipsum adipisicing elit. Qui eligendi
                                    vitae sit.</p>
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
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 item mt-5 pt-lg-3">
                        <div class="card">
                            <div class="card-header p-0 position-relative">
                                <a href="#blog-single">
                                    <img class="card-img-bottom d-block radius-image" src="assets/images/p3.jpg" alt="Card image cap">
                                </a>
                            </div>
                            <div class="card-body p-0 blog-details">
                                <a href="#blog-single" class="blog-desc">Without further delay, let’s learn how you can start a blog today.
                                </a>
                                <p>Lorem ipsum dolor sit amet consectetur ipsum adipisicing elit. Qui eligendi
                                    vitae sit.</p>
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
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 item mt-5 pt-lg-3">
                        <div class="card">
                            <div class="card-header p-0 position-relative">
                                <a href="#blog-single">
                                    <img class="card-img-bottom d-block radius-image" src="assets/images/p7.jpg"
                                        alt="Card image cap">
                                </a>
                            </div>
                            <div class="card-body p-0 blog-details">
                                <a href="#blog-single" class="blog-desc">Either way, Blogging could help you achieve your goal.
                                </a>
                                <p>Lorem ipsum dolor sit amet consectetur ipsum adipisicing elit. Qui eligendi
                                    vitae sit.</p>
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
                        </div>
                    </div>
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
                    @if(session('user_email') == true)
                        <div class="row">
                            <div class="col-lg-4" style="padding: 5px;">
                                @if(session('countlike') != null)
																		@foreach ($like as $key => $like)
																			<form action="{{URL::to('/cancel-like')}}" method="post" role="form">
																					<button class="ui circular icon button w-100 like" >
																							{{csrf_field()}}
																							<input type="hidden" name="like_id" value="{{$like->like_id}}" />
																							<input type="hidden" name="news_id" value="{{$detail->news_id}}" />
																							<i class="thumbs up icon" style="color: rgb(28, 18, 107)"></i>
																							<span style="color: rgb(28, 18, 107)">{{session('countlikeall')}}</span>
																					</button>
																			</form>
																		@endforeach
																@else
																		<form action="{{URL::to('/like')}}" method="post" role="form">
																				<button class="ui circular icon button w-100 like">
																						{{csrf_field()}}
																						<input type="hidden" name="user_id" value="{{session('user_email')}}"/>
																						<input type="hidden" name="news_id" value="{{$detail->news_id}}" />
																						<i class="thumbs up icon"></i>
																						{{session('countlikeall')}}
																				</button>
																		</form>
                                @endif
                            </div>
                            <div class="col-lg-4" style="padding: 5px;">
                                <button class="ui circular icon button w-100">
                                    <i class="exclamation icon"></i>
                                     Báo cáo
                                </button>
                            </div>
                            <div class="col-lg-4" style="padding: 5px;">
                                @if(session('countfa') != 0)
                                    @foreach($faid as $key=>$faid)
                                        <form action="{{URL::to('/cancel-favourite')}}" method="post" role="form">
                                            {{csrf_field()}}
                                            <button class="ui circular red icon button w-100" type="submit">
                                                <input type="hidden" name="favourite_id" value="{{$faid->favourite_id}}" />
                                                <input type="hidden" name="news_id" value="{{$detail->news_id}}" />
                                                <i class="like icon"></i>&nbsp;
                                                <b>Hủy</b>
                                            </button>
                                        </form>
                                    @endforeach
                                @else
                                    <form action="{{URL::to('/favourite')}}" method="post" role="form" id="fa">
                                        {{csrf_field()}}
                                        <button class="ui circular icon button w-100" type="submit">
                                            <input type="hidden" name="user_id" value="{{session('user_email')}}"/>
                                            <input type="hidden" name="news_id" value="{{$detail->news_id}}" />
                                            <i class="like icon"></i>
                                            <b>Yêu thích</b>
                                        </button>
                                    </form>
																		<script>

																		</script>
                                @endif
                            </div>
                        </div>

                        <button class="ui circular icon button mt-3" style="width: 200px;">
                            <i class="chat icon"></i>
                            <b>({{session('countcomment')}}) bình luận</b>
                        </button>
                        <button class="ui circular icon button mt-3" style="width: 100px;">
                            <i class="share icon"></i>
                            <b>Chia sẻ</b>
                        </button>
                    @else
                        <button class="ui circular icon button" style="width: 100px;" data-toggle="modal" data-target="#login">
                            <i class="thumbs up icon"></i>
                            <b>0</b>
                        </button>
												<button class="ui circular icon button">
														<i class="exclamation icon"></i>
														 Báo cáo
												</button>
                        <button class="ui circular icon button" style="width: 100px;" data-toggle="modal" data-target="#login">
                            <i class="like icon"></i>
                            <b>Yêu thích</b>
                        </button>
                        <button class="ui circular icon button mt-3" style="width: 200px;">
                            <i class="chat icon"></i>
                            <b>({{session('countcomment')}}) bình luận</b>
                        </button>
                        <button class="ui circular icon button mt-3" style="width: 100px;">
                            <i class="share icon"></i>
                            <b>Chia sẻ</b>
                        </button>
                    @endif
                    <hr>
                    <h3 class="section-title-left">Tin đọc gần đây </h3>

                    <div class="grids5-info">
                        <h4>01.</h4>
                        <div class="blog-info">
                            <a href="#blog-single" class="blog-desc1"> You can always change your domain name in the future if you like.
                            </a>
                            <div class="author align-items-center mt-2 mb-1">
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
                    </div>
                    <div class="grids5-info">
                        <h4>02.</h4>
                        <div class="blog-info">
                            <a href="#blog-single" class="blog-desc1"> Pick a domain name & hosting for your blog
                            </a>
                            <div class="author align-items-center mt-2 mb-1">
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
                    </div>
                    <div class="grids5-info">
                        <h4>03.</h4>
                        <div class="blog-info">
                            <a href="#blog-single" class="blog-desc1"> How To Start A Blog From Scratch and with No Experience

                            </a>
                            <div class="author align-items-center mt-2 mb-1">
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
                    </div>
                    <div class="grids5-info">
                        <h4>04.</h4>
                        <div class="blog-info">
                            <a href="#blog-single" class="blog-desc1"> Within few minutes, you will have your blog up and running.
                           </a>
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
                    </div>
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
                                <div class="field"> <label>Email
                                    <input class="form-control" type="text" name="user_email" placeholder="Nhập email vnnews">
                                </div>
                                <div class="field"> <label>Mật khẩu</label>
                                    <input class="" type="password" name="user_pass" placeholder="Nhập mật khẩu vnnews">
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
<script src="./assets/js/favourite.js"></script>
@endforeach
@endsection
