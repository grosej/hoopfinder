<!--REGISTER/ADD USER TO DB-->
<?php

$username = isset($_POST['username']) ? $_POST['username'] : "";
$password = isset($_POST['password']) ? $_POST['password'] : "";
$email = isset($_POST['email']) ? $_POST['email'] : "";
$skill = isset($_POST['skill']) ? $_POST['skill'] : "";

$connection = mysql_connect("localhost", "morrisht", "MyjqzwSr");
$db = mysql_select_db("morrisht", $connection);

if (isset($_POST['registersubmit'])) {
	$query = mysql_query("INSERT INTO user_info(username, password, email, skilllevel) VALUES ('$username', '$password', '$email', '$skill')");
	echo "register successful";
}
mysqli_close($connection);
?>

