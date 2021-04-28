<?php

require( "config.php" );
require_once("php/connect.php");
session_start();
$action = isset( $_GET['action'] ) ? $_GET['action'] : "";

switch ( $action ) {
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
    inbox();
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