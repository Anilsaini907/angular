<?php

include('config.php');
error_reporting(0);
if(@$_REQUEST['hdnCmd']=="ADDPHOTO")
	{
	define('UPLOAD_PATH', '../images/products/');
	$photo_name = ($_REQUEST['photo_name']);
	$category_name = $_REQUEST['category_name'];
	$description_name = $_REQUEST['description_name'];

	$filename = $category_name."-".$_FILES['file']['name'];
	    
	move_uploaded_file($_FILES['file']['tmp_name'], UPLOAD_PATH . $filename);
		
	$msquery="INSERT INTO  tb_category_photo (photo_name,cat_id, photo_path, is_active, description ) Values ('".$photo_name."','".$category_name."', '".$filename."', 1, '".$description_name."' )";
	mysqli_query($mysqliconn,$msquery);
	echo "<script>document.location.href='category_master_photo.php'</script>";
	}
if(@$_REQUEST['hdnCmd']=="delete")
	{
	mysqli_query($mysqliconn,"update tb_category_photo set is_active = '0' WHERE id=".round($_REQUEST['id']));
	echo "<script>document.location.href='category_master_photo.php'</script>";
	}
	

?>
     <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
<div class="row">
<div class="col-md-3">
</div>
<div class="col-md-3">
<a href="category_master.php" class="btn btn-default btn-sm push_button"><img src='../images/printer.png' height=40><br/>Category</a>
</div>
<div class="col-md-3">
<a href="category_master_photo.php" class="btn btn-default btn-sm push_button"><img src='../images/printer.png' height=40><br/>Product</a>
</div>
<div class="col-md-3">
<a href="logout.php" class="btn btn-default btn-sm push_button"><img src='../images/printer.png' height=40><br/>logout</a>
</div>
</div>
 <div class="col-sm-12">
 <div class="panel panel-info">
      <div class="panel-heading"><h3>Category Product Master</h3></div>
      <div class="panel-body">


<center>
<br/>
<form class="form-inline" role="form" action="category_master_photo.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="hdnCmd" value="ADDPHOTO">
	<div class="row">
		<div class="col-sm-2">
			<div class="form-group">
				<label for="exampleInputEmail2">Category Name : </label>
			</div>
		</div>
		<div class="col-sm-3">
			<select name="category_name" class="form-control" style="width: 100%;">
			<option value="">--</option>
			<?php
				$sql = "SELECT * FROM tb_category where is_active  =1";
				$sql_result2 = mysqli_query ($mysqliconn,$sql ) or die ('request "Could not execute SQL query" '.$sql);
				while ($row2 = mysqli_fetch_array($sql_result2)) {
					echo "<option value='".$row2["id"]."'>".$row2["category_name"]."</option>";
				}
			?>
			</select>
		</div>
	</div>

  <br>
	<div class="row">
		<div class="col-sm-2">
			<div class="form-group">
				<label for="exampleInputEmail2">Product Name : </label>
			</div>
		</div>
		<div class="col-sm-3">
			<input type="text" name="photo_name" class="form-control" style="width: 100%;" required="">
		</div>
	</div>
  <br/>
 
	<div class="row">
		<div class="col-sm-2">
			<div class="form-group">
				<label for="exampleInputEmail2">Product Description : </label>
			</div>
		</div>
		<div class="col-sm-3">
			<input type="text" name="description_name" class="form-control" style="width: 100%;" required="">
		</div>
	</div>
	  <br>
	<div class="row">
		<div class="col-sm-2">
			<div class="form-group">
				<label for="exampleInputEmail2">Select Product : </label>
			</div>
		</div>
		<div class="col-sm-3">
			<input type="file" name="file" id ="file" class="form-control"  style="width: 100%;" required="">
		</div>
	</div>
	<br/>
	<div class="row">
		<div class="col-sm-2">
			<div class="form-group">
				<button type="submit" class="btn btn-default"  >Add Product</button>
			</div>
		</div>
	</div>
</form>
	
	
    </div>
    </div>
    </div> <!-- /container -->
	
	
<table class="table table-striped table-hover table-bordered" style="width:625px;">
<thead>
<tr>
<th style="width:20px;">SR</th>
<th style="width:150px;">Product Name</th>
<th style="width:150px;">Product</th>
<th style="width:150px;">Update</th>
</tr>
</thead>
<tbody>
				
			<?php
					$n=1;
					$sql="SELECT * FROM tb_category_photo where is_active  =1";
					$result=mysqli_query($mysqliconn,$sql);
					while($rows=mysqli_fetch_array($result)){
					?>			
<tr>
<td><?php echo $n; $n++; ?></td>
<td><?php echo $rows['photo_name']; ?></td>
<td><img height=300px src = "../images/products/<?php echo $rows['photo_path']; ?> " /></td>
<td>



<a href="category_master_photo.php?hdnCmd=delete&id=<?php echo $rows['id']; ?>" onClick="return confirm('Are you want to sure Delete Product');" class="btn btn-default btn-xs " role="button"><span class="glyphicon glyphicon-remove-circle"></span> Delete</a>
</td>
</tr>
		  <?php
			}
		?>	
</table>
	<script type="text/javascript">
	 function popUpClosed() {
    window.location.reload();
}
</script>
<?php
include('footer.php');
?>