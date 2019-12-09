
<?php
$pre = THEME_PRE;
$logo_id = get_option($pre . 'footer_logo_id', '');
$url = wp_get_attachment_image_url($logo_id,'full');
$alt = get_post_meta($logo_id, '_wp_attachment_image_alt', TRUE);
if (!empty($alt)) {
    $alt = $alt;
} else {
    $alt = get_the_title($logo_id);
}
$footerone = maybe_unserialize(get_option(THEME_PRE . 'footerone', ''));
$footertwo = maybe_unserialize(get_option(THEME_PRE.'footertwo', ''));
$footerthree = maybe_unserialize(get_option(THEME_PRE.'footerthree', ''));
$icon_id = get_option($pre.'phone_icon_id', '');
$icon_url = wp_get_attachment_image_url($icon_id,'thumbnail');
$footerfour = maybe_unserialize(get_option(THEME_PRE.'footerfour', ''));
$footerextra = maybe_unserialize(get_option(THEME_PRE.'footerextra', ''));
?>
        <div class="stripcontact container">
           <?php
            if (isset($footerextra['statusextra']) && !empty($footerextra['statusextra'])) {
            ?> 
			<div class="stripcontwrp">
				<ul class="clearfix">
					<li><i class="flaticon-placeholder"></i><strong>Company Name:</strong><?php echo $footerextra['company_name'];?></li>
					<li><i class="flaticon-telephone"></i><strong>Phone Number:</strong> <?php echo $footerextra['phone_no'];?></li>
					<li><i class="flaticon-multimedia"></i><strong>Email Address.</strong><?php echo $footerextra['email'];?></li>
				</ul>
            </div>
            <?php } ?>
        </div>
        <footer class="footer style1 paddtop-120">
            <div class="container">

                <div class="row">
                <?php
            if (isset($footerone['statusone']) && !empty($footerone['statusone'])) {
            ?> 
                    <div class="col-md-4 col-sm-12">
                        <div class="footer-box  footer-logo">
                            <a class="ftlogo" href="<?php echo site_url();?>">
                                <img alt="<?php echo $alt;?>" src="<?php echo $url;?>">
                            </a>
                            <p><?php echo $footerone['des'];?></p>

                        </div>
                  </div>
               <?php } ?>
               <?php
            if (isset($footertwo['statustwo']) && !empty($footertwo['statustwo'])) {
            ?> 
                <div class="col-md-3 col-md-offset-1 col-sm-4">
                        <div class="footer-box quick-links">
                            <h3 class="title"><?php echo $footertwo['pagemenuheading']?></h3>
                            <?php
                                        wp_nav_menu(
                                                array(
                                                    'menu'=>$footertwo['pagemenu'],
                                                    'container' => FALSE,
                                                    'menu_class'      => 'list',
                                                    )
                                            );
                                    ?>
                        </div>
                </div>
            <?php } ?>  
            <?php
            if (isset($footerthree['statusthree']) && !empty($footerthree['statusthree'])) {
            ?> 
            <div class="col-md-4  col-sm-4">
                        <div class="footer-box contact-footer">
                            <h3 class="title"><?php echo $footerthree['news_head']?></h3>
                            <div class="fotterquote">
                                <form id="mc-form">    
                                <div class="form-group">
                                    <input name="email" id="mc-email" value="" placeholder="Email*" type="email">
                                </div>
                                <div class="overbtn">
                                    <button type="submit" class="btn-style1">SEND</button>
                                </div>
                                <div id="news-status"></div>
                             </form>
                            </div>
                            <ul class="social">
                                <li><a href="<?php echo $footerthree['facebook'];?>"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="<?php echo $footerthree['twitter'];?>"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="<?php echo $footerthree['gplus'];?>"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="<?php echo $footerthree['pint'];?>"><i class="fa fa-pinterest"></i></a></li>
                                <li><a href="<?php echo $footerthree['ytube'];?>"><i class="fa fa-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
            <?php } ?>
                </div>
            </div>
        </footer>
        <!--footer end-->
        <?php
            if (isset($footerfour['statusfour']) && !empty($footerfour['statusfour'])) {
            ?> 
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8">
                      <?php echo $footerfour['copyright'];?>
                    </div>
                    <div class="text-right col-sm-4">

                    </div>
                </div>
            </div>
        </div>
   <?php } ?>



    </div>
    <!--End pagewrapper-->

    
