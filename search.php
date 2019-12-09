<?php 

get_header();

?>

<?php
$flag=0;
while(have_posts()){
    $flag=1;
    the_post();?>
    
   <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
   <div class="info">[By <?php the_author();?> on <?php the_time('F d,Y');?> with <a href="#">
    comments </a>]</div>
   <?php the_content();?>

<?php
}
if(!$flag){
    echo "No search found";
}
?>


<?php
get_footer();
?>