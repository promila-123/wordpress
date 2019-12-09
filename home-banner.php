<?php

$args = array(
                'posts_per_page' => -1,
                'post_type' => 'homebanner',
                'post_status' => 'publish',
                'post_parent' => 0,
            );
$banners = get_posts($args);

?>
<?php
/*
<section class="fullscreen-banner banner banner-2 p-0 o-hidden bg-contain bg-pos-r animatedBackground" data-bg-img="<?php echo IMAGES;?>bg/05.png">
	<div class="mouse-parallax" data-bg-img="<?php echo IMAGES;?>pattern/01.png"></div>
	<div class="h-100 bg-contain bg-pos-rb sm-bg-cover" data-bg-img="<?php echo IMAGES;?>bg/04.png">
		<div class="bannerbox">
			<div class="container">
				<div class="mainbannerslide  owl-carousel">
				<?php
				foreach($banners as $key=>$banner){
					$banner_details = get_post_meta($banner->ID);
					
					$logo_id = $banner_details[THEME_PRE.'banner_file_id'][0];
					$alt  = get_post_meta($logo_id, '_wp_attachment_image_alt', TRUE);
					if(!empty($alt)){
					  $alt = $alt;  
					}else{
						$alt = get_the_title($logo_id);
}
					if($banner_details[ THEME_PRE .'banner_type'][0]=='1'){
					$url = $banner_details[THEME_PRE.'banner_file'][0];
					$heading_p1 = $banner_details['heading_part_one'][0];
					$heading_p2 = $banner_details['heading_part_two'][0];
					$heading_p3 = $banner_details['heading_part_three'][0];
					$des = $banner_details['description'][0];
					$buttontext = $banner_details['learnmore'][0];
					$link = $banner_details['youtube_url'][0];
				?>
					<div class="slideitem">
						<div class="white-bg box-shadow px-5 py-5 sm-px-3 sm-py-3 xs-px-2 xs-py-2 bg-contain bg-pos-l radius" data-bg-img="images/bg/01.png">
							<div class="row align-items-center">
								<div class="col-lg-6 col-md-12 text-center">
                                                                    <img class="img-center" src="<?php echo $url?>" alt="<?=$alt;?>">
								</div>
								<div class="col-lg-6 col-md-12 md-mt-5">
									<h1 class="mb-4"><?php _e($heading_p1,TEXTDOMAIN);?> <span class="font-w-5"><?php _e($heading_p2,TEXTDOMAIN);?></span>  <?php _e($heading_p3,TEXTDOMAIN);?></h1>
                                                                        <p><?php _e($des,TEXTDOMAIN)?></p> <a class="btn btn-theme" href="<?php  echo $link?>"><span><?php _e($buttontext,TEXTDOMAIN)?></span></a>
								</div>  
							</div>
						</div>
					</div>
					<?php
					 }else if($banner_details[ THEME_PRE .'banner_type'][0]=='0'){
						$url = $banner_details[THEME_PRE.'banner_file'][0];
						$heading_p1 = $banner_details['heading_part_one'][0];
						$heading_p2 = $banner_details['heading_part_two'][0];
						$heading_p3 = $banner_details['heading_part_three'][0];
						$des = $banner_details['description'][0];
						$buttontext = $banner_details['learnmore'][0];
						$link = $banner_details['youtube_url'][0];
					?>
					<div class="slideitem">
						<div class="slideimage">
							<img src="<?php echo $url?>" alt="<?=$alt;?>"/>
							<?php
							if($heading_p1!='' || $heading_p2!='' || $heading_p3!=''){
							?>
							<div class="imgtxstbox"	>
									<h1 class="mb-4"><?php _e($heading_p1,TEXTDOMAIN);?> <span class="font-w-5"><?php _e($heading_p2,TEXTDOMAIN);?></span>  <?php _e($heading_p3,TEXTDOMAIN);?></h1>
									<?php
									if($des!=''){
									?>
									<p><?php _e($des,TEXTDOMAIN)?></p> 
									<?php
									}
									?>
									<?php
									if($link!='' && $buttontext!=''){
									?>
									<a class="btn btn-theme" href="<?php  echo $link?>"><span><?php _e($buttontext,TEXTDOMAIN)?></span></a>
									<?php
									}
									?> 							
							</div>
							<?php
							}
							?>
						</div>
					</div><?php
					 }else if($banner_details[ THEME_PRE .'banner_type'][0]=='2'){
						$url = $banner_details[THEME_PRE.'banner_file'][0];
					  $link = $banner_details['youtube_url'][0];
					?>
					<div class="slideitem">
						<div class="slideimage">
							<div class="slideimgwrp">
								<img src="<?php echo $url?>" alt="<?=$alt;?>"/>
								<a class="play-btn popup-youtube ml-4 d-flex align-items-center" href="<?php _e($link,TEXTDOMAIN)?>"><img class="img-fluid pulse radius-4" src="<?php echo site_url();?>/wp-content/themes/drug/assets/images/play.png" alt=""></a>	
						
							</div>
						</div>
					</div>
			
					<?php
					 }else if($banner_details[ THEME_PRE .'banner_type'][0]=='3'){
						$url = $banner_details[THEME_PRE.'banner_file'][0];
						$heading_p1 = $banner_details['heading_part_one'][0];
						$heading_p2 = $banner_details['heading_part_two'][0];
						$heading_p3 = $banner_details['heading_part_three'][0];
						$des = $banner_details['description'][0];
						$buttontext = $banner_details['learnmore'][0];
						$link = $banner_details['youtube_url'][0];
					?>
					<div class="slideitem">
						<div class="slideimage">
						<div class="slideimgwrp">
								<img src="<?php echo $url?>" alt="<?=$alt;?>"/>
								<a class="play-btn popup-youtube ml-4 d-flex align-items-center" href="<?php _e($link,TEXTDOMAIN)?>"><img class="img-fluid pulse radius-4" src="<?php echo site_url();?>/wp-content/themes/drug/assets/images/play.png" alt=""></a>	
							</div> 
							<?php
							if($heading_p1!='' || $heading_p2!='' || $heading_p3!=''){
							?>
							<div class="imgtxstbox"	>
									<h1 class="mb-4"><?php _e($heading_p1,TEXTDOMAIN);?> <span class="font-w-5"><?php _e($heading_p2,TEXTDOMAIN);?></span>  <?php _e($heading_p3,TEXTDOMAIN);?></h1>
									<?php
									if($des!=''){
									?>
									<p><?php _e($des,TEXTDOMAIN)?></p> 
									<?php
									}
									?>
									<?php
									if($link!='' && $buttontext!=''){
									?>
									<a class="btn btn-theme" href="<?php  echo $link?>"><span><?php _e($buttontext,TEXTDOMAIN)?></span></a>
									<?php
									}
									?> 							
							</div>
							<?php
							}
							?>
	 								
						</div> 
					</div>
				<?php
					 }
				  }
				?>					
				</div>
			</div>
		</div>
	</div>
</section>

<?php 
*/?>

