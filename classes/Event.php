<?php
class Event {	
   public static function getById( $event_id ) {
   	$result=mysql_query( "SELECT * FROM events WHERE event_id = $event_id");
	if ($row=mysql_fetch_array($result)){
		$result=mysql_query( "SELECT * FROM organisations WHERE organisation_id = $row[organisation_id]");
		if ( $org=mysql_fetch_array($result) ){
			$row=array_merge($row, $org);
		}
		$result=mysql_query( "SELECT * FROM venue WHERE venue_id = $row[venue_id]");
		if ( $venue=mysql_fetch_array($result) ){
			$row=array_merge($row,$venue);
		}
		return $row;
	}
   }
   
}
?>