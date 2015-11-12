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
	        while($arr.length>0){
	        	var $appt = $arr.pop();
	        	$toSend += "<p>";
	        	$toSend += $appt["title"];
	        	$toSend += " Start time: ";
	        	$toSend += $appt["start"];
	        	$toSend += " End time: ";
	        	$toSend += $appt["end"];
	        	$toSend += " <p>Rating: ";
	        	$toSend += $appt["rating"];
	        	$toSend += " </p><p>Comments: ";
	        	$toSend += $appt["comments"];
	        	$toSend += "</p> ";
	        	$toSend += "</p>";

	        }
	    
	        $message.append($toSend);
		
	    }

	}
	xmlhttp.open("GET", url, true);
	xmlhttp.send();
	
	
});