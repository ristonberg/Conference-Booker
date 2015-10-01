<?php
require('Dbconnect.php');

	if(isset($_POST['id']) && isset($_POST['name']) && isset($_POST['password']) && isset($_POST['email'])){
		$id=$_POST['id'];
		$name=$_POST['name'];
		$id=$_POST['password'];
		$name=$_POST['email'];
		
		if(isset($_POST['birthDate']) || isset($_POST['age']) || isset($_POST['gender'])){
			$query="INSERT INTO 'users' (id, name, password, email, birthDate, age, gender) 
				VALUES ('$id', '$name', '$password', '$email','$birthDate, '$age', '$gender');
			$result=mysql_query($query);
			if($result){
				$msg= "User Created Successfully.";
			}
			
		else {
			$query="INSERT INTO 'users' (id, name, password, email) VALUES ('$id', '$name', '$password', '$email');
			$result=mysql_query($query);
			if($result){
				$msg= "User Created Successfully.";
			}
		}
	}
?>