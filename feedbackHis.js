// request for feedback history, from feedbackHis.php to jsonIII.php

$(document).ready(function() {
	var xmlhttp = new XMLHttpRequest();
	var url = "http://176.32.230.252/xuezheng.com/json/jsonIII.php";
	var $arr;
	xmlhttp.onreadystatechange=function() {
	    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
	    	var $message = jQuery('.result');
	        $arr = JSON.parse(xmlhttp.responseText);
	        $count = $arr.length;
	        $toSend = '<h4>You have provided ';
	        $toSend += $count;
	        $toSend += ' feedback.</h4>';
	        $toSend += "<hr> ";
	        while($arr.length>0){
	        	var $appt = $arr.pop();
	        	$toSend += "<p>";
	        	$toSend += "Feedback ID: ";
	        	$toSend += $appt["ID"];
	        	$toSend += "</p><p>";
	        	// $toSend += "Reservation ID: ";
	        	// $toSend += $appt["appID"];
	        	// $toSend += "</p><p>";
	        	$toSend += $appt["title"];
	        	$toSend += "</p><p>";
	        	// $toSend += " Date: ";
	        	// $toSend += $appt["date"];
	        	// $toSend += " </p><p>Time: ";
	        	// $toSend += $appt["start"];
	        	// $toSend += " --- ";
	        	// $toSend += $appt["end"];
	        	$toSend += "</p>";
	        	$toSend += " <p>Rating: ";
	        	$toSend += $appt["rating"];
	        	$toSend += " </p><p>Comments: ";
	        	$toSend += $appt["comments"];
	        	$toSend += "</p> ";
	        	$toSend += "<hr> ";
	        	

	        }
	    
	        $message.append($toSend);
		
	    }

	}
	xmlhttp.open("GET", url, true);
	xmlhttp.send();
	
	
});
