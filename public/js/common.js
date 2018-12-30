var re = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;

function validateEmail(email){
	return re.test(String(email).toLowerCase());
}

var ph = /^([5-9][0-9]{9})$/i;

function validatePhone(email){
	return ph.test(String(email).toLowerCase());
}

function editUserData(obj,id){
    $(obj).parent().find('a').removeClass('hide');
    $(obj).addClass('hide');
    $('#'+id).removeAttr('readonly');
  }
  function saveUserData(obj,id){
    $(obj).parent().find('a').removeClass('hide');
    $(obj).addClass('hide');

    var error = '';
    var data = $('#'+id).val().trim();
    if(data != ''){
      
      if(id == 'email'){
      	if(!validateEmail(data)){
      		error= 'Invalid email';
      	}

      } else if(id == 'phone'){
      	if(!validatePhone(data)){
      		error= 'Invalid phone no';
      	}
      }

    } else{
    	error = id+' is required';
    }

    if(error == ''){
        $.ajax({
              headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              /* the route pointing to the post function */
              url: '/user/profile',
              type: 'POST',
              /* send the csrf-token and the input to the controller */
              data: {field : id, value : data},
              dataType: 'JSON',
              /* remind that 'data' is the response of the AjaxController */
              success: function (data) { 
                console.log(data)
                $('#'+id).attr('readonly', 'readonly');
                if(data == 1){
                  $('#display-msg span').html('Successfully Updated');
                  $('#display-msg').removeClass('hide');
                }
              }
          }); 
    } else {
      alert(error)
    }


  }