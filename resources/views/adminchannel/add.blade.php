@extends('layouts.master')

@section('content-header')
<section class="content-header">
  <h1>
    Channels
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="javascript:void(0)"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="/channel">Channel Details</a></li>
    <li class="active">Add</li>
  </ol>
</section>
@endsection

@section('content')
<!-- Main content -->
<section class="content">
<!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Add Channel</h3>

      <div class="box-tools pull-right">
        
      </div>
    </div>
    <div class="box-body">
      
      <form role="form" method="post" class="form-horizontal" action="{{ url('admin-channel/add') }}" enctype="multipart/form-data">
        @csrf
        <div class="box-body">
          <div class="form-group">
            <label for="channelName" class="col-sm-2 control-label">Name</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="channelName" id="channelName" placeholder="Enter channel name" maxlength="30">
           </div>
          </div>

          <div class="form-group">
            <label for="shortname" class="col-sm-2 control-label">Short name</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="shortname" id="shortname" placeholder="Enter shortname" maxlength="10">
           </div>
          </div>

          <div class="form-group">
            <label for="channelLogo" class="col-sm-2 control-label">Logo</label>
            <div class="col-sm-10">
            <input type="file" name="channelLogo" id="channelLogo">
           </div>
          </div>
          
          <span class="c-api" id="Wrapper_0">
            <div class="form-group">
              <div class="col-sm-5">
                <select class="form-control" id="apiType_0" name="apiType[]" required="">
                  <option value="">select</option>
                    @foreach(config('constants.API_TYPE') as $key => $val)
                        <option value="{{$key}}">{{$val}}</option>
                    @endforeach
                </select>
              </div>
              <div class="col-sm-5">
              <input type="text" class="form-control" name="apiName[]" id="apiName_0" placeholder="Enter api name" >
             </div>
              <div class="col-sm-2"><a class="btn btn-danger channel_remove hide"> <i class="fa fa-minus"></i></a></div>
            </div>
          </span>
          <span class="right"><a href="javascript:void(0)" class="btn btn-info add-channel"><i class="fa fa-plus"></i></a></span>
        </div>
        <!-- /.box-body -->

        <div class="form-group">
          <div class="col-sm-6">
            <button type="submit" name="btnSave" class="btn btn-info">Save</button>
          </div>
        </div>
      </form>

    </div>
    <!-- /.box-body -->
    
    <!-- /.box-footer-->
  </div>
  <!-- /.box -->
</section>
@endsection


@section('script')
<script type="text/javascript">
  $(document).ready(function(){
    var mxr = 3;
    $(document).on('click','.add-channel',function(){
      var html = $(".c-api").last().clone();
        html.find('[type=text]').val('');
        html.find('.channel_remove').removeClass('hide');
		
        html.find('input').each(function() {
            var idstr = $(this).attr('id');
            var idarr = idstr.split('_');
            var newid = parseInt(idarr[1]) + parseInt(1);
            id = idstr.substring(0, idstr.length-1) + newid;
            $(this).attr('id', id);
            $(this).parents('.c-api').attr('id', "Wrapper_"+newid);
            if(newid >= mxr){
              $(".add-channel").hide();
            } else {
              $(".add-channel").show();
            }
        });
        
        
        
        $(html).find(".add-remove").html("<label for=''>&nbsp;</label><br/><a class='btn btn-danger channel_remove'> Remove </a>");
        $(".c-api").last().after(html);
    });
    
    $("body").on("click",".channel_remove",function(){
        $(".c-api").each(function(ind){
          if(ind <= mxr){
            $(".add-channel").show();
          } else {
            $(".add-channel").hide();
          }
        });
        $(this).parents(".c-api").remove();
    });

  });
</script>
@endsection