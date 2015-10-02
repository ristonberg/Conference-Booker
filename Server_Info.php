<?php

    // About the server me and Riston talked about after meeting with Huyen
    // Check if this connects on you guys laptop:

    mysqli_connect("176.32.230.252","cl57-xuezheng","HnsXB/zKk","cl57-xuezheng");
    
    echo "<br>";
    
    if (mysqli_connect_error()) {
        echo "Not working!";
    }else{
        echo "Working!";
    }
?>
