<?php

/*
 * drug Theme develop for Client as per HTML Provided and HTML template DEvelop By Rajkumar Shaw
 * HTML to Wordpress Theme Conversion By Rajib Mondal
 */
// Define 
//add_filter( 'got_rewrite', '__return_true', 999 );
define('TEXTDOMAIN', 'industry'); // Textdomain
define('THEME_NAME', 'industry'); // THEME NAME
define('THEME_PRE', 'industry_'); // Theme prefix
define('IMAGES', get_template_directory_uri().'/assets/images/');
// load Core Theme file 
require_once get_template_directory() . '/includes/Core.php';

if(!is_admin()){
    function gp_remove_cpt_slug( $post_link, $post ) {
        if ( 'service' === $post->post_type && 'publish' === $post->post_status ) {
            $post_link = str_replace( '/' . $post->post_type . '/', '/', $post_link );
        }
        return $post_link;
    }
   //add_filter( 'post_type_link', 'gp_remove_cpt_slug', 10, 2 );
    function gp_add_cpt_post_names_to_main_query( $query ) {
       
        global $wpdb;
       
        if(!$query->is_main_query()) {
            return;
        }
        if($query->get('attachment')!=''){
         $post_name = $query->get('attachment');
        }else{
        $post_name = $query->get('name');
        }
    
        $post_type = $wpdb->get_var(
            $wpdb->prepare(
                'SELECT post_type FROM ' . $wpdb->posts . ' WHERE post_name = %s LIMIT 1',
                $post_name
            )
        );
       
        // switch($post_type) {
        //     case 'service':
        //         $query->set( 'post_type', array( 'post', 'page', 'service' ) );
        //         break;
        // }
    }
    //add_action( 'pre_get_posts', 'gp_add_cpt_post_names_to_main_query' );
}
function extract_number_from_string($str){
    preg_match_all('!\d+!', $str, $matches);
    $ret = "";
    $arr = $matches[0];
    foreach($arr as $str){
        $ret.=$str;
    }
    return $ret;
}


// Initiate function 
function run_industry_core() {

    $industry_core = new Core(); // Core Object 

    $industry_core->run(); // call Core Run funtions
}
function the_cutom_content( $more_link_text = null, $strip_teaser = false ) {
    $content = get_the_content( $more_link_text, $strip_teaser );
 
    /**
     * Filters the post content.
     *
     * @since 0.71
     *
     * @param string $content Content of the current post.
     */
    $content = apply_filters( 'the_content', $content );
    $content = str_replace( ']]>', ']]&gt;', $content );
    echo $content;
}

/**
 * end of menu customizations
 */
// Create multi dropdown param type
vc_add_shortcode_param( 'dropdown_multi', 'dropdown_multi_settings_field' );
function dropdown_multi_settings_field( $param, $value ) {


   $param_line = '';
   $param_line .= '<select multiple name="'. esc_attr( $param['param_name'] ).'" class="wpb_vc_param_value wpb-input wpb-select '. esc_attr( $param['param_name'] ).' '. esc_attr($param['type']).'">';
   foreach ( $param['value'] as $text_val => $val ) {
       if ( is_numeric($text_val) && (is_string($val) || is_numeric($val)) ) {
                    $text_val = $val;
                }
                $text_val = __($text_val, "js_composer");
                $selected = '';

                if(!is_array($value)) {
                    $param_value_arr = explode(',',$value);
                } else {
                    $param_value_arr = $value;
                }

                if ($value!=='' && in_array($val, $param_value_arr)) {
                    $selected = ' selected="selected"';
                }
                $param_line .= '<option class="'.$val.'" value="'.$val.'"'.$selected.'>'.$text_val.'</option>';
            }
   $param_line .= '</select>';

   return  $param_line;
}


//add_action( 'restrict_manage_posts', 'add_export_button' );
function add_export_button() {
    $screen = get_current_screen();
 
    if (isset($screen->parent_file) && ('edit.php?post_type=subscription' == $screen->parent_file)) {
        ?>
        <input type="submit" name="export_all_posts" id="export_all_posts" class="button button-primary" value="Export All Posts">
        <script type="text/javascript">
            jQuery(function($) {
                $('#export_all_posts').insertAfter('#post-query-submit');
            });
        </script>
        <?php
    }
}

add_action( 'init', 'func_export_all_posts' );
function func_export_all_posts() {
    if(isset($_GET['export_all_posts'])) {
        $arg = array(
                'post_type' => 'subscription',
                'post_status' => 'publish',
                'posts_per_page' => -1,
            );
 
        global $post;
        $arr_post = get_posts($arg);
        if ($arr_post) {
 
            header('Content-type: text/csv');
            header('Content-Disposition: attachment; filename="email.csv"');
            header('Pragma: no-cache');
            header('Expires: 0');
 
            $file = fopen('php://output', 'w');
 
            fputcsv($file, array('email'));
 
            foreach ($arr_post as $post) {
                setup_postdata($post);
                fputcsv($file, array(get_the_title()));
            }
 
            exit();
        }
    }
}
class auto_child_page_menu{

