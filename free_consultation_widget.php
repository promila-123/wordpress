<?php

/**
 * Description of Service_widget
 *
 * @author Rajib Mondal
 */
class Free_consultation_widget extends WP_Widget {

    public function __construct() {
        /* Widget settings. */
        $widget_settings = array('classname' => 'consultation-widget', 'description' => __('consultation', TEXTDOMAIN));

        /* Widget control settings. */
        $control_settings = array('id_base' => 'freelence_consultation_widget');
        /* Create Widget */
        parent::__construct('freelence_consultation_widget', __('Freelence:consultation Form', TEXTDOMAIN), $widget_settings, $control_settings);
    }

    function form($instance) {
        $defaults = array(
            'title' => '',
            
        );

        $instance = wp_parse_args((array) $instance, $defaults);

        $form_html = '<p><label for="' . $this->get_field_id('title') . '">Title:</label>
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
            <div class="sideform">
            <h3><?php echo $title;?></h3>
            <?php echo do_shortcode('[contact-form-7 id="73" title="Free consultation" html_class="contact-form" html_id="contact-form"]');?>
           </div>
        <?php
        ob_end_flush();
        print $after_widget;
    }

}
