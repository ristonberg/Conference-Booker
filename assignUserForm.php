<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Assign User Form</title>
  <link href="assignUserForm.css" rel="stylesheet">
  <script type="text/javascript" src="logOut.js"></script>

  <script type="text/javascript" src="background.js"></script>
  <link rel="stylesheet" href="welcome.css">
  <link href='lib/fullcalendar.css' rel='stylesheet' />
  <link href='lib/fullcalendar.print.css' rel='stylesheet' media='print' />
  <script type="text/javascript" src='lib/moment.min.js'></script>
  <script type="text/javascript" src='lib/jquery.min.js'></script>
  <script type="text/javascript" src='lib/fullcalendar.min.js'></script>

<style>
textarea:required:invalid, input:required:invalid {
  background-color: lightyellow;
}
#button1 {
    width:100px;
    float: right;
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
<h2>

<script Language="JavaScript">

hitme();

document.fgColor = textColor();
var myMessage= Greetings();
document.write(myMessage);
</script>
</h2>
  <?php
        // if user has already logged in
        // skip connecting database
        if(!$_SESSION['row']){

        
        
    $conn = mysqli_connect("176.32.230.252","cl57-xuezheng","HnsXB/zKk","cl57-xuezheng");
    // Check connection
    if(!$conn) {
      die('Connection problem ! --> '.mysql_error());
    }

    $email = $_POST['email']; 
    $password = $_POST['password'];
    $tablename = 'users';
    $needrank = 'admin';

    $sql="SELECT * FROM $tablename WHERE email='$email'";
    $result=mysqli_query($conn, $sql);

    $count=mysqli_num_rows($result);
    // If result matched $email, table row must be 1 row
    if($count==1){
      $_SESSION['row'] = mysqli_fetch_assoc($result);
      if ($password == $_SESSION['row']['password']){
        $firstname = $_SESSION['row']['firstname'];
        $lastname = $_SESSION['row']['lastname'];
      }
      else {
        header("Location: index.html");
        exit();
      }
    }
    else{
      header("Location: index.html");
      exit();
    }

    $userID = $_SESSION['row']['id'];
    $tablenameII = 'Appt';
    $sqlII="SELECT * FROM $tablenameII WHERE user = '$userID'";
    $resultII=mysqli_query($conn, $sqlII);
    }
    else {
      $firstname = $_SESSION['row']['firstname'];
      $lastname = $_SESSION['row']['lastname'];
    }

    echo '<p class = "role">Logged in as: ';
    echo $_SESSION['row']['rank'];
          echo '&nbsp';
          echo '<input id="button1" type="button" onclick="logOut();" value="LOGOUT"/>';
    echo '</p>';
    echo '<br>';
    echo '<header class = "Disclaimer"><h1>Welcome<br>';
    echo $firstname;
    echo " ";
    echo $lastname;
    echo '</h1></header>';
  ?>
  




<aside class = "NavSiderbar">
    <nav>
        <?php
      if($_SESSION['row']['rank'] == "Admin"):
        echo '<h3 class = "subtitle">Admin Tools</h3>';
        echo '<ul>';
          echo '<li><a href= "assignUserForm.php">Add New User</a></li><br>';
          echo '<li><a href= "adminTools.php">Manage Appointments</a></li><br>';
        echo '</ul>';
      endif;
      if($_SESSION['row']['rank'] == "Manager"):
        echo '<h3 class = "subtitle">Manager Tools</h3>';
        echo '<ul>';
          echo '<li><a href= "assignUserForm.php">Add New User</a></li><br>';
          echo '<li><a href= "adminTools.php">Manage Appointments</a></li><br>';
        echo '</ul>';
      endif;
    ?> 
        <h2 class = "subtitle">Contents</h2>
        <ul>
          <li><a href= "welcome.php">Overall</a></li><br>
            <li><a href= "myprofile.php">My Profile</a></li><br>
            <li><a href= "searchroom.php">Book/Cancel a Room</a></li><br>
            <li><a href= "provideFeedback.php">Provide a Feedback</a></li><br>
            <li><a href= "feedbackHis.php">Feedback History</a></li><br>
            <li><a href= "apptHis.php">Appointment History</a></li><br>
        </ul>
    </nav>
</aside>

<main class="Content">
<h1>Assign User Form</h1>
<form id="assignUserForm" action="inputUser.php" method="POST" onsubmit="return validateForm()">
  <p><i>Please complete the form. Mandatory fields are marked with a </i><em>*</em></p>
  <fieldset>
    <legend>Primary Details</legend>
      <label for="name">First Name <em>*</em></label>
      <input id="firstname" name="firstname" placeholder="e.g. Jane" autofocus required><br>
      <label for="name">Last Name <em>*</em></label>
      <input id="lastname" name="lastname" placeholder="e.g. Smith" autofocus required><br>
      <label for="email">Email <em>*</em></label>
      <input id="email" name="email" type="email" placeholder="e.g. qwer@qwer.com" required><br>
      <label for="password">Password <em>*</em></label>
      <input id="password" name="password" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required><br>
      <label for="rank">Status</label>
      <?php
      	if($_SESSION['row']['rank'] == "Admin"):
      		echo '<select id="rank" name="rank">';
			echo '<option value="Manager">Manager</option>';
			echo '<option value="User">Standard User</option>';
			echo '</select>';
		elseif($_SESSION['row']['rank'] == "Manager"):
			echo '<input type = "hidden" name="rank" value="User">';
		endif;
		$user_id=$_SESSION['row']['id'];
		echo "<input type = 'hidden' name='user_id' value='";
		echo $user_id;
		echo "'>";			
	?>
	</fieldset>
	<fieldset>
    <legend>Personal Information</legend>

      <label for="birthDate">Birth Date</label>
      <input id="birthDate" name="birthDate" type="date" ><br>

      <label for="age">Age</label>
      <input id="age" name="age" type="number" min="1" max="120" step="1" ><br>
      <label for="gender">Gender</label>
      <select id="gender" name="gender">
	    <option value=""></option>
        <option value="Female">Female</option>
        <option value="Male">Male</option>
      </select><br>
      
  </fieldset>
  
  <p><input type="submit" value="Submit Application"></p>
</form>
</main>
</body>
</html>
