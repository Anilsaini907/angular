<?php
?>

<!-- Category Banner Section Start -->
<div class="section section-fluid section-padding pt-0">
    <div class="container">
        <div class="category-banner1-carousel">

            <?php

            //var_dump($categories);
            // var_dump("eeeee");
            //echo "eeeeeee"
            $itag=0;
            $sql="SELECT * FROM tb_category where is_active  =1";

            $categories=mysqli_query($mysqliconn,$sql);
            while($rows=mysqli_fetch_array($categories)){
            //var_dump($rows);
            ?>
            <div class="col">

                <div class="category-banner1">
                    <div class="inner">
                        <a href="shop.html" class="image"><img src="assets/images/banner/category/banner-s1-1.jpg" alt=""></a>
                        <div class="content">
                            <h3 class="title">
                                <a href="shop.html" ><?php echo  $rows['category_name']; ?></a>
                                <span class="number"></span>
                            </h3>
                        </div>
                    </div>
                </div>

            </div>
            <?php }?>


        </div>
    </div>
</div>
<!-- Category Banner Section End -->
