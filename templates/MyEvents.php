 <?php
error_reporting(E_ERROR | E_PARSE);
require_once("php/connect.php");
if(!isset($_SESSION)){
session_start();
}
include_once("php/cookielogin.php");
if(!isset($_SESSION["loggedin"]))
	header("Location: /?action=login");
$err = array();
include("templates/include/header_new.php");
?>
<section class="extraMarTop">
    <div class="container">
        <div class="row row-inner">
            <div class="span8" style="padding-left:5px">
                <div class="heading-row-bottom">Your Events</div>
            </div>
        </div>

	  <?php
                $image_counter = 0;
	  	if(isset($_SESSION['orguser']))
	  	{
                ?>
                <div class="form-wrapper form-registration" style="max-width:inherit">
    <div class="span8" style="float:middle">
                
                <?php
	  	$result1=mysql_query("SELECT distinct organisation_id FROM user_organisation WHERE user_id='$_SESSION[user_id]'");
	  	$result=mysql_query("SELECT distinct category FROM events");
                $i =0;
	  	while ($myrow = mysql_fetch_array($result)){	
	  	while ($myorgs = mysql_fetch_array($result1)){
	  	?>
	  	<?php	
	  	$events=array();
	  	$events=mysql_query("SELECT event_id, title, fromdate, category FROM events WHERE organisation_id='$myorgs[0]'  ORDER BY fromdate desc");
                $i = $i + 1; 
	  	while($row = mysql_fetch_array($events)){
                        $image_counter = $image_counter + 1;
	  		$fromdate = date("j M Y", strtotime($row['fromdate']));
	  ?>
          <div class="span3 top-selling-albums" style="width:430px">
          <div class="control-group" style="padding-left:5px; width:inherit;">
           	   <div class="element" style = "width:90px; height:90px;">
           <a href=".?action=viewEvent&eventId=<?php echo $row['event_id'];?>">
                   <img src="images/events/event_<?php echo $row[event_id]?>.jpg" width="90px" height="90px"></a>
          </div>
                   <div class="control-group" style="word-wrap: break-word;">
          <a href=".?action=viewEvent&eventId=<?php echo $row['event_id'];?>" style="word-wrap: break-word;"><?php echo strtoupper(htmlspecialchars($row['title']));?></a>
            <br>
            <span style="width: 75%;"><?php echo $row['category'];?></span>
            <br>
            <?php echo $fromdate;?>
          
         </div></div></div>
                        <?php
                        if($image_counter % 2 == 0)
                        {
                             echo '<div class="clearfix"></div>';
                             echo '</div> <div class="span8">';
                        }
                        } }} ?>
</div></div> <?php }
else{
?>

    <div class="form-wrapper form-registration" style="max-width:inherit">
    <div class="span8" style="float:middle">
<?php
        $image_counter = 0;
	$result1=mysql_query("SELECT distinct category FROM events");
	while ($mycat = mysql_fetch_array($result1)){
	$result=mysql_query("SELECT * FROM  events e,  event_user eu WHERE e.event_id = eu.event_id AND eu.user_id ='$_SESSION[user_id]' and e.category='$mycat[0]'");
	$flag=1;
	while ($row = mysql_fetch_array($result)){
                $image_counter = $image_counter + 1;
		if($flag == 1){
			 /* echo '<h2>'.$mycat[0].'</h2>'; */
		}
		$fromdate = date("j M Y", strtotime($row['fromdate']));?>
                   <div class="span3 top-selling-albums" style="width:430px">
                   <div class="control-group" style="padding-left:5px">
           	   <div class="element" style = "width:90px; height:90px;">
                   <a href=".?action=viewEvent&eventId=<?php echo $row['event_id'];?>">
                   <img src="images/events/event_<?php echo $row['event_id'] ?>.jpg" width="90px" height="90px"></a>
                   </div>
                   <div class="control-group">	          			
                  <h4> <a href=".?action=viewEvent&eventId=<?php echo $row['event_id'];?>"><?php echo strtoupper(htmlspecialchars($row['title']));?></a> </h4>
                        <br>
                        <span style="width: 75%;"><?php echo $row['category'];?></span>
                        <br>
                        <?php echo $fromdate;?>        		
                        </div></div></div>
                        <?php
                        if($image_counter % 2 == 0)
                        {
                             echo '<div class="clearfix"></div>';
                             echo '</div> <div class="span8">';
                        }
                        ?>

        <?php
	}}}
?>
      </div>
      </div>
      </div>
      </section>
<?php include "templates/include/footer_new.php" ?>