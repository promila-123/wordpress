<?php



/**
 * Description of Custom_service_widget
 *
 * @author Promila Chowdhury
 */
class Best_services_widget extends WP_Widget{
    public function __construct() {
        /* Widget settings. */
        $widget_settings = array('classname' => 'cat-widget', 'description' => __('Best Service', TEXTDOMAIN));

        /* Widget control settings. */
        $control_settings = array('id_base' => 'freelence_service_widget');
        /* Create Widget */
        parent::__construct('freelence_service_widget', __('freelence:Best Service', TEXTDOMAIN), $widget_settings, $control_settings);
    }

    function form($instance) {
        $defaults = array(
            'title'=>'',
           'number_of_count'=>''
        );

        $instance = wp_parse_args((array) $instance, $defaults);

        $form_html =
        '<p><label for="' . $this->get_field_id('title') . '">widget title:</label>
        <input class="widefat" id="' . $this->get_field_id('title') . '" name="' . $this->get_field_name('title') . '" value="' . $instance['title'] . '" />
        </p>
        <p><label for="' . $this->get_field_id('number_of_count') . '">Number of count:</label>
		<input class="widefat" id="' . $this->get_field_id('number_of_count') . '" name="' . $this->get_field_name('number_of_count') . '" value="' . $instance['number_of_count'] . '" />
		</p>';


        print $form_html;
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['number_of_count'] = strip_tags($new_instance['number_of_count']);
       
        return $instance;
    }

    function widget($args, $instance) {
        extract($args);

        $title = apply_filters('widget_title', $instance['title']);
        $number_of_count = $instance['number_of_count'];
        print $before_widget;
        ob_start();
        ?>
      

    <h3><?php echo $title;?></h3>
    <div class="servicelinks">
        <ul>
        <?php
            $menupost = get_the_ID();
            $servicemenu=new WP_Query(array(
            'post_type'=>'services',
            'posts_per_page'=>$number_of_count,
            'order'=>'ASC',
            
            ));
            while($servicemenu->have_posts()):$servicemenu->the_post();
            if($menupost == get_the_ID()){
            ?>
            <li class="current"><a href="<?php the_permalink();?>"><?php the_title();?></a></li>
            <?php } else { ?>
            <li><a href="<?php the_permalink();?>"><?php the_title();?></a></li>
            <?php } endwhile;?>
        </ul>
    </div>

        <?php
        ob_end_flush();
        print $after_widget;
    }
}
