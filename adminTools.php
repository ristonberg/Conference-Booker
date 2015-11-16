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
<h2 class = "subtitle">Contents</h2>
<ul>
<li><a href= "welcome.php">Overall</a></li><br>
<li><a href= "myprofile.php">My Profile</a></li><br>
<li><a href= "searchoom.php">Book/Cancel a Room</a></li><br>
<li><a href= "provideFeedback.php">Provide a Feedback</a></li><br>
<li><a href= "index.html">Feedback History</a></li><br>
<li><a href= "index.html">Appointment History</a></li><br>
<li><a href = "adminTools.php"> Admin Tools </a></li><br>
</ul>

<h3 class = "subtitle">Something More moremore Else</h2>
<ul>
<li><a href= "">dsusafas</a></li><br>
<li><a href= "index.html">afhjkbs</a></li><br>
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
 
        echo "<form id ='appTable' action = 'updateApps.php' method='post'>";
        echo "<table BORDER = '2'>";
        echo "<th width='130'>Appointment</th>";
        echo "<th width='130'>Room</th>";
        echo "<th width='130'>User</th>";
        echo "<th width='130'>Date</th>";
        echo "<th width='130'>Start Time</th>";
        echo "<th width='130'>End Time</th>";
        while($row = mysqli_fetch_array($result))
        {
            $appID = $row['appID'];
            $roomID= $row['roomID'];
            $user = $row['user'];
            $date = $row['date'];
            $starttime = $row['starttime'];
            $endtime = $row['endtime']; 
            echo "<tr><td id='appID'>".$appID."</td><td>".$roomID."</td><td contenteditable ='true'>".$user.
            "</td><td input type='date' contenteditable = 'true'>".$date."</td><td>".$starttime.
            "</td><td>".$endtime."</td><td><button type='button' class='btn' onClick='deleteRow(this)''>Delete</button></td></tr>";   
        }
        echo "</table>";
        echo "</form>";
    }

    mysqli_close($conn);
?>

<script>

function deleteRow(btn) {
  var row = btn.parentNode.parentNode;
  row.parentNode.removeChild(row);
  if(confirm('Are you sure you want to delete the appointment on ' + row.cells[3].innerHTML + 
             ' starting at ' + row.cells[4].innerHTML + '?'))
    {
        window.location.href = "updateApps.php?appID=" + row.cells[0].innerHTML;
    }
}

</script>
