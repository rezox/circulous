include ('jquery.form.js');
include ('jquery.watermark.min.js');

$(document).ready(function() { 
   $('#reg_email').ajaxForm({
      dataType: 'json',
      success: processEmail,
		beforeSubmit: validateEmail
   }); 

	$("#email").watermark("you@yourschool.edu");

}); 

function changeMessage(type, message)
{
	$('#message').fadeTo('normal', 0, function() 
   { 
      $('#message').removeClass("warning").removeClass("error").removeClass("success");
      $('#message').addClass(type);
      $('#message_text').html('<strong>'+message+'</strong>');
   });
}

function processEmail(response)
{
	changeMessage(response.type, response.message);

	if (response.type == 'success')
	{
		$('#form').fadeTo('normal', 0, function()
		{
			$('#message').fadeTo('normal', 1);
			$('#form').html($('#form_next').html()).fadeTo('normal', 1);
			$('#form_next').html('');
			$('#email').val(response.email);
		
			$(this).ready(function() {
				$("#pw").watermark("password");
				$("#confirm").watermark("confirm");

				$('#reg_password').ajaxForm({
			      dataType: 'json',
			      success: processPassword,
					beforeSubmit: validatePassword
			   });
			});
		});
	}
	else $('#message').fadeTo('normal', 1);
}

function validateEmail(formData, jqForm, options)
{
	var form = jqForm[0];
	
	if (form.email.value.length < 7) // we assume that a@b.edu = 7 char
	{
		changeMessage('error', "The email address you entered isn't valid.");
		$('#message').fadeTo('normal', 1);
		return false;
	}

	var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	if (!filter.test(form.email.value)) 
	{
		changeMessage('error', "The email address you entered isn't valid.");
		$('#message').fadeTo('normal', 1);
		return false;
	}
	
	return true;
}

function validatePassword(formData, jqForm, options)
{
	var form = jqForm[0];
	
	if (form.pw.value.length < 6)
	{
		changeMessage('error', "Your password must be longer than or equal to six characters.");
		$('#message').fadeTo('normal', 1);
		return false;
	}

	
	if (form.confirm.value != form.pw.value)
	{
		changeMessage('error', "Your passwords aren't the same!");
		$('#message').fadeTo('normal', 1);
		return false;
	}
		
	return true;
}

function processPassword(response)
{
	changeMessage(response.type, response.message);
	if (response.type == 'success') 
   {
      $('#form').fadeTo('fast', 0, function() {   
         $('#message').css("margin-bottom", "20px");
         $('#form').slideUp('normal');
      
      });
	}
   $('#message').fadeTo('normal', 1);
}
