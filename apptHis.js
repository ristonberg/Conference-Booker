// request for appointments, from appHis.php to json.php, and jsonII.php

$(document).ready(function() {
	var xmlhttp = new XMLHttpRequest();
	var url = "http://176.32.230.252/xuezheng.com/json/jsonII.php";
	var $arr;
	xmlhttp.onreadystatechange=function() {
	    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
	    	var $message = jQuery('.result');
	        $arr = JSON.parse(xmlhttp.responseText);
	        $count = $arr.length;
	        $toSend = '<h4>You have ';
	        $toSend += $count;
	        $toSend += ' appointment in the past.</h4>';
	        while($arr.length>0){
	        	var $appt = $arr.pop();
	        	$toSend += "<p>";
	        	$toSend += $appt["title"];
	        	$toSend += " Start time: ";
	        	$toSend += $appt["start"];
	        	$toSend += " End time: ";
	        	$toSend += $appt["end"];
	        	$toSend += " ";
	        	$toSend += "</p>";

	        }
	    
	        $message.append($toSend);
		
	    }

	}
	xmlhttp.open("GET", url, true);
	xmlhttp.send();



	var xmlhttpII = new XMLHttpRequest();
	var urlII = "http://176.32.230.252/xuezheng.com/json/json.php";
	var $arrII;
	xmlhttpII.onreadystatechange=function() {
	    if (xmlhttpII.readyState == 4 && xmlhttpII.status == 200) {
	    	var $messageII = jQuery('.resultII');
	        $arrII = JSON.parse(xmlhttpII.responseText);
	        $countII = $arrII.length;
	        $toSendII = '<h4>You have ';
	        $toSendII += $countII;
	        $toSendII += ' appointment in the future.</h4>';
	        while($arrII.length>0){
	        	var $apptII = $arrII.pop();
	        	$toSendII += "<p>";
	        	$toSendII += $apptII["title"];
	        	$toSendII += " Start time: ";
	        	$toSendII += $apptII["start"];
	        	$toSendII += " End time: ";
	        	$toSendII += $apptII["end"];
	        	$toSendII += " ";
	        	$toSendII += "</p>";

	        }
	       
	        $messageII.append($toSendII);
		
	    }

	}
	xmlhttpII.open("GET", urlII, true);
	xmlhttpII.send();

	

	
});