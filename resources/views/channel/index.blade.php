@extends('layouts.master')

@section('content-header')
<section class="content-header">
  <h1>
    Channels
    <small>Listing</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="javascript:void(0)"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="javascript:void(0)">Channel</a></li>
    <li class="active">List</li>
  </ol>
</section>
@endsection

@section('content')

<style>
  .channelAdd {
    border: 1px solid #ccc;
    padding: 4px;
    overflow: hidden;
    text-align: center;
    margin-right: 15px;
    margin-bottom: 15px;
}
.channel_logo {
    display: block;
    height: 50px;
    border: 0px solid;
    margin: 3px 0px 5px;
}
.channel_name {
    display: block;
    font-weight: normal;
    font-size: 14px;
    padding: 3px 0px 8px;
}
#channelAdd .btn {
    width: 100%;
    padding: 4px 0px;
    border: none;
}
.greenBtn, .green-btn {
    color: #fff;
    border: solid 1px #9ca816;
    background: #67aa39;
    text-shadow: -1px -1px 0px rgba(0,0,0,0.25);
    width: 100%;
    border-radius: 0;
}
 
 
 .switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input {display:none;}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
} 
</style>
<!-- Main content -->
<section class="content">
<!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Channel Details</h3>

      <div class="box-tools pull-right">
          <a href="javascript:;" data-toggle="modal" data-target="#modal-add-user">Add User</a>
      </div>
    </div>
    <div class="box-body">
      <div class="row">
      
      @if($channels)
        @foreach($channels as $key => $value)
        <div class="col-md-2 col-sm-6 col-xs-12">
          <div class="channelAdd">
            <span class="channel_logo"><img src="{{config('constants.CHANNEL_LOGO')}}{{ $value->logo}}" width="120"></span>
            <span class="channel_name">{{$value['channelName']}}</span>   
            <a href="javascript:void(0)" class="btn greenBtn addChannel" data-toggle="modal"
            data-chName="{{$value['channelName']}}" data-target="#modal-add-channel">Add this</a>
          </div>
        </div>
        @endforeach
        @endif
        
          
      </div> <!-- end row -->
    </div>
    <!-- /.box-body -->
    
    <!-- /.box-footer-->
  </div>
  <!-- /.box -->
</section>

<div class="modal fade" id="modal-add-channel">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h2 class="modal-title">Adding a Channel: <span class="user-channel-title"></span></h2>
      </div>
      <form method="POST" action="/user/add">
        @csrf
      <div class="modal-body">
        <div class="box-body">

          
          <div class="col-md-6 col-sm-6 col-xs-12">
            <label for="fullName">Channel name</label>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
              <input type="text" class="form-control" id="user_channel_name" name="user_channel_name" placeholder="Channel name" required>
              <span class="invalid-feedback"></span>
            </div>
          </div>
          
          <div class="col-md-6 col-sm-6 col-xs-12">
            <label for="fullName">Channel Shortcode</label>
          </div>              
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
              <input type="text" class="form-control" id="user_channel_shcode" name="user_channel_shcode" placeholder="Channel shortcode" required>
              <span class="invalid-feedback"></span>
            </div>
          </div>
          
          <div class="col-md-6 col-sm-6 col-xs-12">
            <label for="fullName">Your username with <span class="user-channel-title"></span></label>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
              <input type="text" class="form-control" id="user_channel_username" name="user_channel_username" placeholder="Channel username" required>
              <span class="invalid-feedback"></span>
            </div>
          </div>
            
          <div class="col-md-6 col-sm-6 col-xs-12">
            <label for="fullName">Your password with <span class="user-channel-title"></span></label>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
              <input type="text" class="form-control" id="user_channel_password" name="user_channel_password" placeholder="Channel password" required>
              <span class="invalid-feedback"></span>
            </div>
          </div>
            
          <div class="col-md-6 col-sm-6 col-xs-12">
            <label for="fullName">Order Sync</label>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
              <label class="switch">
               <input name="user_channel_order" type="checkbox">
               <span class="slider round"></span>
              </label>
            </div>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <label for="fullName">Inventory Sync</label>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
              <label class="switch">
               <input name="user_channel_inventory" type="checkbox">
               <span class="slider round"></span>
              </label>
            </div>
          </div>
          
        </div>
        <!-- /.box-body -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="submit-add-user">Save changes</button>
      </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

@endsection

@section('script')
<script type="text/javascript">
  $(document).ready(function(){
    // data-chName
    $('.addChannel').click(function(){
      var dd = $(this).siblings(".channel_name").text();
      $(".user-channel-title").text($(this).siblings(".channel_name").text());
      $(".user-channel-title, #user_channel_name").val($(this).siblings(".channel_name").text());
    });
    
  
  
      $('#submit-add-user').on('click',function(){

          $('.invalid-feedback').html('');

          var fullName = $("#fullName").val().trim();
          var userEmail = $("#userEmail").val().trim();
          var userRole = $("#userRole").val().trim();
          var msg = '';

          if(fullName == ''){
            msg = 'Full name is required';
            $("#fullName").parent('.form-group').find('.invalid-feedback').html(msg);
          }
          if(userEmail == ''){
            msg = 'Email is required';
            $("#userEmail").parent('.form-group').find('.invalid-feedback').html(msg);
          } else {
            if(!validateEmail(userEmail)){
              msg = 'Please enter valid email address';
              $("#userEmail").parent('.form-group').find('.invalid-feedback').html(msg);
            }
          }
          if(userRole == ''){
            msg = 'User role is required';
            $("#userRole").parent('.form-group').find('.invalid-feedback').html(msg);
          }

          if(msg == ''){

             $.ajax({
                    /* the route pointing to the post function */
                    url: '/user/add',
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {uname : fullName, email : userEmail, role : userRole, _token : $('meta[name="csrf-token"]').attr('content')},
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (data) { 
                        $(".writeinfo").append(data.msg); 
                    }
                }); 
          
          }
      });

  });
</script>
@endsection
