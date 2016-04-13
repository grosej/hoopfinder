<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Hoop Finder  |  About</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="css/cssabout.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jsabout.js"></script>
	<script src="http://maps.googleapis.com/maps/api/js"></script>
	<?php
	$options = array(
      'http'=>array(
        'method'=>"GET",
        'header'=>"Accept-language: en\r\n" .
                  "User-Agent: CSCI2254/v10.0 (http://cscilab.bc.edu/; contact.morrisht@bc.edu)"
	) );
	$context = stream_context_create($options);
	?>
</head>
<body>
	<div class="container">
		<div id="header" class="row">
			<div id="title" class="col-sm-10">
				<h1>Hoop Finder - About<br />
				<small>Organized Pickup Basketball.</small></h1>
			</div>
  			<div id="nav" class="dropdown col-sm-2">
  				<button id="menubutton" class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><h1>More</h1>
  				<span class="caret"></span></button>
  				<ul id="menulist" class="dropdown-menu">
  					<li><a href="login.html">Welcome</a></li>
    				<li><a href="about.php">About</a></li>
    				<li><a href="#">Admin Login</a></li>
  				</ul>
			</div>
		</div>
		<div id="body" class="row">
			<div id="sidemenu" class="btn-group-vertical col-sm-3">
  				<button id="aboutbutton" type="button" class="btn">About Us</button>
  				<button id="newsbutton" type="button" class="btn">Basketball News</button>
  				<button id="contactbutton" type="button" class="btn">Contact Us</button>
			</div>
			<div id="aboutcontainer" class="container">
			<div id="aboutdiv" class="col-sm-8">
				<h2 class="text-center">About Us</h2>
				<br />
				<h4 class="text-center">Welcome to Hoop Finder!</h4>
				<p>Hoop Finder is a website where people can make an account in order to 
					play pickup basketball in a more organized fashion. After creating an account, you will have the ability 
					to either schedule games for your friends to join, or join previously created games to play with strangers! 
					Hoop Finder is a great way to assure that you will have enough players for a basketball game so that you 
					don't have to waste time showing up in person. And the best part is, our services are <i>free</i>, so try it today!</p>
				<br />
				<img id="basketballimage" src="images/basketballcontest.jpg" alt="Contesting for Basketball">
				<div id="valuesdiv" class="container-fluid text-center">
  					<h2>MISSION</h2>
  					<h4>What we bring to the table</h4>
  					<br>
  					<div class="row">
    					<div class="col-sm-4">
      						<span class="glyphicon glyphicon-off logo-small"></span>
      						<h4>POWER TO PLAYERS</h4>
      						<p>Have the ability to create pickup basketball games with the click of a button.</p>
    					</div>
    					<div class="col-sm-4">
      						<span class="glyphicon glyphicon-globe logo-small"></span>
      						<h4>TOGETHER AS ONE</h4>
      						<p>Hoop Finder seeks to bring basketball players together from around the world to play 
      						how they want to.</p>
    					</div>
    					<div class="col-sm-4">
      						<span class="glyphicon glyphicon-search logo-small"></span>
      						<h4>FIND GAMES EASILY</h4>
      						<p>Search for your desired time, and either join a previously made game, or create your 
      						own to invite friends.</p>
    					</div>
    				</div>
    				<br><br>
  					<div class="row">
    					<div class="col-sm-4">
      						<span class="glyphicon glyphicon-play logo-small"></span>
      						<h4>PLAY WHEN YOU WANT</h4>
      						<p>Log in, set up a game, and go play at a time that is most convenient for you. There are 
      						no regular league commitments!</p>
    					</div>
    					<div class="col-sm-4">
      						<span class="glyphicon glyphicon-check logo-small"></span>
      						<h4>FINISH GAMES EFFICIENTLY</h4>
      						<p>Show up knowing enough players will be there to play a game. No more wasting time showing 
      						up to booked courts.</p>
    					</div>
    					<div class="col-sm-4">
      						<span class="glyphicon glyphicon-user logo-small"></span>
      						<h4>FIND FRIENDS ONLINE</h4>
      						<p>Connect with players you've previously played with to invite them to future games you 
      						schedule. Create you're own basketball team!</p>
    					</div>
  					</div>
				</div>
			</div>
			<div id="newsdiv" class="col-sm-8">
				<?php
				$feeds = array(
					'http://www.rotowire.com/rss/news.htm?sport=nba',
					'http://www.rotowire.com/rss/news.htm?sport=cbb');
				?>
				<h2 class="text-center">Recent Basketball News</h2>
				<?php
				create_form($feeds, "feed");

				if ( isset( $_GET['getfeed'] ) ) {
					handle_form( $_GET['feed'] );
				}

				function handle_form( $myfeed ) {
					$rss = simplexml_load_file( $myfeed );
					$title = $rss->channel->title;
					echo "<h3>$title</h3>";

					$items = $rss->channel->item;
					if (!$items) {
    					$items = $rss->item;
    				}

    				foreach ( $items as $item ) {
     					echo "<div class='news'>
      					<h4>$item->title<h4>\n";
        				echo '<a href="' . $item->link . '">' . $item->title . '</a><br><br>';
        				echo $item->description . "<br><br>\n";
        				echo "</div>";
    				}
				}

				function create_form( $farray, $menuname ) {
				?>
 				<form class="text-center" method="get" role="form">
					<?php create_menu( $farray, $menuname ); ?>
					<br />
					<button type="submit" id="getfeed" name="getfeed" class="btn btn-danger pull-right">Get Feed</button>
				</form>
				<?php
				}

				function create_menu($farray, $menuname) {
					$current_feed = isset( $_GET['feed'] ) ?  $_GET['feed'] : "";
					echo "<select id=\"newsselect\" class=\"form-control\" name='$menuname'>";
					echo "<option value=\"Choose News Feed\" selected>Choose News Feed</option>";
					foreach ( $farray as $f ) {
						if ( $current_feed == $f )  {
							echo "<option value='$f' selected>$f</option>";
						} else {
							echo "<option value='$f'>$f</option>";
						}
					}
					echo '</select>';
				}
				?>
			</div>
			<div id="contactdiv" class="col-sm-8">
				<h2 class="text-center">Contact</h2>
  				<p class="text-center"><em>Questions? Feedback? Send us a note!</em></p>
    			<div id="contactinfo" class="col-sm-4">
      				<p><span class="glyphicon glyphicon-map-marker"></span> Chestnut Hill, US</p>
      				<p><span class="glyphicon glyphicon-phone"></span> <b>Phone:</b> +00 1 2032161168</p>
      				<p><span class="glyphicon glyphicon-envelope"></span> <b>Email:</b> contact@hoopfinder.com</p> 
    			</div>
    			<div id="contactform" class="col-sm-8">
    			<?php
    				display_contactform();
    				if ( isset( $_GET['contactsubmitbtn'] ) ) {
						handle_contactform();
					}
					
					function display_contactform() {
						$contactname = isset($_GET['name']) ? $_GET['name'] : "";
						$contactemail = isset($_GET['email']) ? $_GET['email'] : "";
						$contactcomments = isset($_GET['comments']) ? $_GET['comments'] : "";
				?>
    			<form id="contact" method="get" role="form">
      				<div class="row">
        				<div class="col-sm-6 form-group">
          					<input class="form-control" id="contactname" name="name" placeholder="Enter Name" type="text" required>
        				</div>
        				<div class="col-sm-6 form-group">
          					<input class="form-control" id="contactemail" name="email" placeholder="Enter Email" type="email" required>
        				</div>
      				</div>
      				<textarea class="form-control" id="contactcomments" name="comments" placeholder="Enter Comment Here" rows="5"></textarea>
        			<div id="contactsubmit" class="col-sm-12 form-group">
          				<button id="contactsubmitbtn" name="contactsubmitbtn" class="btn btn-danger pull-right" type="submit">Send</button>
        			</div>
        		</form>
        		<?php
					}
					
					function handle_contactform(){
						$contactname = $_GET['name'];
						$contactemail = $_GET['email'];
						$contactcomments = $_GET['comments'];
						
						$subject='Thank you for contacting Hoop Finder!';
						$body='Dear $contactname,\n
							Thank you for your inquiry that you have sent us here at Hoop Finder. We appreciate the time you have taken to get in touch with us. 
							We will process your message, and you will hear back from us within the next week. If this is an urgent matter, please feel free to 
							call us at (203) 216-1168. Have a great day!';
						$headers='From: morrisht@bc.edu';
					
						mail($contactemail, $subject, $body, $headers);
					}
    			?>
    			</div>
    			<div id="googleMap"></div>
			</div>
			</div> <!-- .container -->
		</div>
		<div id="footer" class="row">
			<div id="footermain" class="col-sm-12">
				<p>&copy; Copyright 2016</p>
			</div>
		</div>
	</div> <!-- .container -->
</body>
</html>