    /**
     * class constructor
     * @author Rajib Mondal
     * @param   array $args 
     * @return  void
     */
    function __construct($args = array()){
        add_filter('wp_nav_menu_objects',array($this,'on_the_fly'),10, 2);

        //add_filter( 'wp_nav_menu_items',array($this,'test'),10, 2 );
        //add_filter('walker_nav_menu_start_el', 'wpse_226884_replace_hash', 999);

    }
        /**
     * Replace # with js
     * @param string $menu_item item HTML
     * @return string item HTML
     */
    function wpse_226884_replace_hash($menu_item) {
        if (strpos($menu_item, 'href="#"') !== false) {
            $menu_item = str_replace('href="#"', 'href="javascript:void(0);"', $menu_item);
        }
        return $menu_item;
    }
    
    function on_the_fly($items,$args) {
      
       
        global $post;
        $tmp = array();
       
        ob_start();
        foreach ($items as $key => $i) {
            if($i->title=='Service'){
                $i->url = '#';
            }
            $tmp[] = $i;
          
            
            if ($i->title != 'Service'){
                
                    continue;
                }
                if($i->title=='Gallery'){
                    $current_class="current";
                }else{
                    $current_class="";
                }
          
            
            $page = get_post($i->object_id);
            //if not parent page move on
            if (!isset($page->post_parent) || $page->post_parent != 0) {
               // continue;
            }
         
            $args = array(
                'posts_per_page' => -1,
                'post_type' => $post_type,
                'post_status' => 'publish',
                'post_parent' => 0,
                'orderby'          => 'menu_order',
                'order'            => 'ASC'
            );
            $children = get_posts($args);
           
            
            foreach ((array)$children as $c) {
                //set parent menu
                $c->menu_item_parent      = $i->ID;
                $c->object_id             = $c->ID;
                $c->object                = 'page';
                $c->type                  = 'post_type';
                $c->type_label            = 'Page';
                $c->url                   = get_permalink( $c->ID);//
                $c->title                 = $c->post_title;
                $c->target                = '';
                $c->attr_title            = '';
                $c->description           = '';
                $c->classes               = array('','menu-item','menu-item-type-post_type','menu-item-object-page',$current_class);
                //$c->classes               = array('','current-menu-item','current-menu-parent','current-menu-ancestor');
                $c->xfn                   = '';
                $c->current               = ($post->ID == $c->ID)? true: false;
                $c->current_item_ancestor = ($post->ID == $c->post_parent)? true: false; //probbably not right
                $c->current_item_parent   = ($post->ID == $c->post_parent)? true: false;
                
                $tmp[] = $c;
                
                $tmp = recursive_child($c->ID,$tmp,$c,$post_type);
                
            }
        }
        ob_end_flush();
        flush();
       return $tmp;
      
    }
}

function recursive_child($id,$tmp,$i,$post_type){

            global $post;
            $children = get_posts( array('post_parent' => $id,'post_type'=>$post_type,'post_status'=>'publish',
            'orderby'          => 'menu_order',
            'order'            => 'ASC') );
            //print_r($children);
            if(count($children)>0){
                $tmp[count($tmp)-1]->db_id = $tmp[count($tmp)-1]->ID ;
                $tmp[count($tmp)-1]->post_type = 'nav_menu_item';
                $tmp[count($tmp)-1]->object = $post_type;
                $tmp[count($tmp)-1]->type_label = $post_type;
                $tmp[count($tmp)-1]->current = false;
                unset($tmp[count($tmp)-1]->classes[count($tmp[count($tmp)-1]->classes)-1]);
                
                //pop($tmp[count($tmp)-1]->classes);
                array_push($tmp[count($tmp)-1]->classes,'menu-item-object-'.$post_type);
                array_push($tmp[count($tmp)-1]->classes,'current-'.$post_type.'-ancestor');
                $tmp[count($tmp)-1]->classes=array_values($tmp[count($tmp)-1]->classes);
                

            }
            foreach ((array)$children as $c) {
                //set parent menu
                $c->menu_item_parent      = $id;
                $c->object_id             = $c->ID;
                $c->object                = 'page';
                $c->type                  = 'post_type';
                $c->type_label            = 'Page';
                $c->url                   = get_permalink( $c->ID);
                $c->title                 = $c->post_title;
                $c->target                = '';
                $c->attr_title            = '';
                $c->description           = '';
                $c->classes               = array('','menu-item','menu-item-type-post_type','menu-item-object-page');
                //$c->classes               = array('','current-menu-item','current-menu-parent','current-menu-ancestor');
                $c->xfn                   = '';
                $c->current               = ($id == $c->ID)? false: false;
                $c->current_item_ancestor = ($id == $c->post_parent)? false: false; //probbably not right
                $c->current_item_parent   = ($id == $c->post_parent)? false: false;
                
                $tmp[] = $c;

                $tmp = recursive_child($c->ID,$tmp,$c,$post_type);
                
            }
            return $tmp;
}

add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

function special_nav_class ($classes, $item) {
    if (in_array('current-menu-item', $classes) ){
        $classes[] = 'current ';
    }
    return $classes;
}

  //new auto_child_page_menu();
 //Run Initiate function 
 run_industry_core();

 
 


    


	

