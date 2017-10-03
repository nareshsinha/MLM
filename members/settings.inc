<?php
//ini_set('dispaly_errors', 1);
error_reporting(E_ALL & ~E_NOTICE  & ~E_DEPRECATED & ~E_WARNING & ~E_STRICT);
//error_reporting(E_ALL & ~E_NOTICE);

ob_start();
session_start();
$host = 'localhost';
$user = 'system';
$pass ='manager';
$db = 'im_mlm';


$conn=mysqli_connect($host,$user,$pass, $db) or die('Could not v connect to mysql');
//mysql_select_db();
?>