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
                    echo '<li><a href= "managerList.php">Manage Appointments</a></li><br>';
                echo '</ul>';
            else:
                echo '<p>HI</p>';
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
<li><a href= "searchroom.php">Book a Room</a></li><br>
<li><a href= "feedbackHis.php">Feedback History</a></li><br>
<li><a href= "apptHis.php">Appointment History</a></li><br>

</ul>
</nav>
</aside>



<?php
    $conn = mysqli_connect("176.32.230.252","cl57-xuezheng","HnsXB/zKk","cl57-xuezheng");
    $user = $_SESSION['row']['id'];
    $userID = $_GET['userID'];
    $today = date('Y/m/d');

    if (!$conn) 
    {
        die("Connection failed: " . mysqli_connect_error());
    }

    if($_SESSION['row']['rank'] == "Admin")
    {
        $sql = "SELECT * FROM Appt a INNER JOIN users u ON a.user = u.id WHERE u.owner = '$userID' AND a.date >= '$today'"; 
        $sql2 = "SELECT * FROM Appt a WHERE user = '$userID' AND a.date >= '$today'";
    }
    else if ($_SESSION['row']['rank'] == "Manager") 
    {
        $sql = "SELECT * FROM Appt a INNER JOIN users u ON a.user = u.id WHERE u.owner = '$user' AND a.date >= '$today'";
    }
    else 
        $sql = "SELECT * FROM Appt a WHERE a.user = '$user' AND a.date >= '$today'";

    $result = mysqli_query($conn, $sql);
    $result2 = "";
    if($_SESSION['row']['rank'] == "Admin")
    {
        $result2 = mysqli_query($conn, $sql2);
    }
    if($result2)
    {
        echo "Manager's Appointments";
        echo "<form id ='appTable' action = 'updateApps.php' method='post'>";
        echo "<table BORDER = '2'>";
        echo "<th width='130'>Appointment #</th>";
        echo "<th width='130'>Room</th>";
        echo "<th width='130'>User</th>";
        echo "<th width='130'>Date</th>";
        echo "<th width='130'>Start Time</th>";
        echo "<th width='130'>End Time</th>";
        while($row = mysqli_fetch_array($result2))
        {
            $appID = $row['appID'];
            $roomID= $row['roomID'];
            $user = $row['user'];
            $date = $row['date'];
            $starttime = $row['starttime'];
            $endtime = $row['endtime']; 
            echo "<tr><td id='appID'>".$appID."</td><td>".$roomID."</td><td>".$user.
            "</td><td input type='date'>".$date."</td><td>".$starttime.
            "</td><td>".$endtime."</td><td><button type='button' class='btn' onClick='editRow(this)''>Edit</button></td>
            <td><button type='button' class='btn' onClick='deleteRow(this)''>Delete</button></td></tr>";   
        }
        echo "</table>";
        echo "</form>";  
        echo "<br>";
        echo "Managed User's Appointments";
    }

    if($result)
    {
 
        echo "<form id ='appTable2' action = 'updateApps.php' method='post'>";
        echo "<table BORDER = '2'>";
        echo "<th width='130'>Appointment #</th>";
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
            echo "<tr><td id='appID'>".$appID."</td><td>".$roomID."</td><td>".$user.
            "</td><td input type='date'>".$date."</td><td>".$starttime.
            "</td><td>".$endtime."</td><td><button type='button' class='btn' onClick='editRow(this)''>Edit</button></td>
            <td><button type='button' class='btn' onClick='deleteRow(this)''>Delete</button></td></tr>";   
        }
        echo "</table>";
        echo "</form>";
    }

    mysqli_close($conn);

?>

<script>

function deleteRow(btn) {
  var row = btn.parentNode.parentNode;
  if(confirm('Are you sure you want to delete the appointment on ' + row.cells[3].innerHTML + 
             ' starting at ' + row.cells[4].innerHTML + '? You will need to confirm via email, check your inbox.'))
    {
        row.parentNode.removeChild(row);
        window.location.href = "confirmationEmails.php?appID=" + row.cells[0].innerHTML + "&userID="
        +row.cells[2].innerHTML;
    }
}
function editRow(btn)
{
    var row = btn.parentNode.parentNode;
    window.location.href = "editApps.php?appID=" + row.cells[0].innerHTML + "&roomID=" 
    + row.cells[1].innerHTML + "&user=" + row.cells[2].innerHTML + "&date=" + row.cells[3].innerHTML
    + "&startime=" + row.cells[4].innerHTML + "&endtime=" + row.cells[5].innerHTML; 
}
</script>
