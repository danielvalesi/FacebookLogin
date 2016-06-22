<?php

define('DB_SERVER', 'mysql.hostinger.com.br');
define('DB_USERNAME', 'u636977446_an');    // DB username
define('DB_PASSWORD', 'dleite');    // DB password
define('DB_DATABASE', 'u636977446_an');      // DB name
//$con = mysqli_connect("localhost","my_user","my_password","my_db");
$connection = mysqli_connect('mysql.hostinger.com.br', 'u636977446_an', 'dleite') or die( "Unable to connect");
$database = mysqli_select_db($connection, 'u636977446_an') or die( "Unable to select database");
?>
