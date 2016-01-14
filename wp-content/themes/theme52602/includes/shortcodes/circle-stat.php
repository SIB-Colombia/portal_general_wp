<?php

if (!function_exists('circle_stat_shortcode')) {

	add_action( 'wp_enqueue_scripts', 'cherry_circles' );

	function cherry_circles() {
		wp_enqueue_script( 'circles.min', CHILD_URL . '/js/circles.min.js', array( 'jquery' ), '1.0' );
		wp_enqueue_script( 'jquery.counterup.min', CHILD_URL . '/js/jquery.counterup.min.js', array( 'jquery' ), '1.0' );
	}

	function circle_stat_shortcode( $atts, $content = null, $shortcodename = '' ) {
		extract(shortcode_atts(
			array(
				'title'        => '',
				'icon'		   => '',
				'text'         => '',
				'count'		   => '',
				'type'		   => '',
				'btn_text'     => __('Read more', CHERRY_PLUGIN_DOMAIN),
				'btn_link'     => '',
				'percent'	   => '',
				'custom_class' => ''
		), $atts));

		$random_ID = uniqid();

		if ($percent == "" && $type !== "circle" && $count !== '') {
			$stat_class = "count";
		}

		$output =  '<div class="circle-container '.$custom_class.' '.$stat_class.' clearfix">';

		if ($percent!="" && $type == "circle") {
			$output .= "<script>
							jQuery(document).ready(function() {
								if( !jQuery('html').hasClass('ie8') ) {
									jQuery('.circle').waypoint(function() {
										var myCircle = Circles.create({
											id:         'circles-". $random_ID ."',
											radius:     60,
											value:      ". $percent .",
											maxValue:   100,
											width:      5,
											text:       function(value){return value + '%';},
											colors:     ['#f2f2f2', '#feb487'],
											duration:   400,
											wrpClass:   'circles-wrp',
											textClass:  'circles-text'
										});
									}, { offset: '100%', triggerOnce: true });
								};
							});
						</script>";
			$output .= '<div class="circle" id="circles-'. $random_ID .'" percent='. $percent .'></div>';
		}

		if($icon != ''){
	 		$icon_url = CHERRY_PLUGIN_URL . 'includes/images/iconSweets/' . strtolower($icon) . '.png' ;
			if( defined ('CHILD_DIR') ) {
				if(file_exists(CHILD_DIR.'/images/iconSweets/'.strtolower($icon).'.png')){
					$icon_url = CHILD_URL.'/images/iconSweets/'.strtolower($icon).'.png';
				}
			}
			$output .= '<figure class="icon"><img src="'.$icon_url.'" alt="" /></figure>';	
		}

		$output .= '<div class="desc">';

		if ($percent == "" && $type !== "circle" && $count !== '') {
			$output .= "<script>
							jQuery(document).ready(function() {
								if( !jQuery('html').hasClass('ie8') ) {
									jQuery('.circle-container .number-". $random_ID ."').counterUp({
										delay: 100, 
										time: 1000 
									});
								}
							});
						</script>";
			$output .= '<div class="number-'. $random_ID .'">'.$count.'</div>';
		}
		
		if ($title!="") {
			$output .= '<h1>';
			$output .= $title;
			$output .= '</h1>';
		}

		if ($text!="") {
			$output .= '<p>';
			$output .= $text;
			$output .= '</p>';
		}

		if ($btn_link!="") {
			$output .=  '<div class="btn-align"><a href="'.$btn_link.'" title="'.$btn_text.'" class="btn btn-'.$btn_style.' btn-'.$btn_size.' btn-primary" target="'.$target.'">';
			$output .= $btn_text;
			$output .= '</a></div>';
		}

		$output .= '</div>';

		$output .= '</div>';

		$output = apply_filters( 'cherry_plugin_shortcode_output', $output, $atts, $shortcodename );

		return $output;
	}
	add_shortcode('stats', 'circle_stat_shortcode');

}
?>