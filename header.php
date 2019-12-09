<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package drug
 */
?>
<!DOCTYPE html>

<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <?php
        $pre = THEME_PRE;
        $logo_id = get_option($pre.'site_logo_id','');
        $stickey_logo=get_option($pre.'sticky_logo_id','');
        $fav_id = get_option(THEME_PRE.'site_fav_id','');
        $url = wp_get_attachment_image_url($fav_id);
        $alt  = get_post_meta($logo_id, '_wp_attachment_image_alt', TRUE);
        if(!empty($alt)){
          $alt = $alt;  
        }else{
            $alt = get_the_title($fav_id);
        }
        ?>
        <link rel="icon" 
        type="image/x-icon" 
        href="<?php echo $url;?>" alt="<?php echo $alt;?>" title="<?php echo $alt;?>">
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        <!-- page wrapper start -->
        <div class="page-wrapper">
         <div class="preloader">
            <div class="loading">
                <div class="cssload-container">
                    <div class="cssload-progress cssload-float cssload-shadow">
                        <div class="cssload-progress-item"></div>
                    </div>
                </div>
            </div>
         </div>
        
            <?php
            get_template_part('templates/page', 'loader');
            get_template_part('templates/header', 'menu');
            /*if (is_front_page()) {
                get_template_part('templates/home', 'banner');
            }elseif(is_single() || is_page()){
                get_template_part('templates/header','post');
            }else{
                get_template_part('templates/header','archive');
            }
            */
            ?>