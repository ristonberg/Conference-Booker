<?php
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$id = $_POST["id"];
$email = $_POST["email"];
$password = $_POST["password"];
$birthDate = $_POST["birthDate"];
$age = $_POST["age"];
$gender = $_POST["gender"];

// Create connection
$conn = mysqli_connect("176.32.230.252","cl57-xuezheng","HnsXB/zKk","cl57-xuezheng");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO users (firstname, lastname, id, email, password, birthdate, age, gender)
VALUES ('$firstname', '$lastname', '$id', '$email', '$password', '$birthDate', '$age', '$gender')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
