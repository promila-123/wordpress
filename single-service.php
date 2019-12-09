<?php get_header(); ?>


 <!--Service Details -->
<section class="service-details pagetoppadd">
    <div class="container">
         <div class="row">
            <div class="col-md-8 col-sm-7 col-xs-12">
               <div class="serv-image servdtlslide">  
                    <?php
               
        
                    $service_details=get_post_meta(get_the_ID());
                    //print_r($service_details);
                
                    $image_gallery= isset($service_details[THEME_PRE.'slide_image'][0])?maybe_unserialize($service_details[THEME_PRE.'slide_image'][0]):'';

                    if(isset($image_gallery) &&(!empty($image_gallery))){

                   foreach($image_gallery as $image){?>
          
                            <img class="card-img-top" src="<?php echo $image;?>" alt="">
                            
                        <?php } ?>
                   <?php } ?>
                </div>
            </div>

                    <div class="col-md-4 col-sm-5 col-xs-12">
                        <div class="service-sidebar">
                            <div class="sideform">
                                <h3>Make an Appointment</h3>
                                <?php get_sidebar('services');?>
                            </div>
                        </div>
                    </div>
        </div>
                <!-- service Content -->
                <div class="service-content">
                  
                   <?php
                   while(have_posts()):the_post();
                   ?>
                    <a href="<?php the_permalink();?>">
                        <h2><?php the_title();?></h2>
                    </a>

                    <p><?php the_content();?></p>
                     
                   <?php endwhile;
                   
                   $service_details=get_post_meta(get_the_ID());
                   //print_r($service_details)
                   $text= isset($service_details[THEME_PRE.'highlight_context'][0])?maybe_unserialize($service_details[THEME_PRE.'highlight_context'][0]):'';
                   if(isset($text) &&(!empty($text))){
                  
                  ?>

                    <blockquote><?php echo $text;?></blockquote>
                   <?php } ?>

                    
                </div>
    </div>
     
</section>
<?php get_footer(); ?>