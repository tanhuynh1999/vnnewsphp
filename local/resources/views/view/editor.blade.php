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
                              <button onclick="window.location.href='/vnnews/user-setting'" type="button" class="list-group-item list-group-item-action"
                              >
                                <i class="cogs icon"></i>Cài đặt tài khoản
                              </button>
                              <button onclick="window.location.href='/vnnews/editor'" type="button" class="list-group-item list-group-item-action text-white" style="background-color:rgb(170, 39, 39)">
                                @if(session('counteditor') != 0)
                                  <i class="edit icon"></i>Biên tập viên
                                @else
                                  <i class="edit icon"></i>Đăng ký làm biên tập viên
                                @endif
                              </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 most-recent" style="padding: 15px">
                <h3 class="section-title-left">Đăng ký làm biên tập viên</h3>
                <div class="row">
                    <div class="col-lg-12" style="padding: 5px">
                      @if(session('counteditor') != 0)
                        @foreach($detaileditortwo as $key => $detaileditortwo)
                            @if($detaileditortwo->editor_change == 1)
                                <h2>Đơn của bạn không được chấp nhận! Vui lòng sửa lại thông tin hoặc liên hệ admin để xem chi tiết.</h2>
                            @elseif($detaileditortwo->editor_change == 0)
                                <h2>Bạn đang là công tác viên của vnnews. Bạn có thể đăng tin tức của riêng bạn, sau khi xem xét tin tức chúng tôi sẽ cho hiển thị lên trang chủ</h2>
                            @else
                                <h2>Đơn của bạn đang được vnnews duyệt, sẽ sớm có kết quả. Sau khi được duyệt bạn sẽ có chức năng đăng bài dành riêng cho biên tập viên.</h2>
                            @endif
                        @endforeach
                      @else
                        <h2>Để lại thông tin, vnnews xem xét và kích hoạt là người đăng tin khi đủ điều kiện</h2>
                      @endif
                    </div>
                    <div class="col-lg-12" style="padding: 5px">
                      @if(session('counteditor') != 0)
                        @foreach($detaileditor as $key => $detaileditor)
                            @if($detaileditor->editor_change == 1)
                            <hr />
                            <h2 class="text-danger">Đơn xin làm biên tập viên</h2>
                            <ul>
                              <li><b>Họ và tên: </b> {{$detaileditor->editor_fullname}}</li>
                              <li><b>Giới tính: </b> @if($detaileditor->editor_sex == 1) Nam @else Nữ @endif</li>
                              <li><b>Link facebook: </b> <a href="{{$detaileditor->editor_fb}}" target="_blank">{{$detaileditor->editor_fb}}</a></li>
                              <li><b>Số điện thoại: </b> {{$detaileditor->editor_phone}}</li>
                              <li><b>Email: </b> {{$detaileditor->editor_email}}</li>
                              <li>
                                <b><u>Thời gian rãnh:</u></b>
                                <br />
                                {{$detaileditor->editor_time}}
                              </li>
                              <li>
                                <b><u>Giới thiệu bản thân:</u></b>
                                <br />
                                {{$detaileditor->editor_introduce}}
                              </li>
                              <li>
                                <b><u>Sở thích:</u></b>
                                <br />
                                {{$detaileditor->editor_interests}}
                              </li>
                              <li>
                                <b><u>Sở thích:</u></b>
                                <br />
                                {{$detaileditor->editor_interests}}
                              </li>
                              <li>
                                <b><u>Cam kết:</u></b>
                                <br />
                                <i>{{$detaileditor->editor_commitment}}</i>
                              </li>
                              <li>
                                <b><u>Tâm huyết:</u></b>
                                <br />
                                {{$detaileditor->editor_enthusiasm}}
                              </li>
                              <hr />
                              <li>
                                <b>Thời gian nộp: </b>{{$detaileditor->editor_datecreate}}
                              </li>
                              <li>
                                <b>Thời gian cập nhật: </b>{{$detaileditor->editor_dateupdate}}
                              </li>
                              <li class="mt-4">
                                  <button class="ui primary button" data-toggle="modal" data-target="#editeditor{{$detaileditor->editor_id}}">
                                      <i class="save icon"></i>Sửa thông tin
                                  </button>
                                  <button class="ui red button" data-toggle="modal" data-target="#d{{$detaileditor->editor_id}}">
                                      <i class="trash icon"></i>Xóa vĩnh viển
                                  </button>
                                  <!-- xoa editor -->
                                  <div class="modal fade" id="d{{$detaileditor->editor_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title text-dark" id="exampleModalLabel">Xóa đơn</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                          <b class="text-danger">Bạn có chắc muốn xóa! Nếu xóa mọi thông tin sẽ mất và không khôi phục lại được.</b>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                          <button onclick="window.location.href='/vnnews/editor-edit-del-{{$detaileditor->editor_id}}'" type="button" class="btn btn-danger"><i class="trash icon">&nbsp;</i>Xóa vĩnh viển</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <!-- Sua editor -->
                                    <div class="modal fade" id="editeditor{{$detaileditor->editor_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog modal-xl" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 style="color: red" class="modal-title" id="exampleModalLabel">Sửa đơn xin làm biên tập viên</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                                <form class="haiz ui form" role="form" method="post" action="{{URL::to('/editor-edit-e')}}">
                                                  {{csrf_field()}}
                                                  <style>
                                                      .field b{
                                                        color: black;
                                                      }
                                                  </style>
                                                  <div class="field">
                                                    <b>Họ và tên</b>
                                                    <input type="text" value="{{$detaileditor->editor_fullname}}" name="editor_fullname" class="form-control" placeholder="Nhập đầy đủ họ và tên"/>
                                                  </div>
                                                  <div class="field">
                                                    <b class="mt-2">Giới tính</b>
                                                    <select class="form-control" name="editor_sex">
                                                        <option value="1">Nam</option>
                                                        <option value="2">Nữ</option>
                                                    </select>
                                                  </div>
                                                  <div class="field">
                                                    <b class="mt-2">Link facebook</b>
                                                    <input type="text" value="{{$detaileditor->editor_fb}}" name="editor_fb" class="form-control" placeholder="Link trang cá nhân facebook"/>
                                                  </div>
                                                  <div class="field">
                                                    <b class="mt-2">Số điện thoại</b>
                                                    <input type="text" value="{{$detaileditor->editor_phone}}" name="editor_phone" class="form-control" placeholder="Số điện thoại liên hệ"/>
                                                  </div>
                                                  <div class="field">
                                                    <b class="mt-2">Email</b>
                                                    <input type="text" value="{{$detaileditor->editor_email}}" name="editor_email" class="form-control" placeholder="Nhập email"/>
                                                  </div>
                                                  <div class="field">
                                                    <b class="mt-2">Thời gian rảnh</b>
                                                    <textarea name="editor_time" class="form-control" placeholder="Thời gian rãnh của bạn">{{$detaileditor->editor_time}}</textarea>
                                                  </div>
                                                  <div class="field">
                                                    <b class="mt-2">Giới thiệu bản thân</b>
                                                    <textarea name="editor_introduce" class="form-control" style="height: 200px" placeholder="Đôi nét về bản thân">{{$detaileditor->editor_introduce}}</textarea>
                                                  </div>
                                                  <div class="field">
                                                    <b class="mt-2">Sở thích</b>
                                                    <textarea name="editor_interests" placeholder="Sở thích của bạn" class="form-control" style="height: 200px">{{$detaileditor->editor_interests}}</textarea>
                                                  </div>
                                                  <div class="field">
                                                    <b class="mt-2">Cam kết</b>
                                                    <textarea name="editor_commitment" placeholder="Cam kết đăng tin" class="form-control" style="height: 200px">{{$detaileditor->editor_commitment}}</textarea>
                                                  </div>
                                                  <div class="field">
                                                    <b class="mt-2">Tâm huyết</b>
                                                    <textarea name="editor_enthusiasm" placeholder="Tâm huyết sau khi làm biên tập viên" class="form-control" style="height: 200px">{{$detaileditor->editor_enthusiasm}}</textarea>
                                                  </div>
                                                  <br />
                                                  <input type="hidden" name="editor_id" value="{{$detaileditor->editor_id}}" />
                                                  <div class="ui error message"></div>
                                                  <div class="ui red submit button">Lưu thay đổi</div>
                                                </form>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                              </li>
                            </ul>
                            @elseif($detaileditor->editor_change == 0)

                            @else
                                <hr />
                                <h2 class="text-danger">Đơn xin làm biên tập viên</h2>
                                <ul>
                                  <li><b>Họ và tên: </b> {{$detaileditor->editor_fullname}}</li>
                                  <li><b>Giới tính: </b> @if($detaileditor->editor_sex == 1) Nam @else Nữ @endif</li>
                                  <li><b>Link facebook: </b> <a href="{{$detaileditor->editor_fb}}" target="_blank">{{$detaileditor->editor_fb}}</a></li>
                                  <li><b>Số điện thoại: </b> {{$detaileditor->editor_phone}}</li>
                                  <li><b>Email: </b> {{$detaileditor->editor_email}}</li>
                                  <li>
                                    <b><u>Thời gian rãnh:</u></b>
                                    <br />
                                    {{$detaileditor->editor_time}}
                                  </li>
                                  <li>
                                    <b><u>Giới thiệu bản thân:</u></b>
                                    <br />
                                    {{$detaileditor->editor_introduce}}
                                  </li>
                                  <li>
                                    <b><u>Sở thích:</u></b>
                                    <br />
                                    {{$detaileditor->editor_interests}}
                                  </li>
                                  <li>
                                    <b><u>Sở thích:</u></b>
                                    <br />
                                    {{$detaileditor->editor_interests}}
                                  </li>
                                  <li>
                                    <b><u>Cam kết:</u></b>
                                    <br />
                                    <i>{{$detaileditor->editor_commitment}}</i>
                                  </li>
                                  <li>
                                    <b><u>Tâm huyết:</u></b>
                                    <br />
                                    {{$detaileditor->editor_enthusiasm}}
                                  </li>
                                  <hr />
                                  <li>
                                    <b>Thời gian nộp: </b>{{$detaileditor->editor_datecreate}}
                                  </li>
                                  <li>
                                    <b>Thời gian cập nhật: </b>{{$detaileditor->editor_dateupdate}}
                                  </li>
                                  <li class="mt-4">
                                      <button class="ui primary button" data-toggle="modal" data-target="#editeditor{{$detaileditor->editor_id}}">
                                          <i class="save icon"></i>Sửa thông tin
                                      </button>
                                      <button class="ui red button" data-toggle="modal" data-target="#d{{$detaileditor->editor_id}}">
                                          <i class="trash icon"></i>Xóa vĩnh viển
                                      </button>
                                      <!-- xoa editor -->
                                      <div class="modal fade" id="d{{$detaileditor->editor_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title text-dark" id="exampleModalLabel">Xóa đơn</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                              <b class="text-danger">Bạn có chắc muốn xóa! Nếu xóa mọi thông tin sẽ mất và không khôi phục lại được.</b>
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                              <button onclick="window.location.href='/vnnews/editor-edit-del-{{$detaileditor->editor_id}}'" type="button" class="btn btn-danger"><i class="trash icon">&nbsp;</i>Xóa vĩnh viển</button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <!-- Sua editor -->
                                        <div class="modal fade" id="editeditor{{$detaileditor->editor_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog modal-xl" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h5 style="color: red" class="modal-title" id="exampleModalLabel">Sửa đơn xin làm biên tập viên</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                              </div>
                                              <div class="modal-body">
                                                    <form class="haiz ui form" role="form" method="post" action="{{URL::to('/editor-edit-e')}}">
                                                      {{csrf_field()}}
                                                      <style>
                                                          .field b{
                                                            color: black;
                                                          }
                                                      </style>
                                                      <div class="field">
                                                        <b>Họ và tên</b>
                                                        <input type="text" value="{{$detaileditor->editor_fullname}}" name="editor_fullname" class="form-control" placeholder="Nhập đầy đủ họ và tên"/>
                                                      </div>
                                                      <div class="field">
                                                        <b class="mt-2">Giới tính</b>
                                                        <select class="form-control" name="editor_sex">
                                                            <option value="1">Nam</option>
                                                            <option value="2">Nữ</option>
                                                        </select>
                                                      </div>
                                                      <div class="field">
                                                        <b class="mt-2">Link facebook</b>
                                                        <input type="text" value="{{$detaileditor->editor_fb}}" name="editor_fb" class="form-control" placeholder="Link trang cá nhân facebook"/>
                                                      </div>
                                                      <div class="field">
                                                        <b class="mt-2">Số điện thoại</b>
                                                        <input type="text" value="{{$detaileditor->editor_phone}}" name="editor_phone" class="form-control" placeholder="Số điện thoại liên hệ"/>
                                                      </div>
                                                      <div class="field">
                                                        <b class="mt-2">Email</b>
                                                        <input type="text" value="{{$detaileditor->editor_email}}" name="editor_email" class="form-control" placeholder="Nhập email"/>
                                                      </div>
                                                      <div class="field">
                                                        <b class="mt-2">Thời gian rảnh</b>
                                                        <textarea name="editor_time" class="form-control" placeholder="Thời gian rãnh của bạn">{{$detaileditor->editor_time}}</textarea>
                                                      </div>
                                                      <div class="field">
                                                        <b class="mt-2">Giới thiệu bản thân</b>
                                                        <textarea name="editor_introduce" class="form-control" style="height: 200px" placeholder="Đôi nét về bản thân">{{$detaileditor->editor_introduce}}</textarea>
                                                      </div>
                                                      <div class="field">
                                                        <b class="mt-2">Sở thích</b>
                                                        <textarea name="editor_interests" placeholder="Sở thích của bạn" class="form-control" style="height: 200px">{{$detaileditor->editor_interests}}</textarea>
                                                      </div>
                                                      <div class="field">
                                                        <b class="mt-2">Cam kết</b>
                                                        <textarea name="editor_commitment" placeholder="Cam kết đăng tin" class="form-control" style="height: 200px">{{$detaileditor->editor_commitment}}</textarea>
                                                      </div>
                                                      <div class="field">
                                                        <b class="mt-2">Tâm huyết</b>
                                                        <textarea name="editor_enthusiasm" placeholder="Tâm huyết sau khi làm biên tập viên" class="form-control" style="height: 200px">{{$detaileditor->editor_enthusiasm}}</textarea>
                                                      </div>
                                                      <br />
                                                      <input type="hidden" name="editor_id" value="{{$detaileditor->editor_id}}" />
                                                      <div class="ui error message"></div>
                                                      <div class="ui red submit button">Lưu thay đổi</div>
                                                    </form>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                  </li>
                                </ul>
                            @endif
                        @endforeach
                      @else
                      @foreach($detail as $key=>$detail)
                          <form class="haiz ui form" role="form" method="post" action="{{URL::to('/post-editor')}}">
                            {{csrf_field()}}
                            <div class="field">
                              <b>Họ và tên</b>
                              <input type="text" name="editor_fullname" class="form-control" placeholder="Nhập đầy đủ họ và tên"/>
                            </div>
                            <div class="field">
                              <b class="mt-2">Giới tính</b>
                              <select class="form-control" name="editor_sex">
                                  <option value="1">Nam</option>
                                  <option value="2">Nữ</option>
                              </select>
                            </div>
                            <div class="field">
                              <b class="mt-2">Link facebook</b>
                              <input type="text" name="editor_fb" class="form-control" placeholder="Link trang cá nhân facebook"/>
                            </div>
                            <div class="field">
                              <b class="mt-2">Số điện thoại</b>
                              <input type="text" value="{{$detail->user_phone}}" name="editor_phone" class="form-control" placeholder="Số điện thoại liên hệ"/>
                            </div>
                            <div class="field">
                              <b class="mt-2">Email</b>
                              <input type="text" value="{{$detail->user_email}}" name="editor_email" class="form-control" placeholder="Nhập email"/>
                            </div>
                            <div class="field">
                              <b class="mt-2">Thời gian rảnh</b>
                              <textarea name="editor_time" class="form-control" placeholder="Thời gian rãnh của bạn"></textarea>
                            </div>
                            <div class="field">
                              <b class="mt-2">Giới thiệu bản thân</b>
                              <textarea name="editor_introduce" class="form-control" style="height: 200px" placeholder="Đôi nét về bản thân"></textarea>
                            </div>
                            <div class="field">
                              <b class="mt-2">Sở thích</b>
                              <textarea name="editor_interests" placeholder="Sở thích của bạn" class="form-control" style="height: 200px"></textarea>
                            </div>
                            <div class="field">
                              <b class="mt-2">Cam kết</b>
                              <textarea name="editor_commitment" placeholder="Cam kết đăng tin" class="form-control" style="height: 200px"></textarea>
                            </div>
                            <div class="field">
                              <b class="mt-2">Tâm huyết</b>
                              <textarea name="editor_enthusiasm" placeholder="Tâm huyết sau khi làm biên tập viên" class="form-control" style="height: 200px"></textarea>
                            </div>
                            <br />
                            <input type="hidden" name="user_id" value="{{$detail->user_email}}" />
                            <div class="ui error message"></div>
                            <div class="ui red submit button">Nộp đơn</div>
                          </form>
                      @endforeach
                      @endif
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
