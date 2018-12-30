@extends('layouts.master')

@section('content-header')
<section class="content-header">
  <h1>
    Account
    <small>it all starts here</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Account</a></li>
    <li class="active">User</li>
  </ol>
</section>
@endsection

@section('content')
<!-- Main content -->
<section class="content">
<!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Account Details</h3>

      <div class="box-tools pull-right">
        <!-- <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                title="Collapse">
          <i class="fa fa-minus"></i></button>
        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fa fa-times"></i></button> -->
          <a href="javascript:;" data-toggle="modal" data-target="#modal-add-user">Add Channel</a>
      </div>
    </div>
    <div class="box-body">
      @if(!empty($channels))
        @include('adminchannel.channel-list')
      @else
        <a href="/account/add">Add Account Details</a>
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

    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

@endsection

@section('script')
<script type="text/javascript">
  $(document).ready(function(){
      $('#submit-add-channer').on('click',function(){
      //$(document).on('click','#submit-add-channer',function(){
      //console.log(22222); return false;

          $('.invalid-feedback').html('');

          var channelName = $("#name").val().trim();
          var shortName = $("#shortname").val().trim();
          //var logo = $("#logo").val().trim();
          var msg = '';

          if(channelName == ''){
            //msg = 'Channel name is required';
            $("#name").parent('.form-group').find('.invalid-feedback').html(msg);
          }
          if(shortName == ''){
            //msg = 'Email is required';
            $("#shortname").parent('.form-group').find('.invalid-feedback').html(msg);
          }
          //if(logo == ''){
          //  msg = 'Logo is required';
          //  $("#logo").parent('.form-group').find('.invalid-feedback').html(msg);
          //}

          if(msg == ''){
               $.ajax({
                headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 },
                  /* the route pointing to the post function */
                  url: '/admin-channel/add',
                  type: 'POST',
                  /* send the csrf-token and the input to the controller */
                  //data: {cname : shortname, shname : shortName, _token : $('meta[name="csrf-token"]').attr('content')},
                  data: {cname : channelName, shname : shortName},
                  dataType: 'JSON',
                  /* remind that 'data' is the response of the AjaxController */
                  success: function (data) { 
                      console.log('data: ', data);
                      //$(".writeinfo").append(data.msg); 
                  }
              }); 
          
          }
      });

  });
</script>
@endsection
