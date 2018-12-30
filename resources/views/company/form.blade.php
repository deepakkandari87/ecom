<div class="row">
  <div class="col-md-8 col-xs-offset-2">
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
    <p class="help-block">Only jpg, jpeg, png, gif file format allowed.</p>
   </div>
  </div>

  <div class="form-group">
    <label for="email" class="col-sm-2 control-label">Email address</label>
    <div class="col-sm-10">
    <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" required="required" value="{{$data->email}}">
   </div>
  </div>

  <div class="form-group">
    <label for="phone" class="col-sm-2 control-label">Phone no</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter phone number" maxlength="10" required="required" value="{{$data->phone}}">
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
  
    
    <div class="col-sm-5">
    <input type="text" class="form-control" name="state" id="state" placeholder="Enter state" required="required" value="{{$data->state}}">
   </div>
  </div>

  <div class="form-group">
    <label for="country" class="col-sm-2 control-label"></label>
    <div class="col-sm-5">
    <input type="text" class="form-control" name="country" id="country" placeholder="Enter country" required="required" value="{{$data->country}}">
   </div>
  
    <div class="col-sm-5">
    <input type="text" class="form-control" name="zip" id="zip" maxlength="6" placeholder="Enter zip" required="required" value="{{$data->zip}}">
   </div>
  </div>

  <div class="form-group">
    <label for="pan" class="col-sm-2 control-label">PAN</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" name="pan" id="pan" placeholder="Enter phone number" value="{{$data->pan}}">
   </div>
  </div>
  <div class="form-group">
    <label for="tax" class="col-sm-2 control-label">Service Tax</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" name="tax" id="tax" placeholder="Enter phone number" value="{{$data->tax}}">
   </div>
  </div>
  <div class="form-group">
    <label for="cst" class="col-sm-2 control-label">CST</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" name="cst" id="cst" placeholder="Enter phone number" value="{{$data->cst}}">
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
