<?php 
	session_start();
?>

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
	if (isset($_SESSION['message'])) {
		echo "<div id='error_msg'>".$_SESSION['message']."</div>";
		unset($_SESSION['message']);
	}
?>


<h1>Home</h1>
<div><h4>Welcome <?php echo $_SESSION['username'];  ?></h4></div>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "KnowIt";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$user = $_SESSION['username'];
$sql = "SELECT id,username, name, surname, email,subject, phone FROM Tutor where username = '".$user."'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<h1>My profile:</h1><table border = 1, width = 100><tr><td>ID </td><td>" . $row["id"]. "</td></tr><tr><td>  Username </td><td>" . $row["username"]. "</td></tr><tr><td>  Name </td><td>" . $row["name"]."</td></tr><tr><td>  Surname </td><td>" . $row["surname"]."</td></tr><tr><td>  Email </td><td>" . $row["email"]. "</td></tr><tr><td>  Subject </td><td>" . $row["subject"]."</td></tr><tr><td>  Phone </td><td>" . $row["phone"]."</td></tr></table><br>";
    }
} else {
    echo "0 results";
}


?>
<h1>All requests</h1>
<?php 

$sq = "SELECT id,student_username, subject, comment FROM Request ";
$res = mysqli_query($conn, $sq);

if (mysqli_num_rows($res) > 0) {
    // output data of each row
    while($r = mysqli_fetch_assoc($res)) {
        echo "<table border = 1, width = 200><tr><td>Request ID </td><td>" . $r["id"]. "</td></tr><tr><td>  Username </td><td>" . $r["student_username"]. "</td></tr><tr><td>  Subject </td><td>" . $r["subject"]."</td></tr><tr><td>  Comment </td><td>" . $r["comment"]."</td></tr></table><br>";
    }
} else {
    echo "";
}

?>
<button class="btn" type="submit"><a href="response.php" style="text-decoration: none;">Response</a></button>

<h1>My Responses</h1>
<?php
$sq = "SELECT t.request_id,student_username, money,  subject, comment  FROM Responce t, request r where r.id=t.request_id   and t.tutor_username = '".$user."'";
$result1 = mysqli_query($conn, $sq);

if (mysqli_num_rows($result1) > 0) {
    // output data of each row
    while($r = mysqli_fetch_assoc($result1)) {
        echo "<table border = 1, width = 200><tr><td>Request ID </td><td>" . $r["request_id"]. "</td></tr><tr><td>  Student name </td><td>" . $r["student_username"]. "</td></tr><tr><td>  Price </td><td>" . $r["money"]."</td></tr><tr><td>   Subject</td><td>" . $r["subject"]. "</td></tr><tr><td>  Comment </td><td>" . $r["comment"]. "</td></tr></table><br>";
    }
} else {
    echo "";
}

mysqli_close($conn);
?>
<br><br><br><div><a href="logout1.php">Logout</a></div>
</body>
</html>