<!-- Main slider -->
<section class="main-slider2">
        <div class="container-fluid">
            <ul class="main-slider-carousel owl-carousel owl-theme slide-nav">
			<?php
				foreach($banners as $key=>$banner){
					$banner_details = get_post_meta($banner->ID);
					
					$logo_id = $banner_details[THEME_PRE.'banner_file_id'][0];
					$alt  = get_post_meta($logo_id, '_wp_attachment_image_alt', TRUE);
					if(!empty($alt)){
					  $alt = $alt;  
					}else{
						$alt = get_the_title($logo_id);
					}
				
					if($banner_details[ THEME_PRE .'banner_type'][0]=='0'){
					$url = $banner_details[THEME_PRE.'banner_file'][0];
					$heading_p1 = $banner_details[THEME_PRE.'heading_part_one'][0];
					$heading_p2 = $banner_details[THEME_PRE.'heading_part_two'][0];
					$button1 = $banner_details[THEME_PRE.'button1_text'][0];
					$button2 = $banner_details[THEME_PRE.'button2_text'][0];
					$link1 = $banner_details[THEME_PRE.'link_button1_url'][0];
					$link2 = $banner_details[THEME_PRE.'link_button2_url'][0];
					}
				?>
                <li class="slider-wrapper">
                    <div class="image"><img src="<?php echo $url;?>" alt=""></div>
                    <div class="slider-caption text-center">
                        <div class="slidetext">
                            <h1><?php _e($heading_p1,TEXTDOMAIN);?></h1>
                            <p class="text"><?php _e($heading_p2,TEXTDOMAIN);?></p>
                            <div class="link-btn"><a href="<?php echo $link1;?>" class="theme-btn btn-style-two"><?php _e($button1,TEXTDOMAIN);?></a><a href="<?php echo $link2;?>" class="theme-btn btn-style-eight"><?php _e($button2,TEXTDOMAIN);?></a></div>
                        </div>         
                    </div>
                    <div class="slide-overlay"></div>
                </li>
				<?php } ?>
            </ul>
        </div>
</section>
	


