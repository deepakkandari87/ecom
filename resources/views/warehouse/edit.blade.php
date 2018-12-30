@extends('layouts.master')

@section('content-header')
<section class="content-header">
  <h1>
    Account Details
    <small>it all starts here</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="/companies">Companies</a></li>
    <li class="active">Add Warehouse</li>
  </ol>
</section>
@endsection

@section('content')
<!-- Main content -->
<section class="content">
<!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Add Warehouse</h3>

      <div class="box-tools pull-right">
        
      </div>
    </div>
    <div class="box-body">
      
      <form role="form" method="post" class="form-horizontal" action="{{ url('account/edit-warehouse/'.$companyId.'/'.$id) }}" enctype="multipart/form-data">
        @csrf
        @include('warehouse.form') 
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
