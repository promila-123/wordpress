<?php



/**
 * Description of Custom_category_widget
 *
 * @author Rajib Mondal
 */
class Custom_category_widget extends WP_Widget{
    public function __construct() {
        /* Widget settings. */
        $widget_settings = array('classname' => 'cat-widget', 'description' => __('Categories', TEXTDOMAIN));

        /* Widget control settings. */
        $control_settings = array('id_base' => 'industry_cat_widget');
        /* Create Widget */
        parent::__construct('industry_cat_widget', __('industry:Categories.', TEXTDOMAIN), $widget_settings, $control_settings);
    }

    function form($instance) {
        $defaults = array(
            'title'=>'',
            'place' => '',
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
        $place = $instance['place'];
        print $before_widget;
        ob_start();
        $cats = get_the_category();
      
        ?>
<div class="widget grey-bg px-4 py-4">
        <h5 class="widget-title"><?php _e($title,TEXTDOMAIN)?></h5>
        <ul class="widget-categories list-unstyled">
            <?php
                    foreach ($cats as $key => $value) {
                     ?>
            <li> <a href="<?php echo get_category_link($value->term_id)?>"><?php _e($value->name,TEXTDOMAIN);?></a>
            </li>
            <?php
                    }
            ?>
            
        </ul>
    </div>
        
        <?php
        ob_end_flush();
        print $after_widget;
    }
}
