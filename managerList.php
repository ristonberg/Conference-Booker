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
                    echo '<li><a href= "assignUserForm.html">Add New User</a></li><br>';
                    echo '<li><a href= "managerList.php">Manage Appointments</a></li><br>';
                echo '</ul>';
            else:
                echo '<p>HI</p>';
            endif;
            if($_SESSION['row']['rank'] == "Manager"):
                echo '<h3 class = "subtitle">Manager Tools</h3>';
                echo '<ul>';
                    echo '<li><a href= "assignUserForm.html">Add New User</a></li><br>';
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

<?php

$conn = mysqli_connect("176.32.230.252","cl57-xuezheng","HnsXB/zKk","cl57-xuezheng");
$user = $_SESSION['row']['id'];
$sql = "SELECT * FROM users WHERE owner = '$user' AND rank = 'Manager'"; 
$result = mysqli_query($conn, $sql);

echo "<table BORDER = 2>";
echo "<th width='130'>User ID</th>";
echo "<th width='130'>First Name</th>";
echo "<th width='130'>Last Name</th>";
echo "<th width='130'>Rank</th>";
echo "<th width ='130'></th>";
while($row = mysqli_fetch_array($result))
        {
            $id = $row['id'];
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $rank = $row['rank'];
            echo "<tr><td id='id'>".$id."</td><td>".$firstname."</td><td>".$lastname.
            "</td><td>".$rank."</td><td><button type='button' class='btn' onClick='popRow(this, id)''>Manage Appointments</button>";   
        }
echo "</table>";


?>
<script>
function popRow(btn, user)
{
    var row = btn.parentNode.parentNode;
    alert(user);
    window.location.href = "adminTools.php?userID=" + row.cells[0].innerHTML;
}
</script>
