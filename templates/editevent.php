<?php
require_once("php/connect.php");
session_start();
include_once("php/cookielogin.php");
if(!isset($_SESSION["loggedin"]))
	header("Location: /?action=login");
$err = array();

if(!isset($_POST['editevent'])){
$_POST['title']=$results['title'];
$_POST['description']=$results['description'];
$_POST['from']=$results['fromdate'];
$_POST['to']=$results['todate'];
$_POST['venue']=$results['venue'];
$_POST['address']=$results['address'];
$_POST['website']=$results['website'];
$_POST['orgname']=$results['name'];
$_POST['category']=$results['category'];
$_POST['url']=$results['url'];
$_POST['area']=$results['area'];
$_POST['category']=$result['category'];
$_POST['venue_id']=$result['venue_id'];
$_POST['event_id']=$results['event_id'];
$contacts=mysql_query("SELECT * FROM event_contact WHERE event_id = $results[event_id]");
$cons=array();
$i=0;
while($contact=mysql_fetch_array($contacts)){
	$i++;
	$_POST["contactid-$i"]="$contact[contact_id]";
	$_POST["contactname-$i"]="$contact[contact_name]";
	$_POST["contactmobile-$i"]="$contact[mobile]";
	$_POST["contactemail-$i"]="$contact[email]";
	
	
	
}
}

if(isset($_POST['editevent'])){
	global $err;
	include_once("php/formvalidation.php");
	if(empty($err)) { //updating in database
		$from = from();
       		$to = to();
		$query3 = "UPDATE venue SET venue='$_POST[venue]',address='$_POST[address]',area='$_POST[area]' WHERE venue_id='$results[event_id]'";
		mysql_query($query3) or die();
		$query4 = "UPDATE events SET 	url='$_POST[url]',description='$_POST[description]',fromdate='$from',todate='$to',category='$_POST[category]' WHERE event_id='$results[event_id]'";
		mysql_query($query4) or die();
		if($_FILES['dp']['tmp_name']!="" && getimagesize($_FILES['dp']['tmp_name'])) {
			$uploaddir = "images/events/event_".$results[event_id].".jpg";
			echo $upload;
			move_uploaded_file($_FILES['dp']['tmp_name'], $uploaddir);
		}
		$query5="DELETE FROM `event_contact` WHERE event_id='$results[event_id]'";
		mysql_query($query5) or die();
		
		for ($i=1; isset($_POST["contactname-$i"]); $i++)
  		{
  		    $contactname = $_POST["contactname-$i"];
  		    $contactemail = $_POST["contactemail-$i"];
  		    $contactmobile = $_POST["contactmobile-$i"];
  		    mysql_query("INSERT INTO event_contact (contact_name, email, mobile, event_id) VALUES ('$contactname', '$contactemail', '$contactmobile', '$results[event_id]')") or die();
  			
  		} 
  		
		header("Location: index.php?action=viewEvent&eventId=$results[event_id]");
	}
}


