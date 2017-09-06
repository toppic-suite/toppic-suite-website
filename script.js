$(document).ready(function(){


		$('#registration-form').validate({
	    rules: {
	       first: {
	        required: false,
	       required: false
	      },
		  
		  last: {
	        required: false,
	       required: false
	      },
	       org: {
	        required: false,
	       required: false
	      },		  
		 username: {
	        minlength: 6,
	        required: true
	      },
		  
		  password: {
				required: true,
				minlength: 6
			},
			confirm_password: {
				required: true,
				minlength: 6,
				equalTo: "#password"
			},
		  
	      email: {
	        required: false,
	        email: false
	      },
		  
	     
		   address: {
	      	minlength: 10,
	        required: true
	      },
		  
		  agree: "required"
		  
	    },
			highlight: function(element) {
				$(element).closest('.control-group').removeClass('success').addClass('error');
			},
			success: function(element) {
				element
				.text('OK!').addClass('valid')
				.closest('.control-group').removeClass('error').addClass('success');
			}
	  });
	  
	  $("#registration-form").validate({
		submitHandler: function(form) {
			if($(form).valid())
				form.submit();
		}
	  });

}); // end document.ready
