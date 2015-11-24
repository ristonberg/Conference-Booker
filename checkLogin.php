<?php
$conn = mysqli_connect("176.32.230.252","cl57-xuezheng","HnsXB/zKk","cl57-xuezheng");
// Check connection
if(!$conn) {
    die('Connection problem ! --> '.mysql_error());
}

$email = $_POST['email']; 
$password = $_POST['password'];
$tablename = 'users';

$sql="SELECT * FROM $tablename WHERE email='$email' and active = '1' ";
$result=mysqli_query($conn, $sql);

$count=mysqli_num_rows($result);
// If result matched $email, table row must be 1 row
if($count==1){
    $row = mysqli_fetch_assoc($result);
    if ($password == $row['password']){
        //session_register("email");
        //session_register("password"); 
        echo "Login Successful";
        return true;
    }
    else {
        echo "Wrong email or Password";
        return false;
    }
}
else{
    echo "Wrong email or Password";
    return false;
}

?>
