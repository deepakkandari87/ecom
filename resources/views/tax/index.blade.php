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
    <li class="active">Tax</li>
  </ol>
</section>
@endsection

@section('content')
<!-- Main content -->
<section class="content">
<!-- Default box -->
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Tax</h3>

      <div class="box-tools pull-right">
        
          <a href="javascript:;" data-toggle="modal" data-target="#modal-add-user">Add User</a>
      </div>
    </div>
    <div class="box-body">
      
        <a class="btn btn-success" href="javascript:;" id="create-tax-rule"><i class="fa fa-edit"></i> Create Rule</a>
        @include('tax.tax-list') 
     
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      Footer
    </div>
    <!-- /.box-footer-->
  </div>
  <!-- /.box -->
</section>

<div class="modal fade" id="modal-tax-rule">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">New Tax Rule</h4>
      </div>
      <form method="POST" id="tax-rule-form">
        @csrf
      <div class="modal-body">
        <div class="box-body">
          
          <div class="col-sm-12 col-md-12">
            <div class="col-sm-6">
              <div class="form-group">
                <input type="text" name="title" class="form-control" placeholder="Title">
              </div>
            </div>
          </div>
          <div class="c-api tax-rules" id="Wrapper_0">
            <div class="col-sm-12 col-md-12" style=" margin: 1px; padding: 10px 0px; background: #ecf0f5;">

              <div class="col-sm-2">
                <div class="form-group">

                  <input type="text" class="form-control" name="fromPrice[]" id="from-price_0" placeholder="From Price" value="0">
                </div>
              </div>
              <div class="col-sm-9">
                <div class="col-sm-6">
                  <div class="c-api1" id="Wrapper1_0">
                    <div class="col-sm-5">
                      <div class="form-group">
                        <select class="form-control" name="intraState[][]" id="intra-state_0">
                          <option value="">Intra State</option>
                          <option value="SGST">SGST</option>
                          <option value="CGST">CGST</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-5">
                      <div class="form-group">
                        <input type="text" class="form-control" name="intraStatePrice[][]" id="intraStatePrice_0" placeholder="Value">
                      </div>
                    </div>
                    <div class="col-sm-2" style="padding: 4px 2px 0px">
                        <a class="btn btn-danger tax-rule-remove1 inner-btn hide"> <i class="fa fa-minus"></i></a>
                        <a href="javascript:void(0)" class="btn btn-info inner-btn add-tax-rule1"><i class="fa fa-plus"></i></a>
                    </div>
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="c-api2" id="Wrapper2_0">
                    <div class="col-sm-5">
                      <div class="form-group">
                        <select class="form-control" name="interState[][]" id="inter-state_0">
                          <option value="">Inter State</option>
                          <option value="IGST">IGST</option>
                          <option value="GST">GST</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-5">
                      <div class="form-group">
                        <input type="text" class="form-control" name="interStatePrice[][]" id="interStatePrice_0" placeholder="Value">
                      </div>
                    </div>
                    <div class="col-sm-2" style="padding: 4px 2px 0px;">
                        <a class="btn btn-danger inner-btn tax-rule-remove2 hide"> <i class="fa fa-minus"></i></a>
                        <a href="javascript:void(0)" class="btn btn-info inner-btn add-tax-rule2"><i class="fa fa-plus"></i></a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-1">
                  <a class="btn btn-danger tax-rule-remove hide"> <i class="fa fa-minus"></i></a>
              </div>
            </div>

          </div>
        
          <div class="col-sm-12 col-md-12" style=" margin: 1px; padding: 10px 0px;">
            <div class="col-sm-2"></div>
            <div class="col-sm-9"></div>
            <div class="col-sm-1">
              <a href="javascript:void(0)" class="btn btn-info add-tax-rule"><i class="fa fa-plus"></i></a>
            </div>
          </div>
          
        </div>
        <!-- /.box-body -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="submit-add-tax-rule">Save</button>
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
      $('#create-tax-rule').on('click',function(){
          $('#modal-tax-rule').modal({backdrop: 'static'});
      });

    $(document).on('click','.add-tax-rule',function(){

      var html = $(".c-api").last().clone();
        
        html.find(':input').val('');

        html.find('.c-api1').each(function(i){
          if(i > 0){
            $(this).remove();
          } else {
            $(this).find('.tax-rule-remove1').addClass('hide');
            $(this).find('.add-tax-rule1').removeClass('hide');
          }
        });
        html.find('.c-api2').each(function(i){
          if(i > 0){
            $(this).remove();
          } else {
            $(this).find('.tax-rule-remove2').addClass('hide');
            $(this).find('.add-tax-rule2').removeClass('hide');
          }
        });

        // html.find().each('');
    
        html.find(':input').each(function() {
            var idstr = $(this).attr('id');
            var idarr = idstr.split('_');
            var newid = parseInt(idarr[1]) + parseInt(1);
            id = idstr.substring(0, idstr.length-1) + newid;
            $(this).attr('id', id);
            $(this).parents('.c-api').attr('id', "Wrapper_"+newid);

            
        });
        
        $(html).find(".add-remove").html("<label for=''>&nbsp;</label><br/><a class='btn btn-danger tax-rule-remove'> Remove </a>");

        $(".c-api").last().after(html);
        if($(".c-api").length > 1){
          $(".c-api").find('.tax-rule-remove').removeClass('hide');
        }
    });
    
    $("body").on("click",".tax-rule-remove",function(){
        $(this).parents(".c-api").remove();
        if($(".c-api").length <= 1)
          $(".c-api").find('.tax-rule-remove').addClass('hide');
    });





    $(document).on('click','.add-tax-rule1',function(){

      var html = $(this).parents(".c-api1").last().clone();
        html.find(':input').val('');
        html.find(':input').each(function() {
            var idstr = $(this).attr('id');
            var idarr = idstr.split('_');
            var newid = parseInt(idarr[1]) + parseInt(1);
            id = idstr.substring(0, idstr.length-1) + newid;
            $(this).attr('id', id);
            $(this).parents('.c-api1').attr('id', "Wrapper1_"+newid);
            // console.log('----------', idarr[0])
            
        });

        $(html).find(".add-remove1").html("<label for=''>&nbsp;</label><br/><a class='btn btn-danger tax-rule-remove1'> Remove </a>");

        $(this).parents(".c-api1").find('.add-tax-rule1').addClass('hide');
        $(this).parents(".c-api1").last().after(html);

        if($(this).parent().parent().parent().parent().find(".c-api1").length > 1){
          $(this).parent().parent().parent().parent().find(".c-api1").find('.tax-rule-remove1').removeClass('hide');
        } 
    });

    $("body").on("click",".tax-rule-remove1",function(){

        var obj = $(this).parent().parent().parent().parent();
        $(this).parents(".c-api1").remove();

        if(obj.find('.c-api1').length == 1){
          obj.find('.c-api1').find('.tax-rule-remove1').addClass('hide');
        }
        obj.find('.c-api1').find('.add-tax-rule1').last().removeClass('hide');
    });







    $(document).on('click','.add-tax-rule2',function(){

      var html = $(this).parents(".c-api2").last().clone();
        html.find(':input').val('');
        html.find(':input').each(function() {
            var idstr = $(this).attr('id');
            var idarr = idstr.split('_');
            var newid = parseInt(idarr[1]) + parseInt(1);
            id = idstr.substring(0, idstr.length-1) + newid;
            $(this).attr('id', id);
            $(this).parents('.c-api2').attr('id', "Wrapper2_"+newid);
        });

        $(html).find(".add-remove2").html("<label for=''>&nbsp;</label><br/><a class='btn btn-danger tax-rule-remove2'> Remove </a>");

        $(this).parents(".c-api2").find('.add-tax-rule2').addClass('hide');
        $(this).parents(".c-api2").last().after(html);

        if($(this).parent().parent().parent().parent().find(".c-api2").length > 1){
          $(this).parent().parent().parent().parent().find(".c-api2").find('.tax-rule-remove2').removeClass('hide');
        } 
    });

    $("body").on("click",".tax-rule-remove2",function(){

        var obj = $(this).parent().parent().parent().parent();
        $(this).parents(".c-api2").remove();

        if(obj.find('.c-api2').length == 1){
          obj.find('.c-api2').find('.tax-rule-remove2').addClass('hide');
        }
        obj.find('.c-api2').find('.add-tax-rule2').last().removeClass('hide');
    });
    
    $('#submit-add-tax-rule').on('click', function(){
alert('==========')
        var formData = new FormData(document.getElementsByName('tax-rule-form'))[0];

        $.ajax({
            headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            /* the route pointing to the post function */
            url: '/accounts/add-tax',
            type: 'POST',
            /* send the csrf-token and the input to the controller */
            data: formData,
            dataType: 'JSON',
            /* remind that 'data' is the response of the AjaxController */
            success: function (data) { 
                $(".writeinfo").append(data.msg); 
            }
        }); 

    });

    
  });
</script>
@endsection
