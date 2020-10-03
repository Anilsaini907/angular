<?php 
include_once('admin/config.php'); 
$id = $_GET['id'];
//var_dump($id);
$idsql="SELECT * FROM tb_products where id= $id";
$products=array();
 if (!empty($mysqliconn)) 
 {
     $product=mysqli_query($mysqliconn,$idsql);
     while($rows=mysqli_fetch_array($product))
     {
     //var_dump($rows);
     array_push($products,$rows);
     }
    
 }
 $catId= $products[0]['cat_id'];
// var_dump($catId);
 $catIdsql="SELECT * FROM tb_products where cat_id= $catId ORDER BY id DESC LIMIT 10";
 $productsArray=array();
  if (!empty($mysqliconn)) 
  {
      $productCat=mysqli_query($mysqliconn,$catIdsql);
      while($rows=mysqli_fetch_array($productCat))
      {
      //var_dump($rows);
      array_push($productsArray,$rows);
      }
  }

$categoryIdsql="SELECT * FROM tb_category where id= $catId";
$categoryArray=array();
  if (!empty($mysqliconn)) 
  {
      $Catarray=mysqli_query($mysqliconn,$categoryIdsql);
      while($rows=mysqli_fetch_array($Catarray))
      {
      //var_dump($rows);
      array_push($categoryArray,$rows);
      }
      //var_dump($categoryArray[0]['category_name']);
  }

?>
<?php
include('header.php');?>

<style>
    .product-thumb .image img {
        height:270px;
    }

    .col {
    margin-bottom: 15px;
}
.slick-slide img {
    height: 300px;
}

.slick-list.draggable{
    height: fit-content;
}

.product-zoom img#productImage {
    height: 700px;
}


