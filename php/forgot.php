<?php
include("connect.php");
include("formvalidation.php");
$email = $_POST['email'];
$row = mysql_fetch_array(mysql_query("SELECT user_id, email FROM users WHERE email = '$email'"));
if($row['user_id']) {
	$code = md5($row['email'].date("Y-m-d"));
	$link = "www.borebandar.com/others/volunteer/?action=resetpassword&uid=$row[user_id]&code=$code";
	$subject = "Password Reset Link";
	$message = "<div style=\"font-family:verdana;color:#333;background-color:#5f5f5f;font-size:14px\">
	<p style=\"font-size:22px;font-weight:bold;color:F8FFF3;margin:0 0 10px 10px\">Volunteer Ninja</p>
        <div style=\"padding:5px 10px 20px;background-color:#dedede;color:#333\">
            <p>Hello,</p>
            <p>&nbsp;&nbsp;We received a password reset request for your VolunteerNinja account associated with this email account.</p>
            <p>You can reset your password by clicking on the password reset link </p>
            <p><a style=\"font-family:monospace\" href=".$link." target=\"_blank\"></a>".$link."</p>
            <p>If you havent requested for password reset then we appologize for this email. You can ignore this email and that will be just fine. We wont bug you any more.</p>
            <p style=\"margin-bottom:2px\">Thanks,</p>
            <p style=\"font-size:15px;margin-top:3px\">VolunteerNinja Team</p>
        </div>
        <p style=\"color:#f8fff3;font-size:13px;padding:0px 10px\">Please do not reply to this message; it was sent from an unmonitored email address.  This message is a service email related to your use of VolunteerNinja.  For general inquiries or to request support with your VolunteerNinja account, please mail us at <a style=\"color:#fff\" href=\"mailto:support@volunteerninja.com\" target=\"_blank\">support@volunteerninja.com</a> or call us at +91 98408 80633.</p><div class=\"yj6qo\"></div>
        </div>";
	$headers  = "From: noreply@borebandar.com\r\n"; 
    	$headers .= "Content-type: text/html\r\n"; 
	mail($row[email],$subject,$message, $headers);
	echo "Check your Email for the password reset link.";
}
else
	echo "User not found in our database.";
?>