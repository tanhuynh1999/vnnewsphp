@if(session('counteditor') != 0)

  @foreach($editor as $key=>$editor)
  <div class="row mt-3" style="padding: 20px">
      <div class="col-lg-3">
        <div class="card" style="width: 18rem;">
              @if($editor->user_imagevnnews != null)
                  <img class="card-img-top" src="assets/images/{{$editor->user_imagevnnews}}" alt="Card image cap">
              @elseif($editor->user_image != null)
                  <img class="card-img-top" src="{{$editor->user_image}}" alt="Card image cap">
              @else
                    <img class="card-img-top" src="assets/images/nennen.png" alt="Card image cap">
              @endif
              <div class="card-body">
                <h5 class="card-title">{{$editor->editor_fullname}}</h5>
                <p class="card-text" style="font-size: 13px">
                  <b>Email:</b> {{$editor->editor_email}}
                  <br />
                  <b>Số điện thoại:</b> {{$editor->editor_phone}}
                  <br />
                  <b>Link fb:</b> <a target="_blank" href="{{$editor->editor_fb}}">Xem</a>
                  <br />
                  <b>Ngày tạo:</b> {{$editor->editor_datecreate}}
                  <br />
                  <b>Ngày cập nhật:</b> {{$editor->editor_dateupdate}}
                  <br />
                  <b>Tình trạng: </b>
                  @if($editor->editor_change == 0)
                      <b>Đã chấp nhận</b>
                  @else
                      <b class="text-danger">Chưa chấp nhận</b>
                  @endif
                </p>
                <a href="#" data-toggle="modal" data-target="#de{{$editor->editor_id}}" class="btn btn-warning">Xem chi tiết</a>
              </div>
            </div>
      </div>
  </div>
  <!-- detail -->
  <div class="modal fade" id="de{{$editor->editor_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Thông tin hồ sơ "{{$editor->editor_fullname}}"</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <style>
            ul li{
              list-style-type: none;
            }
        </style>
        <div class="modal-body">
            <ul>
              <li><b>Họ và tên: </b> {{$editor->editor_fullname}}</li>
              <li><b>Giới tính: </b> @if($editor->editor_sex == 1) Nam @else Nữ @endif</li>
              <li><b>Link facebook: </b> <a href="{{$editor->editor_fb}}" target="_blank">{{$editor->editor_fb}}</a></li>
              <li><b>Số điện thoại: </b> {{$editor->editor_phone}}</li>
              <li><b>Email: </b> {{$editor->editor_email}}</li>
              <li>
                <b><u>Thời gian rãnh:</u></b>
                <br />
                {{$editor->editor_time}}
              </li>
              <li>
                <b><u>Giới thiệu bản thân:</u></b>
                <br />
                {{$editor->editor_introduce}}
              </li>
              <li>
                <b><u>Sở thích:</u></b>
                <br />
                {{$editor->editor_interests}}
              </li>
              <li>
                <b><u>Sở thích:</u></b>
                <br />
                {{$editor->editor_interests}}
              </li>
              <li>
                <b><u>Cam kết:</u></b>
                <br />
                <i>{{$editor->editor_commitment}}</i>
              </li>
              <li>
                <b><u>Tâm huyết:</u></b>
                <br />
                {{$editor->editor_enthusiasm}}
              </li>
              <hr />
              <li>
                <b>Thời gian nộp: </b>{{$editor->editor_datecreate}}
              </li>
              <li>
                <b>Thời gian cập nhật: </b>{{$editor->editor_dateupdate}}
              </li>
            </ul>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
          <button onclick="window.location.href='/vnnews/check-editor-{{$editor->editor_id}}'" type="button" class="btn btn-primary">Duyệt</button>
          <button type="button" class="btn btn-primary">Không duyệt</button>
          <button type="button" class="btn btn-primary">Xóa đơn</button>
        </div>
      </div>
    </div>
  </div>
  @endforeach
@else
  <div style="padding: 15px">
      <h4>Hiện không có đơn nào</h1>
  </div>
@endif
