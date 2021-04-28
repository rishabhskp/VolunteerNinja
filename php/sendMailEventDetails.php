<?php
session_start();
include("connect.php");
include("formvalidation.php");
$email = $_POST['email'];
$event_id = $_POST['event_id'];
$row = mysql_fetch_array(mysql_query("SELECT title, fromdate, todate, category, venue_id FROM events WHERE event_id = '$event_id'"));
echo isset($_POST['email']) ? "yes" : "no";
$contact = mysql_query("SELECT contact_name, mobile, email FROM event_contact WHERE event_id = '$event_id'");
if($row[fromdate] == $row[todate])
{
	$todate = "- ".$row[todate];
}
else
	$todate = "";
	
$subject = "Volunteer Ninja has sent an event for you";
$message = "<div style=\"font-family:verdana;color:#333;font-size:14px\">
	<p style=\"font-size:22px;font-weight:bold;color:F8FFF3;margin:0 0 10px 10px\">Volunteer Ninja</p>
        <div style=\"padding:5px 10px 20px;color:#333\">
            <p>Hello,</p>
            <p>&nbsp;&nbsp;It's volunteerninja.com with the details of the event $row[category] : $row[title] </p>";
	
if(isset($row['venue_id'])) {
	$venue_id= $row['venue_id'];
	$venue_row = mysql_fetch_array(mysql_query("SELECT venue, area, address FROM venue WHERE venue_id = '$venue_id'"));
	
$message .= "<p>Where : $venue_row[venue], $venue_row[address]</p>
            <p>Area : $venue_row[area]</p>";
}
$message .= "<p>When : $row[fromdate] $todate</p>";

while($contact_row = mysql_fetch_array($contact))
{
	$message .= "<p>Contact : ".$contact_row[contact_name]." , ".$contact_row[mobile]." , ".$contact_row[email]."</p>";
}
    $message .= "<p style=\"margin-bottom:2px\">Thanks,</p>
            <p style=\"font-size:15px;margin-top:3px\">VolunteerNinja Team</p>
        </div>
        <p style=\"color:#f8fff3;font-size:13px;padding:0px 10px\">Please do not reply to this message; it was sent from an unmonitored email address.  This message is a service email related to your use of VolunteerNinja.  For general inquiries or to request support with your VolunteerNinja account, please mail us at <a style=\"color:#fff\" href=\"mailto:support@volunteerninja.com\" target=\"_blank\">support@volunteerninja.com</a> or call us at +91 98408 80633.</p><div class=\"yj6qo\"></div>
        </div>";
	$headers  = "From: noreply@borebandar.com\r\n"; 
    $headers .= "Content-type: text/html\r\n"; 
	mail($email,$subject,$message, $headers);
	//echo "An email regarding the details of the event has been successfully sent to you ";

?>