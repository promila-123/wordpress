<?php

/**
 * Description of Core
 * Theme Core file all dependency load and call
 * 
 * @author Promila Chowdhury
 */
class Core {

    protected $loader;
    protected $theme_pre;
    protected $version;
    protected $textdomain;
    private $theme_dir;
    private $classes_path;
    private $dependency_path = '/classes/';

    public function __construct() {
        $this->version = '1.0.0';
        $this->classes_path = $this->path() . $this->dependency_path;
        $this->load_dependencies();
        $this->frontend_script();
        $this->theme_function();
        $this->vc_element();
        $this->custom_posttype();
        $this->admin_funtions();
    }

    private function path() {
        $dir = trailingslashit(dirname(__FILE__));

        return $dir;
    }

    private function load_dependencies() {
        /**
         * Load all dependency as per theme requirement 
         * Dependency path "theme_folder/includes/classes"
         * 
         */
        /**
         * require file belong to enqueue theme script JS and CSS
         * 
         */
        require_once get_template_directory() . '/assets/Load_assets.php';
        /**
         * Require Theme menu dependency 
         * namespace rmthemeutility
         * class Theme_menu
         * @param array $menus associative array key is menu loaction and value is menu name  
         */
        require_once $this->classes_path . 'Theme_menu.php';
        /**
         * This custom menu walker class 
         * 
         */
        require_once $this->classes_path . 'Theme_custom_menu.php';
        /**
         * Auto Populate sub menu
         */
        require_once $this->classes_path.'Auto_submenu.php';
        /**
         * Page Breadcumb class
         */
        require_once $this->classes_path . 'Page_breadcumb.php';
        /**
         * Theme Support 
         */
        require_once $this->classes_path . 'theme_supports/init_theme_supports.php';
        /**
         * All Ajax Handle from 
         * 
         */
        require_once $this->classes_path . 'Ajax_utility.php';
        /**
         * Theme utility functions
         */
        require_once $this->classes_path . 'Utility_Object.php';
        /**
         * Theme Widgets
         */
        require_once $this->path() . '/widget/Theme_widget.php';
        /**
         * Visual Composer Dependency 
         * vc_map and shortcode
         */
        require_once $this->path() . '/vc_element/VC_Map.php';
        require_once $this->path() . '/vc_element/VC_Shortcode.php';
        /**
         * Admin Dependency load
         * Require Theme option 
         */
        require_once get_template_directory() . '/admin/Theme_option.php';
        require_once get_template_directory() . '/admin/Admin_assets.php';
        /**
         * install custom post type create dependency
         * 
         */
        require_once $this->classes_path . 'custom_post/init.php';
        require_once $this->classes_path . 'Custom_post_admin_list.php';
        require_once $this->classes_path . 'Custom_submenu.php';
        /**
         * install custom meta box dependency 
         *
         * Addiction post type 
         */
        require_once $this->classes_path . 'Project_meta.php';
        require_once $this->classes_path . 'services_meta.php';
        require_once $this->classes_path . 'Testimonial_meta.php';
        require_once $this->classes_path . 'Slider_meta.php';
        /**
         * install custom meta box dependency 
         *
         * orry, you are not allowed to access this page.type 
        */
        //rorry, you are not allowed to access this page.is->classes_path . 'Treatment_meta.php';
        /**orry, you are not allowed to access this page.
         * Custom meta testimonial meta box type 
         */
        //require_once $this->classes_path . 'Testimonial_meta.php';
        /**
         * Business policy meta 
         */
        //require_once $this->classes_path . 'Banner_meta.php';
		
        /**
         * This is loader dependency 
         * This helper dependency
         * @todo all add_action hook and add_filter hook loaded from here 
         * @method type add_action() all wordpress add_action hook
         * @method type add_filter() all wordpress add_filter hook
         * @method type  run() initiate loader
         */
        require_once $this->path() . 'Loader.php';
        $this->loader = new Loader();
    }

