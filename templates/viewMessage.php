<?php include "templates/include/header_new.php" ?>
 
	<section class="extraMarTop">
    <div class="container">
        <div class="row row-inner">
            <div class="span8">
                <div class="heading-row-bottom">Message</div>
            </div>
        </div>

<div style="float: left;height: inherit;width: 600px;margin: 2px;overflow: hidden;position: relative;color: #222; padding-left:10px">
      <div style="font-size: 16px; color:#000000;">
      </br><b>
      From:</b>
      </div>
     </br>
     <div style="font-size: 14px; color: #000000;word-wrap:break-word;">
	 <?php echo htmlspecialchars( $myrow[1] )?>
    
     </div>
      </br>
      <div style="font-size: 14px; color: #000000;word-wrap:break-word;">
       <b>To :</b> </br> <?php echo htmlspecialchars( $myrow[5] )?>
	   </div>
	   </br>
       <div style="font-size: 14px; color: #000000;word-wrap:break-word;">
       <b>Subject :</b> </br> <?php echo htmlspecialchars( $myrow[2] )?>
	   </div>
	   </br>
	  <div style="font-size: 14px; color: #000000;word-wrap:break-word;">
       <b>Message :</b></br> <?php echo $myrow[4]?>
      </div>
      </br>
      <div style="font-size: 14px; color: #000000;word-wrap:break-word;">
       <b>Sent on :</b></br><?php echo $myrow[3]?>
      </div>
      </br>
	    <?php if($_GET['sent']!='sent'){ ?>
 <div class="control-group">
           <div class="submit" style="float:middle;">
        	  
     <a class="btn sub-btn" href="./?action=composeMail&amp;to=<?php echo $myrow[1]?>">Reply</a>
</div>
</div>
      </div>
      	  
	  </div>
     <?php }?>
	  </div>
	 
	  </section>

    

<?php include "templates/include/footer_new.php" ?>