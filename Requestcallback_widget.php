
<?php

/**
 * Description of Service_widget
 *
 * @author Rajib Mondal
 */
class Requestcallback_widget extends WP_Widget {

    public function __construct() {
        /* Widget settings. */
        $widget_settings = array('classname' => 'request-widget', 'description' => __('request', TEXTDOMAIN));

        /* Widget control settings. */
        $control_settings = array('id_base' => 'drug_request_widget');
        /* Create Widget */
        parent::__construct('drug_request_widget', __('Drug:Request A Callback', TEXTDOMAIN), $widget_settings, $control_settings);
    }

    function form($instance) {
        $defaults = array(
            'title' => '',
            'info' => '',
            'phone' => '',
            'button_text' => '',
            'button_link' => '',
            
        );

        $instance = wp_parse_args((array) $instance, $defaults);

        $form_html = '<p><label for="' . $this->get_field_id('title') . '">Title:</label>
            <input class="widefat" id="' . $this->get_field_id('title') . '" name="' . $this->get_field_name('title') . '" value="' . $instance['title'] . '" />
            <label for="' . $this->get_field_id('info') . '">Info:</label>
            <input class="widefat" id="' . $this->get_field_id('info') . '" name="' . $this->get_field_name('info') . '" value="' . $instance['info'] . '" />
            <label for="' . $this->get_field_id('phone') . '">Phone:</label>
            <input class="widefat" id="' . $this->get_field_id('phone') . '" name="' . $this->get_field_name('phone') . '" value="' . $instance['phone'] . '" />
            <label for="' . $this->get_field_id('button_text') . '">Button Text:</label>
            <input class="widefat" id="' . $this->get_field_id('button_text') . '" name="' . $this->get_field_name('button_text') . '" value="' . $instance['button_text'] . '" />
            <label for="' . $this->get_field_id('button_link') . '">Button Link:</label>
            <input class="widefat" id="' . $this->get_field_id('button_link') . '" name="' . $this->get_field_name('button_link') . '" value="' . $instance['button_link'] . '" />
        </p>';


        print $form_html;
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['info'] = strip_tags($new_instance['info']);
        $instance['phone'] = strip_tags($new_instance['phone']);
        $instance['button_text'] = strip_tags($new_instance['button_text']);
        $instance['button_link'] = strip_tags($new_instance['button_link']);
       
        return $instance;
    }

    function widget($args, $instance) {
        extract($args);

        $title = apply_filters('widget_title', $instance['title']);
        $info = $instance['info'];
        $phone = $instance['phone'];
        $button_text = $instance['button_text'];
        $button_link = $instance['button_link'];
       
        print $before_widget;

       
        ob_start();
        ?>
        <div class="request-callback">
            <div class="inner-box">
                <h4><?php echo $title;?></h4>
                <div class="text"><?php echo $info;?></div>
                <div class="phone-number"><span class="flaticon-headphones"></span><?php echo $phone;?></div>
                <div class="link-btn"><a href="<?php echo $button_link;?>" class="theem-btn btn-style-two"><?php echo $button_text;?></a></div>
            </div>
        </div>
        <?php
        ob_end_flush();
        print $after_widget;
    }

}
