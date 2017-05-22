<?php 
	session_start();
	// connect to database
	
	$db = mysqli_connect("localhost", "root", "", "KnowIt");
	if (isset($_POST['register_btn'])) {
		$username = mysql_real_escape_string($_POST['username']);
		$email = mysql_real_escape_string($_POST['email']);
		$name = mysql_real_escape_string($_POST['name']);
		$surname = mysql_real_escape_string($_POST['surname']);
		$subject = mysql_real_escape_string($_POST['subject']);
		$phone = mysql_real_escape_string($_POST['phone']);
		$password = mysql_real_escape_string($_POST['password']);
		$password2 = mysql_real_escape_string($_POST['password2']);
		if($username!= null and $email!= null and $name!= null and $surname!= null and $subject != null and $phone != null ){
		if ($password == $password2) {
			// create user
			 //hash password before storing for security purposes
			$sql = "INSERT INTO tutor(username, Name, Surname,subject, phone, email, password) VALUES('$username', '$name', '$surname','$subject','$phone', '$email', '$password')";
			mysqli_query($db, $sql);
			$_SESSION['message'] = "You are now logged in";
			$_SESSION['username'] = $username;
			header("location: home1.php"); //redirect to home page
		}else{
			$_SESSION['message'] = "The two passwords do not match";
		}} else  $_SESSION['message'] = "Fill all fields";
	}
?>



<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="header"> 
	<a href="index.php" target="_top" style="text-decoration: none;"><h1>KnowIt</h1></a>
</div>

<?php
	if (isset($_SESSION['message'])) {
		echo "<div id='error_msg'>".$_SESSION['message']."</div>";
		unset($_SESSION['message']);
	}
?>

<form method="post" action="register1.php">
	<table>
		<tr>
			<td>Username:</td>
			<td><input type="text" name="username" class="textInput"></td>
		</tr>
		<tr>
			<td>Name:</td>
			<td><input type="text" name="name" class="textInput"></td>
		</tr>
		<tr>
			<td>Surname:</td>
			<td><input type="text" name="surname" class="textInput"></td>
		</tr>
		<tr>
			<td>Email:</td>
			<td><input type="email" name="email" class="textInput"></td>
		</tr>
		<tr>
		<tr>
			<td>Subject:</td>
			<td><input type="text" name="subject" class="textInput"></td>
		</tr>
		<tr>
			<td>Phone:</td>
			<td><input type="text" name="phone" class="textInput"></td>
		</tr>
			<td>Password:</td>
			<td><input type="password" name="password" class="textInput"></td>
		</tr>
		<tr>
			<td>Confirm Password:</td>
			<td><input type="password" name="password2" class="textInput"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="register_btn" value="Register"></td>
		</tr>
	</table>
	
	
</form>
</body>
</html>