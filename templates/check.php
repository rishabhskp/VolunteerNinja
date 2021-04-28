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
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>

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
		alert(xmlhttp.responseText);
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
alert("check")
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

function loginDetail()
{
  alert("First Login");
  document.getElementById("customLogin").style.display = "";
  return true;
}
</script>

      <h1 style="width: 75%;"><?php echo htmlspecialchars( $results['title'])?></h1>
      <?php
      if(file_exists("images/events/event_$results[event_id].jpg"))
	  	echo "<img src=\"images/events/event_$results[event_id].jpg\" width=\"100px\">";
	?>
      <div style="width: 75%;font-style: italic;"><?php echo $results['description']?></div>




	<p class="pubDate">Date :  <?php echo date("j M Y", strtotime($results['fromdate']))?> to <?php echo date("j M Y", strtotime($results['todate']))?></p>
      <?php echo "<a href=\"https://www.google.com/calendar/event?action=TEMPLATE&hl=en&text=$title&dates=$from\%2F$to&location=$venue&ctz=Asia%2FCalcutta&details=$description\" target=\"_blank\">Add to Google Calendar</a>";?>
      <p><a href="#" onclick="sendsms('mobile', <?php echo $_GET['eventId']; ?>)">Sms this!</a><p>
      <p><a href="#" onclick="sendsms('email', <?php echo $_GET['eventId']; ?>)">Email this!</a><p>
      <p>Organisation <br/>
     	 <div style="width: 75%;"><?php echo $results['name']?></div>
     	 <div style="width: 75%;">Website : <a href="<?php echo $results['website']?>"><?php echo $results['website']?></a></div>
      </p>
      <p>Address <br/>
      	<div style="width: 75%;">Venue : <?php echo $results['venue']?></div>
      	<div style="width: 75%;">Address : <?php echo $results['address']?></div>
      </p>
      <p>Contact Information<br/>
      	<?php foreach ($cons as $value) {
    	echo "Name : $value[0] Ph: $value[1] email: $value[2]<br />\n"; } ?>
      </p>
      
      <?php
      if($_SESSION['loggedin']== "yes")
      {
      	$query = mysql_fetch_array(mysql_query("select event_id from event_user where event_id = '$_GET[eventId]' and user_id = '$_SESSION[user_id]'"));
      	if (!isset($query['event_id']))
      	{?>
      		<input type="button" class="want_to_volunteer" id="want_to_volunteer" name="want_to_volunteer" value="Want to Volunteer" onclick="jsattending(<?php echo $_GET[eventId];?>)">
      	<?php
      	}
      	else
      	{?>		
      	<input type="text" class="want_to_volunteer" id="want_to_volunteer" name="want_to_volunteer" value="I am volunteering this">
        <?php
        }
      }
      else
      {?>
                <button class="btn btn-primary btn-lg want_to_volunteer" id="want_to_volunteer" name="want_to_volunteer" data-toggle="modal" data-target="#myModal"> Want to Volunteer </button> 

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>   
 		<!-- <input type="button" class="want_to_volunteer" id="want_to_volunteer" name="want_to_volunteer" value="Want to Volunteer" onclick="loginDetail()"> -->
       <?php  } ?>
       
      <p><a href="./">Return to Homepage</a></p>
   <div class="fb-comments" data-numposts="5" data-href="www.volunteerninja.com/?action=viewEvent&eventId=<?php echo $_GET['eventId']; ?>" data-colorscheme="light"></div>
</div>

<?php include "templates/include/footer_new.php" ?>