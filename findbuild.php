<?php 
	$building = $_GET['building'];
	$conn = mysqli_connect("176.32.230.252","cl57-xuezheng","HnsXB/zKk","cl57-xuezheng");
	if (!$conn) {
		die('Could not connect: ' . mysql_error());
	};
	$sql = "SELECT roomID FROM Conf_rooms WHERE Building = '$building'";
	$query = mysqli_query($conn, $sql);
?>
Room: 
<select name="roomid" id="name">
	<option>Select Room</option>
	<?php
		while ($row=mysqli_fetch_array($query)){
			echo "<option value='";
			echo $row['roomID'];
			echo "'>";
			echo $row['roomID'];
			echo "</option>";
		}
	?>
</select>
