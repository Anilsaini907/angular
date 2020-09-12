	<?php
include('header.php');
error_reporting(1);
?>
<div class="motopress-wrapper content-holder clearfix">
            <div class="container">
                <div class="row">
                    <div class="span12" data-motopress-wrapper-file="page-Portfolio3Cols-filterable.php" data-motopress-wrapper-type="content">
                        <div class="row">
                            <div class="span12" data-motopress-type="static" data-motopress-static-file="static/static-title.php">
                                <section class="title-section">
                                    <h1 class="title-header">
										<?php
					$n=1;
					$sql="SELECT * FROM tb_category where is_active  = 1 and id = '". $_REQUEST['id']."'";
					$result=mysqli_query($sql);
					while($rows=mysqli_fetch_array($result)){
					?>	
					
					<h1>
                            <?php echo $rows['category_name']; ?>                                    
                                    </h1>
									
					<?php } ?>
                                    
                                    <!-- BEGIN BREADCRUMBS-->
                          
                                    <!-- END BREADCRUMBS -->
                                </section>
                                <!-- .title-section -->
                            </div>
                        </div>
                        <div id="content" class="row">
                            <div class="span12" data-motopress-type="loop" data-motopress-loop-file="">
                                <div class="page_content">
                                    <div class="clear"></div>
                                </div>
								   <div class="row">   
                            <?php
							$sql="SELECT * FROM  tb_category_photo where is_active  = 1 and cat_id = '". $_REQUEST['id']."'";
					$result=mysqli_query($sql);
					while($rows=mysqli_fetch_array($result)){
					?>	
					
					                                
                                 <div class="col-span-4">  
                                        <div class="gallery">
										  <?php echo $rows['description']; ?>   </div>
                                          <a href="images/products/<?php echo $rows['photo_path']; ?>" class="image-wrap" title="<?php echo $rows['photo_name']; ?>" rel="prettyPhoto">
                                            <img src="images/products/<?php echo $rows['photo_path']; ?>" alt="<?php echo $rows['photo_name']; ?>" style="width:300px !important; height:200px !important;">
                                          </a>
                                          <div class="desc" style="align:center" > 
										  <?php echo $rows['photo_name']; ?>   </div>
                                        </div>
                                         </div>
                                <?php } ?>       
								</div>
								
								
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		
		<?php
include('footer.php');

?>