<?php include "templates/include/header.php";
require_once("php/connect.php");
session_start();
include("php/cookielogin.php");
if($_SESSION["loggedin"]=="yes")
	header("Location: index.php");
$err = array();
$mode = 1;
if(isset($_POST['submit'])) {
	include("php/formvalidation.php");
	signup();
	if(empty($err)) { //updating database
		$pass= md5($_POST[password]);
		$query = "INSERT INTO organisation_request (name, email, password, mobile, website, sector) VALUES ('$_POST[name]', '$_POST[email]', '$pass', '$_POST[mobile]', '$_POST[website]', '$_POST[sector]')";
		if(mysql_query($query))
			echo "Thank you for interest in VolunteerNinja. We will contact you shortly."
		else
			echo "Unable to register your Organisation at the moment. Please try again later.";
	}
}
if(!isset($_POST['submit']) || !empty($err)) 
{
?>
<script src="js/formvalidation.js"></script>
<form name="registerform" action="<?php echo $PHP_SELF; ?>" method="post" onsubmit="return jssignup()" style="width: 70%;">
    <input type="hidden" name="registeruser" value="true" />
	<?php if ( isset( $results['errorMessage'] ) ) { ?>
        <div class="errorMessage"><?php echo $results['errorMessage'] ?></div>
	<?php } ?>

    <ul>
		<li>
			<span style="color:#e11" id="err-name"><?php echo $err['name']; ?></span>
			<input type="text" id="name" name="name" title="Enter your Full Name" placeholder="Full Name" value="<?php echo $_POST['name']?>" autofocus onchange="jsname()" style="text-transform:capitalize" pattern="^[A-Za-z][A-Za-z. ]+$" required/>
		</li>
          <li>
            <span style="color:#e11" id="err-email"><?php echo $err['email']; ?></span>
			<input id="email" type="text" name="email" title="Enter your email address" placeholder="Email Address" value="<?php echo $_POST['email']?>" onchange="jsemail()" pattern="^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z]+)*$" required/>
          </li>
          <li>
            <span style="color:#e11" id="err-password"><?php echo $err['password']; ?></span>
			<input id="password" type="password" name="password" title="Minimum 5 char long" placeholder="Password" value="<?php echo $_POST['password']?>" maxlength="20" onchange="jspassword()" pattern="^.{5,20}$" required />
          </li>
          <li>
            <span style="color:#e11" id="err-mobile"><?php echo $err['mobile']; ?></span>
			<input id="mobile" type="phone" name="mobile" maxlength="10" title="Enter your 10-digit mobile number" placeholder="Mobile Number" value="<?php echo $_POST['mobile']?>" onchange="jsmobile()" pattern="^[789]\d{9}$" required/>
          </li>
        </ul>

        <div class="buttons">
          <input type="submit" name="submit" value="submit" />
        </div>
      </form>
<?php
}
?>
<?php include "templates/include/footer.php" ?>
