<?php 
error_reporting(0);
session_start(); 
$text = rand(100000,999999); 
$_SESSION["vercode"] = $text; 
$height = 25; 
$width = 65; 
  
$image_p = imagecreate($width, $height); 
$black = imagecolorallocate($image_p, 255, 255, 255); 
$white = imagecolorallocate($image_p, 0, 0, 0); 
$font_size = 15; 
  
imagestring($image_p, $font_size, 5, 5, $text, $white); 
imagejpeg($image_p, null, 80); 
session_write_close();
?>