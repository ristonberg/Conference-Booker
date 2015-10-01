<?php
if(!mysql_connect("localhost","root",""))
{
     die('Connection problem ! --> '.mysql_error());
}
if(!mysql_select_db("Conferences"))
{
     die('Database selection problem ! --> '.mysql_error());
}
?>