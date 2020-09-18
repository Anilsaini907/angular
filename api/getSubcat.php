<?php
include_once('../admin/config.php');
$categoryIds=$_POST['ids'];
//var_dump($categoryIds);

$catsql= "SELECT * FROM  tb_category_photo WHERE";
for ($x = 0; $x <sizeOf($categoryIds); $x++) {
   //var_dump($categoryIds[$x]);
   if($x==sizeOf($categoryIds)-1)
   $catsql=$catsql." id = ".$categoryIds[$x];
   else
   $catsql=$catsql." id = ".$categoryIds[$x]." OR ";
}
//$catsql=$catsql." LIMIT 7";
//var_dump($catsql);

//var_dump($mysqliconn);
$products=array();
$catresult=mysqli_query($mysqliconn,$catsql);
while($row=mysqli_fetch_array($catresult)){
{
    //var_dump($row);
    array_push($products,$row);
}
$alldata = json_encode($products);
}
//echo "hello guys";
var_dump($alldata);
//echo $alldata;

?>
