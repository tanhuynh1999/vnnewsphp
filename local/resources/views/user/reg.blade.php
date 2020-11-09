@extends('layout.bladeindex')
@section('content')


<script src="Semantic-UI-CSS-master/jquery-3.4.1.min.js"></script>
<link rel="stylesheet"  href="Semantic-UI-CSS-master/semantic.min.css">
<script src="Semantic-UI-CSS-master/semantic.min.js"></script>
<link rel="stylesheet"  href="assets/css/login.css">

<div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-3 mx-auto" style="background-color: #f9f9f9; height: 1000px;">
    <div class="card mt-5" style="height: 100%;">
        <div class="row d-flex">
        <div class="col-lg-6">
                <div class="card2 card border-0 px-4 py-5">
                    <div class="row mb-4 px-3">
                        <h6 class="mb-0 mr-4 mt-2">Đăng nhập bằng</h6>
                        <div class="facebook text-center mr-3">
                            <div class="fa fa-facebook"></div>
                        </div>
                        <div class="twitter text-center mr-3 bg-danger">
                            <div class="fa fa-google-plus"></div>
                        </div>
                    </div>
                    <div class="row px-3 mb-4">
                        <div class="line"></div> <small class="or text-center">Hoặc</small>
                        <div class="line"></div>
                    </div>
                    <style>
                        .ui.form .field {
                            clear: both;
                            margin-left: -16px;
                            margin-bottom: 3px;
                            width: 104%;
                        }
                    </style>
                    <form class="ui form" role="form" method="post" action="{{URL::to('/regpost')}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="row px-3 field"> <label class="mb-1">
                                <h6 class="mb-0 text-sm">Tên hiển thị</h6>
                            </label> <input class="mb-4" type="text" name="user_name" placeholder="Nhập tên hiển thị"> 
                        </div>
                        <div class="row px-3 field"> <label class="mb-1">
                                <h6 class="mb-0 text-sm">Email</h6>
                            </label> <input class="mb-4" type="text" name="user_email" placeholder="Nhập email vnnews"> </div>
                        <div class="row px-3 field"><label class="mb-1">
                                <h6 class="mb-0 text-sm">Mật khẩu</h6>
                            </label> <input type="password" name="user_pass" placeholder="Nhập mật khẩu vnnews"> 
                        </div>
                        <br>
                        <div class="row px-3 field"><label class="mb-1">
                                <h6 class="mb-0 text-sm">Nhập lại Mật khẩu</h6>
                            </label> <input type="password" name="user_passres" placeholder="Nhập lại mật khẩu vnnews"> 
                        </div>
                        <div class="row px-3 mb-4">
                            <div class="custom-control custom-checkbox custom-control-inline"> <input id="chk1" type="checkbox" name="chk" class="custom-control-input"> <label for="chk1" class="custom-control-label text-sm">Nhớ mật khẩu</label> </div> <a href="#" class="ml-auto mb-0 text-sm">Quên mật khẩu?</a>
                        </div>
                        
                        <div class="row mb-3 px-3"> <button type="submit" class="ui primary submit button">Đăng ký</button> </div>
                        
                        <div class="row mb-4 px-3"> <small class="font-weight-bold">Nếu đã có tài khoản? <a class="text-danger " href="/vnnews/login">Đăng nhập ngay</a></small> </div>
                        <div class="ui error message"></div>
                        <script async custom-element="amp-auto-ads"
                                src="https://cdn.ampproject.org/v0/amp-auto-ads-0.1.js">
                        </script>
                        <amp-auto-ads type="adsense"
                                data-ad-client="ca-pub-6341809618883100">
                        </amp-auto-ads>
                    </form>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card1 pb-5">
                    <div class="col-lg-12">
                        <div class="row" style="padding: 15px;">
                            <div class="col-lg-12">
                                <h2 class="text-danger">Đáng chú ý trong ngày</h4>
                            </div>
                            @foreach($new as $key => $new)
                                <div class="col-lg-3 mt-1">
                                    <a href="{{URL::to('/detailnews-'.$new->news_id)}}" class="d-block zoom"><img src="assets/images/{{$new->news_img}}" alt=""
                                            class="img-fluid radius-image news-image" style="height: 145px;width: 100%;"></a>
                                    <div class="blog-info align-self">
                                        <a href="#blog-single" class="blog-desc1">
                                            {{$new->news_name}}
                                        </a>
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
        </div>
    </div>
</div>
<br>
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