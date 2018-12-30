<div class="row">
  <div class="col-md-9 col-xs-offset-1">
  @if(!empty($warehouses))
  <div class="form-group">
    <label for="parentWarehouse" class="col-sm-4 control-label">Warehouse</label>
    <div class="col-sm-8">
    <select name="parentWarehouse" id="parentWarehouse">
      <option value="">select</option>
      @foreach($warehouses as $key=>$value)
        <option value="{{$key}}">{{$value}}</option>
      @endforeach
    </select>
   </div>
  </div>
  @endif
  <div class="form-group">
    <label for="warehouse" class="col-sm-4 control-label">Warehouse Name</label>
    <div class="col-sm-8">
    <input type="text" class="form-control" name="warehouse" id="warehouse" placeholder="Enter warehouse name" required="required" value="{{!empty($data['warehouse']) ? $data['warehouse'] : '' }}">
   </div>
  </div>

  <div class="form-group">
    <label for="shortcode" class="col-sm-4 control-label">Warehouse Shortcode</label>
    <div class="col-sm-8">
    <input type="text" class="form-control" name="shortcode" id="shortcode" placeholder="Enter comwarehousepany shortcode" required="required" value="{{!empty($data['shortcode']) ? $data['shortcode'] : '' }}">
   </div>
  </div>

  <div class="form-group">
    <label for="address" class="col-sm-4 control-label">Address</label>
    <div class="col-sm-8">
    <textarea class="form-control" name="address" id="address" placeholder="Enter address" required="required">{{!empty($data['address']) ? $data['address'] : '' }}</textarea>
   </div>
  </div>
  
  <div class="form-group">
    <label for="city" class="col-sm-4 control-label"></label>
    <div class="col-sm-4">
    <input type="text" class="form-control" name="city" id="city" placeholder="Enter city" required="required" value="{{!empty($data['city']) ? $data['city'] : '' }}">
   </div>
  
    
    <div class="col-sm-4">
    <input type="text" class="form-control" name="state" id="state" placeholder="Enter state" required="required" value="{{!empty($data['state']) ? $data['state'] : '' }}">
   </div>
  </div>

  <div class="form-group">
    <label for="country" class="col-sm-4 control-label"></label>
    <div class="col-sm-4">
    <input type="text" class="form-control" name="country" id="country" placeholder="Enter country" required="required" value="{{!empty($data['country']) ? $data['country'] : '' }}">
   </div>
  
    <div class="col-sm-4">
    <input type="text" class="form-control" name="zip" id="zip" maxlength="6" placeholder="Enter zip" required="required" value="{{!empty($data['zip']) ? $data['zip'] : '' }}">
   </div>
  </div>

  <div class="form-group">
    <label for="nickname" class="col-sm-4 control-label">Warehouse Nickname</label>
    <div class="col-sm-8">
    <input type="text" class="form-control" name="nickname" id="nickname" placeholder="Enter nickname" value="{{!empty($data['nickname']) ? $data['nickname'] : '' }}">
   </div>
  </div>

  <div class="form-group">
    <label for="partner" class="col-sm-4 control-label">Warehousing Partner</label>
    <div class="col-sm-8">
    <input type="text" class="form-control" name="partner" id="partner" placeholder="Enter partner number" maxlength="10" value="{{!empty($data['partner']) ? $data['partner'] : '' }}">
   </div>
  </div>

  <div class="form-group">
    <label for="email" class="col-sm-4 control-label">Email address</label>
    <div class="col-sm-8">
    <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" value="{{!empty($data['email']) ? $data['email'] : '' }}">
   </div>
  </div>

  <div class="form-group">
    <label for="phone" class="col-sm-4 control-label">Phone no</label>
    <div class="col-sm-8">
    <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter phone number" maxlength="10" value="{{!empty($data['phone']) ? $data['phone'] : '' }}">
   </div>
  </div>

  <div class="form-group">
    <label for="vat" class="col-sm-4 control-label">VAT</label>
    <div class="col-sm-8">
    <input type="text" class="form-control" name="vat" id="vat" placeholder="Enter phone number" value="{{!empty($data['vat']) ? $data['vat'] : '' }}">
   </div>
  </div>

  <div class="form-group">
    <label for="cst" class="col-sm-4 control-label">GSTIN</label>
    <div class="col-sm-8">
    <input type="text" class="form-control" name="cst" id="cst" placeholder="Enter phone number" required="required" value="{{!empty($data['cst']) ? $data['cst'] : '' }}">
   </div>
  </div>

  <div class="box-footer text-center">
          <button type="button" class="btn btn-default">Cancel</button>
          <button type="submit" class="btn btn-success">Update</button>
        </div>
</div>
<!-- /.box-body -->
</div>
<!-- /.row -->
@section('script')
<script type="text/javascript">
  $(document).ready(function(){

    $('#parentWarehouse').on('change', function(){

      var wId = $(this).val();
      if(wId != '') {
        
        $.ajax({
            /* the route pointing to the post function */
            url: '/account/{{$companyId}}/warehouses/'+wId,
            type: 'GET',
            /* send the csrf-token and the input to the controller */
            dataType: 'JSON',
            /* remind that 'data' is the response of the AjaxController */
            success: function (data) { 
                
              if(data != ''){
                $('#warehouse').val(data.warehouse); 
                $('#shortcode').val(data.shortcode); 
                $('#address').val(data.address); 
                $('#city').val(data.city); 
                $('#state').val(data.state); 
                $('#country').val(data.country); 
                $('#zip').val(data.zip); 
                $('#nickname').val(data.nickname); 
                $('#partner').val(data.partner); 
                $('#email').val(data.email); 
                $('#phone').val(data.phone); 
              }
            }
        }); 

      }
    })
  });
 
</script>

@endsection

