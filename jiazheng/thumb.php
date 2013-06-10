<?php
	$args = array(
		'numberposts' => 1,
		'order'=> 'ASC',
		'post_mime_type' => 'image',
		'post_parent' => $post->ID,
		'post_status' => null,
		'post_type' => 'attachment'
	);
 
	$attachments = get_children($args);
	$imageUrl = '';
 
	if($attachments) {
		$image = array_pop($attachments);
		$imageSrc = wp_get_attachment_image_src($image->ID, 'thumbnail');
		$imageUrl = $imageSrc[0];
	} else {
		$imageUrl = get_bloginfo('template_url') . '/img/default.gif';
	}
?>
<a href="<?php the_permalink() ?>"><img class="left" src="<?php echo $imageUrl; ?>" alt="<?php the_title(); ?>" width="150" height="150" /></a>