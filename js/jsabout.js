$(document).ready(function() {
	//initializing the three main divs and sidemenu buttons:
	var $aboutDiv = $("#aboutdiv");
	var $newsDiv = $("#newsdiv");
	var $contactDiv = $("#contactdiv");
	
	$("#aboutbutton").addClass("btn-primary");
	$("#newsbutton").addClass("btn-info");
	$("#contactbutton").addClass("btn-info");
	
	$aboutDiv.show();
	$newsDiv.hide();
	$contactDiv.hide();
	
	//functions to show & hide appropriate divs when clicking sidemenu,
	//and changing selected button to class primary:
	$("#aboutbutton").on('click', function() {
		$aboutDiv.show();
		$("#aboutbutton").removeClass("btn-info");
		$("#aboutbutton").addClass("btn-primary");
		$newsDiv.hide();
		$("#newsbutton").removeClass("btn-primary");
		$("#newsbutton").addClass("btn-info");
		$contactDiv.hide();
		$("#contactbutton").removeClass("btn-primary");
		$("#contactbutton").addClass("btn-info");
	});
	
	$("#newsbutton").on('click', function() {
		$aboutDiv.hide();
		$("#aboutbutton").removeClass("btn-primary");
		$("#aboutbutton").addClass("btn-info");
		$newsDiv.show();
		$("#newsbutton").removeClass("btn-info");
		$("#newsbutton").addClass("btn-primary");
		$contactDiv.hide();
		$("#contactbutton").removeClass("btn-primary");
		$("#contactbutton").addClass("btn-info");
	});
	
	$("#contactbutton").on('click', function() {
		$aboutDiv.hide();
		$("#aboutbutton").removeClass("btn-primary");
		$("#aboutbutton").addClass("btn-info");
		$newsDiv.hide();
		$("#newsbutton").removeClass("btn-primary");
		$("#newsbutton").addClass("btn-info");
		$contactDiv.show();
		$("#contactbutton").removeClass("btn-info");
		$("#contactbutton").addClass("btn-primary");
	});
	
	//function to keep newsdiv the active div when feed button is pressed:
	$("#getfeed").on('click', function() {
		window.history.go(-1);
	});
	
	//coordinates to Boston College:
	var myCenter = new google.maps.LatLng(42.339770, -71.166755);
	
	//function to display map when contactbutton is pressed:
	$("#contactbutton").on("click", function(e) {
        e.preventDefault();
        var latLng = jQuery(this).attr("data-latLng");          
        initialize(latLng);
    });
    
	function initialize(latLng) {
		var mapProp = {
			center:myCenter,
			zoom:12,
			scrollwheel:false,
			draggable:false,
			mapTypeId:google.maps.MapTypeId.ROADMAP
		};

		var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);

		var marker = new google.maps.Marker({
			position:myCenter,
		});

		marker.setMap(map);
	}
	
	//function to parse RSS feeds through JavaScript:
	$("#getfeed").click(function() {
		var urlLink = document.getElementsByName("feed");
		
		$.ajax ( {
  			url      : document.location.protocol + '//ajax.googleapis.com/ajax/services/feed/load?v=1.0&num=10&callback=?&q=' + encodeURIComponent(urlLink),
  			dataType : 'json',
  			success  : function (data) {
    			if (data.responseData.feed && data.responseData.feed.entries) {
      				$.each(data.responseData.feed.entries, function (i, e) {
        				console.log("------------------------");
        				console.log("title      : " + e.title);
        				console.log("author     : " + e.author);
        				console.log("description: " + e.description);
      				});
    			}
  			}
		});
	});

});