<?php


/**
 * Description of Theme_widget
 *
 * @author Rajib Mondal
 */
class Theme_widget {
    public function __construct() {
        require_once $this->path().'/custom/Custom_search_widget.php';
        register_widget('Custom_search_widget');
        require_once $this->path().'/custom/Custom_tag_widget.php';
        register_widget('Custom_tag_widget');
        /*require_once $this->path().'/custom/Custom_category_widget.php';
        register_widget('Custom_category_widget');
        require_once $this->path().'/custom/Custom_tag_widget.php';
        register_widget('Custom_tag_widget');
        require_once $this->path().'/custom/Custom_testimonial_widget.php';
        register_widget('Custom_testimonial_widget');
        require_once $this->path().'/custom/Service_widget.php';
        register_widget('Service_widget');
        require_once $this->path().'/custom/Appointment_widget.php';
        register_widget('Appointment_widget');
        require_once $this->path().'/custom/News_widget.php';
        register_widget('News_widget');
        */
        // require_once $this->path().'/custom/Addiction_widget.php';
        // register_widget('Addiction_widget');
        // require_once $this->path().'/custom/Treatment_widget.php';
        // register_widget('Treatment_widget');
        // require_once $this->path().'/custom/Faq_widget.php';
        // register_widget('Faq_widget');
       // require_once $this->path().'/custom/Quickform_widget.php';
        //register_widget('Quickform_widget');
        //require_once $this->path().'/custom/Requestcallback_widget.php';
        //register_widget('Requestcallback_widget');
        require_once $this->path().'/custom/Best_services_widget.php';
        register_widget('Best_services_widget');
         //register_widget('Requestcallback_widget');
         require_once $this->path().'/custom/free_consultation_widget.php';
         register_widget('Free_consultation_widget');
         require_once $this->path().'/custom/blog_category_widget.php';
         register_widget('Blog_category_widget');
         require_once $this->path().'/custom/blog_news_widget.php';
         register_widget('Blog_news_widget');
         require_once $this->path().'/custom/Custom_map_widget.php';
         register_widget('Custom_map_widget');
         require_once $this->path().'/custom/blog_search_widget.php';
         register_widget('Blog_search_widget');
         require_once $this->path().'/custom/service_form_widget.php';
         register_widget('Service_form_widget');
        //  require_once $this->path().'/custom/Custom_image_widget.php';
        //  register_widget('Custom_image_widget');
        //  require_once $this->path().'/custom/Custom_textarea_widget.php';
        //  register_widget('ad_widget');
     



    }
    private function path() {
        $dir = trailingslashit(dirname(__FILE__));

        return $dir;
    }
    /*
    public function post_widget(){
        register_sidebar(array(
            'name' => __('Post Page', TEXTDOMAIN),
            'id' => 'post-page-sidebar',
            'description' => __('Post Sidebar', TEXTDOMAIN),
            'before_widget' => '<div>',
            'after_widget' => '</div>',
            'before_title' => '<h5>',
            'after_title' => '</h5>',
        ));
    }
    public function service_widget(){
        register_sidebar(array(
            'name' => __('Service Page', TEXTDOMAIN),
            'id' => 'service-page-sidebar',
            'description' => __('Post Sidebar', TEXTDOMAIN),
            'before_widget' => '<div>',
            'after_widget' => '</div>',
            'before_title' => '<h5>',
            'after_title' => '</h5>',
        ));
    }
    public function news_widget(){
        register_sidebar(array(
            'name' => __('News Page', TEXTDOMAIN),
            'id' => 'news-page-sidebar',
            'description' => __('Post Sidebar', TEXTDOMAIN),
            'before_widget' => '<div>',
            'after_widget' => '</div>',
            'before_title' => '<h5>',
            'after_title' => '</h5>',
        ));
    }
   

    public function addiction_widget(){
        register_sidebar(array(
            'name' => __('Addiction Page', TEXTDOMAIN),
            'id' => 'addiction-page-sidebar',
            'description' => __('Post Sidebar', TEXTDOMAIN),
            'before_widget' => '<div>',
            'after_widget' => '</div>',
            'before_title' => '<h5>',
            'after_title' => '</h5>',
        ));
    }
    public function treatment_widget(){
        register_sidebar(array(
            'name' => __('Treatment Page', TEXTDOMAIN),
            'id' => 'treatment-page-sidebar',
            'description' => __('Post Sidebar', TEXTDOMAIN),
            'before_widget' => '<div>',
            'after_widget' => '</div>',
            'before_title' => '<h5>',
            'after_title' => '</h5>',
        ));
    }
    public function faq_widget(){
        register_sidebar(array(
            'name' => __('Faq Page', TEXTDOMAIN),
            'id' => 'faq-page-sidebar',
            'description' => __('Post Sidebar', TEXTDOMAIN),
            'before_widget' => '<div>',
            'after_widget' => '</div>',
            'before_title' => '<h5>',
            'after_title' => '</h5>',
        ));
    }
    */
    public function search_widget(){
        register_sidebar(array(
            'name' => __('Header Menu', TEXTDOMAIN),
            'id' => 'header-menu',
            'description' => __('Post Sidebar', TEXTDOMAIN),
            'before_widget' => '<div>',
            'after_widget' => '</div>',
            'before_title' => '<h5>',
            'after_title' => '</h5>',
        ));
    }

    public function service_widget(){
        register_sidebar(array(
            'name' => __('Service page', TEXTDOMAIN),
            'id' => 'service-page-sidebar',
            'description' => __('Best service and free consultation Sidebar', TEXTDOMAIN),
            'before_widget' => '<div>',
            'after_widget' => '</div>',
            'before_title' => '<h5>',
            'after_title' => '</h5>',
        ));
    }

    public function blog_widget(){
        register_sidebar(array(
            'name' => __('Blog Page', TEXTDOMAIN),
            'id' => 'blog-page-sidebar',
            'description' => __('Blog category,news update and reply from  Sidebar', TEXTDOMAIN),
            'before_widget' => '<div>',
            'after_widget' => '</div>',
            'before_title' => '<h3>',
            'after_title' => '</h3>',
        ));
    }
    public function map_widget(){
        register_sidebar(array(
            'name' => __('Footer page', TEXTDOMAIN),
            'id' => 'footer-map-sidebar',
            'description' => __('map sidebar', TEXTDOMAIN),
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '<h5>',
            'after_title' => '</h5>',
        ));
    }
     public function image_widget(){
            register_sidebar(array(
                'name' => __('contact page', TEXTDOMAIN),
                'id' => 'footer-map-sidebar',
                'description' => __('map sidebar', TEXTDOMAIN),
                'before_widget' => '',
                'after_widget' => '',
                'before_title' => '<h5>',
                'after_title' => '</h5>',
            ));
    }
    public function textarea_widget(){
        register_sidebar(array(
            'name' => __('contact page', TEXTDOMAIN),
            'id' => 'footer-map-sidebar',
            'description' => __('map sidebar', TEXTDOMAIN),
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '<h5>',
            'after_title' => '</h5>',
        ));
}



}