</style>
  
    <!-- Page Title/Header Start -->
    <div class="page-title-section section" data-bg-image="http://thumbs.dreamstime.com/z/handmade-blankets-against-white-background-29937568.jpg ">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="page-title">
                        <h1 class="title">Shop Now</h1>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="indx.html">Home</a></li>
                            <li class="breadcrumb-item"><a href="shop.html">Products</a></li>
                            <li class="breadcrumb-item active">Cleaning Dustpan & Brush</li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Page Title/Header End -->

    <!-- Single Products Section Start -->
    <div class="section section-padding border-bottom">
        <div class="container">
            <div class="row learts-mb-n40">

                <!-- Product Images Start -->
                <div class="col-lg-6 col-12 learts-mb-40">
                    <div class="product-images">
                        <button class="product-gallery-popup hintT-left" data-hint="Click to enlarge" data-images='[
                            {"src": "assets/images/product/single/1/product-zoom-1.jpg", "w": 700, "h": 1100},
                            {"src": "assets/images/product/single/1/product-zoom-2.jpg", "w": 700, "h": 1100},
                            {"src": "assets/images/product/single/1/product-zoom-3.jpg", "w": 700, "h": 1100},
                            {"src": "assets/images/product/single/1/product-zoom-4.jpg", "w": 700, "h": 1100}
                        ]'><i class="far fa-expand"></i></button>
                        <a href="https://www.youtube.com/watch?v=1jSsy7DtYgc" class="product-video-popup video-popup hintT-left" data-hint="Click to see video"><i class="fal fa-play"></i></a>
                        <div class="product-gallery-slider">
                            <div class="product-zoom" data-image="⁨images/products/<?php echo $products[0]['photo_path']; ?>">
                                <img id="product_image" src="images/products/<?php echo $products[0]['photo_path']; ?>" alt="">
                            </div>
                            <div class="product-zoom" data-image="assets/images/product/single/1/product-zoom-2.jpg">
                                <img src="assets/images/product/single/1/product-2.jpg" alt="">
                            </div>
                            <div class="product-zoom" data-image="assets/images/product/single/1/product-zoom-3.jpg">
                                <img src="assets/images/product/single/1/product-3.jpg" alt="">
                            </div>
                            <div class="product-zoom" data-image="assets/images/product/single/1/product-zoom-4.jpg">
                                <img src="assets/images/product/single/1/product-4.jpg" alt="">
                            </div>
                        </div>
                        <!-- <div class="product-thumb-slider">
                            <div class="item">
                                <img src="assets/images/product/single/1/product-thumb-1.jpg" alt="">
                            </div>
                            <div class="item">
                                <img src="assets/images/product/single/1/product-thumb-2.jpg" alt="">
                            </div>
                            <div class="item">
                                <img src="assets/images/product/single/1/product-thumb-3.jpg" alt="">
                            </div>
                            <div class="item">
                                <img src="assets/images/product/single/1/product-thumb-4.jpg" alt="">
                            </div>
                        </div> -->
                    </div>
                </div>
                <!-- Product Images End -->

                <!-- Product Summery Start -->
                <div class="col-lg-6 col-12 learts-mb-40">
                    <div class="product-summery">
                        <!-- <div class="product-nav">
                            <a href="#"><i class="fal fa-long-arrow-left"></i></a>
                            <a href="#"><i class="fal fa-long-arrow-right"></i></a>
                        </div>
                        <div class="product-ratings">
                            <span class="star-rating">
                                <span class="rating-active" style="width: 100%;">ratings</span>
                            </span>
                            <a href="#reviews" class="review-link">(<span class="count">3</span> customer reviews)</a>
                        </div> -->
                        <h3 class="product-title"><?php echo $products[0]['photo_name']; ?>
                        </h3>
                        <!-- <div class="product-price">£38.00 – £50.00</div> -->
                        <div class="product-description">
                            <p id ="description"><?php echo $products[0]['description']; ?></p>
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
                                    <!-- <tr>
                                        <td class="label"><span>Color</span></td>
                                        <td class="value">
                                            <div class="product-colors">
                                                <a href="#" data-bg-color="#000000"></a>
                                                <a href="#" data-bg-color="#ffffff"></a>
                                            </div>
                                        </td>
                                    </tr> -->
                                    <!-- <tr>
                                        <td class="label"><span>Quantity</span></td>
                                        <td class="value">
                                            <div class="product-quantity">
                                                <span class="qty-btn minus"><i class="ti-minus"></i></span>
                                                <input type="text" class="input-qty" value="1">
                                                <span class="qty-btn plus"><i class="ti-plus"></i></span>
                                            </div>
                                        </td>
                                    </tr> -->
                                </tbody>
                            </table>
                        </div>
                        <!-- <div class="product-buttons">
                            <a href="#" class="btn btn-icon btn-outline-body btn-hover-dark hintT-top" data-hint="Add to Wishlist"><i class="fal fa-heart"></i></a>
                            <a href="#" class="btn btn-dark btn-outline-hover-dark"><i class="fal fa-shopping-cart"></i> Add to Cart</a>
                            <a href="#" class="btn btn-icon btn-outline-body btn-hover-dark hintT-top" data-hint="Compare"><i class="fal fa-random"></i></a>
                        </div> -->
                        <!-- <div class="product-brands">
                            <span class="title">Brands</span>
                            <div class="brands">
                                <a href="#"><img src="assets/images/brands/brand-3.png" alt=""></a>
                                <a href="#"><img src="assets/images/brands/brand-8.png" alt=""></a>
                            </div>
                        </div> -->
                        <div class="product-meta">
                            <table>
                                <tbody>
                                    <!-- <tr>
                                        <td class="label"><span>SKU</span></td>
                                        <td class="value">0404019</td>
                                    </tr> -->
                                    <tr>
                                        <td class="label"><span>Category</span></td>
                                        <td class="value">
                                            <ul class="product-category">
                                                <li><a href="#"><?php echo $categoryArray[0]['category_name']; ?></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <!-- <tr>
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
                                    </tr> -->
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
                    </div>
                </div>
                <!-- Product Summery End -->

            </div>
        </div>

    </div>
    <!-- Single Products Section End -->

    <!-- Single Products Infomation Section Start -->
    <div class="section section-padding border-bottom">
        <div class="container">

            <ul class="nav product-info-tab-list">
                <li><a class="active" data-toggle="tab" href="#tab-description">Description</a></li>
                
            </ul>
            <div class="tab-content product-infor-tab-content">
                <div class="tab-pane fade show active" id="tab-description">
                    <div class="row">
                        <div class="col-lg-10 col-12 mx-auto">
                            <p><?php echo $products[0]['description']; ?></p>
                        </div>
                    </div>
                </div>
                
            </div>

        </div>
    </div>
    <!-- Single Products Infomation Section End -->

    <!-- Product thumbnil Products Section Start -->
    <div class="section section-padding">
        <div class="container">

            <!-- Section Title Start -->
            <div class="section-title2 text-center">
                <h2 class="title">You Might Also Like</h2>
            </div>
            <!-- Section Title End -->

            <!-- Products Start -->
            <div id="productCarousel" class="product-carousel">
                
            </div>
            <!-- Products End -->

        </div>
    </div>
    <!-- Product thumbnil Products Section End -->

    <!-- Root element of PhotoSwipe. Must have class pswp. -->
    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

        <!-- Background of PhotoSwipe. 
         It's a separate element as animating opacity is faster than rgba(). -->
        <div class="pswp__bg"></div>

        <!-- Slides wrapper with overflow:hidden. -->
        <div class="pswp__scroll-wrap">

            <!-- Container that holds slides. 
            PhotoSwipe keeps only 3 of them in the DOM to save memory.
            Don't modify these 3 pswp__item elements, data is added later on. -->
            <div class="pswp__container">
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
            </div>

            <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
            <div class="pswp__ui pswp__ui--hidden">

                <div class="pswp__top-bar">

                    <!--  Controls are self-explanatory. Order can be changed. -->

                    <div class="pswp__counter"></div>

                    <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

                    <button class="pswp__button pswp__button--share" title="Share"></button>

                    <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

                    <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

                    <!-- Preloader demo https://codepen.io/dimsemenov/pen/yyBWoR -->
                    <!-- element will get class pswp__preloader--active when preloader is running -->
                    <div class="pswp__preloader">
                        <div class="pswp__preloader__icn">
                            <div class="pswp__preloader__cut">
                                <div class="pswp__preloader__donut"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                    <div class="pswp__share-tooltip"></div>
                </div>

                <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
                </button>

                <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
                </button>

                <div class="pswp__caption">
                    <div class="pswp__caption__center"></div>
                </div>

            </div>

        </div>

    </div>

    <!-- JS
