<?php 
include('header.php');?>

<?php 
$id = $_GET['id'];

?>

<html class="js sizes websockets customelements history postmessage webworkers picture pointerevents webanimations webgl srcset flexbox cssanimations csscolumns csscolumns-width csscolumns-span csscolumns-fill csscolumns-gap csscolumns-rule csscolumns-rulecolor csscolumns-rulestyle csscolumns-rulewidth csscolumns-breakbefore csscolumns-breakafter csscolumns-breakinside" lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Learts – Handmade Shop eCommerce HTML Template</title>
    <meta name="robots" content="noindex, follow">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png">

    <!-- CSS
	============================================ -->

    <!-- Vendor CSS (Bootstrap & Icon Font) -->
    <!-- <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/vendor/font-awesome-pro.min.css">
    <link rel="stylesheet" href="assets/css/vendor/themify-icons.css">
    <link rel="stylesheet" href="assets/css/vendor/customFonts.css"> -->

    <!-- Plugins CSS (All Plugins Files) -->
    <!-- <link rel="stylesheet" href="assets/css/plugins/select2.min.css">
    <link rel="stylesheet" href="assets/css/plugins/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/css/plugins/swiper.min.css">
    <link rel="stylesheet" href="assets/css/plugins/nice-select.css">
    <link rel="stylesheet" href="assets/css/plugins/ion.rangeSlider.min.css">
    <link rel="stylesheet" href="assets/css/plugins/photoswipe.css">
    <link rel="stylesheet" href="assets/css/plugins/photoswipe-default-skin.css">
    <link rel="stylesheet" href="assets/css/plugins/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/plugins/slick.css"> -->

    <!-- Main Style CSS -->
    <!-- <link rel="stylesheet" href="assets/css/style.css"> -->

    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <link rel="stylesheet" href="assets/css/vendor/vendor.min.css">
    <link rel="stylesheet" href="assets/css/plugins/plugins.min.css">
    <link rel="stylesheet" href="assets/css/style.min.css">

<style type="text/css">.scrollax-performance, .scrollax-performance *, .scrollax-performance *:before, .scrollax-performance *:after { pointer-events: none !important; -webkit-animation-play-state: paused !important; animation-play-state: paused !important; };</style></head>
<style>
 .slick-slide{
height:300px;
    }
</style>
<body>

<script>

