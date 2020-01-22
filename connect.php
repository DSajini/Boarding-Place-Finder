<?php

define('DB_NAME', 'boarding_place_finder');
define('DB_USER', 'root');
define('DB_PASSWORD', '1234');
define('DB_HOST', 'localhost');

$link = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD);

if(!$link){
    die('Could not connect:'.mysqli_error());
}

$db_selected = mysqli_select_db($link,DB_NAME);

if(!$db_selected){
    die('Can\'t use'.DB_NAME.':'.mysql_error());
}

//echo 'Connected Succcessfully';

?>