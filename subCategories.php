<?php 
include('header.php');?>

<?php 
$id = $_GET['id'];

?>

<style>

@media only screen and (max-width: 500px) {
  .inner img {
    margin-left:70px;
  }
  #headProductText{
      margin-left:-20px;
  }
  #headCatText{
      margin-left:-20px;
  }
  #productlist{
      margin-top:-80px;
  }
}

.title a{
    width:100%;
    white-space: nowrap;
}

.col-lg-4{
    margin-top:60px;
   
}
.products .product {
    margin-bottom: 50px;
    width: 320px;
}
 .title:first-child {
        text-align:center;
}

#productImage{
    height:700px;
}
.products {
    margin-bottom: -50px;
    margin-top: -10px;
}      

h2 { margin-left:80px;}
    .inner{
        width:300px;
    }
</style>
<body>

<script>

var categories = JSON.parse('<?= json_encode($allcats); ?>');
var parentCatId = JSON.parse('<?= json_encode($id); ?>');
//console.log(categories)
  // console.log(parentCatId)
   $(document).ready(function () {
    getMySubCats(parentCatId);
    //console.log("called")
});
    //getMySubCats(parentCatId);
    function getMySubCats(parentCatId)
    {
        //alert(categories)
       var mySubcats=[];
        for (var i = 0; i < categories.length; i++) { 
       
        if(categories[i].parent_id==parentCatId )
        {
        //console.log(categories[i].parent_id)
        //var subcatid = categories[i].id; 
        mySubcats.push(categories[i])
        }
       // console.log(mySubcats)
        } 
        if(mySubcats.length>0){
        document.getElementById("headCatText").innerHTML = "Sub Category";

            getsubcatbyjavascript(mySubcats);
            getSubcatProducts(parentCatId);
        }
       // mycats=mycats.concat(subcat(categories,catid))
        else{
            document.getElementById("headCatText").innerHTML = "No Sub Category Available";
            getSubcatProducts(parentCatId);;
        } 
    }
    function getsubcatbyjavascript(mySubcats){

        console.log(mySubcats)
        for(i=0;i<mySubcats.length;i++){
        
         $("#productrows").append('<div id="pro'+mySubcats[i].id +'" class="products row row-cols-xl-5 row-cols-lg-2 row-cols-md-4 row-cols-sm-2 row-cols-1"></div>')
            $("#pro"+mySubcats[i].id).append(`
                    <div class="col-lg-3"class="category-banner1">
                    <h2 class="title"><a href="subCategories.php?id=`+ mySubcats[i].id+`">`+mySubcats[i].category_name+`</a></h2>
                        <div class="inner">
                            <a href="subCategories.php?id=`+ mySubcats[i].id+`" class="image" tabindex="0"><img  src="images/categories/`+mySubcats[i].image+`" id="img" style="width: 300px; height:230px;"></a>
                            <div class="content">
                                <h3 class="title">
                                   
                                </h3>
                            </div>
                        </div> 
                        </div>`);
        }
        
    }
    
function getSubcatProducts(parentCatId)
    {
    $.post("api/getAllProductsByCat.php",
    {
        "ids":parentCatId
    },
    function(data,status){
           //console.log(data)
           
           if(data.length>1) 
        
           {
           
            document.getElementById("headProductText").innerHTML = "Shop our best-sellers";
                    
                
            var array = JSON.parse(data);
            for(i=0;i<array.length;i++)
            {
                
         var product=array[i]
         console.log(product);
            
         $("#productlist").append('<div id="pro'+product.id +'" class="products row row-cols-xl-5 row-cols-lg-2 row-cols-md-4 row-cols-sm-2 row-cols-1"></div>')
            $("#pro"+product.id).append(
                `<div class="col">
                <div class="product pt-5">
                    <div class="product-thumb">
                        <a href="product-details.php?id=`+product.id+`" class="image">
                            <img src="images/products/`+product.photo_path+`" alt="`+product.photo_name+`" width="200" height="300" ">
                            <img class="image-hover " src="images/products/`+product.photo_path+`" alt="`+product.photo_name+`" width="200" height="300" " alt="`+product.photo_name+`">
                        </a>
                        <a href="wishlist.html" class="add-to-wishlist hintT-left" data-hint="Add to wishlist"><i class="far fa-heart"></i></a>
                    </div>
                    <div class="product-info">
                        <h6 class="title"><a href="product-details.php?id=`+product.id+`tabindex="0">`+product.photo_name+`</a></h6>
                        
                        <div class="product-buttons">
                        
                            <a  onclick='getProductById(`+JSON.stringify(product)+`)'  data-target="#quickViewModal" data-toggle="modal" class="product-button hintT-top" data-hint="Quick View"><i class="fal fa-search"></i></a>
                        </div>
                    </div>
                </div>
            </div>     
        </div>`);}
         
        
        }
        
        else{
                    document.getElementById("headProductText").innerHTML = "No Products Avialable";
                }
        }
        );
            
 
}
function getProductById(obj){
var obj=JSON.stringify(obj);
var product=JSON.parse(obj);
var catId=product.cat_id;
//console.log(catId);
var productName=product.photo_name;
var productImage=product.photo_path;
var productDescription=product.description;
document.getElementById('productName').innerHTML=productName;
document.getElementById('productDescription').innerHTML=productDescription;
document.getElementById('productImage').src="images/products/"+productImage;

for (var i = 0; i < categories.length; i++) { 
            
        if(categories[i].id==catId)
        {
 document.getElementById('productCategory').innerHTML=categories[i].category_name;
        
        }
        } 

}

</script>

  <!-- Page Title/Header Start -->
    <div class="page-title-section section" data-bg-image="https://ae01.alicdn.com/kf/HTB1.TlEQXXXXXaxXXXXq6xXFXXXi/2107-High-Quality-Super-Soft-Coral-Fleece-Bed-Blanket-Cover-Deken-Double-Layer-Thick-Winter-Decorative.jpg" > 
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="page-title">
                        <h1 class="title"><i>Stella Blanket  </i></h1>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Category</a></li>
                            <li class="breadcrumb-item active">Products</li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Page Title/Header End -->
    
    <div  class="section section-fluid section-padding pt-5">
    <div class="section-title text-center">
            <h2 id="headCatText" class="title title-icon-both"></h2>
        </div>
    <div id="productrows" class="products row row-cols-xl-5 row-cols-lg-2 row-cols-md-4 row-cols-sm-2 row-cols-1">

    </div>
    </div>

    <!-- Product Section Start -->
    <div class="section section-fluid section-padding pt-5">
        <div class="container">

            <!-- Section Title Start -->
            <div class="section-title text-center pt-5">
                <h3 class="sub-title">Shop now</h3>
                <h2 id="headProductText" class="title title-icon-both"></h2>
            </div>
            <!-- Section Title End -->

    <!-- Products Start -->
    <div  class="section section-fluid section-padding pt-5">
    <div id="productlist" class="products row row-cols-xl-5 row-cols-lg-2 row-cols-md-4 row-cols-sm-2 row-cols-1">

    </div>
    </div>
    <!-- Product End -->

   

<?php
include('footer.php');

?>