<?php
require_once("php/connect.php");
session_start();
include("php/cookielogin.php");
if($_SESSION["loggedin"]!="yes")
	header("Location: /?action=login");
include("templates/include/header_new.php");
if(isset($_POST['change'])){
      if($_POST['password']  != $_POST['oldpassword'] || $_POST['password'] > 5) {
	if($_POST['password'] == $_POST['repassword']) {
		$lastpass = mysql_fetch_array(mysql_query("SELECT password FROM password WHERE id in (SELECT MAX(id) FROM password WHERE user_id = $_SESSION[user_id])"));
		$pass = md5($_POST[password]);
		if($lastpass[password] == md5($_POST[oldpassword])){
			if(mysql_query("INSERT INTO password (user_id, password) VALUES ('$_SESSION[user_id]', '$pass')")){
				$succ = "Password changed successfully!!! You can now login with your new password.";

function redirect($url) {
                        //If headers are sent... do javascript redirect... if javascript disabled, do html redirect.
                        echo '<script type="text/javascript">';
                        echo 'window.location.href="'.$url.'";';
                        echo '</script>';
                        echo '<noscript>';
                        echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
                        echo '</noscript>';
                        exit;
               }
                                $url = "/";
                                redirect($url);
			}
			else 
				$retype_err = "Failed to reset your password. Try again after some time.";
		}
		else
			$old_err = "Incorrect Password";
	}
	else
		$retype_err = "Passwords Don't match!!!";
}

else
     $same_err = "Either Password too short or New Password is same as Old!!!";
}
if(!isset($succ)) {
?>
<script src="js/formvalidation.js"></script>
<body class="has-js">
<div id="flashMessage" class="alert fade in" style="display: none;">
    <a class="close" href="#" data-dismiss="alert">

        ×

    </a>

</div>
 <section class="extraMarTop">
    <div class="container">
        <div class="row row-inner">
            <div class="span8">
                <div class="heading-row-bottom">Change Password</div>
            </div>
        </div>
<form name="form"  action="<?php echo $PHP_SELF; ?>" enctype="multipart/form-data" method="post" onsubmit="return jschangepassword();">

       <div class="control-group">
            <label for="oldpassword">Old Password</label>
	<input id="oldpassword" type="password" name="oldpassword" title="Enter Old Password" value="<?php echo $_POST['oldpassword']?>" onchange="jspassword()" maxlength="20" pattern="^.{5,20}$" required />
<span class="error"  id="err-oldpassword" style="color:#F26322"><?php echo $old_err; ?></span>
</div>
<div class="control-group">
            <label for="password">New Password</label>
	<input id="password" type="password" name="password" title="Enter new Password" value="<?php echo $_POST['password']?>" onchange="jspassword()" maxlength="20" pattern="^.{5,20}$" required />
        <span class="error" id="err-repassword" style="color:#F26322"><?php echo $same_err; ?></span>
</div>
<div class="control-group">
            <label for="repassword">Retype Password</label>
	<input id="repassword" type="password" name="repassword" title="Retype Password" value="<?php echo $_POST['repassword']?>" onchange="jsrepassword()" maxlength="20" pattern="^.{5,20}$" required />
	<span class="error" id="err-password" style="color:#F26322"><?php echo $retype_err; ?></span>
</div>
<div class="control-group">
<div class="submit">
<input class="btn sub-btn" type="submit" name="change" value="Change"/>

</form>
</body>
<?php
}
?>