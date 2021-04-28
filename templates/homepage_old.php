<?php include_once "templates/include/header.php";
session_start();
?>
	<script type="text/javascript"> 
//<![CDATA[

		function showResult(str)
		{
		if (str.length==0)
		{ 
		document.getElementById("results").innerHTML="";
		document.getElementById("results").style.border="0px";
		return;
		}
		if (window.XMLHttpRequest)
		{// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
		}
		else
		{
		// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function()
		{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		document.getElementById("results").innerHTML=xmlhttp.responseText;
		document.getElementById("results").style.border="1px solid #A5ACB2";
		}
		}
		xmlhttp.open("GET","get.php?q="+str,true);
		xmlhttp.send();
		}
//]]>
	</script>
<input placeholder="Search Site" type="search" onKeyUp="showResult(this.value)">
<div id="results"></div>

      <ul id="headlines">
	  <?php
	  	$result=mysql_query("SELECT distinct category FROM events");
	  	while ($myrow = mysql_fetch_array($result)){	
	  	?><br/>
	  	<h1><?php echo $myrow[0]?></h1>
	  	<?php
	  	$events=array();
	  	$events=mysql_query("SELECT event_id, title, fromdate, description FROM events WHERE category='$myrow[0]' ORDER BY fromdate");
	  	while($row = mysql_fetch_array($events)){
	  		$fromdate = date("j M Y", strtotime($row['fromdate']));
	  ?>

        <li>
          <h2>
            <span class="pubDate">
            <?php echo $fromdate;?>
          </span><a href=".?action=viewEvent&eventId=<?php echo $row['event_id'];?>"><?php echo htmlspecialchars($row['title']);?></a>
          </h2>
          <span style="width: 75%;font-style: italic;"><?php echo $row['description'];?></span>
        </li>

<?php } }?>

      </ul>

      <p><a href="./?action=archive">Events Archive</a></p>
      
<?php include "templates/include/footer.php" ?>