@extends('layouts.master')

@section('content-header')
<section class="content-header">
  <h1>
    Account
    <small>it all starts here</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="javascript:;">Account</a></li>
    <li><a href="{{url('user')}}">Users</a></li>
    <li class="active">Add User</li>
  </ol>
</section>
@endsection

@section('content')
<!-- Main content -->
<section class="content">
<!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">User Profile</h3>

      <div class="box-tools pull-right">
        
      </div>
    </div>
    <div class="box-body">
      
      <form class="form-horizontal">
       
        <div class="box-body">

            <div id="display-msg" class="alert alert-success alert-dismissible hide">
                <button type="button" class="close" onclick="$('#display-msg').addClass('hide')">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                <span></span>
              </div>

          <div class="col-sm-12 form-group">
            <label for="email" class="col-sm-2 control-label">Email</label>
            <div class="col-md-4">
            <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{$userData->email}}" readonly="readonly">
           </div>
           <div class="col-md-6">
              <a href="javascript:;" class="btn btn-info" alt="edit" title="Edit" onclick="editUserData(this,'email')"><i class="fa fa-edit"></i></a>

              <a href="javascript:;" class="btn btn-success hide" alt="save" title="Save" onclick="saveUserData(this, 'email')"><i class="fa fa-check"></i></a>
           </div>
          </div>

          <div class="col-sm-12 form-group">
            <label for="phone" class="col-sm-2 control-label">Phone no</label>
            <div class="col-md-4">
            <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone no" value="{{$userData->mobile}}" readonly="readonly">
           </div>
           <div class="col-md-6">
              <a href="javascript:;" class="btn btn-info" alt="edit" title="Edit" onclick="editUserData(this,'phone')"><i class="fa fa-edit"></i></a>

              <a href="javascript:;" class="btn btn-success hide" alt="save" title="Save" onclick="saveUserData(this,'phone')"><i class="fa fa-check"></i></a>
           </div>
          </div>

          <div class="col-sm-12 form-group">
            <label for="name" class="col-sm-2 control-label">Name</label>
            <div class="col-md-4">
            <input type="text" class="form-control" name="name" id="name" placeholder="Name" required="required" value="{{$userData->name}}" readonly="readonly">
           </div>
           <div class="col-md-6">
              <a href="javascript:;" class="btn btn-info" alt="edit" title="Edit" onclick="editUserData(this,'name')"><i class="fa fa-edit"></i></a>

              <a href="javascript:;" class="btn btn-success hide" alt="save" title="Save" onclick="saveUserData(this,'name')"><i class="fa fa-check"></i></a>
           </div>
          </div>
          
          
          <div class="col-sm-12 form-group">
            <label for="password" class="col-sm-2 control-label">Password</label>
            <div class="col-md-4">
            <input type="password" class="form-control" name="password" id="password" required="required" placeholder="Password" value="XXXXXX" readonly="readonly">
           </div>
           <div class="col-md-6">
              <a href="javascript:;" class="btn btn-info" alt="edit" title="Edit" onclick="editUserData(this,'password')"><i class="fa fa-edit"></i></a>

              <a href="javascript:;" class="btn btn-success hide" alt="save" title="Save" onclick="saveUserData(this,'password')"><i class="fa fa-check"></i></a>
           </div>
          </div>

          <div class="col-sm-12 form-group">
            <label for="currency" class="col-sm-2 control-label">Currency</label>
            <div class="col-md-4">
            <input type="text" class="form-control" name="currency" id="currency" placeholder="Currency" required="required" value="{{$userData->currency}}" readonly="readonly">
           </div>
           <div class="col-md-6">
              <a href="javascript:;" class="btn btn-info" alt="edit" title="Edit" onclick="editUserData(this,'currency')"><i class="fa fa-edit"></i></a>

              <a href="javascript:;" class="btn btn-success hide" alt="save" title="Save" onclick="saveUserData(this,'currency')"><i class="fa fa-check"></i></a>
           </div>
          </div>

          <div class="col-sm-12 form-group">
            <label for="timezone" class="col-sm-2 control-label">Timezone</label>
            <div class="col-md-4">
            <input type="text" class="form-control" name="timezone" id="timezone" placeholder="Timezone" required="required" value="{{$userData->timezone}}" readonly="readonly">
           </div>
           <div class="col-md-6">
              <a href="javascript:;" class="btn btn-info" alt="edit" title="Edit" onclick="editUserData(this,'timezone')"><i class="fa fa-edit"></i></a>

              <a href="javascript:;" class="btn btn-success hide" alt="save" title="Save" onclick="saveUserData(this,'timezone')"><i class="fa fa-check"></i></a>
           </div>
          </div>
        
        <div class="col-sm-12 form-group"><a href="{{url('user')}}">Back to Users</a></div>
          
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