============================================ -->
<script>
       var products = JSON.parse('<?= json_encode($productsArray); ?>');
       //console.log(categories)
       for(i=0;i<products.length;i++){
        //console.log(products[i])

        $("#productCarousel").append(`
        <div class="col">
                    <div class="product">
                        <div class="product-thumb">
                            <a href="product-details.php?id=`+products[i].id+`" class="image">
                                
                                <img src="images/products/`+products[i].photo_path+`" alt="Product Image">
                                <img class="image-hover " src="images/products/`+products[i].photo_path+`" alt="Product Image">
                            </a>
                            
                        </div>
                        <div class="product-info">
                            <h6 class="title"><a href="product-details.html">`+products[i].photo_name+`</a></h6>
                            
                            <div class="product-buttons">
                                <a onclick='getProductById(`+JSON.stringify(products[i])+`)' data-target="#quickViewModal" data-toggle="modal" class="product-button hintT-top" data-hint="Quick View"><i class="fal fa-search"></i></a>
                                
                            </div>
                        </div>
                    </div>
                </div>
                    `);

       }
function getProductById(obj){
var obj=JSON.stringify(obj);
var product=JSON.parse(obj);
var catId=product.cat_id;
var productName=product.photo_name;
var productImage=product.photo_path;
console.log(productImage);
var productDescription=product.description;
document.getElementById('productName').innerHTML=productName;
document.getElementById('productDescription').innerHTML=productDescription;
document.getElementById('productImage').src="images/products/"+productImage;
document.getElementById('productImage').alt="images/products/"+productImage;
console.log(document.getElementById('productImage').src)
for (var i = 0; i < categories.length; i++) { 
            
        if(categories[i].id==catId)
        {
 document.getElementById('productCategory').innerHTML=categories[i].category_name;
        
        }
        } 

}
       </script>  
       
<?php include('footer.php');
//error_reporting(2);
?>