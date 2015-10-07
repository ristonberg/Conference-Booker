<?php
    
    session_start();
    
    if(isset($_SESSION['row'])){
        unset($_SESSION['row']);
    }
    
    
    header("Location: index.html");
    
?>