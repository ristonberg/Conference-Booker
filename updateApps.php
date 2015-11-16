<?php
//$appID = $_POST["appID"]
$appID = (int)$_GET['appID'];
echo $appID;
echo "<br>";
echo gettype($appID); 
$conn = mysqli_connect("176.32.230.252","cl57-xuezheng","HnsXB/zKk","cl57-xuezheng");

if (!$conn) 
    {
        die("Connection failed: " . mysqli_connect_error());
    }

$sql = "DELETE FROM 'Appt' WHERE appID = '$appID'";
$delete = mysqli_query($conn, $sql);
echo "<br>";
echo "Delete: " + $delete; 
if($delete)
{
	echo "Success!";
}
mysqli_close($conn);

//echo '<script>window.location = "http://localhost/Database/adminTools.php"</script>';
?>

