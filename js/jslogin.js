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