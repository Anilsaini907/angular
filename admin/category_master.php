<?php

include('config.php');

	  				
error_reporting(0);
if(@$_REQUEST['hdnCmd']=="ADD")
	{

	$category_name = ($_REQUEST['category_name']);

	
	$sql = mysqli_query($mysqliconn,"INSERT INTO tb_category (	category_name,is_active ) Values ('".$category_name."',1)");
	
	
	

	
	
	echo "<script>alert('add successfully');document.location.href='category_master.php'</script>";
	}
	if(@$_REQUEST['hdnCmd']=="delete")
	{
		mysqli_query($mysqliconn,"update tb_category set is_active = 0 WHERE id=".round($_REQUEST['id']));
		echo "<script>document.location.href='category_master.php'</script>";
	}
	if($_REQUEST['hdnCmd']=="edit" )
	{
		
			mysqli_query($mysqliconn,"update tb_category set category_name = '".$_REQUEST['category_name']."' WHERE id=".round($_REQUEST['id']));
			echo "<script>alert('update successfully');<script>document.location.href='category_master.php'</script>";
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
<a href="category_master_photo.php" class="btn btn-default btn-sm push_button"><img src='../images/printer.png' height=40><br/>Category Photos</a>
</div>
<div class="col-md-3">
<a href="logout.php" class="btn btn-default btn-sm push_button"><img src='../images/printer.png' height=40><br/>logout</a>
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
	  				$allcategories=array();
					  $catsql= "SELECT * FROM tb_category";
					  $catresult=mysqli_query($mysqliconn,$catsql);
					  while($row=mysqli_fetch_array($catresult)){
						  //var_dump($row);
						  array_push($allcategories,$row);
					  }
					 //print_r($allcategories);
					//  die;
					?>	
<div class="col-sm-2" class="form-group">
  <label for="category_name">Parent catogery:</label>
   
<select > 
    <?php foreach($allcategories as $user): ?>
        <option value="<?= $user['id']; ?>"><?= $user['category_name']; ?></option>
    <?php endforeach; ?>
</select>
   
  
  </div>
  <div class="col-sm-2" class="form-group">
  <label for="category_name">Sub catogery:</label>
   
<select > 
    <?php foreach($allcategories as $user): ?>
        <option value="<?= $user['id']; ?>"><?= $user['category_name']; ?></option>
    <?php endforeach; ?>
</select>
   
  
  </div>

  <center><button type="submit" class="btn btn-primary">Add Category</button></center>
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
<a href="category_master.php?hdnCmd=edi&id=<?php echo $rows['id']; ?>" class="btn btn-default btn-xs " role="button"><span class="glyphicon glyphicon-remove-circle"></span> Edit</a>


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
	
<?php include('footer.php'); 

?>