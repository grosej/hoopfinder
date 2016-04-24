<?php
	include('dbconn.php');
	
	if ( isset( $_POST['op1'] ) ) {
		handle_validateform( $_POST['op1'] );
	}
				
	function handle_validateform( $op ){
		$entered_username   = isset($_POST['username']) ? $_POST['username'] : "";	
		$entered_password = isset($_POST['password']) ? $_POST['password'] : "";
		
		switch ( $op ) {
			case "loginsubmit":
				if ($entered_username == "" || $entered_password == "") {
					$message = "Please enter a Username and Password!";
					echo "<script type='text/javascript'>
						alert('$message');
						window.location.replace(\"login.php\");
						</script>";
				} else {
					validate_user( $entered_username, $entered_password);
				}
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
			$message = "Validation failed! Please reenter your username and password and try again";
			echo "<script type='text/javascript'>
					alert('$message');
					window.location.replace(\"login.php\");
					</script>";
		} else {
			header("Location: mainsession.html");
		}
	}
				
	if ( isset( $_POST['op2'] ) ) {
		handle_registerform( $_POST['op2'] );
	}
				
	function handle_registerform( $op ){
		$entered_username = isset($_POST['username']) ? $_POST['username'] : "";	
		$entered_password = isset($_POST['password']) ? $_POST['password'] : "";
		$entered_email = isset($_POST['email']) ? $_POST['email'] : "";
		$entered_skill = isset($_POST['skilllevel']) ? $_POST['skilllevel'] : "";
		
		switch ( $op ) {
			case "registersubmit":
				if ($entered_username == "" || $entered_password == "" || $entered_email == "" || $entered_skill == "") {
					$message = "Please complete all fields to register!";
					echo "<script type='text/javascript'>
							alert('$message');
							window.location.replace(\"login.php\");
						</script>";
				} else {
					insert_user( $entered_username, $entered_password, $entered_email, $entered_skill );
				}
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
			$message = "Registration failed! Please reenter your username and password and try again";
			echo "<script type='text/javascript'>
					alert('$message');
					window.location.replace(\"login.php\");
					</script>";
		} else {
			header("Location: mainsession.html");
		}
	}
	
	if (isset ( $_POST['resetpwdsubmit'] ) ) {
		handle_resetpwd();
	}
	
	function handle_resetpwd() {
		$resetemail = isset($_POST['resetpwdemail']) ? $_POST['resetpwdemail'] : "";
		
		if ($resetemail == "") {
			$message = "Please enter an email address!";
			echo "<script type='text/javascript'>
					alert('$message');
					window.location.replace(\"login.php\");
				</script>";
		} else {
			email_reset($resetemail);
		}
	}
	
	function email_reset ($email) {
		//start with empty password
		$password="";
		
		//define possible characters
		$possible="23456789abcdefghjklmnpwrstuvwxyz";
		$length = 8;
		
		for ($i = 1; $i <= $length; $i++) {
			// pick a random character from the possible characters
			$pick = rand( 0, strlen( $possible ) - 1 );
			$passchar  = substr( $possible, $pick, 1 );
			$password .= $passchar;
		}
		
		$encode = sha1( $password );
		$query="UPDATE `user_info` SET password='$encode' WHERE email='$email'";
		$dbc = connect_to_db( "morrisht" );
		$result = perform_query( $dbc, $query );
		$row = mysqli_fetch_array( $result, MYSQLI_ASSOC );
		
		if (mysqli_num_rows( $result ) == 0) {
			$message1 = "Email not found. Please enter a valied email address.";
			echo "<script type='text/javascript'>
					alert('$message1');
					window.location.replace(\"login.php\");
					</script>";
		} else {
			$subject="Hoop Finder -- Your Password Reset";
			$body="Hello $email,\n\n \t This is an email to reset your password for Hoop Finder. Your new password is: $password. Happy hoop finding!";
			$headers="From: admin@hoopfinder.com";
		
			if( mail( $email, $subject, $body, $headers) ) {
				$message2 = "Success! Your password has been reset. Please check your email for your new password.";
				echo "<script type='text/javascript'>
						alert('$message2');
						window.location.replace(\"login.php\");
						</script>";
			} else {
				$message3 = "Oops! Something went wrong. Please check your internet connection and try again.";
				echo "<script type='text/javascript'>
						alert('$message3');
						window.location.replace(\"login.php\");
						</script>";
			}
		}
	}
?>