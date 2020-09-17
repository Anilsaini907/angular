
<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<link rel="stylesheet" href="css/main.css">

</head>
<body>
<?php

include('config.php');

	  				
error_reporting(0);
if(@$_REQUEST['hdnCmd']=="ADD")
	{
		
	$category_name = ($_REQUEST['category_name']);
	$sql = mysqli_query($mysqliconn,"INSERT INTO tb_category (	category_name,is_active ) Values ('".$category_name."',1)");
	
	
	//echo "<script>alert('add successfully');document.location.href='category_master.php'</script>";
	}
	if(@$_REQUEST['hdnCmd']=="delete")
	{
		
		mysqli_query($mysqliconn,"update tb_category set is_active = 0 WHERE id=".round($_REQUEST['id']));
		//echo "<script>document.location.href='category_master.php'</script>";
	}
	if($_REQUEST['hdnCmd']=="edit" )
	{
		
			mysqli_query($mysqliconn,"update tb_category set category_name = '".$_REQUEST['category_name']."' WHERE id=".round($_REQUEST['id']));
			//echo "<script>alert('update successfully');<script>document.location.href='category_master.php'</script>";
	}
?>
<div class="row">
<div class="col-md-3">
</div>
<div class="col-md-3">
<a href="category_master.php" class="btn btn-default btn-sm push_button"><img  height=40 width=70><br/>Category</a>
</div>
<div class="col-md-3">
<a href="category_master_photo.php" class="btn btn-default btn-sm push_button"><img height=40 width=70><br/>Category Photos</a>
</div>
<div class="col-md-3">
<a href="logout.php" class="btn btn-default btn-sm push_button"><img  height=40 width=70><br/>logout</a>
</div>
</div>
<h3>Category Master</h3>

	<?php
					$n=1;
					$sql="SELECT * FROM tb_category where is_active  =1 and id = '".$_REQUEST['id']."'";
					$result=mysqli_query($mysqliconn,$sql);
					$rows=mysqli_fetch_array($result);
					?>		
					
 <div class="col-sm-12">
 <div class="panel panel-info">
      <div class="panel-heading">Add Category</div>
      <div class="panel-body">
<form class="form-horizontal" role="form" action="category_master.php" method="post">

<input type="hidden" name="hdnCmd" value="<?php 
		if($_REQUEST['hdnCmd']==null) 
		{ echo 'ADD'; } 
		else 
		{ echo edit; }  
	?>" > 
<input type="hidden" name="id" value="<?php echo $_REQUEST['parent_id ']; ?>" > 
 <div class="form-group">
 
      <label class="control-label col-sm-2" >Category Name:</label>
      <div class="col-sm-2">
         <input type="text" name="category_name" class="form-control" required value ="<?php echo $rows['category_name'] ?>"  />
	  </div>
	  
<?php 

//$php_var = $_GET['js_var'];
$selected_id=0;
$depth+=1;
$allcategories=array();
$subcategories= array(array());
$catsql= "SELECT * FROM tb_category";
$catresult=mysqli_query($mysqliconn,$catsql);
while($row=mysqli_fetch_array($catresult)){
array_push($allcategories,$row);
$alldata = json_encode($allcategories);}
?>
<div class="col-sm-2 col-lg-2" class="form-group">
<label for="category_name">Parent-catogery:</label>
<select id="catogeries"  tag="0" onchange="onchanngecat(0)"> 
<option value="value" selected>Select Category</option>
<?php foreach($allcategories as $row){
?>
<?php if($row['parent_id']==$selected_id){?>

<option value="<?= $row['id']; ?>"><?= $row['category_name']; ?></option>
<?php } ?>
<?php } ?>
</select>
</div>

<div id="mydiv1" class="col-sm-2 col-lg-2" class="form-group">
<label for="category_name">Sub-catogery:</label>
</div>

<div id="mydiv2" class="col-sm-2 col-lg-2" class="form-group">
<label for="category_name">Sub-Sub-catogery:</label>
</div>


<button type="submit" class="btn btn-primary">Add Category</button>
</form>
</div>
</div>
</div>
<div class="col-md-3">
</div>

<table class="table table-striped table-hover table-bordered" style="width:625px;">
<thead>
<tr>
<th style="width:20px;">SR</th>
<th style="width:150px;">Category Name</th>
<th style="width:150px;">Update</th>
</tr>
</thead>
<tbody>
				
			<?php
					$n=1;
					$sql="SELECT * FROM tb_category where is_active  =1";
					$result=mysqli_query($mysqliconn,$sql);
					while($rows=mysqli_fetch_array($result)){
					?>			
<tr>
<td><?php echo $n; $n++; ?></td>
<td><?php echo $rows['category_name']; ?></td>
<td>
<a href="category_master.php?hdnCmd=edi&id=<?php echo $rows['id']; ?>"class="btn btn-default btn-xs " role="button"><span class="glyphicon glyphicon-remove-circle"></span> Edit</a>
<a href="category_master.php?hdnCmd=delete&id=<?php echo $rows['id']; ?>" onClick="return confirm('Are you want to sure Delete Information');" class="btn btn-default btn-xs " role="button"><span class="glyphicon glyphicon-remove-circle"></span> Delete</a>
</td>
</tr>
		  <?php
			}
		?>	
</table>
    </div> 
    </div> 
	</div>
    </div> <!-- /row -->
    </div> <!-- /container -->
	
<?php include('footer.php'); ?>


<script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js">
</script>

<script>
var categories = JSON.parse('<?= $alldata; ?>');
function onchanngecat(depth) {
if(depth==0)
var eID = document.getElementById("catogeries");
else if(depth==1)
var eID = document.getElementById("subselect");
else
var eID = document.getElementById("subsubselect");

var colorVal = eID.options[eID.selectedIndex].value;
addFunction(colorVal,depth)
}

function addFunction(colorVal,depth) {
	var domDiv = document.getElementById("mydiv1")
	var domDiv1 = document.getElementById("mydiv2")
	
if(depth==0)
{
	emptyDom("mydiv1")
	emptyDom("mydiv2")
}
else if (depth==1)
emptyDom("mydiv2")
var categories = JSON.parse('<?= $alldata; ?>');
var domselect = document.createElement("SELECT");

if(depth==0)
domselect.setAttribute("id", "subselect");
else
domselect.setAttribute("id", "subsubselect");
domselect.setAttribute("tag", colorVal);
domselect.setAttribute("onchange","onchanngecat("+(depth+1)+")");
for( category in categories) {
if(categories[category].parent_id==colorVal){
console.log(colorVal)
var opt=new Option(categories[category].category_name)
opt.value=categories[category].id
domselect.appendChild(opt);
}

if(depth==0)
domDiv.appendChild(domselect);
else if(depth==1)
domDiv1.appendChild(domselect);
}
}
function removeFunction(id) {
var myobj = document.getElementById(id);
myobj.remove();
}
function emptyDom(id) {
var myobj = document.getElementById(id);
myobj.innerHTML=""

}

</script>
</body>
</html>