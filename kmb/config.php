<?php
$host="localhost";
$user="root";
$password="";
$db="ac";

function connect_db()
{
global $host, $user, $password, $db;
 $link=mysql_pconnect($host, $user,$password);
 if(!$link)
 {
 die('Not connected :'.mysql_error());
 }
 $db_selected=mysql_select_db($db, $link);
 if(!$db_selected)
 {
 die('Could not connect :'.mysql_error());
 }
return $link;
}
?>
