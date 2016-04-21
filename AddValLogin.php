<!--REGISTER/ADD USER TO DB-->
<?php
include("dbconn.php");


connect_to_db( 'morrisht' );

$username = $_POST['registerusername'];
$password = $_POST['registerpwd'];
$email = $_POST['registeremail'];
$skill = $_POST['chooselevel'];

if (isset($_POST['name1'])) {
	$query = "INSERT INTO `user_info` (`username`, `password`, `email`, `skilllevel`) VALUES ('$username', '$password', '$email', '$skill');";
	perform_query($dbc, $query);
}
mysqli_close( $dbc );
