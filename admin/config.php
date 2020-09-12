<?php

date_default_timezone_set('Asia/Calcutta');
error_reporting(E_ALL);
ini_set('memory_limit', '-1');

/* Fee Database */
$host = "localhost";
$user = "root";
$password = "root";
$dbname = "stella_stella";
$conn = mysqli_connect($host, $user, $password,$dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}else{
    $mysqliconn=$conn;
    $catsql="SELECT * FROM tb_category where is_active  =1";

    $categories=mysqli_query($mysqliconn,$catsql);
}



define('BASEURL', "$_SERVER[REQUEST_SCHEME]://$_SERVER[HTTP_HOST]/");
define('BASEPATH', "$_SERVER[DOCUMENT_ROOT]/");

ini_set('max_execution_time', 0);



?>