<?php get_header(); 
?>
<?php
/*$post_id=get_the_ID();
$vc_enabled = get_post_meta($post_id, '_wpb_vc_js_status', true);

if($vc_enabled==="false"){
    echo '<div class="page-content defaultpage">';
    echo '<div class="container">';
}

?>
*/

if (have_posts()) : while (have_posts()) : the_post(); ?>

            <?php the_content(); ?>

           
        <?php
        endwhile;
    endif;


   /*if($vc_enabled==="false"){
	 echo '</div>';
     echo '</div>';
   }*/
   ?>
<?php //get_sidebar(); ?>
<?php get_footer(); ?>