<?php

include('config.php');
error_reporting(0);
if(@$_REQUEST['hdnCmd']=="ADDPHOTO")
	{
	//define('UPLOAD_PATH', '../images/products/');
	$image_Urls=($_REQUEST['imageArray']);
	$images= json_decode($image_Urls);
	// for ($x = 0; $x < count($images); $x++){
	// 	$imageUrl=($images[$x]);
    // }
	$photo_name = ($_REQUEST['photo_name']);
	//printf($photo_name);
	$category_id = $_REQUEST['category_id'];
	//printf ($category_id);
	$description = $_REQUEST['description'];
	//printf($description);
	$msquery="INSERT INTO  tb_products ( photo_name, cat_id ,is_active,photo_path, description ) Values ('".$photo_name."','".$category_id."',  '1', 'xyz','".$description."' )";
	mysqli_query($mysqliconn,$msquery);
    
	//return type id
   $lastInsertedRowId="SELECT id FROM tb_products ORDER BY id DESC LIMIT 1";
   $id= mysqli_query($mysqliconn,$lastInsertedRowId);
   while($rows=mysqli_fetch_array($id))
   {
   $productId=$rows['id'];
   }

	//var_dump($catId);
   
   for ($x = 0; $x < count($images); $x++){
	$imgSqlquery="INSERT INTO  tb_images (url,cat_id,product_id,status) Values('".$images[$x]."','".$category_id."','".$productId."','1')";
	
	$result=mysqli_query($mysqliconn,$imgSqlquery);
	
	
	}
	

	echo "<script>document.location.href='category_master_photo.php'</script>";
	}
   if(@$_REQUEST['hdnCmd']=="delete")
	{
	mysqli_query($mysqliconn,"update tb_products set is_active = '0' WHERE id=".round($_REQUEST['id']));
	echo "<script>document.location.href='category_master_photo.php'</script>";
	}
	

?>

<style>
#catimageplaceholder{
	width:100px;
	height:100px;
}
#dropbox { 
  border: 4px dashed #ccc; 
  padding-left: 8px;
}
.my-form {
  margin-top: 10px;
}
.gallery {
  margin: 10px;
}
.gallery img {
  margin-left: 16px;
}
.progress-bar{
  width: 200px;
  position: relative;
  height: 8px;
  margin-top: 4px;
}
.progress-bar .progress{
  height: 8px;
  background-color: #ff0000;
  width: 0;
}
#uploadFile{
	height:200px;
}
table{
	margin:0 auto;
}

</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
     <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Stella-Blankets</a>
    </div>
    <ul class="nav navbar-nav">
      <li class=""><a href="category_master.php">Category</a></li>
      <li class=""><a href="category_master_photo.php">Products</a>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <!-- <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li> -->
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Log-out</a></li>
    </ul>
  </div>
</nav>
<!-- <div class="row">
<div class="col-md-3">
</div>
</div>
<div class="col-md-3">
<a href="category_master.php" class="btn btn-default btn-sm push_button"><img src='https://tse1.mm.bing.net/th?id=OIP.iZDvXk4JzKXh0qlslQ36dwHaHa&pid=Api&P=0&w=300&h=300' height=40><br/>Category</a>
</div>
<div class="col-md-3">
<a href="category_master_photo.php" class="btn btn-default btn-sm push_button"><img src='https://tse1.mm.bing.net/th?id=OIP.nhTSeonhq_rbjpYQ_toMGwHaHa&pid=Api&P=0&w=300&h=300' height=40><br/>Product</a>
</div>
<div class="col-md-3">
<a href="logout.php" class="btn btn-default btn-sm push_button"><img src='https://comps.canstockphoto.com/administration-and-computer-mouse-picture_csp10524671.jpg' height=40><br/>logout</a>
</div>
</div> -->
 <div class="col-sm-12">
 <div class="panel panel-info">
      <div class="panel-heading"><h3 class="text-center">Category Product Master</h3></div>
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
			<select name="category_id" class="form-control" style="width: 100%;">
			<option value="">None</option>
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
			<input type="text" name="description" class="form-control" style="width: 100%;" required="">
		</div>
	</div>
	  <br>
	<div class="row">
		<div class="col-sm-2">
			<div class="form-group">
				<label for="exampleInputEmail2">Select Product : </label>
			</div>
		</div>
	<div id="uploadFile" class="col-sm-3">
	<div id="dropbox">
  

  <form class="my-form">
    <div class="form_line">
      <h4>Choose File</h4>
      <div class="form_controls">
        <div class="upload_button_holder">
          <input type="file" id="fileElem" multiple accept="image/*" style="display:none" onchange="handleFiles(this.files)">
          <a href="#" id="fileSelect">Select some files</a>&nbsp;&nbsp;
          <a href="#" id="urlSelect">URL Upload</a>
        </div>
      </div>
    </div>
  </form>
  <div class="progress-bar" id="progress-bar">
    <div class="progress" id="progress"></div>
  </div>
  <div id="gallery" />
</div>
	<input type="hidden"  id="imageArrayInput" name="imageArray" value=" "/>
</div>
	</div>
	<br/>
	<div id="addButton" class="row">
		<div class="col-sm-2">
			<div class="form-group">
				<button type="submit" class="btn btn-success"  >Add Product</button>
			</div>
		</div>
	</div>
</form>

<div class="row">
		<div class="col-sm-2">
				<img id="productImageplaceholder"  src=" ">
		</div>
</div>
	
	
    </div>
    </div>
    </div> <!-- /container -->
		
