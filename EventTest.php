<?php

require( "config.php" );
/*z$data=array("id"=>"30","name"=>"37","description"=>"ffhfjffgj","image"=>"","date"=>date("Y/m/d"),"time"=>"11:30","organization"=>"MAD","address_id"=>"300");
$events=new Event;
$events->storeFormValues($data);
$events->insert();
$data=array("id"=>"10","name"=>"Ashu","email_id"=>"a@a.a","password"=>"pass","image"=>"","phone"=>"98765","company"=>"1","role"=>"1","interest"=>"1","availability"=>"2");
$user=new User;
$user->storeFormValues($data);
$user->insert();*/
$event = Event::getById('1');
print_r($event);
$user = User::getById('1');
print_r($user);
$user = User::authenticate('ds','1');
if($user){
print_r($user);
}
else
echo "NOT AUTHENTIC";


?>