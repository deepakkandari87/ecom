@extends('layouts.master')

@section('stylesheet')
.bgColor1{background-color:#f9f9f9;}
.bgColor2{background-color:none;}
@endsection

@section('content-header')
<section class="content-header">
  <h1>
    Account
    <small>it all starts here</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Account</a></li>
    <li class="active">Companies</li>
  </ol>
</section>
@endsection

@section('content')
<!-- Main content -->
<section class="content">
<!-- Default box -->
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Companies</h3>

      <div class="box-tools pull-right">
        <!-- <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                title="Collapse">
          <i class="fa fa-minus"></i></button>
        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fa fa-times"></i></button> -->
          <a href="javascript:;" data-toggle="modal" data-target="#modal-add-user">Add User</a>
      </div>
    </div>
    <div class="box-body">
      @if(!empty($companies))
        <a class="btn btn-success" href="{{url('/account/add-company')}}"><i class="fa fa-edit"></i> Add Company</a>
        @include('company.company-list') 
      @else
        <a class="btn btn-success" href="{{url('/company/add')}}"><i class="fa fa-edit"></i> Add Account Details</a>
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

<div class="modal fade" id="modal-add-user">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Add User</h4>
      </div>
      <form method="POST" action="/user/add">
        @csrf
      <div class="modal-body">
        <div class="box-body">

          <div class="form-group">
            <label for="fullName">Full Name</label>
            <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Enter full name" required>
            <span class="invalid-feedback">
            </span>
          </div>
          <div class="form-group">
            <label for="userEmail">Email address</label>
            <input type="email" class="form-control" id="userEmail" name="userEmail" placeholder="Enter email" required>
            <span class="invalid-feedback">
            </span>
          </div>
          <div class="form-group">
            <label for="userRole">Select Role</label>
            <select class="form-control" id="userRole" name="userRole" required>
              <option value="">select</option>
              <option value="1">option 2</option>
              <option value="2">option 3</option>
              <option value="3">option 4</option>
              <option value="4">option 5</option>
            </select>
            <span class="invalid-feedback">
            </span>
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
                    headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    /* the route pointing to the post function */
                    url: '/user/add',
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {uname : fullName, email : userEmail, role : userRole},
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (data) { 
                        $(".writeinfo").append(data.msg); 
                    }
                }); 
          }
      });
  
    $('.edit-warehouse').on('click', function(){
      var id = $(this).attr('id');
     
      if($('#box_'+id).hasClass('hide')){
        $('#box_'+id).removeClass('hide');
      } else {
        $('#box_'+id).addClass('hide');
      }
    });
  });
</script>
@endsection
