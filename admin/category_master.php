
<!DOCTYPE html>
<html>
<head>
    <title>Page Title</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        img{
            width:200px;
            height:200px;
        }
        #admin img{
            width:70px;
            height:70px;
        }
        .col-sm-2 {
            margin-left:-15px;
        }
       
    </style>
</head>
<body>
<?php

include('config.php');


error_reporting(0);
if(@$_REQUEST['hdnCmd']=="ADD")
{
    define('UPLOAD_PATH', '../images/categories/');
    $category_name = ($_REQUEST['category_name']);
    $parent_id= ($_REQUEST['parent_id']);
    //$image_path=($_REQUEST['image']);
    $filename = $category_name."-".$_FILES['file']['name'];
    //var_dump($FILE);



    if(move_uploaded_file($_FILES['file']['tmp_name'], UPLOAD_PATH . $filename))
    {
        if(!isset($parent_id) || $parent_id=="")
            $parent_id=0;

        $ssql="INSERT INTO tb_category (	category_name, parent_id, is_active, image ) Values ('".$category_name."','".$parent_id."', 1, '".$filename."') ";

        $result= mysqli_query($mysqliconn,$ssql);

    }else {
        //todo write code for move failure
        echo "<script>alert('add failed');document.location.href='category_master.php'</script>";
    }

}
if(@$_REQUEST['hdnCmd']=="delete")
{

    mysqli_query($mysqliconn,"update tb_category set is_active = 0 WHERE id=".round($_REQUEST['id']));
    //echo "<script>document.location.href='category_master.php'</script>";
}
if($_REQUEST['hdnCmd']=="edit" )
{
    define('UPLOAD_PATH', '../images/categories/');
    $category_name = ($_REQUEST['category_name']);
    $parent_id= ($_REQUEST['parent_id']);
    //$image_path=($_REQUEST['image']);

    if(isset($_FILES['file']))
        $filename = $category_name."-".$_FILES['file']['name'];
    //var_dump($FILE);
    //var_dump($parent_id);

    if(isset($filename))
    {if(move_uploaded_file($_FILES['file']['tmp_name'], UPLOAD_PATH . $filename))
    {

        mysqli_query($mysqliconn,"update tb_category set category_name = '".$_REQUEST['category_name']."',image='".$_FILES['file'].
            "' WHERE id=".round($_REQUEST['id']));
    }else {
        //todo write code for move failure
        echo "<script>alert('update failed');document.location.href='category_master.php'</script>";
    }

    }else{
        mysqli_query($mysqliconn,"update tb_category set category_name = '".$_REQUEST['category_name']."' WHERE id=".round($_REQUEST['id']));
    }

    //echo "<script>alert('update successfully');<script>document.location.href='category_master.php'</script>";
}
?>


<nav class="navbar navbar-inverse navbar-fixed-top ">
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
<!-- <div id="admin" class="row">
    <div class="col-md-3">
    </div>
    <div class="col-md-3">
        <a href="category_master.php" class="btn btn-default btn-sm push_button"><img src="https://tse2.mm.bing.net/th?id=OIP.MvwQRXGpu0afmhXjOztYiAHaHa&pid=Api&P=0&w=300&h=300" ><br/>Category</a>
    </div>
    <div class="col-md-3">
        <a href="category_master_photo.php" class="btn btn-default btn-sm push_button"><img src="http://www.newdesignfile.com/postpic/2010/06/administrator-admin-icon_150359.png" ><br/>Category Photos</a>
    </div>
    <div class="col-md-3">
        <a href="logout.php" class="btn btn-default btn-sm push_button"><img src="https://tse3.mm.bing.net/th?id=OIP.DjKFK1Z9AjbermoMyt0StQAAAA&pid=Api&P=0&w=300&h=300" ><br/>logout</a>
    </div>
