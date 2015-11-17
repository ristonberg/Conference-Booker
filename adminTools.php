<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">

<title>Conference Room Booker</title>

<body>
<script type="text/javascript" src="logOut.js"></script>
<script type="text/javascript" src="background.js"></script>

<link rel="stylesheet" href="welcome.css">

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
    session_start();
    echo '<p class = "role">Successful logged in as: ';
    echo $_SESSION['row']['rank'];
    echo '&nbsp';
    echo '<input id="button1" type="button" onclick="logOut();" value="LOGOUT"/>';
    echo '</p><br>';
    echo '<header class = "Disclaimer"><h1>Welcome</h1>';
    echo $_SESSION['row']['firstname'];
    echo " ";
    echo $_SESSION['row']['lastname'];
    echo '</header>';
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
			else:
				echo '<p>HI</p>';
			endif;
			if($_SESSION['row']['rank'] == "Manager");
				echo '<h3 class = "subtitle">Manager Tools</h3>';
				echo '<ul>';
					echo '<li><a href= "assignUserForm.php">Add New User</a></li><br>';
					echo '<li><a href= "adminTools.php">Manage Appointments</a></li><br>';
					echo '</ul>';
		?>
<h2 class = "subtitle">Contents</h2>
<ul>
<li><a href= "welcome.php">Overall</a></li><br>
<li><a href= "myprofile.php">My Profile</a></li><br>
<li><a href= "searchoom.php">Book/Cancel a Room</a></li><br>
<li><a href= "provideFeedback.php">Provide a Feedback</a></li><br>
<li><a href= "feedbackHis.php">Feedback History</a></li><br>
<li><a href= "apptHis.php">Appointment History</a></li><br>
</ul>
</nav>
</aside>
<main class="Content">


<?php
    $conn = mysqli_connect("176.32.230.252","cl57-xuezheng","HnsXB/zKk","cl57-xuezheng");

    if (!$conn) 
    {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM Appt";

    $result = mysqli_query($conn, $sql);

    if($result)
    {
        while($row = mysqli_fetch_row($result))
        {
            echo '<tr>';
            foreach($row as $field) 
            {
                echo '<td>' . htmlspecialchars($field) . '</td>';
            }
            echo '</tr>';
        }
    }
        
?>
