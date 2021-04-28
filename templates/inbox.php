<?php
require_once("php/connect.php");
session_start();
include_once("php/cookielogin.php");
if(!isset($_SESSION["loggedin"]))
	header("Location: /?action=login"); 
include "templates/include/header_new.php";
?>
<a href="./?action=composeMail" class="loadMoreBtn">New Message</a>
<section class="extraMarTop">
<div class="container">
<!-- banner start here -->
<div class="row row-inner">
    <div class="span8">
        <img src="images/img/inbox.jpg" alt="Inbox"/>
    </div>
</div>
<!-- banner end here -->
<div class="clearfix"></div>
<div class="row row-inner top-charts-list">
<div class="span3 top-selling-albums">
    <div class="heading">Unread Mails</div>
			<?php $result=mysql_query("SELECT id,sender_email,subject,time  FROM messages where recipient_email='$_SESSION[email]' and `read`=false order by time desc");
			 $count=1;
                         if(!mysql_num_rows($result))
                         {  ?>
                            <div style="height:inherit; float:middle; color:#EE5E00; font-size:18px;padding-left:10px; padding-top:15px;">
                            <?php echo "No UnRead Messages"; ?>
                             </div>
                         <?php
                         }
			 while ($myrow = mysql_fetch_array($result)) {
			?>
            <div class="row row-inner" >
            <div class="span1">
                <div class="element similar-album" style="height:inherit">
                    <div class="box">
                        <?php
                            if(file_exists("images/dp/$myrow[sender_email].jpg"))
                            {
                            ?>
                            <a href="/?action=viewMessage&amp;messageId=<?php echo $myrow[id]?>">
                            <img src="images/dp/<?php echo $myrow[sender_email]?>.jpg" class="gray" alt="$myrow[sender_email]" /><img src="images/dp/<?php echo $myrow[sender_email]?>.jpg" class="color" alt="$myrow[sender_email]" /> </a>
                            <?php
                            }
                            else{
                            ?>
                            <a href="/?action=viewMessage&amp;messageId=<?php echo $myrow[id]?>">
                            <img src="images/dp/default" class="gray" width="25px" height="80px" alt="$myrow[sender_email]"/><img src="images/dp/default.gif" width="25px" height="80px" class="color" alt="$myrow[sender_email]" /> </a>
                           <?php } ?>

                        <div class="list-number"><?php echo $count ?></div>
                    </div>
                </div>
            </div>
            <div class="span1">
                <div class="text-box">
                                 <span class="albumTitle">
                                     <a href="/?action=viewMessage&amp;messageId=<?php echo $myrow[id]?>"><?php echo $myrow[sender_email]?></a><br/>
                                         <?php echo $myrow[subject]?>
                                 </span>
                                 <span>  at <a href="/bestof" class="album-link"><?php echo $myrow[time]?></a>                                 </span>
                </div>
            </div>
        </div>
              <?php $count=$count+1 ;} ?>
           

</div>
<div class="span3 top-singles">
    <div class="heading">Read Mails</div>
                <?php $result=mysql_query("SELECT id,sender_email,subject,time  FROM messages where recipient_email='$_SESSION[email]' and `read`=true order by time desc");
			 $count=1;
                         if(!mysql_num_rows($result))
                         {  ?>
                            <div style="height:inherit; float:middle; color:#EE5E00; font-size:18px;padding-left:10px; padding-top:15px;">
                            <?php echo "No Read Messages"; ?>
                             </div>
                         <?php
                         }
			 while ($myrow = mysql_fetch_array($result)) {
				?>
            <div class="row row-inner" >
            <div class="span1">
                <div class="element similar-album" style="height:inherit">
                    <div class="box">
                        <?php
                            if(file_exists("images/dp/$myrow[sender_email].jpg"))
                            {
                            ?>
                            <a href="/?action=viewMessage&amp;messageId=<?php echo $myrow[id]?>">
                            <img src="images/dp/<?php echo $myrow[sender_email]?>.jpg" class="gray" alt="$myrow[sender_email]" /><img src="images/dp/<?php echo $myrow[sender_email]?>.jpg" class="color" alt="$myrow[sender_email]" /> </a>
                            <?php
                            }
                            else{
                            ?>
                            <a href="/?action=viewMessage&amp;messageId=<?php echo $myrow[id]?>">
                            <img src="images/dp/default" width="25px" height="80px" class="gray" alt="$myrow[sender_email]"/><img src="images/dp/default.gif" width="25px" height="80px" class="color" alt="$myrow[sender_email]" /> </a>
                           <?php } ?>

                        <div class="list-number"><?php echo $count ?></div>
                    </div>
                </div>
            </div>
            <div class="span1">
                <div class="text-box">
                                 <span class="albumTitle">
                                     <a href="/?action=viewMessage&amp;messageId=<?php echo $myrow[id]?>"><?php echo $myrow[sender_email]?></a><br/>
                                         <?php echo $myrow[subject]?>
                                 </span>
                                 <span> at <?php echo $myrow[time]?></span>
                </div>
            </div>
        </div>
              <?php $count=$count+1 ;} ?>
                       
                         
</div>

<div class="span3 top-artists">
    <div class="heading">Sent Mails</div>
                
                <?php $result=mysql_query("SELECT id,recipient_email,subject,time  FROM messages where sender_email='$_SESSION[email]' order by time desc");
			 $count=1;
                         if(!mysql_num_rows($result))
                         {  ?>
                            <div style="height:inherit; float:middle; color:#EE5E00; font-size:18px;padding-left:10px; padding-top:15px;">
                            <?php echo "No Sent Messages"; ?>
                             </div>
                         <?php
                         }
			 while ($myrow = mysql_fetch_array($result)) {
			?>
            <div class="row row-inner">
            <div class="span1">
                <div class="element similar-album" style="height:inherit">
                    <div class="box">
                            <?php
                            if(file_exists("images/dp/$myrow[recipient_email].jpg"))
                            {
                            ?>
                            <a href="/?action=viewMessage&amp;messageId=<?php echo $myrow[id]?>">
                            <img src="images/dp/<?php echo $myrow[recipient_email]?>.jpg" class="gray" alt="$myrow[recipient_email]" /><img src="images/dp/<?php echo $myrow[recipient_email]?>.jpg" class="color" alt="$myrow[recipient_email]" /> </a>
                            <?php
                            }
                            else{
                            ?>
                            <a href="/?action=viewMessage&amp;messageId=<?php echo $myrow[id]?>">
                            <img src="images/dp/default" width="25px" height="80px" class="gray" alt="$myrow[recipient_email]"/><img src="images/dp/default.gif" width="25px" height="80px" class="color" alt="$myrow[recipient_email]" /> </a>
                           <?php } ?>
                        <div class="list-number"><?php echo $count ?></div>
                    </div>
                </div>
            </div>
            <div class="span1">
                <div class="text-box">
                                 <span class="albumTitle">
                                     <a href="/?action=viewMessage&amp;messageId=<?php echo $myrow[id]?>"><?php echo $myrow[recipient_email]?></a><br/>
                                         <?php echo $myrow[subject]?>
                                 </span>
                                 <span> at <a href="/bestof" class="album-link"><?php echo $myrow[time]?></a>                                 </span>
                </div>
            </div>
        </div>
              <?php $count=$count+1 ;} ?>
            

</div>



</div>
</div>

</section>
<?php include "templates/include/footer_new.php" ?>