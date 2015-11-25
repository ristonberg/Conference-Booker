<!DOCTYPE html>
<html>
<head>
	<title>Email Confirmation</title>
</head>
<body>
<?php
$email = $_GET["email"];
$confirmcode = $_GET["confirmcode"];

// Create connection
$conn = mysqli_connect("176.32.230.252","cl57-xuezheng","HnsXB/zKk","cl57-xuezheng");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * from users where email = '$email' and confirmcode = '$confirmcode' ";

// Active user
if (mysqli_query($conn, $sql)) {
	$sqlII = "UPDATE users SET active = '1' WHERE email = '$email'";
	if (mysqli_query($conn, $sqlII)) {
    	echo "Your account is now actived. Thank you.";
    }else{
    	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    echo "This link is no longer vaild.";
}

mysqli_close($conn);
?>
</body>
</html>