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
<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<script type="text/javascript" src="validateForm.js"></script>
<script type="text/javascript" src="background.js"></script>

<title>Provide Room Feedback</title>

<style>
    #comments{
        width: 400px;
        height: 152.8px;
    }
    
textarea:required:invalid, input:required:invalid {
    background-color: lightyellow;
    
    
}
</style>
<script type="text/javascript" src="logOut.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
<link rel="stylesheet" href="stars.css">
<link rel="stylesheet" href="welcome.css">

</head>

<body>

	<script>
		function getXMLHTTP() { //fuction to return the xml http object
			var xmlhttp=false;	
			try{
				xmlhttp=new XMLHttpRequest();
			}
			catch(e)	{		
				try{			
					xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
				}
				catch(e){
					try{
					xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
					}
					catch(e1){
						xmlhttp=false;
					}
				}
			}
				
			return xmlhttp;
		}
	
		function getBuild(strURL) {         
			var req = getXMLHTTP(); // fuction to get xmlhttp object
			if (req) {
				req.onreadystatechange = function() {
					if (req.readyState == 4) { //data is retrieved from server
						if (req.status == 200) { // which reprents ok status                    
							document.getElementById('builddiv').innerHTML=req.responseText;
						}
						else
						{ 
							alert("There was a problem while using XMLHTTP:\n");
						}
					}            
				}        
				req.open("GET", strURL, true); //open url using get method
				req.send(null);
			}
		}
	
	</script>
	
<h2>
<script Language="JavaScript">
hitme();
document.fgColor = textColor();
var myMessage= Greetings();
document.write(myMessage);
</script>
</h2>


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
	<li><a href= "welcome.php">Home</a></li><br>
	<li><a href= "myprofile.php">My Profile</a></li><br>
	<li><a href= "searchroom.php">Book a Room</a></li><br>
	<li><a href= "adminTools.php">Manage Appointments</a></li><br>
	<li><a href= "feedbackHis.php">Feedback History</a></li><br>
	<li><a href= "apptHis.php">Appointment History</a></li><br>
</ul>
</nav>
</aside>
<main class="Content">

<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
<form id="feedback" method="POST" action="submitFeedback.php" onsubmit="return validateForm()">

<?php
	if ($_POST) {
		$appID = $_POST['appID'];
		$conn = mysqli_connect("176.32.230.252","cl57-xuezheng","HnsXB/zKk","cl57-xuezheng");
		
		$sql = "SELECT building, roomID FROM Appt WHERE appID = '$appID'";
		$row = mysqli_fetch_array(mysqli_query($conn, $sql));
		$BuildCode = $row['building'];
		$roomID = $row['roomID'];
	}
?>

<h3>Provide New Feedback </h3>
<input type="hidden" id="userid" name="userid" value="<?=$_SESSION['row']['id'];?>"/>
	Building : 
		<select id="building" name="building" onChange="getBuild('findbuild.php?building='+this.value)">
			<?php
				if (!$_POST){
					echo "<option value='building'>Select Building</option>";
					$conn = mysqli_connect("176.32.230.252","cl57-xuezheng","HnsXB/zKk","cl57-xuezheng");
					$sql = "SELECT BuildCode, BuildName FROM Building";
					$query=mysqli_query($conn, $sql);
					while ($row=mysqli_fetch_array($query)){
						$BuildCode = $row['BuildCode'];
						$BuildName = $row['BuildName'];
						echo "<option value='";
						echo $BuildCode;
						echo "'>";
						echo $BuildName;
						echo "</option>";
					}
				}
				else{
					$conn = mysqli_connect("176.32.230.252","cl57-xuezheng","HnsXB/zKk","cl57-xuezheng");
					$sql = "SELECT BuildName FROM Building WHERE BuildCode = '$BuildCode'";
					$row = mysqli_fetch_array(mysqli_query($conn, $sql));
					$BuildName = $row['BuildName'];
					echo "<option value='";
					echo $BuildCode;
					echo "'>";
					echo $BuildName;
					echo "</option>";
					echo "<input type='hidden' id='appID' name='appID' value='";
					echo $appID;
					echo "' />";
				}
			?>
		</select>
		<br />
		<div id="builddiv">
		Room : 
			<select name="roomid">
			<?php
				if (!$_POST) {
					echo "<option>Select Room</option>";
					echo "</select>";
				}
				else{
					echo "<option value='";
					echo $roomID;
					echo "'>";
					echo $roomID;
					echo "</option>";
					echo "</select>";
				}
			?>
		</div>
<label for="overall">Rate your overall experience: </label>

<div class="stars">
    <input class="star star-5" id="star-5" type="radio" name="overall" value="5"/>
    <label class="star star-5" for="star-5"></label>
    <input class="star star-4" id="star-4" type="radio" name="overall" value="4"/>
    <label class="star star-4" for="star-4"></label>
    <input class="star star-3" id="star-3" type="radio" name="overall" value="3"/>
    <label class="star star-3" for="star-3"></label>
    <input class="star star-2" id="star-2" type="radio" name="overall" value="2"/>
    <label class="star star-2" for="star-2"></label>
    <input class="star star-1" id="star-1" type="radio" name="overall" value="1"/>
    <label class="star star-1" for="star-1"></label>
</div>
<br><br>

<label for="comments">Please write some comments: </label><br>
<textarea id="comments" name="comments" oninput="" required placeholder = "Please enter at less than 150 chars"></textarea>

<p><input type="submit" value="Submit your feedback"></p>

</form>




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