<table class="table table-striped table-hover table-bordered" style="width:625px; ">
<thead>
<tr>
<th style="width:20px;">SR</th>
<th style="width:300px;">Product Name</th>
<th style="width:0;">Product</th>
<th style="width:150px;">Update</th>
</tr>
</thead>
<tbody>
				
			<?php
					$n=1;
					$sql="SELECT * FROM tb_products where is_active  =1";
					$result=mysqli_query($mysqliconn,$sql);
					while($rows=mysqli_fetch_array($result)){
					?>			
<tr>
<td><?php echo $n; $n++; ?></td>
<td><?php echo $rows['photo_name']; ?></td>
<td><img height=300px src = "../images/products/<?php echo $rows['photo_path']; ?> " /></td>
<td>



<a href="category_master_photo.php?hdnCmd=delete&id=<?php echo $rows['id']; ?>" onClick="return confirm('Are you want to sure Delete Product');" class="btn btn-danger" role="button"><span class="glyphicon glyphicon-remove-circle"></span> Delete</a>
</td>
</tr>
		  <?php
			}
		?>	
</table>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">

// $(function(){
//         $('#file').change(function(){
// 			console.log("called")
//             var input = this;
//             var url = $(this).val();
//             var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
//             if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg"))
//             {
//                 var reader = new FileReader();

//                 reader.onload = function (e) {
//                     //alert(e.target.result)
//                     $('#productImageplaceholder').append(`<img  src="../images/products/">`).attr('src', e.target.result);
//                 }
//                 reader.readAsDataURL(input.files[0]);
//             }
//             else
//             {
//                 $('#catimageplaceholder').attr('src', '/assets/no_preview.png');
//             }
//         });

//     });

// 	function popUpClosed() {
//     window.location.reload();
// 	}
	
// function cloudnaryImageUpload(){
// 	console.log("cloudnary")
// 	$.cloudinary.config({cloud_name:'cloudstechno', api_key:'366815894259196'});
//           $.ajax({
//            url: 'https://cloudinary.com/console/c-c76971703b2d768fc73866c3d96959/media_library/folders/'+ e.target.result,
//            type: 'POST',
//            success: function (response) {
//                $('#productImageplaceholder').attr('data-form-data', response);
//            }
//        });
// }


const cloudName = 'demo';
const unsignedUploadPreset = 'doc_codepen_example';

var fileSelect = document.getElementById("fileSelect"),
  fileElem = document.getElementById("fileElem"),
    urlSelect = document.getElementById("urlSelect");

fileSelect.addEventListener("click", function(e) {
  if (fileElem) {
    fileElem.click();
  }
  e.preventDefault(); // prevent navigation to "#"
}, false);

urlSelect.addEventListener("click", function(e) {
  uploadFile('https://res.cloudinary.com/demo/image/upload/sample.jpg')
  e.preventDefault(); // prevent navigation to "#"
}, false);


// ************************ Drag and drop ***************** //
function dragenter(e) {
  e.stopPropagation();
  e.preventDefault();
}

function dragover(e) {
  e.stopPropagation();
  e.preventDefault();
}

dropbox = document.getElementById("dropbox");
dropbox.addEventListener("dragenter", dragenter, false);
dropbox.addEventListener("dragover", dragover, false);
dropbox.addEventListener("drop", drop, false);

function drop(e) {
  e.stopPropagation();
  e.preventDefault();

  var dt = e.dataTransfer;
  var files = dt.files;

  handleFiles(files);
}

// *********** Upload file to Cloudinary ******************** //
var imageArray=[];
function uploadFile(file) {
  var url = `https://api.cloudinary.com/v1_1/cloudstechno/upload`;
  var xhr = new XMLHttpRequest();
  var fd = new FormData();
  xhr.open('POST', url, true);
  xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
   document.getElementById('progress').style.width = 0;
  xhr.upload.addEventListener("progress", function(e) {
    var progress = Math.round((e.loaded * 100.0) / e.total);
    document.getElementById('progress').style.width = progress + "%";
    console.log(`fileuploadprogress data.loaded: ${e.loaded},
  data.total: ${e.total}`);
  });

  xhr.onreadystatechange = function(e) {
    if (xhr.readyState == 4 && xhr.status == 200) {
      var response = JSON.parse(xhr.responseText);
      var url = response.secure_url;
      var tokens = url.split('/');
      tokens.splice(-2, 0, 'w_150,c_scale');
      var img = new Image(); // HTML5 Constructor
      img.src = url;//tokens.join('/');
	  img.style.height = '100px';
	  img.style.width = '100px';
      img.alt = response.public_id;
      document.getElementById('gallery').appendChild(img);
	  imageArray.push(img.src);
	  //console.log( imageArray);
	 
		 // console.log(imageArray[i])
		$('input[name="imageArray"]').val(JSON.stringify(imageArray));
		var array=$('input[name="imageArray"]').val();
        console.log(JSON.parse(array));
		//document.getElementById('imageArrayInput').value
	  
    }
  };


  fd.append('upload_preset', 'stellaproducts');
  fd.append('tags', 'browser_upload'); // Optional - add tag for image admin in Cloudinary
  fd.append('file', file);
  xhr.send(fd);
}

// *********** Handle selected files ******************** //
var handleFiles = function(files) {
  for (var i = 0; i < files.length; i++) {
    uploadFile(files[i]); // call the function to upload the file
  }
};
</script>
<?php
include('footer.php');
?>