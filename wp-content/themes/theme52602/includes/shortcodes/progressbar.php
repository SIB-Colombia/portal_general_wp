<?php
/**
 * Progressbar
 *
 */
if (!function_exists('shortcode_progressbar')) {

	function shortcode_progressbar( $atts, $content = null, $shortcodename = '' ) {
		extract(shortcode_atts(
			array(
				'value'        => '50',
				'type'         => '',
				'title'		   => '',
				'grad_type'    => '',
				'animated'     => '',
				'custom_class' => ''
		), $atts));

		// check what type user selected
		switch ($type) {
			case 'info':
				$bar_type = 'progress-info';
				break;
			case 'success':
				$bar_type = 'progress-success';
				break;
			case 'warning':
				$bar_type = 'progress-warning';
				break;
			case 'danger':
				$bar_type = 'progress-danger';
				break;
		}

		// check what gradient type user selected
		switch ($grad_type) {
			case 'vertical':
				$g_type = '';
				break;
			case 'striped':
				$g_type = 'progress-striped';
				break;
		}

		// animated: yes or no
		switch ($animated) {
			case 'no':
				$bar_animated = '';
				break;
			case 'yes':
				$bar_animated = 'active';
				break;
		}

		$output = "<script>
						jQuery(document).ready(function() {
							if( !jQuery('html').hasClass('ie8') ) {
								jQuery('.progress').waypoint(function() {
									jQuery('.progress').addClass('active');
								}, { offset: '100%', triggerOnce: true });
							};
						});
					</script>";
		$output .= '<div class="progress '. $bar_type .' '. $bar_animated .' '. $g_type .' '.$custom_class.'">';
		$output .= '<h3>'. $title .'</h3>';
		$output .= '<div class="desc"><div class="bar-wrap"><div class="bar" style="width: '. $value .'%;"></div></div><div class="percent">'. $value .'%</div></div>';
		$output .= '</div><!-- .progressbar (end) -->';

		$output = apply_filters( 'cherry_plugin_shortcode_output', $output, $atts, $shortcodename );

		return $output;

	}
	add_shortcode('progressbar', 'shortcode_progressbar');

}?>