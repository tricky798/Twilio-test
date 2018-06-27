$(document)
.on("submit", "form.js-register", function(event) {
	event.preventDefault();

	var _form = $(this);
	var _error = $(".js-error", _form);

	var dataObj = {
		email: $("input[type='email']", _form).val(),
		password: $("input[type='password']", _form).val(),
		fullname: $("input[name='fullname']", _form).val(),
		refpage: $("input[name='refpage']", _form).val(),
		mobile: $("input[name='mobile']", _form).val(),
		tableno: $("select[name='tablesel']", _form).val()
	};

	if (dataObj.password.length < 8) {
		_error
			.text("Please enter a password that is at least 8 characters long.")
			.show();
		return false;
	}

	// Assuming the code gets this far, we can start the ajax process
	_error.hide();

	$.ajax({
		type: 'POST',
		url: 'ajax/register.php',
    cache : false,
		data: dataObj,
		dataType: 'json',
		async: true,
	})
	.done(function ajaxDone(data) {
		// Whatever data is
		if(data.redirect !== undefined) {
			window.location = data.redirect;
		} else if(data.error !== undefined) {
			_error
				.text(data.error)
				.show();
		}
		console.log('Register tried Do Ajax');
	})
	.fail(function ajaxFailed(e) {
		// This failed
		console.log('Register Failed');
	})
	.always(function ajaxAlwaysDoThis(data) {
		// Always do
		console.log('Register Always');
	})

	return false;
})
//
