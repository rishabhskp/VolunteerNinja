<?php
//duplicate email

function validEmail() {
	global $err;
        $emailValue = explode(" ", $_POST['email']);
        foreach ($emailValue) {
	$check = mysql_fetch_array(mysql_query("SELECT email FROM messages WHERE email = '$emailValue'"));
	if($check['email']) {
		$err['email']="Email provided is not valid";
		return false;
	}
	return true;
}
?>