<?php
require_once("php/connect.php");
session_start();
include_once("php/cookielogin.php");
if($_SESSION["loggedin"]=="yes")
	header("Location: index.php");
$err = array();
if(isset($_POST['register'])){
	global $err;
	include_once("php/formvalidation.php");
	signup();
	if(empty($err)) { //inserting in database
		$pass= md5($_POST[password]);
		$name= ucwords(strtolower($_POST['name']));
		if(isset($_POST['subscribe']))
			include("templates/subscribe.php");
		$query = "INSERT INTO users (name, email, mobile) VALUES ('$name', '$_POST[email]', '$_POST[mobile]')";
		if(mysql_query($query)) {
			$user_id = mysql_insert_id();
			mysql_query("INSERT INTO password (user_id, password, method) VALUES ('$user_id', '$pass', 'first')");
			mysql_query("INSERT INTO address (user_id) VALUES ('$user_id')");
			$_SESSION['loggedin']="yes";
			$_SESSION['user_id']=$user_id;
			$_SESSION['name']=$_POST['name'];
			$_SESSION['email']=$_POST['email'];
			$_SESSION['mobile']=$_POST['mobile'];
			$_SESSION['cookietime'] = time()+(60*24*60*60); //2 month time
			setcookie("_ui", $user_id['user_id'], $_SESSION['cookietime']);
			setcookie("_pedh", md5(sha1($pass.$_POST['email'])), $_SESSION['cookietime']);
			header("Location: index.php?action=profile");
		}
		else
					echo "Unable to register User at the moment. Please try again later.";
	}
}
if(!isset($_POST['register']) || !empty($err)) 
{
include("fbaccess.php");
if($user){
	$row = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE email='$user_info[email]'"));
	if($row['email']){
		include("php/loginsession.php");
		$fbid=$user_profile['id'];
		$pic = file_get_contents("https://graph.facebook.com/$fbid/picture?type=large");
		$path="images/dp/$_SESSION[email].jpg";
		file_put_contents($path, $pic);
		header("Location: index.php");
	}
	$_POST['name']=$user_info['name'];
 	$_POST['email']=$user_info['email'];
}
include_once("templates/include/header.php");
?>
<script type="text/javascript" src="js/formvalidation.js"></script>
<form name="form" action="<?php echo $PHP_SELF; ?>" method="post" onsubmit="return jssignup()" style="width: 70%;">
<?php
include("html/registerform.php");
include("html/subscriptionform.php");
?>
<input type="submit" name="register" value="Register" />
</form>
<?php
}
include "templates/include/footer.php";
?>