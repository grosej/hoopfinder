<?php
	include('dbconn.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Hoop Finder  |  Welcome</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="css/csslogin.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jslogin.js"></script>
</head>
<body>
	<div class="container">
		<div id="header" class="row">
			<div id="title" class="col-sm-10">
				<h1>Welcome to Hoop Finder<br />
				<small>Organized Pickup Basketball.</small></h1>
			</div>
  			<div id="nav" class="dropdown col-sm-2">
  				<button id="menubutton" class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><h1>More</h1>
  				<span class="caret"></span></button>
  				<ul id="menulist" class="dropdown-menu">
    				<li><a href="login.html">Welcome</a></li>
    				<li><a href="about.php">About</a></li>
    				<li><a href="adminlogin.html">Admin Login</a></li>
  				</ul>
			</div>
		</div>
		<div id="body" class="row">
			<div id="myCarousel" class="carousel slide col-sm-8" data-ride="carousel">
  				<!-- Indicators -->
  				<ol class="carousel-indicators">
    				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    				<li data-target="#myCarousel" data-slide-to="1"></li>
    				<li data-target="#myCarousel" data-slide-to="2"></li>
    				<li data-target="#myCarousel" data-slide-to="3"></li>
  				</ol>

  				<!-- Wrapper for slides -->
  				<div class="carousel-inner" role="listbox">
    				<div id="loginpic1" class="item active">
      				<img src="images/basketballsunrise.jpg" alt="Sunrise Basketball">
      				<div class="carousel-caption">
        				<h3>Search for Courts</h3>
        				<p>Find your ideal basketball court at a location near you.</p>
      				</div>
    				</div>

    				<div id="loginpic2" class="item">
      				<img src="images/basketballpickup.jpg" alt="Jump Ball">
      				<div id="caption2" class="carousel-caption">
        				<h3>Schedule Games Online</h3>
        				<p>Create games to connect with players of your skill level.</p>
      				</div>
    				</div>

    				<div id="loginpic3" class="item">
      				<img src="images/basketballlayup.jpg" alt="Pickup Basketball">
      				<div id="caption3" class="carousel-caption">
        				<h3>Efficient Pickup</h3>
        				<p>Show up, play ball, and have a good time.</p>
      				</div>
    				</div>

    				<div id="loginpic4" class="item">
      				<img src="images/basketballindoor.jpg" alt="Indoor Pickup Basketball">
      				<div class="carousel-caption">
        				<h3>Make Friends Online</h3>
        				<p>Add players to your network of friends to invite to future games.</p>
      				</div>
    				</div>
  				</div>
  			</div>
  			<div id="logindiv" class="form-display col-sm-4">
				<form id="loginform" method="post" role="form">
				<fieldset id="loginfield">
					<p>Don't have an account? <button id="signup" type="button" class="btn btn-link">Sign up here</button></p>
  					<div class="form-group">
    					<label for="loginusername">Username:</label>
    					<input type="text" class="form-control" id="loginusername" name="username" placeholder="Enter username" required>
  					</div>
  					<div id="loginnameerror"></div>
  					<div class="form-group">
    					<label for="loginpwd">Password:</label>
    					<input type="password" class="form-control" id="loginpwd" name="password" placeholder="Enter password" required>
  					</div>
  					<div id="loginpassworderror"></div>
  					<input type="hidden" name="op1" value="loginsubmit" />
  					<button id="loginsubmit" name="loginsubmit" type="submit" class="btn btn-danger pull-right">Log In</button>
  					<br />
  					<br />
  					<p>Forgot your password? <button id="pwdreset" name="pwdreset" type="button" class="btn btn-link">Reset it here</button></p>
				</fieldset>
				</form>
				<?php
				if ( isset( $_POST['op1'] ) ) {
					handle_validateform( $_POST['op1'] );
				}
				
				function handle_validateform( $op ){
					$entered_username   = $_POST['username'];	
					$entered_password = $_POST['password'];
		
					switch ( $op ) {
						case "loginsubmit":
							validate_user( $entered_username, $entered_password) ;	
							break;
						default:
							die( "Invalid operation" );
					}	
				}
				
				function validate_user( $name, $pw ){
					$encode = sha1( $pw );
					$query = "SELECT * FROM `user_info` WHERE username='$name' AND password='$encode'";
					$dbc = connect_to_db( "morrisht" );
					$result = perform_query( $dbc, $query );
					$row = mysqli_fetch_array( $result, MYSQLI_ASSOC );
	
					if ( mysqli_num_rows( $result ) == 0) {
					?>	<div id="validatefailure" class="col-sm-12 alert alert-danger">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							<strong>Oops!</strong> Validate Failure: <?php echo "$query" ?>
						</div>
					<?php } else {
					?>	<div id="validatesucces" class="col-sm-12 alert alert-success">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  							<strong>Success!</strong> Validate Successful: <?php echo "$query" ?>
						</div>
					<?php }
				} ?>
			</div>
  			<div id="registerdiv" class="form-display col-sm-4">
  				<form id="registerform" method="post" role="form">
  				<fieldset id="registerfield">
  					<p>Already have an account? <button id="signin" type="button" class="btn btn-link">Sign in</button></p>
  					<div class="form-group">
    					<label for="registerusername">Username:</label>
    					<input type="text" class="form-control" id="registerusername" name="username" placeholder="Create username" required>
  					</div>
  					<div id="registernameerror"></div>
  					<div class="form-group">
    					<label for="registerpwd">Password:</label>
    					<input type="password" class="form-control" id="registerpwd" name="password" placeholder="Create password" required>
  					</div>
  					<div id="registerpassworderror"></div>
  					<div class="form-group">
  						<label for="skilllevel">Enter Skill Level:</label>
  						<select id="skilllevel" class="form-control" name="skilllevel" required>
  							<option id="chooselevel" name="chooselevel" value="Choose Skill Level" selected>Choose Skill Level</option>
  							<option id="beginner" name="beginner" value="Beginner">Beginner</option>
  							<option id="intermediate" name="intermediate" value="Intermediate">Intermediate</option>
  							<option id="advanced" name="advanced" value="Advanced">Advanced</option>
  						</select>
  					</div>
  					<div class="form-group">
    					<label for="registeremail">Email:</label>
    					<input type="email" class="form-control" id="registeremail" name="email" placeholder="Enter your email" required>
  					</div>
  					<div id="registeremailerror"></div>
  					<input type="hidden" name="op2" value="registersubmit" />
  					<button id="registersubmit" name="registersubmit" type="submit" class="btn btn-danger pull-right">Register</button>
				</fieldset>
				</form>
				<?php
				if ( isset( $_POST['op2'] ) ) {
					handle_registerform( $_POST['op2'] );
					?>
					<script>
						var $loginDiv = $("#logindiv");
						var $registerDiv = $("#registerdiv");
	
						$loginDiv.hide();
						$registerDiv.show();
					</script>
					<?php
				}
				
				function handle_registerform( $op ){
					$entered_username   = $_POST['username'];	
					$entered_password = $_POST['password'];
					$entered_email = $_POST['email'];
					$entered_skill = $_POST['skilllevel'];
		
					switch ( $op ) {
						case "registersubmit":
							insert_user( $entered_username, $entered_password, $entered_email, $entered_skill );
							break;
						default:
							die( "Invalid operation" );
					}	
				}
				
				function insert_user( $name, $pw, $email, $skill ){
					$encode = sha1( $pw );
					$query="INSERT INTO user_info(username, password, email, skilllevel) VALUES ('$name', '$encode', '$email', '$skill')";
					$dbc = connect_to_db( "morrisht" );
					$result = perform_query( $dbc, $query );
					if ( !$result ) {
					?>	<div id="registerfailure" class="col-sm-12 alert alert-danger">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							<strong>Oops!</strong> Register Failure: <?php echo "$query" ?>
						</div>
					<?php } else {
					?>	<div id="registersucces" class="col-sm-12 alert alert-success">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  							<strong>Success!</strong> Register Successful: <?php echo "$query" ?>
						</div>
					<?php }
				} ?>
			</div>
		</div>
		<div id="footer" class="row">
			<div id="footermain" class="col-sm-12">
				<p>&copy; Copyright 2016</p>
			</div>
		</div>
	</div><!-- .container -->
</body>
</html>