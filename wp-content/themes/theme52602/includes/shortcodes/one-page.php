<?php
/**
 * Post Grid
 *
 */
if (!function_exists('one_page_shortcode')) {

	function one_page_shortcode( $atts, $content = null, $shortcodename = '' ) {
		extract(shortcode_atts(array(
			'id' 			  => '',
			'custom_class'    => ''
		), $atts));

	global $post;
	$post_id = $id;
	$rand  = rand();
	$prettyType = 0;

	$post = get_post($id, ARRAY_A);
	$title = $post['post_title'];

	

	$attachment_url = wp_get_attachment_image_src( get_post_thumbnail_id($post_id), 'full' );
	$url            = $attachment_url['0'];
	$image          = aq_resize($url, 200, 200, true);

	$output = '<div class="one-page">';
		if(has_post_thumbnail($post_id)) {
			$prettyType = 'prettyPhoto-'.$rand;

			$output .= '<figure class="featured-thumbnail thumbnail">';
			$output .= '<a href="'.$url.'" title="'.get_the_title($post_id).'" rel="' .$prettyType.'">';
			$output .= '<img  src="'.$image.'" alt="'.get_the_title($post_id).'" /></a>';
			$output .= cherry_get_post_networks(array('post_id' => $post_id, 'display_title' => false, 'output_type' => 'return'));
			$output .= '</figure>';
		}
		$output .= '<div class="title"><a href="'.get_permalink($post_id).'" title="'.get_the_title($post_id).'">'.$title.'</a></div>';
		$output .= '<div class="networks">';
			$output .= cherry_get_post_networks(array('post_id' => $post_id, 'display_title' => false, 'output_type' => 'return'));
		$output .= '</div>';
	$output .= '</div>';

	$output = apply_filters( 'cherry_plugin_shortcode_output', $output, $atts, $shortcodename );

	return $output;
	}
	add_shortcode('one_page', 'one_page_shortcode');
}?>