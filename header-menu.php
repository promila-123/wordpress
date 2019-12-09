<?php
/**
 * Header Menu Nav template and site logo 
 * @package freelence
 * @author Rajib Mondal
 */
$pre = THEME_PRE;
$logo_id = get_option($pre.'site_logo_id','');

$url= wp_get_attachment_image_url($logo_id,'full');
$phone_id=get_option($pre.'phone_icon_id','');
$url_phone = wp_get_attachment_image_url($phone_id,'full');
$email_id=get_option($pre.'email_icon_id','');
$url_email = wp_get_attachment_image_url($email_id,'full');

$sticky_logo= get_option($pre.'sticky_logo_id','');
$sticky_url=wp_get_attachment_image_url($sticky_logo,'full');
$alt  = get_post_meta($logo_id, '_wp_attachment_image_alt', TRUE);
if(!empty($alt)){
  $alt = $alt;  
}else{
    $alt = get_the_title($logo_id);
}
$headertopright = maybe_unserialize(get_option('industry_' . 'headertopright', ''));
?>
        <header class="main-header header-design-three">
        <div class="middle_header">
                <div class="fluid-container ">
                    <div class="mdlheader-wrp clearfix">
                        <div class="main-logo">
                            <div class="logo">
                                <a href="<?php echo site_url();?>"><img src="<?php echo $url;?>" alt="<?php echo $alt; ?>" title="Logo"></a>
                            </div>
                        </div>
                        <?php
            if (isset($headertopright['statustop']) && !empty($headertopright['statustop'])) {
            ?> 
                        <div class="middle-right clearfix">

                            <!--Info Box-->
                            <div class="middle-info">
                                <div class="icon-holder"><img src="<?php echo $url_phone;?>"/></div>
                                <ul>
                                    <li><strong>Call Us</strong></li>
                                    <a href="tel:<?php echo $headertopright['phone'];?>"><li><?php echo $headertopright['phone'];?></a></li>
                                </ul>
                            </div>
							
                            <!--Info Box-->
                            
                            <div class="middle-info">
                                <div class="icon-holder"><img src="<?php echo $url_email;?>"/></div>
                                <ul>
                                    <li><strong>Mail Us</strong></li>
                                    <a href="mailto:<?php echo $headertopright['email'];?>"><li><?php echo $headertopright['email'];?></a></li>
                                </ul>
                            </div>	
                            </a>						
							
                        </div>
            <?php } ?>
                    </div>
                </div>
            </div>


  <!--Header-Lower-->
  <div class="lower_header">
                <div class="fluid-container">
                    <div class="nav-wrapper clearfix">
                        <!-- Main Menu -->
                        <nav class="main-menu">
                            <div class="navbar-header">
                                <!-- Toggle Button -->
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                        <?php
                        $defaults = array(
                            'menu'            => '',
                            'container'       => 'div',
                            'container_class' => 'navbar-collapse collapse clearfix',
                            'container_id'    => '',
                            'menu_class'      => 'navigation clearfix',
                            'menu_id'         => 'main-menu',
                            'echo'            => true,
                            'fallback_cb'     => 'wp_page_menu',
                            'before'          => '',
                            'after'           => '',
                            'link_before'     => '',
                            'link_after'      => '',
                            'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                            'item_spacing'    => 'preserve',
                            'depth'           => 50,
                            'walker'          => '',
                            'theme_location'  => 'header',
                            'submenu'         => true
                        );
                       wp_nav_menu($defaults);
                       ?>
                         </nav>
                        <?php get_sidebar('search');?>
        </div>
    </div>
</div>


<!--End Sticky Header-->
</header>
<!--End Main Header -->
<?php if(!is_front_page()){?>
    <section class="page-title" style="background-image: url(<?php if(is_page()){echo the_post_thumbnail_url();}else{ echo get_template_directory_uri().'/assets/images/background/5.jpg';}?>);">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                      <?php if ( is_page_template( 'archive-projects.php' ) ){
                       echo '<h2>Our Latest Projects</h2>';
                      } ?>
        <?php 
        echo Page_breadcumb::custom_breadcrumbs();
        ?>
                  </div>
                 </div>
             </div>
 </section>
    <?php } ?>
    
    