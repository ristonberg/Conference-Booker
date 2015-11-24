<?php
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$id = $_POST["id"];
$email = $_POST["email"];
$password = $_POST["password"];
$birthDate = $_POST["birthDate"];
$age = $_POST["age"];
$gender = $_POST["gender"];
$rank = $_POST["rank"];
$user_id = $_POST["user_id"];

$confirmcode = rand();


// Create connection
$conn = mysqli_connect("176.32.230.252","cl57-xuezheng","HnsXB/zKk","cl57-xuezheng");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO users (firstname, lastname, id, email, password, birthdate, age, gender, rank, owner, active, confirmcode)
VALUES ('$firstname', '$lastname', '$id', '$email', '$password', '$birthDate', '$age', '$gender', '$rank', '$user_id', '0', '$confirmcode')";

$message = 
"
Confirm Your Account
Click the link below to active your account:
http://176.32.230.252/xuezheng.com/emailconfirm.php?email=$email&confirmcode=$confirmcode
--------------------------------------------------------------------------------------------------
Reply to this email will not be recieved.
";

mail($email,"User Confirmation from Conference Room Book", $message, "From: DoNotReply@xuezheng.com");


if (mysqli_query($conn, $sql)) {
    echo "Confirmation email sent. Please confirm your email address.";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
