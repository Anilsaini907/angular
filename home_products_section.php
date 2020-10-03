
<style>


/* @media only screen and (max-width: 500px) {
   .col-12 {
   max-width: 100%;

}

@media only screen and (min-width: 501px) {
   #imageModel {
   max-width: 50%;
}
#textModel {
   max-width: 50%;
} */

/* .slick-slide {
   display: none;
   float: left;
   height: 300px;
   min-height: 1px;
} 

}  */


/* .learts-mb-n30 {
   margin-bottom: -30px;
   height: 100%;
} */

/* .slick-track{
   height:380px;
}


.slick-slide.slick-active{
   height:210px;
}
#productDiv.section.section-fluid.section-padding
   {
   margin-top:-270px;
   } */
   .slick-slide {
   display: none;
   float: left;
   height:auto;
   min-height: 1px;
}

#productrows{
    margin-top:-200px;
    
}


</style>


<?php
// var_dump($allcats);
 //$catsql="SELECT * FROM tb_category where is_active  =1";
//$allcats=array();
?>
<div class="section section-fluid section-padding pt-0">
    <div class="container">

        <!-- Section Title Start -->
        <div class="section-title text-center">
            <h3 class="sub-title">Shop now</h3>
            <h2 class="title title-icon-both">Shop our best-sellers</h2>
        </div>
        </div>
</div>
<div id="productDiv" class="section section-fluid section-padding ">
    <div id="productrows" class="container ">

    </div>
</div>
<script>
     
    var categories = JSON.parse('<?= json_encode($allcats); ?>');
    //console.log(categories)
   
    getMySubCats()
    function getMySubCats()
    {

        for (var i = 0; i < categories.length; i++) { 
            
            var mycats=[];
        if(categories[i].parent_id==0)
        {
            //console.log("called")
        var catid = categories[i].id; 
        mycats.push(catid,categories[i].id)
        //console.log(mycats)
        mycats=mycats.concat(subcat(categories,catid))
        getProducts(mycats,categories[i])
        //console.log(mycats)
        }
        } 
    
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


    var relatedProducts;
    function getProducts(mycats,category)
    {

    $.post("api/getProduct.php",
    {
        "ids":mycats
    },
    function(data,status){
           //console.log(data)
           if(data.length>10) 
        
           {$("#productrows").append('<div id="pro'+mycats[0] +'" class="products row row-cols-xl-5 row-cols-lg-2 row-cols-md-4 row-cols-sm-2 row-cols-1"></div>')
            $("#pro"+mycats[0]).append()
          
            // for loop for data
            relatedProducts=JSON.parse(data);
           //console.log( relatedProducts);
            for(i=0;i<relatedProducts.length;i++)
            {
                var myproduct=relatedProducts[i]
              // console.log(myproduct)
            $("#pro"+mycats[0]).append(
                `<div class="col">
                <div class="product pt-5">
                    <div class="product-thumb">
                        <a href="product-details.php?id=`+myproduct.id+`" class="image">
                            <img src="images/products/`+myproduct.photo_path+`" alt="`+myproduct.photo_name+`" width="200" height="300" ">
                            <img class="image-hover " src="images/products/`+myproduct.photo_path+`" alt="`+myproduct.photo_name+`" width="200" height="300" " alt="`+myproduct.photo_name+`">
                        </a>
                        <a href="wishlist.html" class="add-to-wishlist hintT-left" data-hint="Add to wishlist"><i class="far fa-heart"></i></a>
                    </div>
                    <div class="product-info">
                        <h6 class="title"><a href="product-details.php?id=`+myproduct.id+`tabindex="0">`+myproduct.photo_name+`</a></h6>
                        
                        <div class="product-buttons">
                        
                            <a  onclick='getProductById(`+JSON.stringify(myproduct)+`)'  data-target="#quickViewModal" data-toggle="modal" class="product-button hintT-top" data-hint="Quick View"><i class="fal fa-search"></i></a>
                        </div>
                    </div>
                </div>
            </div>     
        </div>`
                );
           }    
        }
        })
    }
            
 


// function getProductBasedOnId(id)
// {
// for(i=0;i<= relatedProducts.length;i++){
//   var products= relatedProducts[i];
//   console.log(products);
    
// }
    ///for loop from array
    // if condition matches id to get product
    //return product;

//}

function getProductById(obj){
var obj=JSON.stringify(obj);
var product=JSON.parse(obj);
var catId=product.cat_id;
console.log(catId);
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



