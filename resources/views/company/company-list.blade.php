@if(!empty($companies))
<?php $i = 0; ?>
	@foreach($companies as $key => $val)
		
		<!-- /.row -->

 
    <!-- /.box-header -->
    <div class="box-body table-responsive no-padding @if($i%2==0) bgColor1 @else bgColor2 @endif bg-hover">
        
        <div class="box-body col-md-12">

          <div class="col-md-2">
          <img src="{{config('constants.APP_BASE_PATH')}}{{$val->logo}}" width="150" height="120">
          </div>

          <div class="col-md-10">
            <div class="col-md-9">
              
            <h4>{{$val->company_name}}</h4>{{$val->address}}, {{$val->city}}, {{$val->state}}, {{$val->country}} ({{$val->zip}}) 
            </div>
            <div class="col-md-3">
              <a href="{{url('account/edit-company/'.$val->id)}}">Edit company</a> | <a href="{{url('account/add-warehouse/'.$val->id)}}">Add Warehouse</a>
            </div>


              <table class="table table-hover">
                <tr>
                  <th>PAN</th>
                  <th>Service Tax</th>
                  <th>CST</th>
                  <th>Phone</th>
                  <th>Email</th>
                  <th>Warehouses</th>
                </tr>
                @if(!empty($val->email))
                <tr>
                  <td>{{$val->pan}}</td>
                  <td>{{$val->tax}}</td>
                  <td>{{$val->cst}}</td>
                  <td>{{$val->phone}}</td>
                  <td>{{$val->email}}</td>
                  <td>
                    @if(!empty($val->warehouses))
                      <a href="javascript:;" class="edit-warehouse" id="warehouse_{{$val->id}}">Edit warehouese</a>
                    @endif
                  </td>
                </tr>
                @endif
              </table>
          </div>
        
        @if(!empty($val->warehouses))
        <div class="col-md-12 hide" id="box_warehouse_{{$val->id}}">
          
            <table class="table table-hover">
            <tr>
              <th>Warehouse</th>
              <th>Address</th>
              <th>Service Tax</th>
              <th>CST</th>
              <th>Phone</th>
              <th>Email</th>
              <th>Warehouses</th>
            </tr>
             @foreach($val->warehouses as $key => $val1)
                <tr>
                  <td><b>{{$val1['warehouse']}}</b> ({{$val1['shortcode']}})</td>
                  <td>{{$val1['address']}}, <br>{{$val1['city']}}, {{$val1['state']}}, {{$val1['zip']}} <br>{{$val1['country']}}</td>
                  <td>{{$val1['tax']}}</td>
                  <td>{{$val1['cst']}}</td>
                  <td>{{$val1['phone']}}</td>
                  <td>{{$val1['email']}}</td>
                  <td>
                      <a href="{{url('account/edit-warehouse/'.$val->id.'/'.$key)}}">Edit</a>
                  </td>
                </tr>
             @endforeach
            </table>
          
        </div>
        @endif
        </div>
      
    </div>
    <!-- /.box-body -->
    <?php $i++; ?>     
	@endforeach
@else

@endif
