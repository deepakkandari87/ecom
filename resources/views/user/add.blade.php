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
    <li><a href="/user">User</a></li>
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
      <h3 class="box-title">Add User</h3>

      <div class="box-tools pull-right">
        
      </div>
    </div>
    <div class="box-body">
      Start creating your amazing application!
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
