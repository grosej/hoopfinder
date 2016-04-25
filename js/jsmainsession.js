$(document).ready(function() {
	//initializing the two main divs and sidemenu buttons:
	var $scheduledDiv = $("#scheduled_games");
	var $areagamesDiv = $("#area_games");
<<<<<<< HEAD
	
	$("#scheduled_gamesbtn").addClass("btn-primary");
	$("#area_gamesbtn").addClass("btn-info");
	
	$scheduledDiv.show();
	$areagamesDiv.hide();
=======
	var $creategameDiv = $("#creategame");
	
	$("#scheduled_gamesbtn").addClass("btn-primary");
	$("#area_gamesbtn").addClass("btn-info");
	$("#creategamebtn").addClass("btn-info");
	
	$scheduledDiv.show();
	$areagamesDiv.hide();
	$creategameDiv.hide();
>>>>>>> origin/master

	$("#scheduled_gamesbtn").on('click', function() {
		$scheduledDiv.show();
		$("#scheduled_gamesbtn").removeClass("btn-info");
		$("#scheduled_gamesbtn").addClass("btn-primary");
		$areagamesDiv.hide();
		$("#area_gamesbtn").removeClass("btn-primary");
		$("#area_gamesbtn").addClass("btn-info");
<<<<<<< HEAD
=======
		$creategameDiv.hide();
		$("#creategamebtn").removeClass("btn-primary");
		$("#creategamebtn").addClass("btn-info");
>>>>>>> origin/master
	});
	
	$("#area_gamesbtn").on('click', function() {
		$scheduledDiv.hide();
		$("#scheduled_gamesbtn").removeClass("btn-primary");
		$("#scheduled_gamesbtn").addClass("btn-info");
		$areagamesDiv.show();
		$("#area_gamesbtn").removeClass("btn-info");
		$("#area_gamesbtn").addClass("btn-primary");
<<<<<<< HEAD
	});
=======
		$creategameDiv.hide();
		$("#creategamebtn").removeClass("btn-primary");
		$("#creategamebtn").addClass("btn-info");
	});
	
	$("#creategamebtn").on('click', function() {
		$scheduledDiv.hide();
		$("#scheduled_gamesbtn").removeClass("btn-primary");
		$("#scheduled_gamesbtn").addClass("btn-info");
		$areagamesDiv.hide();
		$("#area_gamesbtn").removeClass("btn-primary");
		$("#area_gamesbtn").addClass("btn-info");
		$creategameDiv.show();
		$("#creategamebtn").removeClass("btn-info");
		$("#creategamebtn").addClass("btn-primary");
	});

>>>>>>> origin/master
});


