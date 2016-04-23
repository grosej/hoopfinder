$(document).ready(function() {
	//initializing the two main divs and sidemenu buttons:
	var $scheduledDiv = $("#scheduled_games");
	var $areagamesDiv = $("#area_games");
	
	$("#scheduled_gamesbtn").addClass("btn-primary");
	$("#area_gamesbtn").addClass("btn-info");
	
	$scheduledDiv.show();
	$areagamesDiv.hide();

	$("#scheduled_gamesbtn").on('click', function() {
		$scheduledDiv.show();
		$("#scheduled_gamesbtn").removeClass("btn-info");
		$("#scheduled_gamesbtn").addClass("btn-primary");
		$areagamesDiv.hide();
		$("#area_gamesbtn").removeClass("btn-primary");
		$("#area_gamesbtn").addClass("btn-info");
	});
	
	$("#area_gamesbtn").on('click', function() {
		$scheduledDiv.hide();
		$("#scheduled_gamesbtn").removeClass("btn-primary");
		$("#scheduled_gamesbtn").addClass("btn-info");
		$areagamesDiv.show();
		$("#area_gamesbtn").removeClass("btn-info");
		$("#area_gamesbtn").addClass("btn-primary");
	});
});


