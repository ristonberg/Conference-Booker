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
date_default_timezone_set('America/Chicago');
$first = "";
$last = ""; 
$appID = $_GET['appID'];
$roomID = $_GET['roomID'];
$user = $_GET['user'];
$date = $_GET['date'];
$starttime = $_GET['startime'];
$endtime = $_GET['endtime'];
$conn = mysqli_connect("176.32.230.252","cl57-xuezheng","HnsXB/zKk","cl57-xuezheng");
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
$sql = "SELECT firstname, lastname FROM users WHERE id = $user";
$result=mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
    $first = $row['firstname'];
    $last = $row['lastname'];   
}
$name = $first." ".$last; 

echo "<form action='pushEdits.php' method='post' align = 'center'>";
echo "<br/><br/><br/>";
echo "<label for='$appID'>Appointment No. </label> &nbsp";
echo "<br/><br/>";
echo "<input value = '$appID' name = 'appID' readonly>";
echo "<br/><br/><br/>";
echo "<label for='$roomID'>Room No. </label> &nbsp";
echo "<br/><br/>";
echo "<input value = '$roomID' name = 'roomID' readonly>";
echo "<br/><br/><br/>";
echo "<label>User </label> &nbsp";
echo "<br/><br/>";
echo "<input value = '$name' readonly>";
echo "<br/><br/><br/>";
echo "<label for='$date'>Date </label> &nbsp";
echo "<br/><br/>";
echo "<input type='date' name='date' value = '$date'>";
echo "<br/><br/><br/>";
echo "<label for='$starttime'> Start Time </label> &nbsp";
echo "<br/><br/>";
echo "<input type='time' name = 'starttime' value = '$starttime'/>";
echo "<br/><br/><br/>";
echo "<label for='duration'>Duration of Meeting(minutes)</label>
    <br/><br/>
    <select id='duration' name='duration'>
    <option value='1'>30</option>
    <option value='2'>60</option>
    <option value='3'>90</option>
    <option value='4'>120</option>
    </select><br/><br/>";
echo "<input value = '$user' name = 'user' type='hidden' readonly>";
echo "<input type='submit' value='Update Appointment'>";
echo "</form>";
?>
