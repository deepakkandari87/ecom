@extends('layouts.master')

@section('content-header')
<section class="content-header">
  <h1>
    Account Details
    <small>it all starts here</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="/account">Account Details</a></li>
    <li class="active">Add Account</li>
  </ol>
</section>
@endsection

@section('content')
<!-- Main content -->
<section class="content">
<!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Add Account</h3>

      <div class="box-tools pull-right">
        
      </div>
    </div>
    <div class="box-body">
      
      <form role="form" method="post" class="form-horizontal" action="{{ url('account/add') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
  <div class="col-md-8 col-xs-offset-2">
          <div class="form-group">
            <label for="companyEmail" class="col-sm-2 control-label">Email address</label>
            <div class="col-sm-10">
            <input type="email" class="form-control" name="companyEmail" id="companyEmail" placeholder="Enter email" value="{{Auth::user()->email}}" readonly="readonly">
           </div>
          </div>

          <div class="form-group">
            <label for="companyPhone" class="col-sm-2 control-label">Phone no</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="companyPhone" id="companyPhone" placeholder="Enter phone number" value="{{Auth::user()->mobile}}" readonly="readonly">
           </div>
          </div>

          <div class="form-group">
            <label for="companyName" class="col-sm-2 control-label">Company Name</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="companyName" id="companyName" placeholder="Enter company name" required="required" value="{{$data->company_name}}">
           </div>
          </div>
          <div class="form-group">
            <label for="logo" class="col-sm-2 control-label">Logo</label>
            <div class="col-sm-10">
            <input type="file" id="logo" name="uploads" value="{{$data->logo}}">
            <p class="help-block">Example block-level help text here.</p>
           </div>
          </div>
          
          <div class="form-group">
            <label for="address" class="col-sm-2 control-label">Address</label>
            <div class="col-sm-10">
            <textarea class="form-control" name="address" id="address" placeholder="Enter address" required="required">{{$data->address}}</textarea>
           </div>
          </div>

          <div class="form-group">
            <label for="city" class="col-sm-2 control-label"></label>
            <div class="col-sm-5">
            <input type="text" class="form-control" name="city" id="city" placeholder="Enter city" required="required" value="{{$data->city}}">
           </div>
          
            <label for="state" class="col-sm-2 control-label"></label>
            <div class="col-sm-5">
            <input type="text" class="form-control" name="state" id="state" placeholder="Enter state" required="required" value="{{$data->state}}">
           </div>
          </div>

          <div class="form-group">
            <label for="country" class="col-sm-2 control-label"></label>
            <div class="col-sm-5">
            <input type="text" class="form-control" name="country" id="country" placeholder="Enter country" required="required" value="{{$data->country}}">
           </div>
    
            <label for="zip" class="col-sm-2 control-label"></label>
            <div class="col-sm-5">
            <input type="text" class="form-control" name="zip" id="zip" maxlength="6" placeholder="Enter zip" required="required" value="{{$data->zip}}">
           </div>
          </div>

          <div class="box-footer text-center">
            <button type="button" class="btn btn-default">Cancel</button>
            <button type="submit" class="btn btn-success">Submit</button>
          </div>
        </div>
        </div>
        <!-- /.box-body -->

      </form>

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
