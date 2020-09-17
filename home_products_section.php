
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
<div  class="section section-fluid section-padding pt-0">
    <div id="productrows" class="container">

    </div>
</div>


<script>
     
    var categories = JSON.parse('<?= json_encode($allcats); ?>');
    console.log(categories)
   
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


    function getProducts(mycats,category)
    {

    $.post("api/getProduct.php",
    {
        "ids":mycats
    },
    function(data,status){
           console.log(data)
           if(data.length>10) 
        
           {$("#productrows").append('<div id="pro'+mycats[0] +'" class="products row row-cols-xl-5 row-cols-lg-2 row-cols-md-4 row-cols-sm-2 row-cols-1"></div>')
            $("#pro"+mycats[0]).append('<h2 class="title"><a href="product-details.html">'+category.category_name+'</a></h2>')
          
            // for loop for data
            var json=JSON.parse(data)
            console.log(json)
            for(i=0;i<json.length;i++)
            {
                var myproduct=json[i]
                //console.log(myproduct.photo_name)
            $("#pro"+mycats[0]).append(
                `<div class="col">
                <div class="product">
                    <div class="product-thumb">
                        <a href="product-details.html" class="image">
                            <img src="https://tse1.mm.bing.net/th?id=OIP.D5TNfW9cmjp8ZS61857IagHaHa&amp;pid=Api&amp;P=0&amp;w=300&amp;h=300" alt="Product Image">
                            <img class="image-hover " src="`+myproduct.photo_path+`" alt="Product Image">
                        </a>
                        <a href="wishlist.html" class="add-to-wishlist hintT-left" data-hint="Add to wishlist"><i class="far fa-heart"></i></a>
                    </div>
                    <div class="product-info">
                        <h6 class="title"><a href="product-details.html">`+myproduct.photo_name+`</a></h6>
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
        </div>`
                );
           }    
        }
        })
            
 
}

</script>