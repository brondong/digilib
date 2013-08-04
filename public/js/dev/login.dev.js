$('input').keypress(function(k)
{
	if (k.which == 13) login();
});

function login()
{
	var username = $('#username').val().trim();
	var password = $('#password').val().trim();
	var ingat = $('#ingat').is(':checked') ? 1 : 0;

	$.post(url_login, { username:username, password:password, ingat:ingat }, function(r)
	{
		if (r.status == '') {
			if (r.username != '') {
				$('#control-username').removeClass('info').addClass('error');
				$('#error-username').text(r.username);
				$('#password').val('');
			} else {
				$('#control-username').removeClass('error').addClass('info');
				$('#error-username').text('');
			};

			if (r.password != '') {
				$('#control-password').removeClass('info').addClass('error');
				$('#error-password').text(r.password);
				$('#password').val('');
			} else {
				$('#control-password').addClass('error');
				$('#error-password').text('');
			};
		} else {
			if (r.status == 'ok') {
				$(location).prop('href', url_home);
			} else {
				$('.control-group').removeClass('info error').find('input, .help-block').val('').text('');
				$('#username').focus();

				Messenger().post({
					message: 'Username dan password tidak cocok.',
					type: 'error',
					showCloseButton: true
				});
			};
		};
	}, "json");
}