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
	
	//code to allow modal to function:
	$('#myModal').appendTo("body");
	
	//code to validate form inputs:
	function validate_loginname(){
		var loginname = document.getElementById("loginusername").value ;
		if (loginname.length < 5 || loginname.length > 20) {
			var errorloginname = document.getElementById("loginnameerror");
			errorloginname.innerHTML = "Please enter a valid username (5 char min, 20 char max)";
			return false;
		}
		return true;
	}
	
	function validate_loginpwd(){
		var loginpwd = document.getElementById("loginpwd").value ;
		if (loginpwd.length < 5 || loginpwd.length > 20) {
			var errorloginpwd = document.getElementById("loginpassworderror");
			errorloginpwd.innerHTML = "Please enter a valid password (5 char min, 20 char max)";
			return false;
		}
		return true;
	}
	
	function validate_registername(){
		var registername = document.getElementById("registerusername").value ;
		if (registername.length < 5 || registername.length > 20) {
			var errorregistername=document.getElementById("registernameerror");
			errorregistername.innerHTML = "Please enter a valid username (5 char min, 20 char max)";
			return false;
		}
		return true;
	}
	
	function validate_registerpwd(){
		var registerpwd = document.getElementById("registerpwd").value ;
		if (registerpwd.length < 5 || registerpwd.length > 20) {
			var errorregisterpwd = document.getElementById("registerpassworderror");
			errorregisterpwd.innerHTML = "Please enter a valid password (5 char min, 20 char max)";
			return false;
		}
		return true;
	}
	
	function validate_skilllevel(){
		var skilllevel = document.getElementById("skilllevel").value ;
		if (skilllevel.value == "Choose Skill Level") {
			var errorskilllevel = document.getElementById("skilllevelerror");
			errorskilllevel.innerHTML = "Please enter a valid skill level";
			return false;
		}
		return true;
	}
	
	function validate_registeremail(){
		var registeremail = document.getElementById("registeremail").value ;
		if (registeremail.length > 40) {
			var errorregisteremail = document.getElementById("registeremailerror");
			errorregisteremail.innerHTML = "Please enter a valid email (40 char max)";
			return false;
		}
		return true;
	}
	
	if (document.getElementById('loginsubmit').clicked == true) {
		$("#loginusername").validate_loginname();
		$("#loginpwd").validate_loginpwd();
	}
	
	if (document.getElementById('registersubmit').clicked == true) {
		$("#registerusername").validate_registername();
		$("#registerpwd").validate_registerpwd();
		$("#skilllevel").validate_skilllevel();
		$("#registeremail").validate_registeremail();
	}
	
});





