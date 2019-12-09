<?php
$utility = new Utility_Object();
$page_id = $utility->cat_cid();
?>

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
                <h1><?php $post_type1 = get_post_type(); $post_type_object1 = get_post_type_object($post_type1); _e($post_type_object1->labels->name,TEXTDOMAIN);?></h1>
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
