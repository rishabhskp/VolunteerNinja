<?php
require_once("php/connect.php");
session_start();
include_once("php/cookielogin.php");
if(isset($_POST['unsubscribe'])){
	include("php/formvalidation.php");
	if(email())
		if(mysql_query("UPDATE mailinglist SET active=0 WHERE email='$_POST[email]'"))
			echo "Unsubscribed Successfully";
		else
			$err['email']="Unsubscription Failed. Try again later.";
	else
		$err['email']="Email Invalid";
}
//if(!isset($_POST['unsubscribe']) || !empty($err)) 
{
include_once("templates/include/header.php");
?>
<script type="text/javascript" src="http://borebandar.com/others/volunteer/js/formvalidation.js">
</script>
<form name="form" action="<?php echo $PHP_SELF; ?>" method="post" onsubmit="return jsemail()" style="width: 70%;">
    <ul>
          <li>
          	<label id="label-email" for="email" title="Enter Email to Unsubscribe" >Email:</label>
		<input id="email" type="email" name="email" title="Enter Email to Unubscribe" placeholder="Email Address" value="<?php echo $_POST['email']?>" onchange="jsemail()" required/>
		<span class="error" id="err-email"><?php echo $err['email']; ?></span>
          </li>
    </ul>
    <input type="submit" name="unsubscribe" value="Unsubscribe" />
</form>
<?php
include "templates/include/footer.php";
}
?>