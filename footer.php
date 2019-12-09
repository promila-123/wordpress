
<?php
get_template_part('templates/footer','block');
?>

</div>
<!--End pagewrapper-->
<?php 
$footer = maybe_unserialize(get_option(THEME_PRE.'footer', ''));
if(isset($footer['back_to_top']) && $footer['back_to_top']=='yes'){
?>
 <div class="scroll-to-top scroll-to-target" data-target=".main-header"><span class="icon fa fa-long-arrow-up"></span></div>
<?php
}
?>
<?php
wp_footer();
?>
</body>


</html>