    private function frontend_script() {
        /**
         * Theme script enqueue for frontend 
         * use "rmassets" namespace 
         * class Load_assets
         * @param string $version Theme version 
         */
        if (!is_admin()) {
            $script = new rmassets\Load_assets($this->get_version());
            $this->loader->add_action('wp_enqueue_scripts', $script, 'load_script');
        } else {
            return;
        }
    }

    private function admin_funtions() {
        if (is_admin()):
            $theme_option = new Theme_option('Industry', 'industry');
            $this->loader->add_action('admin_menu', $theme_option, 'add_theme_menu');
            $theme_admin_script = new Admin_assets('industry', $this->get_version());
            //print_r($theme_admin_script);
            $this->loader->add_action('init', $theme_admin_script, 'script_load');
            //$home_banner = new Banner_home();
            //$this->loader->add_action('admin_menu', $home_banner, 'bannar_init');
            //$this->loader->add_action('init', $home_banner, 'script_load');
            $admin_utility = new Utility_Object();
            $this->loader->add_action('admin_post_delete_resource_sets', $admin_utility, 'delete_qus_sets');
            $this->loader->add_action('admin_post_nopriv_delete_resource_sets', $admin_utility, 'delete_qus_sets');
        endif;
    }

    private function vc_element() {
       // include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
        if (!is_plugin_active('js_composer/js_composer.php')) {
            //wp_die('Please activate Visual Composer, and try again');
        } else {
            $vcmap = new VC_Map(); // VC MAP object
            $this->loader->add_action('vc_before_init',$vcmap, 'home_page_slider_section');
            $this->loader->add_action('vc_before_init',$vcmap, 'home_page_about_section');
            $this->loader->add_action('vc_before_init',$vcmap, 'home_page_service_section');
            $this->loader->add_action('vc_before_init',$vcmap, 'home_page_work_process_section');
            $this->loader->add_action('vc_before_init',$vcmap, 'home_page_project_section');
            $this->loader->add_action('vc_before_init',$vcmap, 'home_page_company_profile_section');
            $this->loader->add_action('vc_before_init',$vcmap, 'home_page_testimonial_section');
            $this->loader->add_action('vc_before_init',$vcmap, 'home_page_blog_section');
            $this->loader->add_action('vc_before_init',$vcmap, 'home_page_partner_slide_section');
            $this->loader->add_action('vc_before_init',$vcmap, 'separate_about_section');
            $this->loader->add_action('vc_before_init',$vcmap, 'our_team_section');
            $this->loader->add_action('vc_before_init',$vcmap, 'contact_page_section');
            $this->loader->add_action('vc_before_init',$vcmap, 'contact_map_section');
             
             
        }
    }

    private function theme_function() {
        /**
         * all theme  utility function use admin and site section 
         * @example theme menu 
         */
        /**
         * Create theme menu object 
         * @param array primary menu 
         */
        $theme_menu = new rmthemeutility\Theme_menu(array('header' => 'Header menu','footer' => 'Footer menu'));
        /**
         * Initiate primary menu with action hook and call back function "register_my_menu"
         */
        $this->loader->add_action('init', $theme_menu, 'register_my_menu');
        /**
         * AJAX Class object
         *  
         */
        /** 
         * Submenu 
         */
      
        $ajax = new Ajax_utility();
        $this->loader->add_action('wp_ajax_comments_save', $ajax, 'save_comment');
        $this->loader->add_action('wp_ajax_nopriv_comments_save', $ajax, 'save_comment');
        $this->loader->add_action('wp_ajax_save_subcription1', $ajax, 'save_subcription');
        $this->loader->add_action('wp_ajax_nopriv_save_subcription1', $ajax, 'save_subcription');
        /**
         * All Widgets 
         */
        $widget = new Theme_widget();
        //$this->loader->add_action('init', $widget, 'post_widget');
        //$this->loader->add_action('init', $widget, 'service_widget');
        //$this->loader->add_action('init', $widget, 'news_widget');
       // $this->loader->add_action('init', $widget, 'addiction_widget');
        //$this->loader->add_action('init', $widget, 'treatment_widget');
        $this->loader->add_action('init', $widget, 'map_widget');
        $this->loader->add_action('init', $widget, 'search_widget');
        $this->loader->add_action('init', $widget, 'service_widget');
        $this->loader->add_action('init', $widget, 'blog_widget');
    
    }

