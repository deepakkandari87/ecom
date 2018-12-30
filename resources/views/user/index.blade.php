@extends('layouts.master')

@section('content-header')
<section class="content-header">
  <h1>
    Account
    <small>it all starts here</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="javascript:;"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="javascript:;">Account</a></li>
    <li class="active">Users</li>
  </ol>
</section>
@endsection

@section('content')
<!-- Main content -->
<section class="content">
<!-- Default box -->
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Users Details</h3>

      <div class="box-tools pull-right">
        <!-- <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                title="Collapse">
          <i class="fa fa-minus"></i></button>
        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fa fa-times"></i></button> -->
      </div>
    </div>
    <div class="box-body">
      @if(!empty($users))
        <div>
          <ul>
          <li><span><i class="fa fa-user"></i> <b>{{$users->name}}</b> <span>(OWNER)</span></span></li>
          <li><span>{{$users->email}}</span></li>
          <li><span>{{$users->timezone}}</span></li>
          </ul>
        </div>
        <a class="btn btn-success" href="{{url('/user/add')}}"><i class="fa fa-edit"></i> Edit User Details</a>
      @endif
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      Footer
    </div>
    <!-- /.box-footer-->
  </div>
  <!-- /.box -->
</section>


@endsection

@section('script')
<script type="text/javascript">
  $(document).ready(function(){
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
