<?php

/**
 * Description of Custom_search_widget
 *
 * @author Rajib Mondal
 */
class Custom_search_widget extends WP_Widget {

    public function __construct() {
        /* Widget settings. */
        $widget_settings = array('classname' => 'search-widget', 'description' => __('Search', TEXTDOMAIN));

        /* Widget control settings. */
        $control_settings = array('id_base' => 'industry_serach_widget');
        /* Create Widget */
        parent::__construct('industry_serach_widget', __('industry:Search Widget.', TEXTDOMAIN), $widget_settings, $control_settings);
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
       <div class="header_search">
<ul class="header_searchbox">
    <li>
        <div class="search_icon">
            <i class="fa fa-search" aria-hidden="true"></i>
        </div>
        <div class="search_drop" style="display: none;">
        <form method="get" action="<?php bloginfo( 'url' ); ?>/">
            <input placeholder="<?php echo $place;?>" type="text" name="s" value="<?php the_search_query();?> " required>
            <button><i class="fa fa-search" aria-hidden="true"></i></button>
            </form>
        </div>
    </li>
</ul>
</div>
       
        <?php
        ob_end_flush();
        print $after_widget;
    }

}