if(!isset($_POST['editevent']) || !empty($err)) 
{

?>
        		
<script type="text/javascript" src="js/jquery.js"></script>
<link href='css/bootstrap.css' rel='stylesheet' type='text/css'>
<link href='css/bootstrap-theme.css' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="js/calendar.js"></script>
<script type="text/javascript" src="js/formvalidation.js"></script>
<script type="text/javascript">
    jQuery(function () {
     
       jQuery('#to').datepicker({ dateFormat: 'dd-mm-yy' });
       jQuery('#from').datepicker({ dateFormat: 'dd-mm-yy' });
/*
        jQuery("#confirm_password").validate({
            expression:"if (VAL) return true; else return false;",
            message:"Please enter confirm password"
        });
        jQuery("#confirm_password").validate({
            expression:"if ((VAL == jQuery('#password').val()) && VAL) return true; else return false;",
            message:"Both the passwords don't match."
        });
*/
    });
</script>

<link href='css/datepicker.css' rel='stylesheet' type='text/css'>

<?php include_once("templates/include/header_new.php"); ?>
<script type="text/javascript">
  document.getElementById('area').value = "<?php echo $_POST['area'];?>";

function togglecontact(){
if(document.getElementById('contactme').checked == true){
<?php
	
	if(!isset($_SESSION["loggedin"]))
	{
?>
		document.getElementById('contactemail-1').value = document.getElementById('email').value;
		document.getElementById('contactmobile-1').value = document.getElementById('mobile').value;
		document.getElementById('contactname-1').value = document.getElementById('name').value;
<?php	} 
	else
	{
?>
		document.getElementById('contactemail-1').value = "<?php echo $_SESSION["email"]; ?>";
		document.getElementById('contactmobile-1').value = "<?php echo $_SESSION["mobile"]; ?>";
		document.getElementById('contactname-1').value = "<?php echo $_SESSION["name"]; ?>";
<?php
	}
?>
}
}


</script> 
<section class="extraMarTop">
    <div class="container">
        <div class="row row-inner">
            <div class="span8">
                <div class="heading-row-bottom">Edit Event</div>
            </div>
        </div>
<form name="form" action="<?php echo $PHP_SELF; ?>" enctype="multipart/form-data" method="post" onsubmit="return jsaddevent()" style="width: 70%;">
<?php
if(!isset($_SESSION["loggedin"])) {
	echo "Your Information";
	include("html/registerform.php");
}
?>
<br style="clear:both" />
<div style="font-size: 26px;font-family: 'Homenaje-Regular';color: #F26322">
Organisation Details
</div>

	<div class="form-wrapper form-registration">
                     <div class="control-group">
                        <label for="orgname">Organisation Name</label>
			<input type="text" id="orgname" name="orgname" title="Enter your Organisation Name" placeholder="Organisation Name" value="<?php echo $_POST['orgname']?>" onchange="jsorgname()" style="text-transform:capitalize" pattern="^[A-Za-z][A-Za-z. ]+$" required/>
			<span class="error" id="err-orgname" style="color: #F26322; font-size:14px"><?php echo $err['orgname']; ?></span>
                     </div> 
                     <div class="control-group">
                         <label for="website">Official Website</label>
			<input id="website" type="url" name="website" title="Organisation Website" placeholder="Official Website" value="<?php echo $_POST['website']?>" onchange="jswebsite()" pattern="^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/|www\.)[A-Za-z0-9]+([\-\.]{1}[A-Za-z0-9]+)*\.[A-Za-z]{2,5}(:[0-9]{1,5})?(\/.*)?" required/>
			<span class="error" id="err-website" style="color: #F26322; font-size:14px"><?php echo $err['website']; ?></span>
                     </div>
		     <div class="control-group">
                        <label for="sector">Sector</label>
			<input id="sector" type="text" name="sector" title="Sector" placeholder="Sector" value="<?php echo $_POST['sector']?>"/>
			<span class="error" id="err-sector" style="color: #F26322; font-size:14px"><?php echo $err['sector']; ?></span>
                      </div>
</br>
<div class="clearfix">
</div>
<div style="font-size: 26px;font-family: 'Homenaje-Regular';color: #F26322">	
Event Details
</div>
                    <div class="control-group">
                        <label for="title">Event Title</label> 
			<input type="text" id="title" name="title" title="Event Title" placeholder="Event Title" value="<?php echo $_POST['title']?>" onchange="jstitle()" style="text-transform:capitalize" required/>
			<span class="error" id="err-title" style="color: #F26322; font-size:14px"><?php echo $err['title']; ?></span>
		    </div> 
		    <div class="control-group">
			<label id="label-category" for="category" title="Category" >Category</label>
			<select name="category" id="Area" onchange="categoryfn();">
				<option value="NGO">NGO</option>
                                <option value="Environment">Environment</option>
                                <option value="Child-Education">Child-Education</option>
				<option value="Tech Fest">Tech Fest</option>
				<option value="Theatre">Theatre</option>
				<option value="Sports fest">Sports Fest</option>
				<option value="others">Others</option>
			</select>
                        <label for="category-other" style="display:None">Specify Other Category</label>
			<input type="text" id="category-other" style="display:None" name="category-other" title="Other" value="<?php echo $_POST['category-other']?>" onchange="jscategory()" placeholder="Specify Category"/>
			<span class="error" id="err-category" style="color: #F26322; font-size:14px"><?php echo $err['category']; ?></span>
                   </div>
                   <div class="control-group">
			<label for="description">Event Description</label>
			<textarea id="decription" name="description" cols="80" rows="5" resizable required placeholder="Event Description" value="<?php echo $_POST['description']?>" maxlength="1000"><?php echo nl2br($_POST['description'])?></textarea>
			<small>(Maximum 1000 characters)</small>
		</div>
                   <div class="control-group">
                        <label for="url">Event URL link</label>
			<input id="url" type="text" name="url" title="Event Url" placeholder="Event Url Link" value="<?php echo $_POST['url']?>" onchange="jsurl()" pattern="^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/|www\.)[A-Za-z0-9]+([\-\.]{1}[A-Za-z0-9]+)*\.[A-za-z]{2,5}(:[0-9]{1,5})?(\/.*)?" required/>
			<span class="error" id="err-url" style="color: #F26322; font-size:14px"><?php echo $err['url']; ?></span>
		</div>
</br>
</br>
<div class="clearfix></div>
<div class="clearfix></div>
                <div class="control-group">
                        <label id="label-area" for="Area" title="Area" >Event Complete Address</label>
			<textarea id="address" name="address" rows="4" resizable required placeholder="Event Complete Address" value="<?php echo $_POST['address']?>" maxlength="255"><?php echo $_POST['address']?></textarea>
			<small>(Maximum 255 characters)</small>
               </div> 
               <div class="control-group">
        	         <label id="label-area" for="Area" title="Area" >Event Area</label>
			<select name="area" id="area" onchange="jsarea"><?php include("php/areas.php");?></select>
			<span class="error" id="err-area" style="color: #F26322; font-size:14px"><?php echo $err['area']; ?></span>
                </div>
               <div class="control-group">
                        <label for="city">City</label>
			<input id="city" type="text" name="city" title="City" placeholder="City" value="Bangalore" disabled/>
			<span class="error" id="err-city" style="color: #F26322; font-size:14px"><?php echo $err['city']; ?></span>
                </div>
<div class="clearfix"></div>
               <div class="control-group">
		        <label id="label-dp" for="dp" title="Display Picture" >Organisation/Event Photo</label>
		        <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
		        <input id="dp" type="file" name="dp" accept="image/*"/>
			<span class="error" id="err-dp" style="color: #F26322; font-size:14px"><?php echo $err['dp']; ?></span>
               </div>
<div class="clearfix"></div>
	       <div class="control-group">
			<label id="label-from" for="from" title="Start Date for Event">From Date</label>
			<input type="text" id="from" name="from" title="Start date for event"  value="<?php echo date("d-m-Y", strtotime($_POST['from']))?>" placeholder="dd-mm-yyyy" onchange="jsfromdate()" required/>
			<span class="error" id="err-from" style="color: #F26322; font-size:14px"><?php echo $err['from']; ?></span>
                </div>
		<div class="control-group">
			
			<label id="label-to" for="to" title="End Date for Event">To Date</label>
			<input type="text" id="to" name="to" title="End date for event"  onchange="jstodate()" value="<?php echo date("d-m-Y", strtotime($_POST['to']))?>" placeholder="dd-mm-yyyy" required/></td>
			
			<span class="error" id="err-to" style="color: #F26322; font-size:14px"><?php echo $err['to']; ?></span>
		 </div>
<div class="clearfix">
</div>
<div style="font-size: 26px;font-family: 'Homenaje-Regular';color: #F26322">
		Contact Details
</div>
</br>
<div class="control-group">
		<input type="checkbox" name="contactme" id="contactme" onclick="togglecontact()"><span style="font-size:13px; color: #000000">Click this, if you are the Contact Person for the event</span></input>
</div>
         
                <div class="clearfix">
</div>


		<span id="contactSpan" class="repeatEntry">
			<div id="contactSpan-1" class="subSpan-1">
                                  <span style="float: left;margin: 5px 40px 5px 0px;font-family: Tahoma,Geneva,sans-serif;color: #2A2A2A;">
				        <label for="contactname">Contact Name</label>
					<input type="text" id="contactname-1" name="contactname-1" class="contactname" title="Enter your Full Name" placeholder="Contact Name" value="<?php echo $_POST['contactname-1']?>" onchange="jsname()" style="text-transform:capitalize" pattern="^[A-Za-z][A-Za-z. ]+$" required/>
					<span class="error errcontactname" id="err-name-1" style="color: #F26322; font-size:14px"><?php echo $err['contactname']; ?></span>
                                  </span>
                                  <span style="float: left; margin: 5px 40px 5px 0px;font-family: Tahoma,Geneva,sans-serif;color: #2A2A2A;">
                                	<label for="contactemail">Contact Email</label>
					<input id="contactemail-1" type="email" name="contactemail-1" class="contactemail" title="Enter your email address" placeholder="Contact Email Address" value="<?php echo $_POST['contactemail-1']?>" onchange="jsemail()" required/>
					<span class="error errcontactemail" id="err-email-1" style="color: #F26322; font-size:14px"><?php echo $err['contactemail']; ?></span>
                                  </span>
                                  <span style="float: left; margin: 5px 40px 5px 0px;font-family: Tahoma,Geneva,sans-serif;color: #2A2A2A;">
				        <label for="contactmobile">Contact Mobile</label>
					<input id="contactmobile-1" type="tel" name="contactmobile-1" class="contactmobile" maxlength="10" title="Enter your 10-digit mobile number" placeholder="Contact Mobile Number" value="<?php echo $_POST['contactmobile-1']?>" onchange="jsmobile()" pattern="^[789]\d{9}$" required/>
					<span class="error errcontactmobile" id="err-mobile-1" style="color: #F26322; font-size:14px"><?php echo $err['contactmobile']; ?></span>
                                 </span>
                                        <span class="clearfix"></span>
					
					<input type="button" class="remove-this-button" style="display:None; background-color:#CD9575" id="remove-this-button-1" name="remove-this-button-1" value="Remove contact">
                                
				
		</div>
                
		</span>
	<div class="clearfix"></div>
	<input type="button" class="addMore" id="addContact" name="addContact" value="Add another contact" style="background-color:#5CB85C">
	 <span class="control-group">
	<?php 
	if(!isset($_SESSION["loggedin"])) {
	include("html/subscriptionform.php");
	"</br>";
}
?>
</span>
    </br>
     <div class="submit">
	    <input class="btn sub-btn" type="submit" name="editevent" value="Edit Event"  />
        </div>
</form>
</div>
</section>
<?php
}
include "templates/include/footer_new.php";
?>