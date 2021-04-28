<?php
$_SESSION['loggedin']="yes";
$_SESSION['user_id']=$row['user_id'];
$_SESSION['name']=$row['name'];
$_SESSION['email']=$row['email'];
$_SESSION['mobile']=$row['mobile'];
$_SESSION['cookietime'] = time()+(60*24*60*60); //2 month time
$orgs = mysql_query("SELECT organisation_id, name FROM organisations WHERE organisation_id IN (SELECT organisation_id FROM user_organisation WHERE user_id='$row[user_id]')");
$_SESSION['organisation'] = array();
while ($org = mysql_fetch_array($orgs)){
	$_SESSION['organisation']["$org[organisation_id]"]=$org['name'];
	$_SESSION['orguser']="yes";
	}
setcookie("_ui", $row['user_id'], $_SESSION['cookietime']);
setcookie("_pedh", md5(sha1($realhash.$row['email'])), $_SESSION['cookietime']);
mysql_query("UPDATE users SET loggedin = loggedin+1, lastlogin = now() WHERE user_id = '$row[user_id]'");
?>