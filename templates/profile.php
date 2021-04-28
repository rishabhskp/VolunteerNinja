<?php
require_once("php/connect.php");
session_start();
include_once("php/cookielogin.php");
if(!isset($_SESSION["loggedin"]))
	header("Location: /?action=login");
$err = array();
include("templates/include/header_new.php");
?>
</br>
<section class="extraMarTop" style="float:center;">
    <div class="container" style="padding-left:10px">
<?php
if(isset($_POST['updateprofile'])){
	global $err;
	include_once("php/formvalidation.php");
	profileupdate();
	if(empty($err)) { //updating database
                if(!$_POST[description])
                {
                     $desc = mysql_fetch_array(mysql_query("SELECT description, availability FROM users WHERE user_id='$_SESSION[user_id]'"));
	             $_POST['description']= $desc['description'];
                }
                if(!$_POST[address])
                {
                     $desc = mysql_fetch_array(mysql_query("SELECT address FROM address WHERE user_id='$_SESSION[user_id]'"));
	             $_POST['address']= $desc['address'];
                }
		mysql_query("UPDATE users SET description='$_POST[description]', mobile='$_POST[mobile]', availability='$_POST[availability]' WHERE user_id='$_SESSION[user_id]'");
		mysql_query("UPDATE address SET address='$_POST[address]', area='$_POST[area]', pincode= '$_POST[pincode]' WHERE user_id='$_SESSION[user_id]'");
		$_SESSION['mobile']=$_POST['mobile'];
		//uploading pic
		if($_FILES['dp']['tmp_name']!="" && getimagesize($_FILES['dp']['tmp_name'])) {
			$uploaddir = "images/dp/".$_SESSION['email'].".jpg";
			move_uploaded_file($_FILES['dp']['tmp_name'], $uploaddir);
                 ?>
<meta http-equiv="refresh" content="0">
<?php
		}
	}
}
// if(!isset($_POST['updateprofile']))
// { 
	$addinfo = mysql_fetch_array(mysql_query("SELECT description, availability FROM users WHERE user_id='$_SESSION[user_id]'"));
	$_SESSION['description']=$addinfo['description'];
	$_SESSION['availability']=$addinfo['availability'];
	$address = mysql_fetch_array(mysql_query("SELECT * FROM address WHERE user_id='$_SESSION[user_id]'"));
	$_SESSION['address'] = $address['address'];
	$_SESSION['area'] = $address['area'];
	$_SESSION['pincode']=$address['pincode'];
// } 
// if(!isset($_POST['updateprofile']) || !empty($err))
// {
?>
    <span style="float: left; margin: 5px 40px 5px 0px;font-family: Tahoma,Geneva,sans-serif;color: #2A2A2A;">
<?php
	  include_once "fbaccess.php";
	  if($_SESSION["loggedin"] && file_exists("images/dp/$_SESSION[email].jpg"))
          {
	  	echo "<img src=\"images/dp/$_SESSION[email].jpg\" width=\"155px\" height=\"155px\">";
          }
          else
          {
                echo "<img src=\"images/dp/default.gif\" width=\"155px\" height=\"155px\">"; 
          }
?>
</span>
<script type="text/javascript" src="js/formvalidation.js">
</script>


<div style="font-size: 26px;float: left; margin: 5px 40px 5px 0px;font-family: Tahoma,Geneva,sans-serif;color: #000000;">
</br>
		<?php echo $_SESSION['name']; ?>
</div>
</br>
<form name="form" action="<?php echo $PHP_SELF;?>" enctype="multipart/form-data" method="post" onsubmit="return jsprofile()" style="width: 70%;">
<div class="form-wrapper form-registration">
<div class="clearfix"> </div>
<div class="control-group">
        	<label id="label-description" for="description" title="About Me" >About Me:</label>
                <textarea id="description" name="description" rows="4" resizable placeholder="<?php echo isset($_POST['description'])? $_POST['description']:$_SESSION['description'] ?>" value="<?php echo isset($_POST['description'])? $_POST['description']:$_SESSION['description'] ?>"></textarea>
		<span class="error" id="err-description"><?php echo $err['description']; ?></span>
  </div>
<div class="clearfix></div>
 <div class="control-group">     
        	<label id="label-mobile" for="mobile" title="Mobile Number" >Mobile:</label>
		<input id="mobile" type="phone" name="mobile" maxlength="10" title="Enter your 10-digit mobile number" placeholder="Mobile Number" value="<?php echo isset($_POST['mobile'])? $_POST['mobile']:$_SESSION['mobile'] ?>" onchange="jsmobile()" pattern="^[789]\d{9}$" required/>
		<span class="error" id="err-mobile"><?php echo $err['mobile']; ?></span>
</div>
  <div class="control-group">       
        	<label id="label-availability" for="availability" title="Availability" >Availability(Hours per week):</label>
		<input id="availability" type="number" name="availability" title="Hours per week" placeholder="Hours per week" value="<?php echo isset($_POST['availability'])? $_POST['availability']:$_SESSION['availability'] ?>" onchange="jsavailability()" min="1" max="21" required/>
		<span class="error" id="err-availability"><?php echo $err['availability']; ?></span>
 </div>
<div class="clearfix></div>
<div class="clearfix></div>
 <div class="control-group">        
        	<label id="label-address" for="address" title="Full Address">Address:</label>
			<textarea id="address" name="address" rows="4" resizable placeholder="<?php echo isset($_POST['address'])? $_POST['address']:$_SESSION['address'] ?>" value="<?php echo isset($_POST['address'])? $_POST['address']:$_SESSION['address'] ?>"></textarea>
			<small>(Maximum 255 characters)</small>
			<span class="error" id="err-address"><?php echo $err['address']; ?></span>
 </div>
 <div class="control-group">        
        	<label id="label-area" for="area" title="Area" >Area:</label>
		<input type="text" name="area" id="Area" value="<?php echo isset($_POST['area'])? $_POST['area']:$_SESSION['area'] ?>" placeholder="e.g. Koramangala"></select>
		<span class="error" id="err-area"><?php echo $err['area']; ?></span>
</div>
 <div class="control-group"> 
       
        	<label id="label-city" for="city" title="City" >City:</label>
		<input id="city" type="text" name="city" title="City" placeholder="City" value="Bangalore" disabled/>
		<span class="error" id="err-city"><?php echo $err['city']; ?></span>
</div>
 <div class="control-group"> 
        
        	<label id="label-pincode" for="pincode" title="6 digit Pincode">Pincode:</label>
		<input id="pincode" type="text" name="pincode" title="6 digit Pincode" placeholder="e.g. 620015" value="<?php echo isset($_POST['pincode'])? $_POST['pincode']:$_SESSION['pincode'] ?>" onchange="jspincode()" maxlength="6" pattern="^\d{6}$" />
		<span class="error" id="err-pincode"><?php echo $err['pincode']; ?></span>
</div>
 <div class="control-group"> 
       
		<label id="label-dp" for="dp" title="Display Picture" >Photo:</label>
		<input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
		<input id="dp" type="file" name="dp" accept="image/*"/>
		<span class="error" id="err-dp"><?php echo $err['dp']; ?></span>
</div>
<div class="clearfix"></div> 
</br>
<div class="control-group">
	<div class="submit">
		<input class="btn sub-btn" type="submit" name="updateprofile" value="Save" />
        </div>
</div>
</div>
</form>
<?php
// }
?>
</div>
</section>
<?php include "templates/include/footer_new.php" ?>