<?php
require_once( "config.php" );
//include_once( "fbaccess.php" );
require_once("php/connect.php");
session_start();
$action = isset( $_GET['action'] ) ? $_GET['action'] : "";

switch ( $action ) {
  case 'register':
    register();
    break;
  case 'login':
    login();
    break;
  case 'profile':
    profile();
    break;
  case 'changepassword':
    changepassword();
    break;
  case 'resetpassword':
    resetpassword();
    break;
  case 'logout':
    logout();
    break;
  case 'addevent':
    addevent();
    break;
  case 'archive':
    archive();
    break;
  case 'viewEvent':
    viewEvent();
    break;
  case 'editEvent':
    editEvent();
    break;
  case 'subscribe':
    subscribe();
    break;
  case 'unsubscribe':
    unsubscribe();
    break;
  case 'errorpage':
    errorpage();
    break;
  case 'myevents':
    myevents();
    break;
  case 'contactus':
    contacts();
    break;
  case 'forgot':
    forgot();
    break;
  case 'inbox':
    inbox();
    break;
  case 'viewMessage':
    viewMessage();
    break;
  case 'composeMail':
    composeMail();
    break;
  case 'newMail':
    newMail();
    break;
  case 'sent':
    sent();
    break;
  case 'broadcast':
    broadcast();
    break;
  default:
    homepage();
}

function register() {
  $results = array();
  $results['pageTitle'] = "Register | Volunteer Ninja";
  require( TEMPLATE_PATH . "/register.php" );
}

function login() {
  $results = array();
  $results['pageTitle'] = "Login | Volunteer Ninja";
  require( TEMPLATE_PATH . "/login.php" );
}

function forgot() {
  $results = array();
  $results['pageTitle'] = "Forgot Password | Volunteer Ninja";
  require( TEMPLATE_PATH . "/forgot_password.php" );
}
function profile() {
  $results = array();
  $results['pageTitle'] = "My Profile | Volunteer Ninja";
  require( TEMPLATE_PATH . "/profile.php" );
}

function myevents() {
  $results = array();
  $results['pageTitle'] = "My Events | Volunteer Ninja";
  require( TEMPLATE_PATH . "/MyEvents.php" );
}

function changepassword() {
  $results = array();
  $results['pageTitle'] = "Change Password | Volunteer Ninja";
  require( TEMPLATE_PATH . "/changepassword.php" );
}

function resetpassword() {
  $results = array();
  $results['pageTitle'] = "Reset Password | Volunteer Ninja";
  require( TEMPLATE_PATH . "/resetpassword.php" );
}

function logout() {
  $results = array();
  $results['pageTitle'] = "Logout | Volunteer Ninja";
  require( TEMPLATE_PATH . "/logout.php" );
}

function addevent() {
  $results = array();
  $results['pageTitle'] = "Add an Event | Volunteer Ninja";
  require( TEMPLATE_PATH . "/addevent_new.php" );
}

function archive() {
  $results = array();
  $data = Article::getList();
  $results['articles'] = $data['results'];
  $results['totalRows'] = $data['totalRows'];
  $results['pageTitle'] = "Events Archive | Volunteer Ninja";
  require( TEMPLATE_PATH . "/archive.php" );
}

function viewEvent() {
  if ( !isset($_GET["eventId"]) || !$_GET["eventId"] ) {
    homepage();
    return;
  }

  $results = array();
  $results = Event::getById((int)$_GET["eventId"] );
  $results['pageTitle'] = $results['title'] . " | Volunteer Ninja";
  require( TEMPLATE_PATH . "/viewEvent.php" );
}

function editEvent() {
  if ( !isset($_GET["eventId"]) || !$_GET["eventId"] ) {
    homepage();
    return;
  }

  $results = array();
  $results = Event::getById((int)$_GET["eventId"] );
  $results['pageTitle'] = $results['title'] . " | Volunteer Ninja";
  require( TEMPLATE_PATH . "/editevent.php" );
}

function subscribe() {
  $results = array();
  $results['pageTitle'] = "Subscribe | Volunteer Ninja";
  require( TEMPLATE_PATH . "/subscribe.php" );
}

function unsubscribe() {
  $results = array();
  $results['pageTitle'] = "Unsubscribe | Volunteer Ninja";
  require( TEMPLATE_PATH . "/unsubscribe.php" );
}

function errorpage() {
  $results = array();
  $results['pageTitle'] = "Error | Volunteer Ninja";
  require( TEMPLATE_PATH . "/errorpage.php" );
}

function homepage() {
  $results = array();
  $data = Article::getList( HOMEPAGE_NUM_ARTICLES );
  $results['articles'] = $data['results'];
  $results['totalRows'] = $data['totalRows'];
  $results['pageTitle'] = "Volunteer Ninja";
  require( TEMPLATE_PATH . "/homepage.php" );
}

function contacts() {
  $results = array();
  $results['pageTitle'] = "Contact Us | Volunteer Ninja";
  require( TEMPLATE_PATH . "/contacts.php" );

}

function inbox() {
  $results = array();
  $results['pageTitle'] = "Volunteer Ninja | Inbox";
  require( TEMPLATE_PATH . "/inbox.php" );
}

function sent() {
  $results = array();
  $results['pageTitle'] = "Volunteer Ninja | Inbox";
  require( TEMPLATE_PATH . "/inbox.php" );
}

function viewMessage() {
	$results = array();
	$myrow = array();
	$results['pageTitle'] = "Volunteer Ninja | Message";
	if ( !isset($_GET["messageId"]) || !$_GET["messageId"] ) {
		inbox();
		return;
	}
	$mid=$_GET["messageId"];
	$result=mysql_query("SELECT id,sender_email,subject,time,message,recipient_email  FROM messages where id='$mid'");
	if($result === FALSE) {
		die(mysql_error()); // TODO: better error handling
	}else{
	    $myrow = mysql_fetch_array($result);
	}
	mysql_query("UPDATE messages SET `read`=true WHERE id='$mid'");
 	require( TEMPLATE_PATH . "/viewMessage.php" );
}

function composeMail(){
	$results = array();
	$results['pageTitle'] = "Volunteer Ninja | New Message";
	$myrow = array("reciever_mail" => "","subject" => "","message" => "");
	if ( isset($_GET["to"]) || $_GET["to"] ) {
		$myrow["reciever_mail"]=$_GET["to"];
	}
	require( TEMPLATE_PATH . "/composeMail.php" );
}

function newMail(){
	if(isset($_POST[event_id])){
                
		$query=mysql_query("SELECT u.email FROM `users` u,`event_user` e WHERE e.event_id='$_POST[event_id]' and u.user_id=e.user_id");
		while($email=mysql_fetch_row($query)){
			print_r($email);
			mysql_query("INSERT INTO messages (sender, sender_email, recipient_email, subject, message, `read`) VALUES ('$_SESSION[user_id]', '$_SESSION[email]', '$email[0]','$_POST[subject]','$_POST[message]',0)");
			$message_id = mysql_insert_id();
			
		}
	}else{
        
	mysql_query("INSERT INTO messages (sender, sender_email, recipient_email, subject, message, `read`) VALUES ('$_SESSION[user_id]', 						'$_SESSION[email]', '$_POST[email]','$_POST[subject]','$_POST[message]',0)");
	$message_id = mysql_insert_id();
	
	}
	require( TEMPLATE_PATH . "/inbox.php" );
}

function broadcast(){
	$results = array();
	$results['pageTitle'] = "Volunteer Ninja | New Message";
	$results['event_id']=$_GET[eventId];
	
	require( TEMPLATE_PATH . "/composeMail.php" );
}

?>