<?php



/**
 * Description of Custom_category_widget
 *
 * @author Rajib Mondal
 */
class Blog_news_widget extends WP_Widget{
    public function __construct() {
        /* Widget settings. */
        $widget_settings = array('classname' => 'news-widget', 'description' => __('News', TEXTDOMAIN));

        /* Widget control settings. */
        $control_settings = array('id_base' => 'freelencer_news_widget');
        /* Create Widget */
        parent::__construct('freelencer_news_widget', __('Blog:News.', TEXTDOMAIN), $widget_settings, $control_settings);
    }

    function form($instance) {
        $defaults = array(
            'title'=>'',
            
        );

        $instance = wp_parse_args((array) $instance, $defaults);

        $form_html ='<p><label for="' . $this->get_field_id('title') . '">Title:</label>
			<input class="widefat" id="' . $this->get_field_id('title') . '" name="' . $this->get_field_name('title') . '" value="' . $instance['title'] . '" />
		</p>';


        print $form_html;
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
       
        return $instance;
    }

    function widget($args, $instance) {
        extract($args);

        $title = apply_filters('widget_title', $instance['title']);
        print $before_widget;
        ob_start();
        ?>
        
        <?php
        $pwid=get_the_ID();
        $postwidget=new WP_Query(array(
        'post_type'=>'post',
        'posts_per_page'=>3,
        'order'=>'DESC'
        ));
        
         ?>

            <div class="widget popular-posts">
              <h3 class="widget-title"><?php _e($title,TEXTDOMAIN)?></h3>
                <ul class="all-recent">
                    <?php
                    while($postwidget->have_posts()):$postwidget->the_post();
                    if($pwid !== get_the_ID()){?>
           
                    <li>
                        <a href="<?php the_permalink();?>">
                            <figure class="img">
                            <?php echo the_post_thumbnail(array(100,83));?>
                            </figure>
                            <div class="content">
                                <span class="name"><?php the_title();?></span>
                                <span class="date"><?php the_date('F j, Y');?></span>
                            </div>
                        </a>
                    </li>
                    <?php } endwhile;
                    //wp_reset_postdata();
                    wp_reset_query();
                    //rewind_posts();
                    ?>

                </ul>
            </div>


       <?php
        ob_end_flush();
        print $after_widget;
    }
}
