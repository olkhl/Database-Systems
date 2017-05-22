<!DOCTYPE html>
<html>
<head>
	
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="header"> 
	<a href="index.php" target="_top" style="text-decoration: none;"><h1>KnowIt</h1></a>
</div>
<?php
session_start();
	
?>


<h1>Home</h1>
<div><h4>Welcome <?php echo $_SESSION['username'];  ?></h4></div>

<?php 
	// connect to database
	
	$db = mysqli_connect("localhost", "root", "", "KnowIt");
	if (isset($_POST['register_btn'])) {
		$username = $_SESSION['username'];
		$subject = mysql_real_escape_string($_POST['subject']);
		$comment = mysql_real_escape_string($_POST['comment']);
	echo $sid;	
		if ($subject != null ) {
			// create user
			 //hash password before storing for security purposes
			$sql = "INSERT INTO request(student_username, subject, comment, accepted) VALUES('$username', '$subject', '$comment', false)";
			mysqli_query($db, $sql);
			$_SESSION['message'] = "Your request has been submited";
			$_SESSION['username'] = $username;
			header("location: home.php"); //redirect to home page
		}else{
			$_SESSION['message'] = "Subject should be specified";
		}
	}
?>
<h1><center>Request</center></h1>
</div>

<?php
	if (isset($_SESSION['message'])) {
		echo "<div id='error_msg'>".$_SESSION['message']."</div>";
		unset($_SESSION['message']);
	}
?>

<form method="post" action="request.php">
	<table>
		<tr>
			<td>Subject:</td>
			<td><input type="text" name="subject" class="textInput"></td>
		</tr>
		<tr>
			<td>Comment:</td>
			<td><input type="text" name="comment" class="textInput"></td>
		</tr>
		<tr>
			
			<td></td>
			<td><input type="submit" name="register_btn" value="Submit"></td>
		</tr>
	</table>
</form>
</body>
</html>