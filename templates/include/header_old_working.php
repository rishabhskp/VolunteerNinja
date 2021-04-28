<?php session_start();  ?>
<!DOCTYPE html>
<html xmlns:fb="http://ogp.me/ns/fb#" lang="en">
  <head>
    <title><?php echo htmlspecialchars( $results['pageTitle'] )?></title>
    <meta property="fb:app_id" content="1434661150080596" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <noscript>
    <?php
    if($_GET["action"]!="errorpage")
    echo "<meta http-equiv=\"refresh\" content=\"0; url=index.php?action=errorpage\" />";
    ?>
    </noscript>
  </head>
  <body>
  	<div id="fb-root"></div>
	<script>
	(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=1434661150080596";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
    <div id="container">
      <a href="." class="abc">
      <img id="logo" src="images/logo.jpg" alt="Volunteer Ninjas" width="100"/>
      <img id="title" src="images/logo_txt.png" alt="Volunteer Ninjas" />
      </a>
	  <?php
	  include_once "fbaccess.php";
	  if($_SESSION["loggedin"] && file_exists("images/dp/$_SESSION[email].jpg"))
	  	echo "<img src=\"images/dp/$_SESSION[email].jpg\" width=\"100px\">";
	  ?>
	  <br style="clear:both"/>
	  <div>
      <?php
	  if(!isset($_SESSION["loggedin"])) {
	  ?>
	  <a href="./?action=register">Register</a>
	  <a href="./?action=login">Login</a>
	  <a href="./?action=addevent">Add an Event</a>
	  <?php
	  echo '<a href="' . $loginUrl . '"><img src="images/fblogin.png" alt="Connect to your Facebook Account"/></a>';
	  }
	  else {
	  echo "Hi, $_SESSION[name]";
	  ?>
	  <a href="./?action=profile">My Profile</a>
	  <a href="./?action=addevent">Add an Event</a>
	  <a href="./?action=changepassword">Change Password</a>
	  <a href="./message.php?action=inbox">Inbox</a>
	  <a href="./?action=logout">Logout</a>
	  <a href="./?action=myevents">My Events</a>
<?php 
		}
	echo "$msg";
      ?>
      </div>
      <fb:like href="https://www.facebook.com/volunteerninja" layout="standard" action="like" show_faces="true" share="true" ref="website"></fb:like>
	<div>
	<a rel="nofollow" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http://www.volunteerninja.com<?php echo $_SERVER['PHP_SELF']; ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=no,height=650,width=650');return false;"> Share on Facebook</a>
	<a rel="nofollow" target="_blank" href="https://twitter.com/intent/tweet?url=http://www.volunteerninja.com<?php echo $_SERVER['PHP_SELF'];?>&amp;text=<?php echo $results['pageTitle']; ?>&amp;via=VolunteerNinja" onclick="javascript:window.open(this.href,
  '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=no,height=650,width=650');return false;">Twitter</a>
	</div>