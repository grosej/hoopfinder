$(document).ready(function() {
	//initializing the three main divs and sidemenu buttons:
	var $scheduledDiv = $("#scheduled_games");
	var $areagamesDiv = $("#area_games");
	var $friendsDiv = $("#see_friends");
	
	$("#scheduled_gamesbtn").addClass("btn-primary");
	$("#area_gamesbtn").addClass("btn-info");
	$("#see_friendsbtn").addClass("btn-info");
	
	$scheduledDiv.show();
	$areagamesDiv.hide();
	$friendsDiv.hide();

	$("#scheduled_gamesbtn").on('click', function() {
		$scheduledDiv.show();
		$("#scheduled_gamesbtn").removeClass("btn-info");
		$("#scheduled_gamesbtn").addClass("btn-primary");
		$areagamesDiv.hide();
		$("#area_gamesbtn").removeClass("btn-primary");
		$("#area_gamesbtn").addClass("btn-info");
		$friendsDiv.hide();
		$("#see_friendsbtn").removeClass("btn-primary");
		$("#see_friendsbtn").addClass("btn-info");
	});
	
	$("#area_gamesbtn").on('click', function() {
		$scheduledDiv.hide();
		$("#scheduled_gamesbtn").removeClass("btn-primary");
		$("#scheduled_gamesbtn").addClass("btn-info");
		$areagamesDiv.show();
		$("#area_gamesbtn").removeClass("btn-info");
		$("#area_gamesbtn").addClass("btn-primary");
		$friendsDiv.hide();
		$("#see_friendsbtn").removeClass("btn-primary");
		$("#see_friendsbtn").addClass("btn-info");
	});
	
	$("#see_friendsbtn").on('click', function() {
		$scheduledDiv.hide();
		$("#scheduled_gamesbtn").removeClass("btn-primary");
		$("#scheduled_gamesbtn").addClass("btn-info");
		$areagamesDiv.hide();
		$("#area_gamesbtn").removeClass("btn-primary");
		$("#area_gamesbtn").addClass("btn-info");
		$friendsDiv.show();
		$("#see_friendsbtn").removeClass("btn-info");
		$("#see_friendsbtn").addClass("btn-primary");
	});

});


