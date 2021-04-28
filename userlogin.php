<?php
require( "config.php" ); 
session_start();
 
echo ("hello world");

/*
$action = isset( $_GET['action'] ) ? $_GET['action'] : "";
$username = isset( $_SESSION['username'] ) ? $_SESSION['username'] : "";
/*
if ( $action != "userlogin" && $action != "userlogout" && !$username ) {
  login();
  exit;
}

switch ( $action ) {
  case 'userlogin':
    login();
    break;
}

function login {
$emailid = $_POST['emailid'];
$password = $_POST['password'];


$results = array();
  $results['pageTitle'] = "Admin Login | Volunteer Ninja";

$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
$sql = "SELECT * FROM USERS WHERE EMAIL_ID= '"$emailid"' AND PASSWORD= '"$password;
$st = $conn->prepare ( $sql );
$totalRows = $conn->query( $sql )->fetch();
    $conn = null;
    return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
if ($totalRows[0] == 0)
	"Incorrect username or password. Please try again.";


$st = $conn->prepare ( $sql );

}
*/
?>