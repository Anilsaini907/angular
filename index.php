<!DOCTYPE html>
<html class="no-js" lang="en">

<?php
include_once('admin/config.php'); 
 $catsql="SELECT * FROM tb_category where is_active  =1";
$allproducts=array();
$categories=array();
 if (!empty($mysqliconn)) {
     $categories=mysqli_query($mysqliconn,$catsql);
     while($rows=mysqli_fetch_array($categories)){
     //var_dump($rows);
        array_push($allcats,$rows);

     }
 }
 
 $allcats=json_encode($allproducts);
//ini_set('display_errors', 1);

include('header.php');
include('slider_home.php');
include('carousel_category.php');
include('home_products_section.php');

include('footer.php');
//error_reporting(2);
?>
</body>
</html>

