<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Assign User Form</title>
  <link href="assignUserForm.css" rel="stylesheet">

<style>
textarea:required:invalid, input:required:invalid {
  background-color: lightyellow;
}
</style>

<script>
    
    // needed features:
    // email confirmation
    // check if email, ID is already used.
    // or we could assign users ID from 1 to inf after they confirm email
    
function validateForm() {
  if (!Modernizr.input.required) {
    // check the required fields
    
    // get an array that holds all the elements.
    var inputElements = document.getElementById("assignUserForm").elements;
    
    for(var i = 0; i < inputElements.length; i++) {
      if (inputElements[i].hasAttribute("required")) {
        // If this elemnent is required, check if it has a value.
        if (inputElements[i].value == "") {
          alert("Custom required-field validation failed. The form will not be submitted.");
          return false;
        }
      }
    }
    // submit the form.
    return true;
  }
}
</script>

</head>
<body>

<?php
require('Dbconnect.php');

	if(isset($_POST['id']) && isset($_POST['name']) && isset($_POST['password']) && isset($_POST['email'])){
		$id=$_POST['id'];
		$name=$_POST['name'];
		$password=$_POST['password'];
		$email=$_POST['email'];
		
		if(isset($_POST['birthDate']) || isset($_POST['age']) || isset($_POST['gender'])){
			$query="INSERT INTO 'Users' (id, name, pass, email, birthDate, age, gender) 
				VALUES ('$id', '$name', '$password', '$email','$birthDate', '$age', '$gender')";
			$result=mysql_query($query);
			if($result){
				$msg= "User Created Successfully.";
			}
			
		else {
			$query="INSERT INTO 'Users' (id, name, pass, email) VALUES ('$id', '$name', '$password', '$email')";
			$result=mysql_query($query);
			if($result){
				$msg= "User Created Successfully.";
			}
		}
	}
?>

<h1>Assign User Form</h1>
<form id="assignUserForm" action="#" method="POST" onsubmit="return validateForm()">
  <p><i>Please complete the form. Mandatory fields are marked with a </i><em>*</em></p>
  <fieldset>
    <legend>Contact Details</legend>
      <label for="name">Name <em>*</em></label>
      <input id="name" placeholder="e.g. Jane Smith" autofocus required><br>
      <label for="id">ID<em>*</em></label>
      <input id="id" type="number" min="1" max="10000000" step="1" placeholder="e.g. 123456" ><br>
      <label for="email">Email <em>*</em></label>
      <input id="email" type="email" placeholder="e.g. qwer@qwer.com" required><br>
      <label for="password">Password <em>*</em></label>
      <input id="password" type="password" required><br>
  </fieldset>
  <fieldset>
    <legend>Personal Information</legend>

      <label for="birthDate">Birth Date</label>
      <input id="birthDate" type="date" ><br>

      <label for="age">Age</label>
      <input id="age" type="number" min="1" max="120" step="1" ><br>
      <label for="gender">Gender</label>
      <select id="gender">
        <option value="female">Female</option>
        <option value="male">Male</option>
      </select><br>
      
  </fieldset>
  
  <p><input type="submit" value="Submit Application"></p>
  
</form>
</body>
</html>
