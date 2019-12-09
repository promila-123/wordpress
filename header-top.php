<?php
$pre = THEME_PRE;
$top = maybe_unserialize(get_option(THEME_PRE.'headertop', ''));
$top_icon_id = get_option($pre.'top_phone_icon_id', '');
$topicon_url = wp_get_attachment_image_url($top_icon_id,'thumbnail');
?>


<div class="float-right">
    <div class="header-contact">
        <div class="gethelp"><?=$top['topslogan']?></div>
        <div class="private"><?=$top['topdesc']?></div>
        <div class="quickcall"><a href="tel:<?=extract_number_from_string($top['topphone'])?>"><img src="<?=$topicon_url?>"/> <?=$top['topphone']?></a></div>
    </div>
</div>
