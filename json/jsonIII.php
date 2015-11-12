<?php
// JSON for feedback history
// returns all feedback of a user, {room: , time: ,rating: , comments: }
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

session_start();
$id = $_SESSION['row']['id'];

$conn = new mysqli("176.32.230.252","cl57-xuezheng","HnsXB/zKk","cl57-xuezheng");

$result = $conn->query("SELECT  roomid, rating, comments, date, starttime, endtime 
	FROM `cl57-xuezheng`.Appt LEFT JOIN `cl57-xuezheng`.Feedback USING(appid) 
	where user = $id and not rating is null");

$outp = "[";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    $timestamp = $rs["date"] ."T"  .$rs["endtime"];
	$date = new DateTime($timestamp);
	
	$dateII = new DateTime();
	
	if (($date->format("U") < $dateII->format("U"))){
		if ($outp != "[") {$outp .= ",";}
    	$outp .= '{"title":"' ."Room"  . $rs["roomid"] . '",';
    	$outp .= '"rating":"'  . $rs["rating"] . '",';
    	$outp .= '"comments":"'  . $rs["comments"] . '",';
    	$outp .= '"start":"'   . $rs["date"] ."T"  .$rs["starttime"]      . '",';
    	$outp .= '"end":"'   . $rs["date"] ."T"  .$rs["endtime"]      . '"}';
	}

    
}
$outp .="]";

$conn->close();

echo($outp);
?>