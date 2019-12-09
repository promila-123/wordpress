<?php


/**
 * Description of Custom_tag_widget
 *
 * @author Rajib Mondal
 */
class Custom_tag_widget extends WP_Widget{
   public function __construct() {
        /* Widget settings. */
        $widget_settings = array('classname' => 'tag-widget', 'description' => __('Tags', TEXTDOMAIN));

        /* Widget control settings. */
        $control_settings = array('id_base' => 'freelencer_tag_widget');
        /* Create Widget */
        parent::__construct('freelencer_tag_widget', __('Blog:TAGS.', TEXTDOMAIN), $widget_settings, $control_settings);
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
       
        $cats = get_the_tags(get_the_ID());
       
        ?>
    
    <div class="widget widget-tag">
          <h3 class="widget-title"><?php _e($title,TEXTDOMAIN)?></h3>
                <div class="alltags">
                                <?php
                                foreach ($cats as $key => $value) {
                                 ?>
                            <a href="<?php echo get_the_permalink(10)."?tag=".$value->term_id;?>" class=""><?php _e($value->name)?> </a>
                                <?php } ?>      
                 </div>
    </div>
        
        <?php
        ob_end_flush();
        print $after_widget;
    }
}
