<?php
require( "config.php" );
require_once("php/connect.php");
//get the q parameter from URL
$hint="";
$q=$_GET["q"];
if (strlen($q)>0)
{
	$res=mysql_query("SELECT * FROM events WHERE title LIKE '%$q%'");
	$count = mysql_num_rows($res);
	if($count > 0)
	  {
		echo '<ul>';
		while($serresult=mysql_fetch_array($res))
		{
			$hint= "<li><a href='?action=viewEvent&eventId=$serresult[event_id]'>$serresult[title]</a></li>";
			echo $hint;
		}
		echo '</ul>';
	  }
}

// Set output to "no suggestion" if no hint were found
// or to the correct values

if ($hint=="")
{
$response="no suggestion";
}
else
{
$response=$hint;
}
//output the response