</div> -->
<h3 class="text-center mt-5">Category Master</h3>

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
            <form class="form-horizontal" role="form" action="category_master.php" method="post" enctype="multipart/form-data">

                <input type="hidden" name="hdnCmd" value="<?php
                if($_REQUEST['hdnCmd']==null)
                { echo 'ADD'; }
                else
                { echo edit; }
                ?>" >
                <input id="inputCatId" type="hidden" name="parent_id" value="<?php echo $_REQUEST['parent_id']; ?>" >
                <div class="form-group">


                    <div class="col-sm-2">
                        <label for="category_name_form">Category Name</label><input id="category_name_form" type="text" name="category_name" class="form-control" required value ="<?= $rows['category_name'] ?>"  />
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="exampleInputEmail2">Select Product : </label>
                                <input type="file" name="file" id ="file"  class="form-control"  style="width: 62%;">
                                <img id="catimageplaceholder" src ="../images/categories/<?=$rows["image"]?>"/>
                            </div>
                        </div>
                        

                     
                       
                        
                        <?php

                        //$php_var = $_GET['js_var'];
                        $selected_id=0;
                        $depth+=1;
                        $allcategories=array();
                        $catsql= "SELECT * FROM tb_category";
                        $catresult=mysqli_query($mysqliconn,$catsql);
                        while($row=mysqli_fetch_array($catresult)){
                            array_push($allcategories,$row);
                            $alldata = json_encode($allcategories);}
                        ?>
                        <div id="selectDiv">
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
                            <button  id="formbtnaddcat" type="submit" class="btn btn-success">Add Category</button>
                        </div>

                        
            </form>
        </div>
    </div>
</div>

<hr>

<div class="col-md-3">
</div>

<table class="table table-striped table-hover table-bordered" style="width:625px;">
    <thead>
    <tr>
        <th style="width:20px;">SR</th>
        <th style="width:150px;">Image</th>
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
            <td><img  src = "<?php echo "../images/categories/".$rows['image']; ?> " /></td>

            <td><?php echo $rows['category_name']; ?></td>
            <td>
                <button type="button" id="editbtn<?php echo $rows['id']; ?>" onClick="showHideDiv(this)" tag="<?php echo $rows['id']; ?>"class="btn btn-warning " role="button"><span class="glyphicon glyphicon-remove-circle"></span> Edit</button>
                <a href="category_master.php?hdnCmd=delete&id=<?php echo $rows['id']; ?>" onClick="return confirm('Are you want to sure Delete Information');" class="btn btn-danger " role="button"><span class="glyphicon glyphicon-remove-circle"></span> Delete</a>
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

        var categoryId = eID.options[eID.selectedIndex].value;
//console.log(categoryId)
        var catval=document.getElementById("inputCatId").value=categoryId ;
        console.log(catval)
        addFunction(categoryId ,depth)
    }
    $(function(){
        $('#file').change(function(){
            var input = this;
            var url = $(this).val();
            var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
            if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg"))
            {
                var reader = new FileReader();

                reader.onload = function (e) {
                    //alert(e.target.result)
                    $('#catimageplaceholder').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
            else
            {
                $('#catimageplaceholder').attr('src', '/assets/no_preview.png');
            }
        });

    });
    function addFunction(categoryId,depth) {
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
        domselect.setAttribute("tag", categoryId);
        domselect.setAttribute("onchange","onchanngecat("+(depth+1)+")");
        for( category in categories) {
            if(categories[category].parent_id==categoryId){
//console.log(categoryId)
                var opt=new Option(categories[category].category_name)
                opt.value=categories[category].id
                domselect.appendChild(opt);

            }

            if(depth==0)
                domDiv.appendChild(domselect);
            else if(depth==1)
                domDiv1.appendChild(domselect);
        }
//console.log(opt.value)
    }


    function removeFunction(id) {
        var myobj = document.getElementById(id);
        myobj.remove();
    }
    function emptyDom(id) {
        var myobj = document.getElementById(id);
        myobj.innerHTML=""

    }
    function showHideDiv(mybutton) {

        var srcElement = document.getElementById('selectDiv');
        srcElement.style.display = 'none';
        var  catid=mybutton.getAttribute("tag")
        var selectedCategory={}
        for(var i=0;i<categories.length;i++)
        {
            // console.log(categories[i])
            if(catid===categories[i].id)
            {

                selectedCategory=categories[i]

            }
            console.log(selectedCategory)
        }
        var url =""
        url="../images/categories/"+selectedCategory.image

        if(url!=="") {
            //var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
            $('#catimageplaceholder').attr('src', url);
            $('#category_name_form').attr('value', selectedCategory.category_name);

                window.location=window.location.origin+"/jsexports/admin/category_master.php?hdnCmd=edit&id="+catid
            $('#formbtnaddcat').name="Update"
        }

    }

</script>
</body>
</html>