<?php



/**
 * Description of Blog search widget
 *
 * @author Rajib Mondal
 */
class Blog_search_widget extends WP_Widget{
    public function __construct() {
        /* Widget settings. */
        $widget_settings = array('classname' => 'search-widget', 'description' => __('Search', TEXTDOMAIN));

        /* Widget control settings. */
        $control_settings = array('id_base' => 'blog_search_widget');
        /* Create Widget */
        parent::__construct('blog_search_widget', __('Blog:Search.', TEXTDOMAIN), $widget_settings, $control_settings);
    }

    function form($instance) {
        $defaults = array(
            'title'=>'',
            'place' => '',
            
        );

        $instance = wp_parse_args((array) $instance, $defaults);

        $form_html ='<p><label for="' . $this->get_field_id('title') . '">Title:</label>
        <input class="widefat" id="' . $this->get_field_id('title') . '" name="' . $this->get_field_name('title') . '" value="' . $instance['title'] . '" />
        <label for="' . $this->get_field_id('place') . '">Search Text:</label>
        <input class="widefat" id="' . $this->get_field_id('place') . '" name="' . $this->get_field_name('place') . '" value="' . $instance['place'] . '" />
</p>';


        print $form_html;
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['place'] = strip_tags($new_instance['place']);
       
        return $instance;
    }

    function widget($args, $instance) {
        extract($args);

        $title = apply_filters('widget_title', $instance['title']);
        $place = $instance['place'];
        print $before_widget;
        ob_start();
        ?>
        <div class="widget">
          <h3 class="widget-title"><?php echo $title;?></h3>
            <form action="." class="search-field" role="search"  action="<?php bloginfo( 'url' ); ?>">
                <input title="Search:" value="<?php the_search_query();?>" placeholder="<?php echo $place; ?>" class="search-box" type="search" name="s">
                <button class="search-btn" type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>


       <?php
        ob_end_flush();
        print $after_widget;
    }
}
