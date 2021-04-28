<?php include "templates/include/header_new.php";
require_once("php/connect.php");
session_start();
$title = rawurlencode($results['title']);
$description = str_replace(' ', '%20', $results['description']);
$fromdate = date("j M Y", strtotime($results['fromdate']));
$todate = date("j M Y", strtotime($results['todate']));
$from = date("Ymd", strtotime($results['fromdate']));
$to = date("Ymd", strtotime($results['todate']))+1;
$venue = str_replace(' ', '%20', $results['venue']." ".$results['address']);
$contacts=mysql_query("SELECT * FROM event_contact WHERE event_id = $results[event_id]");
$cons=array();
$i=0;
while($contact=mysql_fetch_array($contacts)){
	$contact_info.="$contact[contact_name] $contact[mobile] $contact[email]";
	$cons[$i][0]="$contact[contact_name]";
	$cons[$i][1]="$contact[mobile]";
	$cons[$i][2]="$contact[email]";
	$i++;
}
?>
<script type="text/javascript">
function sendsms(value, event_id){
var text = "<?php echo "$results[title] Starts: $fromdate Contact: $contact_info"; ?>";
if (value == "mobile")
{
	var mobileno = prompt("Mobile Number");
}
else
{
	var email = prompt("Email ID");
}
var xmlhttp;
if (window.XMLHttpRequest)
  {
  xmlhttp=new XMLHttpRequest();
  }
else
  {
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
		// alert(xmlhttp.responseText);
    }
  }
if (value == "mobile")
{
	xmlhttp.open("POST","sms.php",true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send("mobileno="+mobileno+"&text="+text);
}
else
{
	xmlhttp.open("POST","php/sendMailEventDetails.php",true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send("email="+email+"&event_id="+event_id);
}
}
function jsattending(value){
var xmlhttp;
if (window.XMLHttpRequest)
  {
  xmlhttp=new XMLHttpRequest();
  }
else
  {
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    	var response = xmlhttp.responseText;
		if(response != "") {
			document.getElementById("want_to_volunteer").value= response;
			document.getElementById("want_to_volunteer").type = "text";
			var element = document.getElementById("persons");
			element_number = parseFloat(element.innerHTML);
			element_number++;
			
			if(isNaN(element_number)){
				element_number = 1;
			}
			element.innerHTML = element_number;
			if(element_number == 1)
			document.getElementById("personsText").innerHTML=" likes";
			else
			document.getElementById("personsText").innerHTML=" likes";
			return true; 
		}
		else
			return false;
    }
  }
xmlhttp.open("POST","php/wantToVolunteer.php",true);
xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xmlhttp.send("value="+value);
}
</script>
</br>
<section class="extraMarTop">
<div class="container">
<div class="row row-inner">
    <div class="span8">
        <div class="span3 top-selling-albums" style="width:235px; margin-left:0px">
        <div class="element">
        <div class="box" >
        <div style="border:1px solid #a1a1a1;">
        <?php
      if(file_exists("images/events/event_$results[event_id].jpg"))
	  	echo "<img src=\"images/events/event_$results[event_id].jpg\" width=\"232px\" height=\"232px\">";
      else{
           $rand = rand(1,9);
           $file = "images/coverscroll/volunteer_0" . $rand . ".jpg";
                echo "<img src= $file width=\"232px\" height=\"232px\">"; 
        }
	?>
        </div>
        </div>
        </div>
        </div> 
        <div style="float: left;height: 232px;width: 320px;margin: 2px;overflow: hidden;position: relative;color: #222;">
         <div style="font-size: 18px; color: #F26322;padding-top: 3px;padding-left:5px;background-color:#E4E4E4;height:30px">
         <?php echo strtoupper(htmlspecialchars( $results['title']))?>
         <div style="float:right; padding-top:0px; width:inherit; height:inherit">
         <?php
            $query=mysql_query("SELECT u.email FROM `users` u,`event_user` e WHERE e.event_id='$_GET[eventId]' and u.user_id=e.user_id");
      	    $count=mysql_num_rows ($query);
      	    if($count > 0){
      	    if($count ==1){ ?>
            
      	    <label style="display:initial; font-size: 14px; color: #000000;" id="persons"><?php echo $count ?> Like</label> 
      	    <?php
      	    }else{
      	    ?>
      	    <label style="display:initial;font-size: 14px; color: #000000;" id="persons"><?php echo $count ?> Likes</label>
          <?php } }else{ ?>
           <label style="display:initial;font-size: 14px; color: #000000;" id="persons">0 Likes </label>
          <?php } 
          echo "<img src=\"images/img/likes.png\" width=\"25px\" height=\"30px\">";?> </tb>
          <?php
          $query = mysql_query("select user_id from user_organisation where organisation_id = (select organisation_id from events where event_id='$_GET[eventId]')");
             $row = mysql_fetch_assoc($query);
             $result_org = $row['user_id'];
             if($result_org == $_SESSION['user_id'])
             {
             ?>
           <a href=".?action=editEvent&eventId=<?php echo $_GET['eventId'];?>">
          <?php echo "<img src=\"images/img/editBtn.png\" width=\"25px\" height=\"30px\">" ?></a>
          <?php } ?>
         </div>
         </div>
          </br>
          <div style="font-size: 20px; color: #000000; padding-left:15px;font-family:Arial">
            <?php echo date("j", strtotime($results['fromdate']))?> - <?php echo date("j", strtotime($results['todate']))?> 
            <?php echo date("M y", strtotime($results['fromdate']))?>    
          </div>
         
          </br>
          <div style="font-size: 14px; color: #000000;padding-left:15px;">
          <?php echo "<img src=\"images/img/venue.jpg\" width=\"15px\" height=\"20px\">"; echo " "; echo $results['area']; ?>
        </div>
         
          <div style="font-size: 14px; color: #000000; padding-left:30px;word-wrap:break-word;">
                <?php echo $results['address']?>
          </div>
          </br>
          <div style="font-size: 14px; color: #000000;float:middle;padding-left:5px;background-color:#E4E4E4;height:18px">
            About Organiser
          </div>
          </br>
            <div style="font-size: 14px; color: #000000;">
       Organisation Name : <?php echo $results['name']?>
      </div>
      <div style="font-size: 14px; color: #000000;">
      Website : <a href="<?php echo $results['website']?>"><?php echo $results['website']?></a>
      </div>
          </br>
          
           
          </div>
          <div  style="float:left;height: 232px;width: 150px;margin: 2px;overflow: hidden;position: relative;color: #222;">
             <div style="font-size: 12px; color: #F26322;padding-top: 3px;padding-left:5px;background-color:#E4E4E4;height:25px; border:1px solid #a1a1a1;">
               <?php echo "<a href=\"https://www.google.com/calendar/event?action=TEMPLATE&hl=en&text=$title&dates=$from\%2F$to&location=$venue&ctz=Asia%2FCalcutta&details=$description\" target=\"_blank\">
