$(document).ready(function() {
	//initializing login & register forms:
	var $loginDiv = $("#logindiv");
	var $registerDiv = $("#registerdiv");
	
	$loginDiv.show();
	$registerDiv.hide();
	
	//functions to show & hide login/registration divs:
	$("#signup").on('click', function() {
		$registerDiv.show();
		$loginDiv.hide();
	});
	
	$("#signin").on('click', function() {
		$registerDiv.hide();
		$loginDiv.show();
	});

});

function register() {
	var username = document.getElementById("registerusername").value;
	var email = document.getElementById("registeremail").value;
	var password = document.getElementById("registerpwd").value;
	var skill = document.getElementById("skilllevel").value;
	// Returns successful data submission message when the entered information is stored in database.
	var dataString = 'name1=' + username + '&email1=' + email + '&password1=' + password + '&skill1=' + skill;
	if (username == '' || email == '' || password == '' || skill == '') {
		alert("Please Fill All Fields");
	} else {
		// AJAX code to submit form.
		$.ajax({
			type: "POST",
			url: "AddValLogin.php",
			data: dataString,
			cache: false,
			success: function(html) {
				alert(html);
			}
		});
	}
	return false;
}





