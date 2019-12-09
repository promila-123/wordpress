<?php
$utility = new Utility_Object();
$page_id = $utility->cat_cid();
?>
<?php 
/*
<section class="page-title o-hidden text-center grey-bg bg-contain animatedBackground" data-bg-img="<?php echo IMAGES;?>bg/05.png">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-12">
          <h1 class="title"><?php _e(get_the_title($page_id),TEXTDOMAIN);?></h1>
        <nav aria-label="breadcrumb" class="page-breadcrumb">
            <?php 
            echo Page_breadcumb::custom_breadcrumbs();
            ?>
          
        </nav>
      </div>
    </div>
  </div>
    <div class="page-title-pattern"><img class="img-fluid" src="<?php echo IMAGES;?>bg/06.png" alt="pattern"></div>
</section>
<?php
*/?>
<?php
if ( has_post_thumbnail( $page_id ) ) {
 $image = wp_get_attachment_image_src( get_post_thumbnail_id( $page_id ), 'full' );

  $url = $image[0];

}else{
  $url = IMAGES.'background/3.jpg';
}
?>
<section class="page-title" style="background-image:url(<?php echo $url;?>);background-repeat: no-repeat;">
        <div class="container">
            <div class="outer-box">
                <h1><?php _e(get_the_title($page_id),TEXTDOMAIN);?></h1>
                <!-- <ul class="bread-crumb clearfix">
                    <li><a href="index-2.html"><span class="fa fa-home"><?php echo $title1;?></span></a></li>
                    <li class="active"><?php //cho $title2;?> </li>
                </ul>
                -->
                <?php 
                echo Page_breadcumb::custom_breadcrumbs();
                ?>
            </div>                
        </div>
</section>
