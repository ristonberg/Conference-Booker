<?php
// returns only upcoming appointment
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli("176.32.230.252","cl57-xuezheng","HnsXB/zKk","cl57-xuezheng");

$result = $conn->query("SELECT roomID, user, date, starttime, endtime FROM Appt");

$outp = "[";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    $timestamp = $rs["date"] ."T"  .$rs["endtime"];
	$date = new DateTime($timestamp);
	//echo($timestamp);
	$dateII = new DateTime();
	
	// echo $date->format("U");
	// echo "<br/>";
	// echo $dateII->format("U");
	// echo "RESULT: ";
	// echo $date->format("U") < $dateII->format("U");
	
	if (!($date->format("U") < $dateII->format("U"))){
		if ($outp != "[") {$outp .= ",";}
    	$outp .= '{"title":"' ."Room"  . $rs["roomID"] . '",';
    	$outp .= '"start":"'   . $rs["date"] ."T"  .$rs["starttime"]      . '",';
    	$outp .= '"end":"'   . $rs["date"] ."T"  .$rs["endtime"]      . '"}';
	}

    
}
$outp .="]";

$conn->close();

echo($outp);
?>