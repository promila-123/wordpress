<?php
$post_feature = get_post_thumbnail_id(get_the_ID());
$image_url = wp_get_attachment_image_url($post_feature, 'full');
$alt = get_post_meta($post_feature, '_wp_attachment_image_alt', TRUE);
if (!empty($alt)) {
    $alt = $alt;
} else {
    $alt = get_the_title($post_feature);
}
?>

<?php
the_content();
?>
