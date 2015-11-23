<?php
// JSON for appointment history
// returns only past appointments
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

session_start();
$id = $_SESSION['row']['id'];

$conn = new mysqli("176.32.230.252","cl57-xuezheng","HnsXB/zKk","cl57-xuezheng");

$result = $conn->query("SELECT appID, Building, roomID, date, starttime, endtime FROM Appt where user = '$id'");

$outp = "[";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    $timestamp = $rs["date"] ."T"  .$rs["endtime"];
	$date = new DateTime($timestamp);
	
	$dateII = new DateTime();
	
	if (($date->format("U") < $dateII->format("U"))){
		if ($outp != "[") {$outp .= ",";}
    		$outp .= '{"building":"' .$rs["Building"] .'",';
		$outp .= '"room":"'  . $rs["roomID"] . '",';
    		$outp .= '"appID":"'   . $rs["appID"]  . '",';
    		$outp .= '"date":"'   . $rs["date"]      . '",';
    		$outp .= '"start":"'  .$rs["starttime"]      . '",';
    		$outp .= '"end":"'    .$rs["endtime"]      . '"}';
	}

    
}
$outp .="]";

$conn->close();

echo($outp);
?>