var categories = JSON.parse('<?= json_encode($allcats); ?>');
var parentCatId = JSON.parse('<?= json_encode($id); ?>');
    //console.log(categories)
   //console.log(parentCatId)
   $(document).ready(function () {
    getMySubCats(parentCatId);
    //console.log("called")
});
    //getMySubCats(parentCatId);
    function getMySubCats(parentCatId)
    {
       // alert("btn cliked")
       var mySubcats=[];
        for (var i = 0; i < categories.length; i++) { 
       
        if(categories[i].parent_id==parentCatId )
        {
        //console.log(categories[i].parent_id)
        var subcatid = categories[i].id; 
        mySubcats.push(subcatid)
        
       // mycats=mycats.concat(subcat(categories,catid))
        getSubcats(mySubcats,categories[i])
        //getProducts(mycats,categories[i])
        //console.log(mycats)
        }
        } 
        //console.log(mycats)
    }
    
    function subcat(categories,catid){
    var subcatarray =[];
    for(var i = 0; i < categories.length; i++)
     {
        if(categories[i].parent_id === catid)
        {
            var subcatid=categories[i].id;
            subcatarray.push(subcatid)
          subcatarray = subcatarray.concat(subcat(categories,subcatid));
            //console.log(subcatarray);
        }

     }
     return subcatarray;
        }

        function getSubcats( mySubcats,category)
    {

    $.post("api/getSubcat.php",
    {
        "ids":mySubcats
    },
    function(data,status){
           console.log(data)
           if(data.length>10) 
        
           {$("#productrows").append('<div id="pro'+mySubcats[0] +'" class="products row row-cols-xl-5 row-cols-lg-2 row-cols-md-4 row-cols-sm-2 row-cols-1"></div>')
            $("#pro"+mySubcats[0]).append('<h2 class="title"><a href="product-details.html">'+category.category_name+'</a></h2>')
          
            // for loop for data
            var json=JSON.parse(data)
            console.log(json)
            for(i=0;i<json.length;i++)
            {
                var myproduct=json[i]
                //console.log(myproduct.photo_name)
            $("#pro"+mySubcats[0]).append(
                `<div class="col">
        </div>`
                );
           }    
        }
        })
            
 
}
    function getProducts(mySubcats,category)
    {

    $.post("api/getProduct.php",
    {
        "ids":mySubcats
    },
    function(data,status){
           //console.log(data)
           if(data.length>10) 
        
           {$("#productrows").append('<div id="pro'+mySubcats[0] +'" class="products row row-cols-xl-5 row-cols-lg-2 row-cols-md-4 row-cols-sm-2 row-cols-1"></div>')
            $("#pro"+mySubcats[0]).append('<h2 class="title"><a href="product-details.html">'+category.category_name+'</a></h2>')
          
            // for loop for data
            var json=JSON.parse(data)
            console.log(json)
            for(i=0;i<json.length;i++)
            {
                var myproduct=json[i]
                //console.log(myproduct.photo_name)
            $("#pro"+mySubcats[0]).append(
                `<div class="col">
        </div>`
                );
           }    
        }
        })
            
 
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
    <!-- Category Banner Section Start -->
    <div class="section section-fluid section-padding pt-4">
        <div class="container">
            <div class="category-banner1-carousel slick-initialized slick-slider">
                <div class="slick-list draggable"><div class="slick-track" style="opacity: 1; width: 5876px; transform: translate3d(-2260px, 0px, 0px);"><div class="slick-slide slick-cloned" data-slick-index="-3" aria-hidden="true" style="width: 452px;" tabindex="-1"><div><div class="col" style="width: 100%; display: inline-block;">
                    <div class="category-banner1">
                        <div class="inner">
                            <a href="shop.html" class="image" tabindex="-1"><img src="assets/images/banner/category/banner-s1-3.jpg" alt=""></a>
                            <div class="content">
                                <h3 class="title">
                                    <a href="shop.html" tabindex="-1">Towels &amp; Babies</a>
                                    <span class="number">6</span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div></div></div><div class="slick-slide slick-cloned" data-slick-index="-2" aria-hidden="true" style="width: 452px;" tabindex="-1"><div><div class="col" style="width: 100%; display: inline-block;">
                    <div class="category-banner1">
                        <div class="inner">
                            <a href="shop.html" class="image" tabindex="-1"><img src="assets/images/banner/category/banner-s1-4.jpg" alt=""></a>
                            <div class="content">
                                <h3 class="title">
                                    <a href="shop.html" tabindex="-1">Kitchen</a>
                                    <span class="number">15</span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div></div></div><div class="slick-slide slick-cloned" data-slick-index="-1" aria-hidden="true" style="width: 452px;" tabindex="-1"><div><div class="col" style="width: 100%; display: inline-block;">
                    <div class="category-banner1">
                        <div class="inner">
                            <a href="shop.html" class="image" tabindex="-1"><img src="assets/images/banner/category/banner-s1-5.jpg" alt=""></a>
                            <div class="content">
                                <h3 class="title">
                                    <a href="shop.html" tabindex="-1">Kniting &amp; Sewing</a>
                                    <span class="number">4</span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div></div></div><div class="slick-slide" data-slick-index="0" aria-hidden="true" style="width: 452px;" tabindex="-1"><div><div class="col" style="width: 100%; display: inline-block;">
                    <div class="category-banner1">
                        <div class="inner">
                            <a href="shop.html" class="image" tabindex="-1"><img src="assets/images/banner/category/banner-s1-1.jpg" alt=""></a>
                            <div class="content">
                                <h3 class="title">
                                    <a href="shop.html" tabindex="-1">Gift ideas</a>
                                    <span class="number">16</span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div></div></div><div class="slick-slide" data-slick-index="1" aria-hidden="true" style="width: 452px;" tabindex="-1"><div><div class="col" style="width: 100%; display: inline-block;">
                    <div class="category-banner1">
                        <div class="inner">
                            <a href="shop.html" class="image" tabindex="-1"><img src="assets/images/banner/category/banner-s1-2.jpg" alt=""></a>
                            <div class="content">
                                <h3 class="title">
                                    <a href="shop.html" tabindex="-1">Home Decor</a>
                                    <span class="number">16</span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div></div></div><div class="slick-slide slick-current slick-active" data-slick-index="2" aria-hidden="false" style="width: 452px;"><div><div class="col" style="width: 100%; display: inline-block;">
                    <div class="category-banner1">
                        <div class="inner">
                            <a href="shop.html" class="image" tabindex="0"><img src="assets/images/banner/category/banner-s1-3.jpg" alt=""></a>
                            <div class="content">
                                <h3 class="title">
                                    <a href="shop.html" tabindex="0">Towels</a>
                                    <span class="number">6</span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div></div></div><div class="slick-slide slick-active" data-slick-index="3" aria-hidden="false" style="width: 452px;"><div><div class="col" style="width: 100%; display: inline-block;">
                    <div class="category-banner1">
                        <div class="inner">
                            <a href="shop.html" class="image" tabindex="0"><img src="assets/images/banner/category/banner-s1-4.jpg" alt=""></a>
                            <div class="content">
                                <h3 class="title">
                                    <a href="shop.html" tabindex="0">Bedsheets</a>
                                    <span class="number">15</span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div></div></div><div class="slick-slide slick-active" data-slick-index="4" aria-hidden="false" style="width: 452px;"><div><div class="col" style="width: 100%; display: inline-block;">
                    <div class="category-banner1">
                        <div class="inner">
                            <a href="shop.html" class="image" tabindex="0"><img src="assets/images/banner/category/banner-s1-5.jpg" alt=""></a>
                            <div class="content">
                                <h3 class="title">
                                    <a href="shop.html" tabindex="0">Roufs</a>
                                    <span class="number">4</span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div></div></div><div class="slick-slide slick-cloned" data-slick-index="5" aria-hidden="true" style="width: 452px;" tabindex="-1"><div><div class="col" style="width: 100%; display: inline-block;">
                   
                </div></div></div><div class="slick-slide slick-cloned" data-slick-index="6" aria-hidden="true" style="width: 452px;" tabindex="-1"><div><div class="col" style="width: 100%; display: inline-block;">
                    
                </div></div></div><div class="slick-slide slick-cloned" data-slick-index="7" aria-hidden="true" style="width: 452px;" tabindex="-1"><div><div class="col" style="width: 100%; display: inline-block;">
                    <div class="category-banner1">
                        <div class="inner">
                            <a href="shop.html" class="image" tabindex="-1"><img src="assets/images/banner/category/banner-s1-3.jpg" alt=""></a>
                            <div class="content">
                                <h3 class="title">
                                    <a href="shop.html" tabindex="-1">Kids &amp; Babies</a>
                                    <span class="number">6</span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div></div></div><div class="slick-slide slick-cloned" data-slick-index="8" aria-hidden="true" style="width: 452px;" tabindex="-1"><div><div class="col" style="width: 100%; display: inline-block;">
                    <div class="category-banner1">
                        <div class="inner">
                            <a href="shop.html" class="image" tabindex="-1"><img src="assets/images/banner/category/banner-s1-4.jpg" alt=""></a>
                            <div class="content">
                                <h3 class="title">
                                    <a href="shop.html" tabindex="-1">Kitchen</a>
                                    <span class="number">15</span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div></div></div><div class="slick-slide slick-cloned" data-slick-index="9" aria-hidden="true" style="width: 452px;" tabindex="-1"><div><div class="col" style="width: 100%; display: inline-block;">
                    <div class="category-banner1">
                        <div class="inner">
                            <a href="shop.html" class="image" tabindex="-1"><img src="assets/images/banner/category/banner-s1-5.jpg" alt=""></a>
                            <div class="content">
                                <h3 class="title">
                                    <a href="shop.html" tabindex="-1">Kniting &amp; Sewing</a>
                                    <span class="number">4</span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div></div></div></div></div>
                
</div>
        </div>
    </div>
    <!-- Category Banner Section End -->

    <!-- Product Section Start -->
    <div class="section section-fluid section-padding pt-0">
        <div class="container">

            <!-- Section Title Start -->
            <div class="section-title text-center">
                <h3 class="sub-title">Shop now</h3>
                <h2 class="title title-icon-both">Shop our best-sellers</h2>
            </div>
            <!-- Section Title End -->

            <!-- Products Start -->
            <div class="products row row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-1">

                <div class="col">
                    <div class="product">
                        <div class="product-thumb">
                            <a href="product-details.html" class="image">
                                <span class="product-badges">
                                    <span class="onsale">-13%</span>
                                </span>
                                <img src="assets/images/product/s328/product-1.jpg" alt="Product Image">
                                <img class="image-hover " src="assets/images/product/s328/product-1-hover.jpg" alt="Product Image">
                            </a>
                            <a href="wishlist.html" class="add-to-wishlist hintT-left" data-hint="Add to wishlist"><i class="far fa-heart"></i></a>
                        </div>
                        <div class="product-info">
                            <h6 class="title"><a href="product-details.html">Boho Beard Mug</a></h6>
                            <span class="price">
                                <span class="old">$45.00</span>
                            <span class="new">$39.00</span>
                            </span>
                            <div class="product-buttons">
                                <a href="#quickViewModal" data-toggle="modal" class="product-button hintT-top" data-hint="Quick View"><i class="fal fa-search"></i></a>
                                <a href="#" class="product-button hintT-top" data-hint="Add to Cart"><i class="fal fa-shopping-cart"></i></a>
                                <a href="#" class="product-button hintT-top" data-hint="Compare"><i class="fal fa-random"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="product">
                        <div class="product-thumb">
                            <a href="product-details.html" class="image">
                                <img src="assets/images/product/s328/product-2.jpg" alt="Product Image">
                                <img class="image-hover " src="assets/images/product/s328/product-2-hover.jpg" alt="Product Image">
                            </a>
                            <a href="wishlist.html" class="add-to-wishlist hintT-left" data-hint="Add to wishlist"><i class="far fa-heart"></i></a>
                        </div>
                        <div class="product-info">
                            <h6 class="title"><a href="product-details.html">Motorized Tricycle</a></h6>
                            <span class="price">
                                $35.00
                            </span>
                            <div class="product-buttons">
                                <a href="#quickViewModal" data-toggle="modal" class="product-button hintT-top" data-hint="Quick View"><i class="fal fa-search"></i></a>
                                <a href="#" class="product-button hintT-top" data-hint="Add to Cart"><i class="fal fa-shopping-cart"></i></a>
                                <a href="#" class="product-button hintT-top" data-hint="Compare"><i class="fal fa-random"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="product">
                        <div class="product-thumb">
                            <span class="product-badges">
                                <span class="hot">hot</span>
                            </span>
                            <a href="product-details.html" class="image">
                                <img src="assets/images/product/s328/product-3.jpg" alt="Product Image">
                                <img class="image-hover " src="assets/images/product/s328/product-3-hover.jpg" alt="Product Image">
                            </a>
                            <a href="wishlist.html" class="add-to-wishlist hintT-left" data-hint="Add to wishlist"><i class="far fa-heart"></i></a>
                        </div>
                        <div class="product-info">
                            <h6 class="title"><a href="product-details.html">Walnut Cutting Board</a></h6>
                            <span class="price">
                                $100.00
                            </span>
                            <div class="product-buttons">
                                <a href="#quickViewModal" data-toggle="modal" class="product-button hintT-top" data-hint="Quick View"><i class="fal fa-search"></i></a>
                                <a href="#" class="product-button hintT-top" data-hint="Add to Cart"><i class="fal fa-shopping-cart"></i></a>
                                <a href="#" class="product-button hintT-top" data-hint="Compare"><i class="fal fa-random"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="product">
                        <div class="product-thumb">
                            <a href="product-details.html" class="image">
                                <span class="product-badges">
                                    <span class="onsale">-27%</span>
                                </span>
                                <img src="assets/images/product/s328/product-4.jpg" alt="Product Image">
                                <img class="image-hover " src="assets/images/product/s328/product-4-hover.jpg" alt="Product Image">
                            </a>
                            <a href="wishlist.html" class="add-to-wishlist hintT-left" data-hint="Add to wishlist"><i class="far fa-heart"></i></a>
                        </div>
                        <div class="product-info">
                            <h6 class="title"><a href="product-details.html">Pizza Plate Tray</a></h6>
                            <span class="price">
                                <span class="old">$30.00</span>
                            <span class="new">$22.00</span>
                            </span>
                            <div class="product-buttons">
                                <a href="#quickViewModal" data-toggle="modal" class="product-button hintT-top" data-hint="Quick View"><i class="fal fa-search"></i></a>
                                <a href="#" class="product-button hintT-top" data-hint="Add to Cart"><i class="fal fa-shopping-cart"></i></a>
                                <a href="#" class="product-button hintT-top" data-hint="Compare"><i class="fal fa-random"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="product">
                        <div class="product-thumb">
                            <a href="product-details.html" class="image">
                                <img src="assets/images/product/s328/product-5.jpg" alt="Product Image">
                                <img class="image-hover " src="assets/images/product/s328/product-5-hover.jpg" alt="Product Image">
                            </a>
                            <a href="wishlist.html" class="add-to-wishlist hintT-left" data-hint="Add to wishlist"><i class="far fa-heart"></i></a>
                            <div class="product-options">
                                <ul class="colors">
                                    <li style="background-color: #c2c2c2;">color one</li>
                                    <li style="background-color: #374140;">color two</li>
                                    <li style="background-color: #8ea1b2;">color three</li>
                                </ul>
                                <ul class="sizes">
                                    <li>Large</li>
                                    <li>Medium</li>
                                    <li>Small</li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-info">
                            <h6 class="title"><a href="product-details.html">Minimalist Ceramic Pot</a></h6>
                            <span class="price">
                                $120.00
                            </span>
                            <div class="product-buttons">
                                <a href="#quickViewModal" data-toggle="modal" class="product-button hintT-top" data-hint="Quick View"><i class="fal fa-search"></i></a>
                                <a href="#" class="product-button hintT-top" data-hint="Add to Cart"><i class="fal fa-shopping-cart"></i></a>
                                <a href="#" class="product-button hintT-top" data-hint="Compare"><i class="fal fa-random"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="product">
                        <div class="product-thumb">
                            <a href="product-details.html" class="image">
                                <img src="assets/images/product/s328/product-6.jpg" alt="Product Image">
                                <img class="image-hover " src="assets/images/product/s328/product-6-hover.jpg" alt="Product Image">
                            </a>
                            <a href="wishlist.html" class="add-to-wishlist hintT-left" data-hint="Add to wishlist"><i class="far fa-heart"></i></a>
                        </div>
                        <div class="product-info">
                            <h6 class="title"><a href="product-details.html">Clear Silicate Teapot</a></h6>
                            <span class="price">
                                $140.00
                            </span>
                            <div class="product-buttons">
                                <a href="#quickViewModal" data-toggle="modal" class="product-button hintT-top" data-hint="Quick View"><i class="fal fa-search"></i></a>
                                <a href="#" class="product-button hintT-top" data-hint="Add to Cart"><i class="fal fa-shopping-cart"></i></a>
                                <a href="#" class="product-button hintT-top" data-hint="Compare"><i class="fal fa-random"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="product">
                        <div class="product-thumb">
                            <a href="product-details.html" class="image">
                                <span class="product-badges">
                                    <span class="hot">hot</span>
                                </span>
                                <img src="assets/images/product/s328/product-7.jpg" alt="Product Image">
                                <img class="image-hover " src="assets/images/product/s328/product-7-hover.jpg" alt="Product Image">
                            </a>
                            <a href="wishlist.html" class="add-to-wishlist hintT-left" data-hint="Add to wishlist"><i class="far fa-heart"></i></a>
                        </div>
                        <div class="product-info">
                            <h6 class="title"><a href="product-details.html">Lucky Wooden Elephant</a></h6>
                            <span class="price">
                                $35.00
                            </span>
                            <div class="product-buttons">
                                <a href="#quickViewModal" data-toggle="modal" class="product-button hintT-top" data-hint="Quick View"><i class="fal fa-search"></i></a>
                                <a href="#" class="product-button hintT-top" data-hint="Add to Cart"><i class="fal fa-shopping-cart"></i></a>
                                <a href="#" class="product-button hintT-top" data-hint="Compare"><i class="fal fa-random"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="product">
                        <div class="product-thumb">
                            <a href="product-details.html" class="image">
                                <span class="product-badges">
                                    <span class="outofstock"><i class="fal fa-frown"></i></span>
                                <span class="hot">hot</span>
                                </span>
                                <img src="assets/images/product/s328/product-8.jpg" alt="Product Image">
                                <img class="image-hover " src="assets/images/product/s328/product-8-hover.jpg" alt="Product Image">
                            </a>
                            <a href="wishlist.html" class="add-to-wishlist hintT-left" data-hint="Add to wishlist"><i class="far fa-heart"></i></a>
                            <div class="product-options">
                                <ul class="colors">
                                    <li style="background-color: #000000;">color one</li>
                                    <li style="background-color: #b2483c;">color two</li>
                                </ul>
                                <ul class="sizes">
                                    <li>Large</li>
                                    <li>Medium</li>
                                    <li>Small</li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-info">
                            <h6 class="title"><a href="product-details.html">Decorative Christmas Fox</a></h6>
                            <span class="price">
                                $50.00
                            </span>
                            <div class="product-buttons">
                                <a href="#quickViewModal" data-toggle="modal" class="product-button hintT-top" data-hint="Quick View"><i class="fal fa-search"></i></a>
                                <a href="#" class="product-button hintT-top" data-hint="Add to Cart"><i class="fal fa-shopping-cart"></i></a>
                                <a href="#" class="product-button hintT-top" data-hint="Compare"><i class="fal fa-random"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="product">
                        <div class="product-thumb">
                            <a href="product-details.html" class="image">
                                <img src="assets/images/product/s328/product-9.jpg" alt="Product Image">
                                <img class="image-hover " src="assets/images/product/s328/product-9-hover.jpg" alt="Product Image">
                            </a>
                            <a href="wishlist.html" class="add-to-wishlist hintT-left" data-hint="Add to wishlist"><i class="far fa-heart"></i></a>
                        </div>
                        <div class="product-info">
                            <h6 class="title"><a href="product-details.html">Aluminum Equestrian</a></h6>
                            <span class="price">
                                $100.00
                            </span>
                            <div class="product-buttons">
                                <a href="#quickViewModal" data-toggle="modal" class="product-button hintT-top" data-hint="Quick View"><i class="fal fa-search"></i></a>
                                <a href="#" class="product-button hintT-top" data-hint="Add to Cart"><i class="fal fa-shopping-cart"></i></a>
                                <a href="#" class="product-button hintT-top" data-hint="Compare"><i class="fal fa-random"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="product">
                        <div class="product-thumb">
                            <a href="product-details.html" class="image">
                                <img src="assets/images/product/s328/product-10.jpg" alt="Product Image">
                                <img class="image-hover " src="assets/images/product/s328/product-10-hover.jpg" alt="Product Image">
                            </a>
                            <a href="wishlist.html" class="add-to-wishlist hintT-left" data-hint="Add to wishlist"><i class="far fa-heart"></i></a>
                        </div>
                        <div class="product-info">
                            <h6 class="title"><a href="product-details.html">Fish Cut Out Set</a></h6>
                            <span class="price">
                                $9.00
                            </span>
                            <div class="product-buttons">
                                <a href="#quickViewModal" data-toggle="modal" class="product-button hintT-top" data-hint="Quick View"><i class="fal fa-search"></i></a>
                                <a href="#" class="product-button hintT-top" data-hint="Add to Cart"><i class="fal fa-shopping-cart"></i></a>
                                <a href="#" class="product-button hintT-top" data-hint="Compare"><i class="fal fa-random"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="product">
                        <div class="product-thumb">
                            <a href="product-details.html" class="image">
                                <img src="assets/images/product/s328/product-11.jpg" alt="Product Image">
                                <img class="image-hover " src="assets/images/product/s328/product-11-hover.jpg" alt="Product Image">
                            </a>
                            <a href="wishlist.html" class="add-to-wishlist hintT-left" data-hint="Add to wishlist"><i class="far fa-heart"></i></a>
                        </div>
                        <div class="product-info">
                            <h6 class="title"><a href="product-details.html">Electric Egg Blender</a></h6>
                            <span class="price">
                                $200.00
                            </span>
                            <div class="product-buttons">
                                <a href="#quickViewModal" data-toggle="modal" class="product-button hintT-top" data-hint="Quick View"><i class="fal fa-search"></i></a>
                                <a href="#" class="product-button hintT-top" data-hint="Add to Cart"><i class="fal fa-shopping-cart"></i></a>
                                <a href="#" class="product-button hintT-top" data-hint="Compare"><i class="fal fa-random"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="product">
                        <div class="product-thumb">
                            <a href="product-details.html" class="image">
                                <img src="assets/images/product/s328/product-12.jpg" alt="Product Image">
                                <img class="image-hover " src="assets/images/product/s328/product-12-hover.jpg" alt="Product Image">
                            </a>
                            <a href="wishlist.html" class="add-to-wishlist hintT-left" data-hint="Add to wishlist"><i class="far fa-heart"></i></a>
                        </div>
                        <div class="product-info">
                            <h6 class="title"><a href="product-details.html">Cape Cottage Playhouse</a></h6>
                            <span class="price">
                                $35.00
                            </span>
                            <div class="product-buttons">
                                <a href="#quickViewModal" data-toggle="modal" class="product-button hintT-top" data-hint="Quick View"><i class="fal fa-search"></i></a>
                                <a href="#" class="product-button hintT-top" data-hint="Add to Cart"><i class="fal fa-shopping-cart"></i></a>
                                <a href="#" class="product-button hintT-top" data-hint="Compare"><i class="fal fa-random"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="product">
                        <div class="product-thumb">
                            <a href="product-details.html" class="image">
                                <img src="assets/images/product/s328/product-13.jpg" alt="Product Image">
                                <img class="image-hover " src="assets/images/product/s328/product-13-hover.jpg" alt="Product Image">
                            </a>
                            <a href="wishlist.html" class="add-to-wishlist hintT-left" data-hint="Add to wishlist"><i class="far fa-heart"></i></a>
                            <div class="product-options">
                                <ul class="colors">
                                    <li style="background-color: #ffffff;">color one</li>
                                    <li style="background-color: #01796f;">color two</li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-info">
                            <h6 class="title"><a href="product-details.html">Kernel Popcorn Bowl</a></h6>
                            <span class="price">
                                $25.00
                            </span>
                            <div class="product-buttons">
                                <a href="#quickViewModal" data-toggle="modal" class="product-button hintT-top" data-hint="Quick View"><i class="fal fa-search"></i></a>
                                <a href="#" class="product-button hintT-top" data-hint="Add to Cart"><i class="fal fa-shopping-cart"></i></a>
                                <a href="#" class="product-button hintT-top" data-hint="Compare"><i class="fal fa-random"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="product">
                        <div class="product-thumb">
                            <a href="product-details.html" class="image">
                                <span class="product-badges">
                                    <span class="outofstock"><i class="fal fa-frown"></i></span>
                                </span>
                                <img src="assets/images/product/s328/product-14.jpg" alt="Product Image">
                                <img class="image-hover " src="assets/images/product/s328/product-14-hover.jpg" alt="Product Image">
                            </a>
                            <a href="wishlist.html" class="add-to-wishlist hintT-left" data-hint="Add to wishlist"><i class="far fa-heart"></i></a>
                            <div class="product-options">
                                <ul class="colors">
                                    <li style="background-color: #000000;">color one</li>
                                    <li style="background-color: #ffffff;">color two</li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-info">
                            <h6 class="title"><a href="product-details.html">Abstract Folded Pots</a></h6>
                            <span class="price">
                                $50.00 - $55.00
                            </span>
                            <div class="product-buttons">
                                <a href="#quickViewModal" data-toggle="modal" class="product-button hintT-top" data-hint="Quick View"><i class="fal fa-search"></i></a>
                                <a href="#" class="product-button hintT-top" data-hint="Add to Cart"><i class="fal fa-shopping-cart"></i></a>
                                <a href="#" class="product-button hintT-top" data-hint="Compare"><i class="fal fa-random"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="product">
                        <div class="product-thumb">
                            <a href="product-details.html" class="image">
                                <img src="assets/images/product/s328/product-15.jpg" alt="Product Image">
                                <img class="image-hover " src="assets/images/product/s328/product-15-hover.jpg" alt="Product Image">
                            </a>
                            <a href="wishlist.html" class="add-to-wishlist hintT-left" data-hint="Add to wishlist"><i class="far fa-heart"></i></a>
                        </div>
                        <div class="product-info">
                            <h6 class="title"><a href="product-details.html">Brush &amp; Dustpan Set</a></h6>
                            <span class="price">
                                $9.00
                            </span>
                            <div class="product-buttons">
                                <a href="#quickViewModal" data-toggle="modal" class="product-button hintT-top" data-hint="Quick View"><i class="fal fa-search"></i></a>
                                <a href="#" class="product-button hintT-top" data-hint="Add to Cart"><i class="fal fa-shopping-cart"></i></a>
                                <a href="#" class="product-button hintT-top" data-hint="Compare"><i class="fal fa-random"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- Products End -->

        </div>
    </div>
    <!-- Product Section End -->

    <!-- Modal -->
    <div class="quickViewModal modal fade" id="quickViewModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button class="close" data-dismiss="modal">×</button>
                <div class="row learts-mb-n30">

                    <!-- Product Images Start -->
                    <div class="col-lg-6 col-12 learts-mb-30">
                        <div class="product-images">
                            <div class="product-gallery-slider-quickview">
                                <div class="product-zoom" data-image="assets/images/product/single/1/product-zoom-1.jpg" style="position: relative; overflow: hidden;">
                                    <img src="assets/images/product/single/1/product-1.jpg" alt="">
                                <img role="presentation" alt="" src="assets/images/product/single/1/product-zoom-1.jpg" class="zoomImg" style="position: absolute; top: 0px; left: 0px; opacity: 0; width: 768px; height: 1024px; border: none; max-width: none; max-height: none;"></div>
                                <div class="product-zoom" data-image="assets/images/product/single/1/product-zoom-2.jpg" style="position: relative; overflow: hidden;">
                                    <img src="assets/images/product/single/1/product-2.jpg" alt="">
                                <img role="presentation" alt="" src="assets/images/product/single/1/product-zoom-2.jpg" class="zoomImg" style="position: absolute; top: 0px; left: 0px; opacity: 0; width: 810px; height: 1080px; border: none; max-width: none; max-height: none;"></div>
                                <div class="product-zoom" data-image="assets/images/product/single/1/product-zoom-3.jpg" style="position: relative; overflow: hidden;">
                                    <img src="assets/images/product/single/1/product-3.jpg" alt="">
                                <img role="presentation" alt="" src="assets/images/product/single/1/product-zoom-3.jpg" class="zoomImg" style="position: absolute; top: 0px; left: 0px; opacity: 0; width: 810px; height: 1080px; border: none; max-width: none; max-height: none;"></div>
                                <div class="product-zoom" data-image="assets/images/product/single/1/product-zoom-4.jpg" style="position: relative; overflow: hidden;">
                                    <img src="assets/images/product/single/1/product-4.jpg" alt="">
                                <img role="presentation" alt="" src="assets/images/product/single/1/product-zoom-4.jpg" class="zoomImg" style="position: absolute; top: 0px; left: 0px; opacity: 0; width: 810px; height: 1080px; border: none; max-width: none; max-height: none;"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Product Images End -->

                    <!-- Product Summery Start -->
                    <div class="col-lg-6 col-12 overflow-hidden learts-mb-30">
                        <div class="product-summery customScroll ps ps--theme_default" data-ps-id="4ebfc7be-88a4-060e-fd9f-8292891c5eb4">
                            <div class="product-ratings">
                                <span class="star-rating">
                                <span class="rating-active" style="width: 100%;">ratings</span>
                                </span>
                                <a href="#reviews" class="review-link">(<span class="count">3</span> customer reviews)</a>
                            </div>
                            <h3 class="product-title">Cleaning Dustpan &amp; Brush</h3>
                            <div class="product-price">£38.00 – £50.00</div>
                            <div class="product-description">
                                <p>Easy clip-on handle – Hold the brush and dustpan together for storage; the dustpan edge is serrated to allow easy scraping off the hair without entanglement. High-quality bristles – no burr damage, no scratches, thick and durable, comfortable to remove dust and smaller particles.</p>
                            </div>
                            <div class="product-variations">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="label"><span>Size</span></td>
                                            <td class="value">
                                                <div class="product-sizes">
                                                    <a href="#">Large</a>
                                                    <a href="#">Medium</a>
                                                    <a href="#">Small</a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="label"><span>Color</span></td>
                                            <td class="value">
                                                <div class="product-colors">
                                                    <a href="#" data-bg-color="#000000" style="background-color: rgb(0, 0, 0);"></a>
                                                    <a href="#" data-bg-color="#ffffff" style="background-color: rgb(255, 255, 255);"></a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="label"><span>Quantity</span></td>
                                            <td class="value">
                                                <div class="product-quantity">
                                                    <span class="qty-btn minus"><i class="ti-minus"></i></span>
                                                    <input type="text" class="input-qty" value="1">
                                                    <span class="qty-btn plus"><i class="ti-plus"></i></span>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="product-buttons">
                                <a href="#" class="btn btn-icon btn-outline-body btn-hover-dark"><i class="fal fa-heart"></i></a>
                                <a href="#" class="btn btn-dark btn-outline-hover-dark"><i class="fal fa-shopping-cart"></i> Add to Cart</a>
                                <a href="#" class="btn btn-icon btn-outline-body btn-hover-dark"><i class="fal fa-random"></i></a>
                            </div>
                            <div class="product-brands">
                                <span class="title">Brands</span>
                                <div class="brands">
                                    <a href="#"><img src="assets/images/brands/brand-3.png" alt=""></a>
                                    <a href="#"><img src="assets/images/brands/brand-8.png" alt=""></a>
                                </div>
                            </div>
                            <div class="product-meta mb-0">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="label"><span>SKU</span></td>
                                            <td class="value">0404019</td>
                                        </tr>
                                        <tr>
                                            <td class="label"><span>Category</span></td>
                                            <td class="value">
                                                <ul class="product-category">
                                                    <li><a href="#">Kitchen</a></li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="label"><span>Tags</span></td>
                                            <td class="value">
                                                <ul class="product-tags">
                                                    <li><a href="#">handmade</a></li>
                                                    <li><a href="#">learts</a></li>
                                                    <li><a href="#">mug</a></li>
                                                    <li><a href="#">product</a></li>
                                                    <li><a href="#">learts</a></li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="label"><span>Share on</span></td>
                                            <td class="va">
                                                <div class="product-share">
                                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                                    <a href="#"><i class="fab fa-google-plus-g"></i></a>
                                                    <a href="#"><i class="fab fa-pinterest"></i></a>
                                                    <a href="#"><i class="fal fa-envelope"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        <div class="ps__scrollbar-x-rail" style="left: 0px; bottom: 0px;"><div class="ps__scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__scrollbar-y-rail" style="top: 0px; right: 0px;"><div class="ps__scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
                    </div>
                    <!-- Product Summery End -->

                </div>
            </div>
        </div>
    </div>

    <!-- JS
============================================ -->

    <!-- Vendors JS -->
    <!-- <script src="assets/js/vendor/modernizr-3.6.0.min.js"></script>
<script src="assets/js/vendor/jquery-3.4.1.min.js"></script>
<script src="assets/js/vendor/jquery-migrate-3.1.0.min.js"></script>
<script src="assets/js/vendor/bootstrap.bundle.min.js"></script> -->

    <!-- Plugins JS -->
    <!-- <script src="assets/js/plugins/select2.min.js"></script>
<script src="assets/js/plugins/jquery.nice-select.min.js"></script>
<script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="assets/js/plugins/swiper.min.js"></script>
<script src="assets/js/plugins/slick.min.js"></script>
<script src="assets/js/plugins/mo.min.js"></script>
<script src="assets/js/plugins/jquery.instagramFeed.min.js"></script>
<script src="assets/js/plugins/jquery.ajaxchimp.min.js"></script>
<script src="assets/js/plugins/jquery.countdown.min.js"></script>
<script src="assets/js/plugins/imagesloaded.pkgd.min.js"></script>
<script src="assets/js/plugins/isotope.pkgd.min.js"></script>
<script src="assets/js/plugins/jquery.matchHeight-min.js"></script>
<script src="assets/js/plugins/ion.rangeSlider.min.js"></script>
<script src="assets/js/plugins/photoswipe.min.js"></script>
<script src="assets/js/plugins/photoswipe-ui-default.min.js"></script>
<script src="assets/js/plugins/jquery.zoom.min.js"></script>
<script src="assets/js/plugins/ResizeSensor.js"></script>
<script src="assets/js/plugins/jquery.sticky-sidebar.min.js"></script>
<script src="assets/js/plugins/product360.js"></script>
<script src="assets/js/plugins/jquery.magnific-popup.min.js"></script>
<script src="assets/js/plugins/jquery.scrollUp.min.js"></script>
<script src="assets/js/plugins/scrollax.min.js"></script> -->

    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <script src="assets/js/vendor/vendor.min.js"></script>
    <script src="assets/js/plugins/plugins.min.js"></script><div></div>

    <!-- Main Activation JS -->
    <script src="assets/js/main.js"></script><div data-name="mojs-shape" class="" style="position: absolute; width: 0px; height: 0px; margin-left: 0px; margin-top: 0px; opacity: 1; left: 0px; top: 0px; transform: scale(0); transform-origin: 50% 50%;"><div data-name="mojs-shape" class="" style="position: absolute; width: 7px; height: 7px; margin-left: -3.5px; margin-top: -3.5px; opacity: 1; left: 50%; top: 50%; transform: scale(0); transform-origin: 50% 50%;"><svg style="display: block; width: 100%; height: 100%; left: 0px; top: 0px;"><ellipse rx="2.5" ry="2.5" cx="3.5" cy="3.5" fill-opacity="1" stroke-linecap="" stroke-dashoffset="" fill="#F8796C" stroke-dasharray="" stroke-opacity="1" stroke-width="2" stroke="transparent"></ellipse></svg></div><div data-name="mojs-shape" class="" style="position: absolute; width: 7px; height: 7px; margin-left: -3.5px; margin-top: -3.5px; opacity: 1; left: 50%; top: 50%; transform: scale(0); transform-origin: 50% 50%;"><svg style="display: block; width: 100%; height: 100%; left: 0px; top: 0px;"><ellipse rx="2.5" ry="2.5" cx="3.5" cy="3.5" fill-opacity="1" stroke-linecap="" stroke-dashoffset="" fill="#F8796C" stroke-dasharray="" stroke-opacity="1" stroke-width="2" stroke="transparent"></ellipse></svg></div><div data-name="mojs-shape" class="" style="position: absolute; width: 7px; height: 7px; margin-left: -3.5px; margin-top: -3.5px; opacity: 1; left: 50%; top: 50%; transform: scale(0); transform-origin: 50% 50%;"><svg style="display: block; width: 100%; height: 100%; left: 0px; top: 0px;"><ellipse rx="2.5" ry="2.5" cx="3.5" cy="3.5" fill-opacity="1" stroke-linecap="" stroke-dashoffset="" fill="#F8796C" stroke-dasharray="" stroke-opacity="1" stroke-width="2" stroke="transparent"></ellipse></svg></div><div data-name="mojs-shape" class="" style="position: absolute; width: 7px; height: 7px; margin-left: -3.5px; margin-top: -3.5px; opacity: 1; left: 50%; top: 50%; transform: scale(0); transform-origin: 50% 50%;"><svg style="display: block; width: 100%; height: 100%; left: 0px; top: 0px;"><ellipse rx="2.5" ry="2.5" cx="3.5" cy="3.5" fill-opacity="1" stroke-linecap="" stroke-dashoffset="" fill="#F8796C" stroke-dasharray="" stroke-opacity="1" stroke-width="2" stroke="transparent"></ellipse></svg></div><div data-name="mojs-shape" class="" style="position: absolute; width: 7px; height: 7px; margin-left: -3.5px; margin-top: -3.5px; opacity: 1; left: 50%; top: 50%; transform: scale(0); transform-origin: 50% 50%;"><svg style="display: block; width: 100%; height: 100%; left: 0px; top: 0px;"><ellipse rx="2.5" ry="2.5" cx="3.5" cy="3.5" fill-opacity="1" stroke-linecap="" stroke-dashoffset="" fill="#F8796C" stroke-dasharray="" stroke-opacity="1" stroke-width="2" stroke="transparent"></ellipse></svg></div><div data-name="mojs-shape" class="" style="position: absolute; width: 7px; height: 7px; margin-left: -3.5px; margin-top: -3.5px; opacity: 1; left: 50%; top: 50%; transform: scale(0); transform-origin: 50% 50%;"><svg style="display: block; width: 100%; height: 100%; left: 0px; top: 0px;"><ellipse rx="2.5" ry="2.5" cx="3.5" cy="3.5" fill-opacity="1" stroke-linecap="" stroke-dashoffset="" fill="#F8796C" stroke-dasharray="" stroke-opacity="1" stroke-width="2" stroke="transparent"></ellipse></svg></div><div data-name="mojs-shape" class="" style="position: absolute; width: 7px; height: 7px; margin-left: -3.5px; margin-top: -3.5px; opacity: 1; left: 50%; top: 50%; transform: scale(0); transform-origin: 50% 50%;"><svg style="display: block; width: 100%; height: 100%; left: 0px; top: 0px;"><ellipse rx="2.5" ry="2.5" cx="3.5" cy="3.5" fill-opacity="1" stroke-linecap="" stroke-dashoffset="" fill="#F8796C" stroke-dasharray="" stroke-opacity="1" stroke-width="2" stroke="transparent"></ellipse></svg></div><div data-name="mojs-shape" class="" style="position: absolute; width: 7px; height: 7px; margin-left: -3.5px; margin-top: -3.5px; opacity: 1; left: 50%; top: 50%; transform: scale(0); transform-origin: 50% 50%;"><svg style="display: block; width: 100%; height: 100%; left: 0px; top: 0px;"><ellipse rx="2.5" ry="2.5" cx="3.5" cy="3.5" fill-opacity="1" stroke-linecap="" stroke-dashoffset="" fill="#F8796C" stroke-dasharray="" stroke-opacity="1" stroke-width="2" stroke="transparent"></ellipse></svg></div><div data-name="mojs-shape" class="" style="position: absolute; width: 7px; height: 7px; margin-left: -3.5px; margin-top: -3.5px; opacity: 1; left: 50%; top: 50%; transform: scale(0); transform-origin: 50% 50%;"><svg style="display: block; width: 100%; height: 100%; left: 0px; top: 0px;"><ellipse rx="2.5" ry="2.5" cx="3.5" cy="3.5" fill-opacity="1" stroke-linecap="" stroke-dashoffset="" fill="#F8796C" stroke-dasharray="" stroke-opacity="1" stroke-width="2" stroke="transparent"></ellipse></svg></div><div data-name="mojs-shape" class="" style="position: absolute; width: 7px; height: 7px; margin-left: -3.5px; margin-top: -3.5px; opacity: 1; left: 50%; top: 50%; transform: scale(0); transform-origin: 50% 50%;"><svg style="display: block; width: 100%; height: 100%; left: 0px; top: 0px;"><ellipse rx="2.5" ry="2.5" cx="3.5" cy="3.5" fill-opacity="1" stroke-linecap="" stroke-dashoffset="" fill="#F8796C" stroke-dasharray="" stroke-opacity="1" stroke-width="2" stroke="transparent"></ellipse></svg></div><div data-name="mojs-shape" class="" style="position: absolute; width: 7px; height: 7px; margin-left: -3.5px; margin-top: -3.5px; opacity: 1; left: 50%; top: 50%; transform: scale(0); transform-origin: 50% 50%;"><svg style="display: block; width: 100%; height: 100%; left: 0px; top: 0px;"><ellipse rx="2.5" ry="2.5" cx="3.5" cy="3.5" fill-opacity="1" stroke-linecap="" stroke-dashoffset="" fill="#F8796C" stroke-dasharray="" stroke-opacity="1" stroke-width="2" stroke="transparent"></ellipse></svg></div><div data-name="mojs-shape" class="" style="position: absolute; width: 7px; height: 7px; margin-left: -3.5px; margin-top: -3.5px; opacity: 1; left: 50%; top: 50%; transform: scale(0); transform-origin: 50% 50%;"><svg style="display: block; width: 100%; height: 100%; left: 0px; top: 0px;"><ellipse rx="2.5" ry="2.5" cx="3.5" cy="3.5" fill-opacity="1" stroke-linecap="" stroke-dashoffset="" fill="#F8796C" stroke-dasharray="" stroke-opacity="1" stroke-width="2" stroke="transparent"></ellipse></svg></div><div data-name="mojs-shape" class="" style="position: absolute; width: 7px; height: 7px; margin-left: -3.5px; margin-top: -3.5px; opacity: 1; left: 50%; top: 50%; transform: scale(0); transform-origin: 50% 50%;"><svg style="display: block; width: 100%; height: 100%; left: 0px; top: 0px;"><ellipse rx="2.5" ry="2.5" cx="3.5" cy="3.5" fill-opacity="1" stroke-linecap="" stroke-dashoffset="" fill="#F8796C" stroke-dasharray="" stroke-opacity="1" stroke-width="2" stroke="transparent"></ellipse></svg></div><div data-name="mojs-shape" class="" style="position: absolute; width: 7px; height: 7px; margin-left: -3.5px; margin-top: -3.5px; opacity: 1; left: 50%; top: 50%; transform: scale(0); transform-origin: 50% 50%;"><svg style="display: block; width: 100%; height: 100%; left: 0px; top: 0px;"><ellipse rx="2.5" ry="2.5" cx="3.5" cy="3.5" fill-opacity="1" stroke-linecap="" stroke-dashoffset="" fill="#F8796C" stroke-dasharray="" stroke-opacity="1" stroke-width="2" stroke="transparent"></ellipse></svg></div></div><a id="scrollUp" href="#top" style="position: fixed; z-index: 2147483647;"><i class="fal fa-long-arrow-up"></i></a>



</body></html>
<?php
include('footer.php');

?>