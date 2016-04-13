$(document).ready(function() {
	var $scheduledDiv = $("#scheduled_games");
	var $friendsDiv = $("#see_friends");
	var $areagamesDiv = $("#area_games");
	
	$("#scheduled_gamesbtn").addClass("btn-primary");
	$("#see_friendsbtn").addClass("btn-info");
	$("#area_gamesbtn").addClass("btn-info");
	
	$scheduledDiv.show();
	$friendsDiv.hide();
	$areagamesDiv.hide();

	$("#scheduled_gamesbtn").on('click', function() {
		$scheduledDiv.show();
		$friendsDiv.hide();
		$areagamesDiv.hide();
	});
	
	$("#see_friendsbtn").on('click', function() {
		$scheduledDiv.hide();
		$friendsDiv.show();
		$areagamesDiv.hide();
	});

	$("#area_gamesbtn").on('click', function() {
		$scheduledDiv.hide();
		$friendsDiv.hide();
		$areagamesDiv.show();
	});
});


