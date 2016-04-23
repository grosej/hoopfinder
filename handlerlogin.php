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
		$entered_username   = isset($_POST['username']) ? $_POST['username'] : "";	
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
?>