
<?php
/*
Template Name: Blog Template
*/
?>
     <?php 
     get_header();
     ?>
    <section class="news-style2 pagetoppadd">
        <div class="container">
                <div class="row">

                    <?php
                        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                        $args = array( 
                        'posts_per_page' => -1,
                        'post_status'=>'publish',
                        'paged' => $paged,
                       
                            
                    );
                    $postslist = new WP_Query( $args );
                    if ( $postslist->have_posts() ) :
                   while ( $postslist->have_posts() ) : $postslist->the_post(); ?>
                 
              <!--News Item-->
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="news_item">
                            <div class="image">
                                <a href="<?php echo  get_the_permalink(get_the_ID());?>">
                                <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( ), 'single-post-thumbnail','full'); ?>
                                <img src="<?php echo $image[0];?>" alt=""></a>
                            </div>
                            <div class="metalink clearfix">
                                <div class="post_date"><?php echo date( 'd M, Y', strtotime( $post->post_date));?></div>
                            </div>
                            <div class="news_content">

                                <h3><a href="<?php echo  get_the_permalink($post->ID);?>"><?php the_title();?></a></h3>
                                <div class="text"><?php echo wp_trim_words(the_content(),10);?></div>
                                <div class="btnlink">
                                    <a href="<?php echo  get_the_permalink(get_the_id());?>" class="detail">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
                <div class="pagination-show  text-center">
                    <ul>
                  
                  
                  <?php
                  $links=paginate_links( array(
                   'format'  => 'page/%#%',
                   'current' => $paged,
                   'total'   => $postslist->max_num_pages,
                   'mid_size'        => 3,
                   'prev_text'       => __('<span class="fa fa-long-arrow-left"></span>'),
                   'next_text'       => __( '<span class="fa fa-long-arrow-right"></span>'),
                   'type' => 'list'
                  ) );
                  echo $links;
                  ?>
            
  
                  </ul>
                </div>
          <?php  endif; ?>
        </div>
    </section>

<?php 
get_footer();

?>