<label>Add to Google Calendar</label></a>";?>
             </div>
             <div style="font-size: 12px; color: #F26322;padding-top: 3px;padding-left:30px;float:middle;background-color:#E4E4E4;height:25px; border:1px solid #a1a1a1;">
              <a href="#" onclick="sendsms('mobile', <?php echo $_GET['eventId']; ?>)">Sms this!</a>
             </div>
             <div style="font-size: 12px; color: #F26322;padding-top: 3px;padding-left:30px;float:middle;background-color:#E4E4E4;height:25px; border:1px solid #a1a1a1;">
               <a href="#" onclick="sendsms('email', <?php echo $_GET['eventId']; ?>)">Email this!</a>
             </div>
             &nbsp;
             <div>
             <?php
             if($result_org != $_SESSION['user_id'])
             {
      if($_SESSION['loggedin']== "yes")
      {
      	
      	$query = mysql_fetch_array(mysql_query("select event_id from event_user where event_id = '$_GET[eventId]' and user_id = '$_SESSION[user_id]'"));
      	if (!isset($query['event_id']))
      	{?>
      		<input type="button" class="want_to_volunteer btn sub-btn" id="want_to_volunteer" name="want_to_volunteer" value="Want to Volunteer" onclick="jsattending(<?php echo $_GET[eventId];?>)">
      	<?php
      	}
      	else
      	{?>		
      	<input type="button" class="want_to_volunteer btn sub-btn" id="want_to_volunteer" name="want_to_volunteer" value="I am volunteering">
        <?php
        }
      } 
}?>
          </div>
          </br>
          <?php
             if($result_org == $_SESSION['user_id'])
             {
              ?>
           <div style="font-size: 12px; color: #F26322;padding-top: 3px;padding-left:5px;background-color:#E4E4E4;height:25px; border:1px solid #a1a1a1;">
          <a href="./message.php?action=broadcast&eventId=<?php echo $results[event_id]?>"> <img src="images/img/email.png" width="20px" height="20px">Broadcast message</a>
          </div>
         <?php } ?>
          </div>
           <div  style="float:left;height: 232px;width: 220px;margin: 2px;overflow: hidden;position: relative;color: #222;">
           <div style="font-size: 14px; color: #000000;padding-top: 3px;padding-left:5px;background-color:#E4E4E4;height:25px;">
           Contact Details
           </div>
           <div style="font-size: 14px; color: #000000;padding-top:3px">
            <?php echo "<img src=\"images/img/phone.png\" width=\"15px\" height=\"25px\">";
            $count_phone = 0;
            foreach ($cons as $value) {
             if ($count_phone != 0)
                 echo "/";
             echo "\t $value[1] \t\t";
             $count_phone = $count_phone + 1;
            }
            ?>
           </div>
           </br>
           <div style="font-size: 14px; color: #000000;">
            <?php echo "<img src=\"images/img/email.png\" width=\"20px\" height=\"20px\">";
            foreach ($cons as $value) {
             echo "\t $value[2] \t\t";
            }
            ?>   
          </div> 
          </br>
                 
 </div>
    <!-- band banner end here -->
</div>
</div>
</br>
<div class="span8">
      <div style="font-size: 14px; color: #000000;float:middle;padding-left:5px;background-color:#E4E4E4;height:18px">
      Event Description
      </div>
     </br>
     <div style="font-size: 14px; color: #000000;word-wrap:break-word;">
     <?php echo $results['description']?>
     </div>
</div>
<div class="span8">
</br>
      <div style="font-size: 14px; color: #000000;float:middle;padding-left:5px;background-color:#E4E4E4;height:18px">
Share Your Experience Here
       </div>
     
   <div class="fb-comments" data-numposts="5" data-href="www.volunteerninja.com/?action=viewEvent&eventId=<?php echo $_GET['eventId']; ?>" data-colorscheme="light">
</div>
</div>
</div>
</div>

<?php include "templates/include/footer_new.php" ?>
</div>
</section>