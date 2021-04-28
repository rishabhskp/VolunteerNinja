<?php

class User{

	public $id=null;
	public $name=null;
	public $email_id=null;
	public $password=null;
	public $image=null;
	public $phone=null;
	public $company=null;
	public $role=null;
	public $interest=null;
	public $availability=null;
	
	
	public function __construct( $data=array() ) {
		if ( isset( $data['id'] ) ) $this->id = (int) $data['id'];
		if ( isset( $data['name'] ) ) $this->name = (String) $data['name'];
		if ( isset( $data['email_id'] ) ) $this->email_id = $data['email_id'];
		if ( isset( $data['image'] ) ) $this->image = $data['image'];
		if ( isset( $data['password'] ) ) $this->password = $data['password'];
		if ( isset( $data['phone'] ) ) $this->phone = $data['phone'];
		if ( isset( $data['company'] ) ) $this->company = $data['company'];
		if ( isset( $data['role'] ) ) $this->role = $data['role'];
		if ( isset( $data['interest'] ) ) $this->interest = $data['interest'];
		if ( isset( $data['availability'] ) ) $this->availability = $data['availability'];
	}
	
	public function createObject( $data=array() ) {
		if ( isset( $data['USER_ID'] ) ) $this->id = (int) $data['USER_ID'];
		if ( isset( $data['USER_NAME'] ) ) $this->name = (String) $data['USER_NAME'];
		if ( isset( $data['EMAIL_ID'] ) ) $this->email_id = $data['EMAIL_ID'];
		if ( isset( $data['USER_IMAGE'] ) ) $this->image = $data['USER_IMAGE'];
		if ( isset( $data['PASSWORD'] ) ) $this->password = $data['PASSWORD'];
		if ( isset( $data['USER_PHONE'] ) ) $this->phone = $data['USER_PHONE'];
		if ( isset( $data['COMPANY'] ) ) $this->company = $data['COMPANY'];
		if ( isset( $data['ROLE'] ) ) $this->role = $data['ROLE'];
		if ( isset( $data['INTEREST'] ) ) $this->interest = $data['INTEREST'];
		if ( isset( $data['AVAILABILITY'] ) ) $this->availability = $data['AVAILABILITY'];
	}
	
	public function storeFormValues ( $params ) {

    // Store all the parameters
    $this->__construct( $params );

	}
	
	public function insert() {
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "INSERT INTO USERS(USER_ID,USER_NAME,EMAIL_ID,PASSWORD,USER_IMAGE,USER_PHONE,COMPANY,ROLE,INTEREST,AVAILABILITY) VALUES (:id,:name,:email_id,:password,:image,:phone,:company,:role,:interest,:availability)";
		$st = $conn->prepare ( $sql );
		$st->bindValue( ":id", $this->id);
		$st->bindValue( ":name", $this->name);
		$st->bindValue( ":email_id", $this->email_id);
		$st->bindValue( ":image", $this->image);
		$st->bindValue( ":password", $this->password);
		$st->bindValue( ":phone", $this->phone);
		$st->bindValue( ":company", $this->company );
		$st->bindValue(":role",$this->role);
		$st->bindValue(":interest",$this->interest);
		$st->bindValue(":availability",$this->availability);
		echo $st->execute();
	}
	
	public static function getById( $user_id ) {
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM USERS WHERE USER_ID = :user_id";
		$st = $conn->prepare( $sql );
		$st->bindValue( ":user_id", $user_id);
		$st->execute();
		$row = $st->fetch();
		$conn = null;
		if ( $row ){
			$user=new User ;
			$user->createObject($row);
			return $user;
		}
	}
	
	public static function authenticate( $name,$password ) {
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM USERS WHERE USER_NAME = :name and PASSWORD=:password";
		$st = $conn->prepare( $sql );
		$st->bindValue( ":name", $name);
		$st->bindValue( ":password", $password);
		$st->execute();
		$row = $st->fetch();
		$conn = null;
		if ( $row ){
			$user=new User ;
			$user->createObject($row);
			return $user;
		}
	}
}

?>