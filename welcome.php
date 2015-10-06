<!DOCTYPE html>
<html lang="en">
<head>
        
<meta charset="utf-8">
            
<title>Conference Room Booker</title>
	
<body style="background-color:#b0c4de">

<link rel="stylesheet" href="welcome.css">

</head>

<body>

	<?php
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
		
		echo '<p class = "role">Logged in as: ';
		echo $_SESSION['row']['rank'];
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
        <h2 class = "subtitle">Contents</h2>
        <ul>
            <li><a href= "index.html">My Profile</a></li><br>
            <li><a href= "index.html">Book/Cancel a Room</a></li><br>
            <li><a href= "index.html">Provide a Feedback</a></li><br>
            <li><a href= "index.html">Feedback History</a></li><br>
            <li><a href= "index.html">Appointment History</a></li><br>
            <li><a href= "index.html">Something Else</a></li><br>
            
        </ul>
		<?php
			if($_SESSION['row']['rank'] == "Admin"):
				echo '<h3 class = "subtitle">ADMIN</h3>';
				echo '<ul>';
					echo '<li><a href= "AssignUserForm.html">Add New User</a></li><br>';
					echo '<li><a href= "index.html">fdh</a></li><br>';
				echo '</ul>';
			else:
				echo '<p>HI</p>';
			endif;
		?>
            </nav>
</aside>

<main class="Content">
    <h2>Account Overall</h2>
    <!--Check if he has Appoinment-->
    <p> You don't have any appointment now</p>
    
    
    <iframe src="https://www.google.com/calendar/embed?src=xuezhma%40gmail.com&ctz=America/Chicago" style="border: 0" width="800" height="600" frameborder="0" scrolling="no"></iframe>
    
    
    
    <footer class="Disclaimer">
        <p >These information do not reflect the views of our site.</p>
       
        <p>
        <a href="AboutUs.html">About Us</a>
         <a href="Disclaimer.html">Disclaimer</a>
         <a href="ContactUs.html">Contact Us</a>
         </p>
        
        <p>Copyright © 2015</p>
    </footer>
    
</main>
</body>
</html>
