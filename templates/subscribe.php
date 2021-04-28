<?php
require_once("php/connect.php");
session_start();
include_once("php/cookielogin.php");
if(isset($_POST['subscribe'])){
	include_once("php/formvalidation.php");
	if(email()){
		if(mysql_query("INSERT INTO mailinglist (email) VALUES ('$_POST[email]')"))
			$msg="Subcription Successful";
	}
	else
		$err['email']="Invalid Email";
}
if(!isset($_POST['subscribe']) || !empty($err)) 
{
include_once("templates/include/header.php");
?>
<script type="text/javascript" src="http://borebandar.com/others/volunteer/js/formvalidation.js">
</script>
<form name="form" action="<?php echo $PHP_SELF; ?>" method="post" onsubmit="return jsemail()" style="width: 70%;">
    <ul>
          <li>
          	<label id="label-email" for="email" title="Enter Email to Subscribe" >Email:</label>
		<input id="email" type="email" name="email" title="Enter Email to Subscribe" placeholder="Email Address" value="<?php echo $_POST['email']?>" onchange="jsemail()" required/>
		<span class="error" id="err-email"><?php echo $err['email']; ?></span>
          </li>
    </ul>
    <input type="submit" name="subscribe" value="Subscribe" />
</form>
<?php
include "templates/include/footer.php";
}
?>