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
	<li><a href= "searchroom.php">Book/Cancel a Room</a></li><br>
	<li><a href= "provideFeedback.php">Provide a Feedback</a></li><br>
	<li><a href= "index.html">Feedback History</a></li><br>
	<li><a href= "index.html">Appointment History</a></li><br>

</ul>
<h3 class = "subtitle">Something More moremore Else</h2>
<ul>
<li><a href= "">dsusafas</a></li><br>
<li><a href= "index.html">afhjkbs</a></li><br>
</ul>
</nav>
</aside>
<main class="Content">


<form id="feedback" action="submitFeedback.php" onsubmit="return validateForm()">

<h3>Provide New Feedback </h3>
<input type="hidden" id="userid" name="userid" value="<?=$_SESSION['row']['id'];?>"/>
	Building : 
		<select id="building "name="building" onChange="getBuild('findbuild.php?building='+this.value)">
			<option value="">Select Building</option>
			<?php
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
			?>
		</select>
		<br />
		<div id="builddiv">
		Room : 
			<select name="select">
				<option>Select Room</option>
			</select>
		</div>
<label for="overall">Rate your overall experience: </label>
<select id="overall" name="overall" required>
<option value="0">0</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
</select>
<br><br>

<label for="comments">Please write some comments: </label><br>
<textarea id="comments" oninput="validateComments(this)" required placeholder = "Please enter at least 50 chars"></textarea>


</select><br>

<p><input type="submit" value="Submit your feedback"></p>




<footer class="Disclaimer">
<p >These information do not reflect the views of our site.</p>

<p>
<a href="AboutUs.html">About Us</a>
<a href="Disclaimer.html">Disclaimer</a>
<a href="ContactUs.html">Contact Us</a>
</p>

<p>Copyright © 2015</p>
</footer>

</form>

</main>
</body>
</html>
