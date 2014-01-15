$(function() {
	$('#registerForm').validate({
		rules: {
			firstName: 'required',
			lastName: 'required',
			nick: 'required',
			email: {
				required: true,
				email: true
			},
			pwd: {
				required: true,
				minlength: 8
			},
			pwdConfirm: {
				required: true,
				minlength: 8
			}
        },
        messages: {
            firstName: "Please enter your name",
            lastName: "Please specify your gender",
            email: "Please enter a valid email address",
            pwd: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long"
            }
        },
        submitHandler: function(form) {
            form.submit();
        }
	});
});