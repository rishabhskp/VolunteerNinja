<?php

require_once("php/connect.php");
session_start();
include_once("php/cookielogin.php");
$err = array();
if(isset($_POST['addevent'])){
	global $err;
	include_once("php/formvalidation.php");
	addeventcheck();
?>
  <script type="text/javascript>      alert("<?php echo "chek";?>"); </script>
<?php
	if(empty($err)) { //inserting in database
                echo "hello pass";
		if(!isset($_SESSION["loggedin"])){
			$pass= md5($_POST['password']);
			$name= ucwords(strtolower($_POST['name']));
			//if(isset($_POST['subscribe']))
			//	include("templates/subscribe.php");
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
			}
		}
		if(isset($_SESSION['organisation']))
		foreach($_SESSION['organisation'] as $id => $name) {
			if($name==$_POST["orgname"])
				$org_id=$id;
		}
		if(!isset($org_id)){
			$query2 = "INSERT INTO organisations (name, website) VALUES ('$_POST[orgname]', '$_POST[website]')";
			if(mysql_query($query2)){
				$org_id = mysql_insert_id();
				$_SESSION['organisation']["$org_id"]=$_POST["orgname"];
			}
			$query_user = ("INSERT INTO user_organisation (user_id, organisation_id) VALUES ('$user_id', '$org_id')");
			mysql_query($query_user);
		}
		
		$query3 = "INSERT INTO venue (venue, address, area) VALUES ('$_POST[venue]', '$_POST[address]', '$_POST[area]')";
		mysql_query($query3);
		$venue_id = mysql_insert_id();
		if(isset($_POST['contactme']))
			$_POST['contact'] = "$_SESSION[name]\r\n$_SESSION[email]\r\n$_SESSION[mobile]";
		if($_POST['category'] == "others")
			$_POST['category'] = $_POST['category-other'];
		$query4 = "INSERT INTO events (title, url, organisation_id, description, fromdate, todate, venue_id, category) VALUES ('$_POST[title]','$_POST[url]','$org_id', '$_POST[description]', '$_POST[from]', '$_POST[to]', '$venue_id', '$_POST[category]')";
		mysql_query($query4);
		$event_id = mysql_insert_id();
		//uploading pic
		if($_FILES['dp']['tmp_name']!="" && getimagesize($_FILES['dp']['tmp_name'])) {
			$uploaddir = "images/events/event_".$event_id.".jpg";
			echo $upload;
			move_uploaded_file($_FILES['dp']['tmp_name'], $uploaddir);
		}
		
		for ($i=1; isset($_POST["contactname-$i"]); $i++)
  		{
  		    $contactname = $_POST["contactname-$i"];
  		    $contactemail = $_POST["contactemail-$i"];
  		    $contactmobile = $_POST["contactmobile-$i"];
  			mysql_query("INSERT INTO event_contact (contact_name, email, mobile, event_id) VALUES ('$contactname', '$contactemail', '$contactmobile', '$event_id')");
  			
  		} 
		header("Location: index.php?action=event&id=$event_id");
	}
}
if(!isset($_POST['addevent']) || !empty($err)) 
{
include_once "templates/include/header_new.php";
?>
        		
<script type="text/javascript" src="js/jquery.js"></script>
<link href='css/bootstrap.css' rel='stylesheet' type='text/css'>
<link href='css/bootstrap-theme.css' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="js/calendar.js"></script>
<script type="text/javascript" src="js/formvalidation.js"></script>
<script type="text/javascript">



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
<div style="font-size: 26px;font-family: 'Homenaje-Regular';color: #F26322">
<form name="form" action="<?php echo $PHP_SELF; ?>" enctype="multipart/form-data" method="post"  style="width: 70%;">
<?php
if(!isset($_SESSION["loggedin"])) {
	echo "Your Information";
	include("html/registerform.php");
}
?>
</div>
<br style="clear:both" />
<div style="font-size: 26px;font-family: 'Homenaje-Regular';color: #F26322">
Organisation Details
</div>
	<ul>
		<li>
			<input type="text" id="orgname" name="orgname" title="Enter your Organisation Name" placeholder="Organisation Name" value="<?php echo $_POST['orgname']?>" onchange="jsorgname()" style="text-transform:capitalize" pattern="^[A-Za-z][A-Za-z. ]+$" required/>
			<span class="error" id="err-orgname"><?php echo $err['orgname']; ?></span>
		</li>
		<li>
			<input id="website" type="url" name="website" title="Organisation Website" placeholder="Official Website" value="<?php echo $_POST['website']?>" onchange="jswebsite()" pattern="^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/|www\.)[A-Za-z0-9]+([\-\.]{1}[A-Za-z0-9]+)*\.[A-Za-z]{2,5}(:[0-9]{1,5})?(\/.*)?" required/>
			<span class="error" id="err-website"><?php echo $err['website']; ?></span>
		</li>
		<!--
		<li>
			<input id="sector" type="text" name="sector" title="Sector" placeholder="Sector" value="<?php echo $_POST['sector']?>" onchange="jssector()" required/>
			<span class="error" id="err-sector"><?php echo $err['sector']; ?></span>
        </li>
        -->
	</ul>
	
Event Details
What
	<ul>
		<li>
			<input type="text" id="title" name="title" title="Event Title" placeholder="Event Title" value="<?php echo $_POST['title']?>" onchange="jstitle()" style="text-transform:capitalize" required/>
			<span class="error" id="err-title"><?php echo $err['title']; ?></span>
		</li>
		<li>
			<label id="label-category" for="category" title="Category" >Category:</label>
			<select name="category" id="Area" value="<?php echo $_POST['category']?> " onchange="categoryfn();">
				<option value="NGO">NGO</option>
				<option value="Music Fest">Music Fest</option>
				<option value="Tech Fest">Tech Fest</option>
				<option value="Theatre">Theatre</option>
				<option value="Sports fest">Sports Fest</option>
				<option value="Live Star">Live Star</option>
				<option value="others">Others</option>
			</select>
			<input type="text" id="category-other" style="display:None" name="category-other" title="Other" value="<?php echo $_POST['category-other']?>" onchange="jscategory()" placeholder="Specify Category"/>
			<span class="error" id="err-category"><?php echo $err['category']; ?></span>
        </li>
		<li>
			<textarea id="decription" name="description" cols="80" rows="5" resizable required placeholder="Event Description" value="<?php echo $_POST['description']?>" maxlength="255"></textarea>
			<small>(Maximum 255 characters)</small>
		</li>
		<li>
			<input id="url" type="text" name="url" title="Event Url" placeholder="Event Url Link" value="<?php echo $_POST['url']?>" onchange="jsurl()" pattern="^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/|www\.)[A-Za-z0-9]+([\-\.]{1}[A-Za-z0-9]+)*\.[A-za-z]{2,5}(:[0-9]{1,5})?(\/.*)?" required/>
			<span class="error" id="err-url"><?php echo $err['url']; ?></span>
		</li>
	</ul>
Where
	<ul>
		<li>
			<input type="text" id="venue" name="venue" title="Event Venue" placeholder="Event Venue" value="<?php echo $_POST['venue']?>" onchange="jsvenue()" required />
			<span class="error" id="err-venue"><?php echo $err['venue']; ?></span>
		</li>
		<li>
			<input id="city" type="text" name="city" title="City" placeholder="City" value="Bangalore" disabled/>
			<span class="error" id="err-city"><?php echo $err['city']; ?></span>
        </li>
		<li>
        	<label id="label-area" for="Area" title="Area" >Area:</label>
		<select name="area" id="area" value="<?php echo '$_POST[area]' ?>"><?php include("php/areas.php");?></select>
		<span class="error" id="err-area"><?php echo $err['area']; ?></span>
        </li>
		<li>
			<textarea id="address" name="address" rows="4" resizable required placeholder="Event Complete Address" value="<?php echo $_POST['address']?>" maxlength="255"></textarea>
			<small>(Maximum 255 characters)</small>
		</li>
		<li>
		<label id="label-dp" for="dp" title="Display Picture" >Photo:</label>
		<input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
		<input id="dp" type="file" name="dp" accept="image/*"/>
				
	  	<span class="error" id="err-dp"><?php echo $err['dp']; ?></span>
	</li>
	</ul>
When
	<ul>
		<li>
			<label id="label-to" for="to" title="Start Date for Event">From:</label>
			<input type="date" id="from" name="from" title="Start date for event" onclick="dispCal()" onchange="jsfromdate()" value="<?php echo $_POST['from']?>" placeholder="dd-mm-yyyy" required/>
			<span class="error" id="err-to"><?php echo $err['from']; ?></span>
		</li>
		<li>
			
			<label id="label-to" for="to" title="End Date for Event">To:</label>
			<input type="date" id="to" name="to" title="End date for event" onclick="dispCalTo()" onchange="jstodate()" value="<?php echo $_POST['to']?>" placeholder="dd-mm-yyyy" required/></td>
			
			<span class="error" id="err-to"><?php echo $err['to']; ?></span>
		</li>
	</ul>
	<ul>
		<input type="checkbox" name="contactme" id="contactme" onclick="togglecontact()" >Click this, if you are the Contact Person for the event</input>
		</br>
		</br>
		Contact Details:
		<span id="contactSpan" class="repeatEntry">
			<div id="contactSpan-1" class="subSpan-1">
				<ul>
			    
				<li>
					<input type="text" id="contactname-1" name="contactname-1" class="contactname" title="Enter your Full Name" placeholder="Contact Name" value="<?php echo $_POST['contactname-1']?>" onchange="jsname()" style="text-transform:capitalize" pattern="^[A-Za-z][A-Za-z. ]+$" required/>
					<span class="error errcontactname" id="err-name-1"><?php echo $err['contactname']; ?></span>
				</li>
				<li>	
					<input id="contactemail-1" type="email" name="contactemail-1" class="contactemail" title="Enter your email address" placeholder="Contact Email Address" value="<?php echo $_POST['contactemail-1']?>" onchange="jsemail()" required/>
					<span class="error errcontactemail" id="err-email-1"><?php echo $err['contactemail']; ?></span>
				</li>
				<li>
					<input id="contactmobile-1" type="tel" name="contactmobile-1" class="contactmobile" maxlength="10" title="Enter your 10-digit mobile number" placeholder="Contact Mobile Number" value="<?php echo $_POST['contactmobile-1']?>" onchange="jsmobile()" pattern="^[789]\d{9}$" required/>
					<span class="error errcontactmobile" id="err-mobile-1"><?php echo $err['contactmobile']; ?></span>
				</li>
				<li>
					</br>
					</br>
					<input type="button" class="remove-this-button" style="display:None" id="remove-this-button-1" name="remove-this-button-1" value="Remove contact">
				</li>
				
			</ul>
		</div>
		</span>
	</ul>
	</br>
	<input type="button" class="addMore" id="addContact" name="addContact" value="Add another contact">
	<?php 
	if(!isset($_SESSION["loggedin"])) {
	include("html/subscriptionform.php");
	"</br>";
}
?>
    </br>
	<input type="submit" name="addevent" value="Add Event" />
</form>
<?php
}
include "templates/include/footer.php";
?>