    private function custom_posttype() {
        /**
         * Create Custom post type with help of Custom Post Class 
         * @param array $name Description
         */
        $project = new Custom_post_type('project', 'Project', array('title', 'editor', 'thumbnail', 'page-attributes'), array('has_archive' => true,'hierarchical' => TRUE, 'capability_type' => 'page', 'query_var' => true,));
        $this->loader->add_action('init', $project, 'custom_post');

        $projects_category = new Custom_taxonomy('Project Category','project_category','project');
       
        $this->loader->add_action('init', $projects_category, 'custom_category');

        $project_meta = new Project_meta();
        $this->loader->add_action('cmb2_admin_init', $project_meta, 'meta_box');

        $service = new Custom_post_type('service', 'Service', array('title', 'editor', 'thumbnail', 'excerpt', 'page-attributes'),array('has_archive' => true,'hierarchical' => TRUE, 'capability_type' => 'page', 'query_var' => true,));
        $this->loader->add_action('init', $service, 'custom_post');

        $services_category = new Custom_taxonomy('Service Category','service_category','services');
        /**
         * Create post type Treatment with help of Loader class
         */
        $this->loader->add_action('init', $services_category, 'custom_category');
       
        $services_meta = new Services_meta();
        $this->loader->add_action('cmb2_admin_init', $services_meta, 'meta_box');

        $slider = new Custom_post_type('slider', 'Slider', array('title', 'editor', 'thumbnail', 'page-attributes'), array('has_archive' => true,'hierarchical' => TRUE, 'capability_type' => 'page', 'query_var' => true,));
        /**
         * Create post type Addiction with help of Loader class
         */
        $this->loader->add_action('init', $slider, 'custom_post');

        $slider_meta = new Slider_meta();
        $this->loader->add_action('cmb2_admin_init', $slider_meta, 'meta_box');

        $testimonial = new Custom_post_type('testimonial', 'Testimonial', array('title', 'editor', 'thumbnail'),array('has_archive' => true));
        $this->loader->add_action('init', $testimonial, 'custom_post');
        /**
         * Testimonial meta call 
         */
        $testimonial_meta = new Testimonial_meta();
        $this->loader->add_action('cmb2_admin_init', $testimonial_meta, 'meta_box');

        /**
         * Create Gallery post type object
         */
        $gallery = new Custom_post_type('gallery', 'Gallery', array('title', 'editor', 'thumbnail', 'page-attributes'), array('has_archive' => true,'hierarchical' => TRUE, 'capability_type' => 'page', 'query_var' => true,));
        /**
         * Create post type Addiction with help of Loader class
         */
        $this->loader->add_action('init', $gallery, 'custom_post');

        // $portfolio_category = new Custom_taxonomy('Portfolio Category','portfolio_category','portfolio');
    
        // $this->loader->add_action('init', $portfolio_category, 'custom_category');

        /**
         * Create custom meta for Service post type 
         */
        // $portfolio_meta = new Portfolio_meta();
        // $this->loader->add_action('cmb2_admin_init', $portfolio_meta, 'meta_box');
        
        /**
         * subscription Post type 
         */
        $subscription = new Custom_post_type('subscription', 'Subscription', array('title', 'editor'));
        $this->loader->add_action('init', $subscription, 'custom_post');
        
        $brand = new Custom_post_type('brand', 'Brand partner', array('title', 'editor'));
        $this->loader->add_action('init', $brand, 'custom_post');
		/**
         * Banner Custom Post
         */
		//$banner = new Custom_post_type('homebanner', 'Home Banner', array('title'));
        //$this->loader->add_action('init', $banner, 'custom_post');
		
		//$banner_meta = new Banner_meta();
        //$this->loader->add_action('cmb2_admin_init', $banner_meta, 'meta_box');
    }

    public function run() {
        $this->loader->run();
    }

    public function get_version() {
        return $this->version;
    }

}
