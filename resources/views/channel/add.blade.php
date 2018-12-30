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
      
      <form role="form" method="post" class="form-horizontal">
        <div class="box-body">
          <div class="form-group">
            <label for="companyEmail" class="col-sm-2 control-label">Email address</label>
            <div class="col-sm-10">
            <input type="email" class="form-control" name="companyEmail" id="companyEmail" placeholder="Enter email">
           </div>
          </div>

          <div class="form-group">
            <label for="companyPhone" class="col-sm-2 control-label">Phone no</label>
            <div class="col-sm-10">
            <input type="number" class="form-control" name="companyPhone" id="companyPhone" placeholder="Enter phone number" maxlength="10">
           </div>
          </div>

          <div class="form-group">
            <label for="companyName" class="col-sm-2 control-label">Company Name</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="companyName" placeholder="Enter company name">
           </div>
          </div>
          <div class="form-group">
            <label for="exampleInputFile" class="col-sm-2 control-label">Logo</label>
            <div class="col-sm-10">
            <input type="file" id="exampleInputFile">

            <p class="help-block">Example block-level help text here.</p>
           </div>
          </div>
          
          <div class="form-group">
            <label for="address" class="col-sm-2 control-label">Address</label>
            <div class="col-sm-10">
            <textarea class="form-control" id="address" placeholder="Enter address"></textarea>
           </div>
          </div>

          <div class="form-group">
            <label for="city" class="col-sm-2 control-label">City</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="city" placeholder="Enter city">
           </div>
          </div>

          <div class="form-group">
            <label for="state" class="col-sm-2 control-label">State</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="state" placeholder="Enter state">
           </div>
          </div>

          <div class="form-group">
            <label for="country" class="col-sm-2 control-label">Country</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="country" placeholder="Enter country">
           </div>
          </div>
        </div>
        <!-- /.box-body -->

        <div class="box-footer text-center">
          <button type="submit" class="btn btn-default">Cancel</button>
          <button type="submit" class="btn btn-info">Sign in</button>
        </div>
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
