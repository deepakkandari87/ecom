@if(!empty($channels))
	@foreach($channels as $key => $val)
		
		<!-- /.row -->
 
    <!-- /.box-header -->
    <div class="box-body table-responsive no-padding">
      <table class="table table-hover">
        <tr>
          <th>Logo</th>
          <th>Name</th>
          <th>Shortname</th>
          <th>Action</th>
        </tr>
        <tr>
          <td><img src="{{config('constants.CHANNEL_LOGO')}}{{ $val->logo}}" width="100" height="100"></td>
          <td>{{$val->channelName}}</td>
          <td>{{$val->shortname}}</td>
			
			<td><a class="btn btn-success" href="{{url('/admin-channel/edit/'.$val->id)}}">Edit Account Details</a></td>
        </tr>
        
      </table>
    </div>
    <!-- /.box-body -->
	@endforeach
@else

@endif