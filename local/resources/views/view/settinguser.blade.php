@extends('layout.bladeindex')

@section('content')

<div class="w3l-searchblock w3l-homeblock1 py-5">
    <div class="container py-lg-4 py-md-3">
        <!-- block -->
        <div class="row">
            <div class="col-lg-4 trending mt-lg-0 mt-5 mb-lg-5" style="padding: 15px">
                <div class="pos-sticky">
                    <div class="row">
                        <div class="col-lg-3" style="padding: 5px">
                            @if(session('user_avatar') != null)
                              <img src="{{session('user_avatar')}}" class="w-100"/>
                            @else
                              <img src="./assets/images/nennen.png" class="img-fluid" alt="...">
                            @endif
                        </div>
                        <div class="col-lg-9" style="padding: 5px">
                          <ul>
                              <li><h3><b>{{session('user_name')}}</b></h3></li>
                              <li><b>Vai trò:</b>
                                  @if(session('user_role') == 2)
                                    <span>Biên tập viên</span>
                                  @else
                                    <span>Thành viên</span>
                                  @endif
                              </li>
                              <li>
                                Tham gia: 11/10/2020
                              </li>
                          </ul>
                        </div>
                        <div class="col-lg-12" style="padding: 5px">
                          <div class="list-group">
                              <button onclick="window.location.href='/vnnews/all-favourite'" type="button" class="list-group-item list-group-item-action" >
                                <i class="heart icon"></i>Tin đã lưu ({{session('countfavourite')}})
                              </button>
                              <button onclick="window.location.href='/vnnews/all-comment'" type="button" class="list-group-item list-group-item-action">
                                <i class="chat icon"></i>Bình luận ({{session('countcomment')}})
                              </button>
                              <button onclick="window.location.href='/vnnews/user-setting'" type="button" class="list-group-item list-group-item-action text-white" style="background-color:rgb(170, 39, 39)">
                                <i class="cogs icon"></i>Cài đặt tài khoản
                              </button>
                              <button onclick="window.location.href='/vnnews/editor'" type="button" class="list-group-item list-group-item-action">
                                <i class="edit icon"></i>Đăng ký làm biên tập viên
                              </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 most-recent" style="padding: 15px">
                <h3 class="section-title-left">Thông tin cá nhân</h3>
                <div class="row">
                    <div class="col-lg-2" style="padding: 5px">
                      @if(session('user_avatar') != null)
                        <img src="{{session('user_avatar')}}" class="w-100"/>
                      @else
                        <img src="./assets/images/nennen.png" class="img-fluid" alt="...">
                      @endif
                    </div>
                    <div class="col-lg-10" style="padding: 5px">
                      <ul>
                          <li><h3><b>{{session('user_name')}}</b></h3></li>
                          <li><b>Vai trò:</b>
                              @if(session('user_role') == 2)
                                <span>Biên tập viên</span>
                              @else
                                <span>Thành viên</span>
                              @endif
                          </li>
                          <li>
                            Tham gia: 11/10/2020
                          </li>
                          <li>
                            <button class="btn btn-danger">Thay đổi ảnh đại diện</button>
                          </li>
                      </ul>
                    </div>
                    <div class="col-lg-12" style="padding: 5px">
                      <hr />
                      @foreach($detail as $key=>$detail)
                          <label><b>Tên hiển thị</b></label>
                          <input type="text" name="user_name" class="form-control" value="{{$detail->user_name}}" disabled/>
                          <label class="mt-2"><b>Giới tính</b></label>
                          <input type="text" name="user_sex" class="form-control" value="@if($detail->user_sex == 1) Nam @else Nữ @endif" disabled/>
                          <hr />
                          <label class="mt-2"><b>
                          Cài đặt hiển thị tin tức:</b></label>
                          <input type="text" name="user_sex" class="form-control" value="@if($detail->user_sex == 1) Nam @else Nữ @endif" disabled/>
                          <hr />
                          <label class="mt-2"><b>Email</b></label>
                          <br />
                          <i class="text-danger">Không thay đổi được email</i>
                          <input type="text" name="user_email" class="form-control" value="{{$detail->user_email}}" disabled/>
                          <label class="mt-2"><b>Mật khẩu</b></label>
                          <br />
                          <input type="text" name="user_email" class="form-control" value="*********************" disabled/>
                      @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="row">

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
