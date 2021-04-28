<?php include_once "include/header_new.php";
?>
<?php
include("php/connect.php");
include("php/formvalidation.php");
$style='display:none';
$forgot='';
$confirm='display:none';
if(isset($_POST['submit'])){
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
	$style='display:none';
	$confirm='';
        $forgot='display:none';
}
else
{
    	$style='';
}
}
?>    


<!DOCTYPE html>
<html lang="en">
<body>
<script type="text/javascript">
    jQuery(function () {
        jQuery("#email").validate({
            expression:"if (VAL) return true; else return false;",
            message:"Please enter email address"
        });
        jQuery("#email").validate({
            expression:"if (VAL.match(/^[^\\W][a-zA-Z0-9\\_\\-\\.]*\\@[a-zA-Z0-9_]+(\\.[a-zA-Z0-9_]+)*\\.[a-zA-Z]{2,4}$/)) return true; else return false;",
            message:"Please enter valid email address"
        });
    });
</script>

<div id="flashMessage" class="alert fade in" style="<?php echo $style ?>">
    This email address is not registered with us. Please enter a valid email
                    address    <a class="close" data-dismiss="alert" href="#">×</a>
</div>

<section class="extraMarTop">
    <div class="container">
        <div class="row row-inner">
            <div class="span8">
                <div class="heading-row-bottom">FORGOT YOUR PASSWORD?</div>

            </div>
        </div>
        
          <div class="row-gray" style="<?php echo $confirm?>">
                    <span class="confirm">
                        An email has been been sent to the address provided by you.
                        <br>
                        <br>
                        Please check your email and click on the link to set your new password.
                    </span>
                </div>

        <div class="row row-inner" style="<?php echo $forgot?>">
            <div class="span8 span4-ipad">
                <div class="row-gray common-font">
                    Please enter your Email Address to receive a link to change password.
                </div>
                <div class="clearfix"></div>
<!--                <form class="form-horizontal">-->
                    <fieldset>
                        <div class="form-left">
                            <div class="control-group">

                                <div class="formfiled">
                                    <form action="" id="UserForgotPasswordForm" method="post" accept-charset="utf-8"><div style="display:none;">
<input type="hidden" name="_method" value="POST"/></div>                                    <div class="input text"><input name="email" id="email" placeholder="Email Address" class="input-xlarge input-box" type="text" pattern="([a-zA-Z0-9._-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z]+)*)" required/></div>                                    <div class="submit"><input  class="btn sub-btn" type="submit" value="SUBMIT" name='submit'/></div>                                    </form>                                </div>

                            </div>
                        </div>

                    </fieldset>
<!--                </form>-->
            </div>
            <!-- span4 end here -->
        </div>
        <!-- row end here -->


    </div>
</section>
<?php include "templates/include/footer_new.php" ?>