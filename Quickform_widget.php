<?php

/**
 * Description of Service_widget
 *
 * @author Rajib Mondal
 */
class Quickform_widget extends WP_Widget {

    public function __construct() {
        /* Widget settings. */
        $widget_settings = array('classname' => 'quickform-widget', 'description' => __('quickform', TEXTDOMAIN));

        /* Widget control settings. */
        $control_settings = array('id_base' => 'drug_quickform_widget');
        /* Create Widget */
        parent::__construct('drug_quickform_widget', __('Drug:Quickform', TEXTDOMAIN), $widget_settings, $control_settings);
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
        <div class="consultation-two mb-40">
                <h4><?php echo $title;?></h4>
                
                <div class="default-form-area contact-form">
                <?php echo do_shortcode('[contact-form-7 id="249" title="contact_form_widget"]');?>
                
                </div>
                
            </div>
        <?php
        ob_end_flush();
        print $after_widget;
    }

}
