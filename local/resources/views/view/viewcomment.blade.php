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
                              <button onclick="window.location.href='/vnnews/all-comment'" type="button" class="list-group-item list-group-item-action  text-white" style="background-color:rgb(170, 39, 39)">
                                <i class="chat icon"></i>Bình luận ({{session('countcomment')}})
                              </button>
                              <button onclick="window.location.href='/vnnews/user-setting'" type="button" class="list-group-item list-group-item-action">
                                <i class="cogs icon"></i>Cài đặt tài khoản
                              </button>
                              <button onclick="window.location.href='/vnnews/editor'" type="button" class="list-group-item list-group-item-action">
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
                <h3 class="section-title-left">Bạn đã bình luận {{session('countcomment')}} tin tức</h3>
                <table class="w-100">
                  @foreach($detail as $key => $detail)
                    <tr class="border-bottom">
                      <td style="width: 70%"><a href="#" data-toggle="modal" data-target="#exampleModal{{$detail->comment_id}}">{{$detail->news_name}}</td></a>
                      <td style="width: 30%">
                        <b class="text-danger float-right">&nbsp;&nbsp;{{$detail->comment_datecreate}}
                      </td>
                      <td>
                        <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{$detail->comment_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="text-danger" id="exampleModalLabel">{{$detail->news_name}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body text-dark">
                                    Bạn đã comment tin tức này vào lúc {{$detail->comment_datecreate}}.
                                    <br />
                                    <hr />
                                    <b>Nội dung bình luận</b>
                                    <br />
                                    {{$detail->comment_content}}
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Xóa</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Sửa</button>
                                    <button type="button" class="btn btn-danger" onclick="window.location.href='/vnnews/detailnews-{{$detail->news_id}}'">Xem chi tiết tin tức</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                      </td>
                    </tr>
                  @endforeach
                </table>
                <!-- //pagination -->
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
