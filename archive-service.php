<?php 
get_header(); ?>


<section class="service-style4 pagetoppadd">
            <div class="container">
           <div class="row">
               <?php  
                          
                    $posts = get_posts(array(
                   'post_type' => 'service',
                   'posts_per_page'=>-1,
                   'post_status'=>'publish',
                           
                       ));
                     
                    foreach($posts as $post){?>
                
                    <div class="col-sm-6 col-md-4">
                        <div class="searvice-wrp">
                            <div class="service-box">
                            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),array(360,215)); ?>
                            <a href="<?php echo get_permalink($post->ID);?>"><img src="<?php echo $image[0]; ?>" alt=""></a>
                                <div class="service_titile">
                                <a href="<?php echo get_permalink($post->ID);?>"><h3><?php echo $post->post_title;?></a></h3>
                                <a href="<?php echo get_permalink($post->ID);?>"><p><?php echo wp_trim_words($post->post_content,10);?></a></p>
									<!-- <a class="knowmore" href="">Know More</a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <?php } ?>
                </div>
            </div>
        </section>
          
        <!--News  end-->
<?php get_footer(); ?>