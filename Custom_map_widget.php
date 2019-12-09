<?php

/**
 * Description of Service_widget
 *
 * @author Rajib Mondal
 */
class Custom_map_widget extends WP_Widget {

    public function __construct() {
        /* Widget settings. */
        $widget_settings = array('classname' => 'map-widget', 'description' => __('map', TEXTDOMAIN));

        /* Widget control settings. */
        $control_settings = array('id_base' => 'freelencer_request_widget');
        /* Create Widget */
        parent::__construct('freelencer_request_widget', __('Footer:Map widget', TEXTDOMAIN), $widget_settings, $control_settings);
    }

    function form($instance) {
        $defaults = array(
            'title' => '',
           'page_id'=>'',
        );

        $instance = wp_parse_args((array) $instance, $defaults);

        $form_html = '<p><label for="' . $this->get_field_id('title') . '">Title:</label>
            <input class="widefat" id="' . $this->get_field_id('title') . '" name="' . $this->get_field_name('title') . '" value="' . $instance['title'] . '" />
            <label for="' . $this->get_field_id('page_id') . '">Page ID:</label>
            <input class="widefat" id="' . $this->get_field_id('page_id') . '" name="' . $this->get_field_name('page_id') . '" value="' . $instance['page_id'] . '" />
            </p>';

       print $form_html;
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['page_id'] = strip_tags($new_instance['page_id']);
        
       
        return $instance;
    }

    function widget($args, $instance) {
        extract($args);

        $title = apply_filters('widget_title', $instance['title']);
        $page_id = $instance['page_id'];
       
        print $before_widget;

       
        ob_start();
        ?>
        <?php
       
        if($page_id==get_the_ID()){
        ?>
        <!--Contact Section -->
        <section class="homemap">

            <!--google map-->
            <div class="map">
                <div class="google-map" id="contact-google-map" style="height:435px; width:100%;"></div>
            </div>
            <!--google map end-->

        </section>
        <!--Contact Section end -->
        <?php } ?>
        <?php
        ob_end_flush();
        print $after_widget;
    }

}
