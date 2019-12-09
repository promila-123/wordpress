<?php 
get_header();
?>

<section class="innerpage">
        <div class="container">


		  <div class="content-wrapper">	
           <div class="testm-section-4">
                <div class="row">
                <?php
            $args = array( 
                'numberposts'		=> -1, // -1 is for all
                'post_type'		=> 'testimonial', // or 'post', 'page'
                'orderby' 		=> 'ID', // or 'date', 'rand'
                'order' 		=> 'ASC', // or 'DESC'
               
              );
            
            $myposts = get_posts($args);
            

            if($myposts){
            foreach ($myposts as $mypost){
             $testimonial_details= get_post_meta($mypost->ID);
            ?>
                    <div class="col-sm-6">
                        <div class="testbox">
                            <div class="client_msg">
                                <span class="quoteicon"><i class="fa fa-quote-left"></i></span>
                                <p><?php echo $mypost->post_content;?></p>
                                <div class="client_desc"><span class="client_name"><?php echo $mypost->post_title;?></span>
                                <span class="client_place"><?php echo $testimonial_details[THEME_PRE.'location'][0]?></span></div>
                            </div>
                            <div class="client_info">
                                <span class="client_image">
                                <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $mypost->ID ), 'single-post-thumbnail'); ?>
                                <img src="<?php echo $image[0]; ?>" alt="" size="" >
                                
                            </div>
                        </div>
                    </div>
            <?php } ?>
            <?php } ?>
                    
                </div>
            </div>
        </section>
        <!-- Testimonials section end -->

    <!--End pagewrapper-->
    <?php
    get_footer();
    ?>