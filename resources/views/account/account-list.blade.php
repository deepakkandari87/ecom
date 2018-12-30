@if(!empty($accounts))
	@foreach($accounts as $key => $val)
		
		<!-- /.row -->
 
    <!-- /.box-header -->
    <div class="box-body table-responsive no-padding">
      <table class="table table-hover">
        <tr>
          <th>Logo</th>
          <th>Company</th>
          <th>Phone</th>
          <th>Email</th>
          <th>Address</th>
        </tr>
        <tr>
          <td><img src="{{config('constants.APP_BASE_PATH')}}{{$val->logo}}" width="100" height="70"></td>
          <td>{{$val->company_name}}</td>
          <td>{{Auth::user()->mobile}}</td>
          <td>{{Auth::user()->email}}</td>
          <td>{{$val->address}} <br>{{$val->city}}, {{$val->state}}, <br>{{$val->country}}, {{$val->zip}}</td>
        </tr>
        
      </table>
    </div>
    <!-- /.box-body -->
          
	@endforeach
@else

@endif