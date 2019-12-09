
<?php

get_header();
?>


      <!--page-title-->
  

        <!--Gallery Section-->
        <section class="gallery-section gallery-style-4 pagetoppadd">
            <div class="gallry-container cleafix">

                <div class="projects-gallery">                   
                    <!--Filter List-->
                    <div class="filter-list row  clearfix">
                    <?php 
                    $gallery_query=new WP_QUERY(array(
                        'post_type'=>'gallery',
                         'posts_per_page'=>-1

                    ));
                    while($gallery_query->have_posts()):$gallery_query->the_post();
                    ?>

                        <!--Default Portfolio Item-->
                        <div class="gallery-item col-md-4 col-sm-6 col-xs-12">
                            <div class="gallery_box">
                                <div class="gallry_wrp">
                                <a class="lightbox-image" data-fancybox-group="example-gallery" href="<?php the_post_thumbnail_url();?>"><?php the_post_thumbnail();?></a>
                                    <div class="gallery_info">
                                        <h4 class="heading"><a href="<?php the_post_thumbnail_url();?>"><?php the_title();?></a></h4>
                                        <p><?php the_title();?></p>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
          
               <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </section>
        <!--Gallery Section end-->
     
        <?php 
        get_footer();?>
        