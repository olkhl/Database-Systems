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
		$price = mysql_real_escape_string($_POST['price']);
		global $id;
		$id = mysql_real_escape_string($_POST['id']);
				
		if ($id != null and $price!= null ) {
			// create user
			 //hash password before storing for security purposes
			$sql = "INSERT INTO responce(request_id, tutor_username, money, accepted) VALUES('$id', '$username', '$price', false  );";
			mysqli_query($db,$sql);
			if (mysqli_num_rows(mysqli_query($db,"select * from Request where id = '".$id."'")) == 0)
			{mysqli_query($db,"delete from Responce where request_id = '".$id."'");}
		     	
			
			$_SESSION['username'] = $username;
			header("location: home1.php"); //redirect to home page
		}else{
			$_SESSION['message'] = "Fill all the blanks";
		}
	
	}1
?>
<h1><center>Response</center></h1>
</div>


<form method="post" action="response.php">
	<table>
		<tr>
			<td>Request_id:</td>
			<td><input type="text" name="id" class="textInput"></td>
		</tr>
		
		<tr>
			<td>Price:</td>
			<td><input type="text" name="price" class="textInput"></td>
		</tr>
		<tr>
			
			<td></td>
			<td><input type="submit" name="register_btn" value="Submit"></td>
		</tr>
	</table>
</form>

</body>
</html>