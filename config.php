<?php
//ini_set("display_errors", 0);
//date_default_timezone_set( "Asia/Calcutta" );
define( "DB_DSN", "mysql:host=localhost;dbname=lifewafb_volunteerninja" );
define( "DB_USERNAME", "lifewafb_main" );
define( "DB_PASSWORD", "thisisit4" );
define( "CLASS_PATH", "classes" );
define( "TEMPLATE_PATH", "templates" );
define( "HOMEPAGE_NUM_ARTICLES", 5 );
define( "ADMIN_USERNAME", "admin" );
define( "ADMIN_PASSWORD", "mypass" );
require( CLASS_PATH . "/Article.php" );
require( CLASS_PATH . "/Event.php" );
require( CLASS_PATH . "/User.php" );

/*function handleException( $exception ) {
  echo "Sorry, a problem occurred. Please try later.";
  error_log( $exception->getMessage() );
}

set_exception_handler( 'handleException' );*/
?>