<?php

class Event {

	public $id=null;
	
	public $name=null;
	
	public $description=null;
	
	public $image=null;
	
	public $organization=null;
	
	public $date=null;
	
	public $time=null;
	
	public $publish_date=null;
	
	public $address_id=null;
	
	public function __construct( $data=array() ) {
    if ( isset( $data['id'] ) ) $this->id = (int) $data['id'];
    if ( isset( $data['name'] ) ) $this->name = (String) $data['name'];
    if ( isset( $data['description'] ) ) $this->description = $data['description'];
	if ( isset( $data['image'] ) ) $this->image = $data['image'];
	if ( isset( $data['date'] ) ) $this->date = $data['date'];
	if ( isset( $data['time'] ) ) $this->time = $data['time'];
	if ( isset( $data['organization'] ) ) $this->organization = $data['organization'];
	if ( isset( $data['publish_date'] ) ) $this->date = $data['publish_date'];
	if ( isset( $data['address_id'] ) ) $this->address_id = $data['address_id'];
  }
  
  public function storeFormValues ( $params ) {

    // Store all the parameters
    $this->__construct( $params );

  }
  
  public function insert() {
    // Does the Article object already have an ID?
   // if ( !is_null( $this->id ) ) trigger_error ( "Article::insert(): Attempt to insert an Article object that already has its ID property set (to $this->id).", E_USER_ERROR );
	//echo $this;
	/*$image = $_FILES['image']['tmp_name']; //SQL Injection defence!
	$fp = fopen($image, 'r');
	$data = fread($fp, filesize($image));
	$data = addslashes($data);
	fclose($fp);*/
    // Insert the Article
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO EVENTS(EVENT_ID, EVENT_NAME, DESCRIPTION,EVENT_IMAGE, ORGANISATION_NAME, EVENT_DATE, EVENT_TIME,PUBLISH_DATE,EVENT_ADDRESS_ID ) VALUES ( :id, :name,:description,:image,:organization,:date,:time,:publish_date, :address_id)";
    $st = $conn->prepare ( $sql );
    $st->bindValue( ":id", $this->id);
    $st->bindValue( ":name", $this->name);
    $st->bindValue( ":description", $this->description);
    $st->bindValue( ":image", $this->image);
	$st->bindValue( ":organization", $this->organization);
	$st->bindValue( ":date", $this->date);
	$st->bindValue( ":time", $this->time );
	$st->bindValue(":publish_date",$this->publish_date);
	$st->bindValue(":address_id",$this->address_id);
	
	//$st->bindValue( ":image", $data, PDO::PARAM_LOB );
	echo $st->execute();
    //$this->id = $conn->lastInsertId();
	//echo $this->id;
	//echo $st->errorInfo();
   }
}

?>