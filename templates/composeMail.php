<?php
require_once("php/connect.php");
session_start();
include("php/cookielogin.php");
if($_SESSION["loggedin"]!="yes")
	header("Location: /?action=login");
include("templates/include/header_new.php");
?>
     <section class="extraMarTop">
    <div class="container">
        <div class="row row-inner">
            <div class="span8">
                <div class="heading-row-bottom">Compose message</div>
            </div>
        </div>
        <script type="text/javascript" src="js/formvalidation.js"></script>
      <form action="/?action=newMail" method="post" style="width: 50%;">
        <input type="hidden" name="login" value="true" />

<?php if ( isset( $results['errorMessage'] ) ) { ?>
        <div class="errorMessage"><?php echo $results['errorMessage'] ?></div>
<?php } ?>

		<?php 
                 if (!isset($results['event_id'] ) ) { 
                ?>
                <div class="control-group">
           	 <label for="title">To</label>
           	 <input type="text" name="email" id="email" placeholder="To" required autofocus maxlength="255" value="<?php echo htmlspecialchars( $myrow["reciever_mail"] )?>"  onchange="jsemail()"/>
           	 <span class="error" id="err-email" style="color: #F26322; font-size:14px"><?php echo $err['email']; ?></span>
                </div>
          	<?php }else{ ?>
          	 <input type="hidden" name="event_id" id="event_id" value="<?php echo $results['event_id']?>" />
          	<?php } ?>

         <div class="control-group">
            <label for="summary">Subject</label>
            <textarea name="subject" id="subject" placeholder="Subject" required maxlength="100" style="height: 3em; width: 40em"><?php echo htmlspecialchars( $myrow["subject"] )?></textarea>
          </div>

          <div class="control-group">
            <label for="content">Message</label>
            <textarea name="message" id="message" placeholder="Message" required maxlength="500" style="height: 10em; width: 40em"><?php echo htmlspecialchars( $myrow["message"] )?></textarea>
          </div>
		 <div class="control-group">
           <div class="submit">
        	  <input class="btn sub-btn" type="submit" name="send" value="Send message" onclick="jsemail()"/> 		 
          </div>
          </div>
          
	</div>
		  
	 

      </form>
     
       
	
	

</section>

<?php include "templates/include/footer_new.php" ?>