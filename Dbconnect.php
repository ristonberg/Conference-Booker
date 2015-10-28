<?php
if(!mysql_connect("176.32.230.252","cl57-xuezheng","HnsXB/zKk","cl57-xuezheng"))
{
     die('Connection problem ! --> '.mysql_error());
}
if(!mysql_select_db("Conferences"))
{
     die('Database selection problem ! --> '.mysql_error());
}
?>
