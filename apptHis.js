// request for appointments, from appHis.php to json.php, and jsonII.php

$(document).ready(function() {
	var xmlhttp = new XMLHttpRequest();
	var url = "http://176.32.230.252/xuezheng.com/json/jsonII.php";
	var $arr;
	xmlhttp.onreadystatechange=function() {
	    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
	    	var $message = jQuery('.result');
	    	$message.text("");
	        $arr = JSON.parse(xmlhttp.responseText);
	        $count = $arr.length;
	        $toSend = '<h4>You have ';
	        $toSend += $count;
	        $toSend += ' appointment in the past.</h4>';
	        $toSend += "<hr> ";
	        while($arr.length>0){
	        	var $appt = $arr.pop();
	        	$toSend += "<p>";
	        	$toSend += "Reservation ID: ";
	        	$toSend += $appt["appID"];
	        	$toSend += "</p><p> Room: ";
	        	$toSend += $appt["building"];
			$toSend += " ";
			$toSend += $appt["room"];
	        	$toSend += "</p><p>";
	        	$toSend += " Date: ";
	        	$toSend += $appt["date"];
	        	$toSend += " </p><p>Time: ";
	        	$toSend += $appt["start"];
	        	$toSend += " --- ";
	        	$toSend += $appt["end"];
	        	$toSend += "</p>";
			$toSend += "<form id='appfeedback' action='provideFeedback.php' method='POST'>";
			$toSend += "<input type='hidden' id='appID' name='appID' value='";
			$toSend += $appt["appID"];
			$toSend += "' /><input type='submit' value='Provide Feedback' /></form>";
	        	$toSend += "<hr> ";

	        }
	    
	        $message.append($toSend);
		
	    }

	}
	xmlhttp.open("GET", url, true);
	xmlhttp.send();



	var xmlhttpII = new XMLHttpRequest();
	var urlII = "http://176.32.230.252/xuezheng.com/json/jsonIV.php";
	var $arrII;
	xmlhttpII.onreadystatechange=function() {
	    if (xmlhttpII.readyState == 4 && xmlhttpII.status == 200) {
	    	var $messageII = jQuery('.resultII');
	    	$messageII.text("");
	        $arrII = JSON.parse(xmlhttpII.responseText);
	        $countII = $arrII.length;
	        $toSendII = '<h4>You have ';
	        $toSendII += $countII;
	        $toSendII += ' reservation in the future.</h4>';
	        $toSendII += "<hr> ";
	        while($arrII.length>0){
	        	var $apptII = $arrII.pop();
	        	$toSendII += "<p>";
	        	$toSendII += "Reservation ID: ";
	        	$toSendII += $apptII["appID"];
	        	$toSendII += "</p><p>";
	        	$toSendII += $apptII["title"];
	        	$toSendII += "</p><p>";
	        	$toSendII += " Date: ";
	        	$toSendII += $apptII["date"];
	        	$toSendII += " </p><p>Time: ";
	        	$toSendII += $apptII["start"];
	        	$toSendII += " --- ";
	        	$toSendII += $apptII["end"];
	        	$toSendII += "</p>";
	        	$toSendII += "<hr> ";

	        }
	       
	        $messageII.append($toSendII);
		
	    }

	}
	xmlhttpII.open("GET", urlII, true);
	xmlhttpII.send();

	

	
});
