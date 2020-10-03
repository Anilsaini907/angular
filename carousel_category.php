<?php
?>

<!-- Category Banner Section Start -->
<div id="carouselcategory" class="section section-fluid section-padding pt-0">
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
                        <a href="subCategories.php?id=<?php echo $rows['id']; ?>" class="image">
                        <img  src="images/categories/<?php echo $rows['image'];?>" width="200" height="300"></a>
                        <div class="content">
                            <h3 class="title">
                                <a href="subCategories.php?id=<?php echo  $rows['id']; ?>" ><?php echo  $rows['category_name']; ?></a>
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
