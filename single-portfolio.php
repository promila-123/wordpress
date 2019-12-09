<?php get_header(); ?>
<!--Project Details -->

        <!--page-title  end-->		
         <div class="content-wrapper">		
			<div class="project-details">
      
                <?php
                if (have_posts()) : while (have_posts()) : the_post();?>
          
                <div class="row margbott-50">
                     <div class="col-sm-6">
                        <div class="pdtltext">
                            <h2><?php the_title();?></h2>
                            <p><?php the_content();?></p>
                        </div>
                    </div>
                              
                    <div class="col-sm-6">
                        <div class="pdtlimg">
                          <?php the_post_thumbnail();?>
                        </div>
                    </div>
                </div>
                <?php
                    endwhile;
                endif;
                 ?>
                 <?php
              $project_details= get_post_meta(get_the_ID());
              //print_r($project_details);
              ?>

                <h3>Project Details</h3>
                <div class="row margbott-20">
                    <div class="col-sm-6">
                        <ul class="pdtltable">
                            <?php $name_client=isset($project_details[THEME_PRE.'client_name'][0])?maybe_unserialize($project_details[THEME_PRE.'client_name'][0]):'';
                                if(isset($name_client) && (!empty($name_client))){ ?>
                            <li><a href="javascript:void(0);"><span>Client Name</span><?php echo $name_client ?></a></li>
                                <?php } ?>
                            <?php $location_client=isset($project_details[THEME_PRE.'location'][0])?maybe_unserialize($project_details[THEME_PRE.'location'][0]):'';
                                if(isset($location_client) && (!empty($location_client))){ ?>
                            <li><a href="javascript:void(0);"><span>Location</span><?php echo $location_client;?></a></li>
                            <?php } ?>
                            <li><a href="javascript:void(0);"><span>Completed</span><?php echo $project_details['datetimepicker6'][0]?></a></li>
                        </ul>
                    </div>
                    <div class="col-sm-6">
                        <ul class="pdtltable">
                        <?php $p_name=isset($project_details[THEME_PRE.'project_name'][0])?maybe_unserialize($project_details[THEME_PRE.'project_name'][0]):'';
                                if(isset($p_name) && (!empty($p_name))){ ?>
                            <li><a href="javascript:void(0);"><span>Project Name</span><?php echo $p_name;?></a></li>
                                <?php } ?>
                            <li><a href="javascript:void(0);"><span>Category</span>
                            <?php
                           
                             $category_detail=get_the_terms(get_the_ID(),'portfolio_category');
                             foreach($category_detail as $cat){
                              $arr[]=$cat->name;
                               }
                              $cat_str=implode(' ,',$arr);
                              echo $cat_str;
        
                                ?></a>
                               </li>
                               <?php $p_demo=isset($project_details[THEME_PRE.'project_demo'][0])?maybe_unserialize($project_details[THEME_PRE.'project_demo'][0]):'';
                                if(isset($p_demo) && (!empty($p_demo))){ ?>
              
                            <li><a href="<?php echo filter_var($p_demo,FILTER_VALIDATE_URL)?  $p_demo:  "http://".$p_demo;?>" target="_blank"><span>Project Demo</span><?php echo $p_demo;?></a></li>
                                <?php } ?>
                        </ul>
                    </div>
                </div>
               

                <?php $image_gallery= isset($project_details[THEME_PRE.'gallery_image'][0])?maybe_unserialize($project_details[THEME_PRE.'gallery_image'][0]):'';
               
                if(isset($image_gallery) &&(!empty($image_gallery))){
                    
                ?>
                 <h3>Project Related Gallery</h3>
                    <div class="projectallimg">

                   <?php foreach($image_gallery as $image){?>

                    <div class="preletitem">
                        <img src="<?php echo $image;?>"/>
                    </div>
                   <?php }?>
                   </div>
                <?php }?>
     
    </div>
 </section>
        <!--Project Details  end-->


<?php get_footer(); ?>