<?php
include_once('../admin/config.php');
$categoryId=$_POST['ids'];
//var_dump($categoryId);
//var_dump("hiuu");
$catsql= "SELECT * FROM  tb_products WHERE cat_id = " .$categoryId;
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

}

//echo "hello guys";

echo json_encode($products);

?>
