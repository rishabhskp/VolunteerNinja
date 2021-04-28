<?php
require_once("connect.php");
session_start();
$query = "INSERT INTO event_user (event_id, user_id) VALUES ('$_POST[value]', '$_SESSION[user_id]')";
mysql_query($query);
echo "I am volunteering this";
?>

