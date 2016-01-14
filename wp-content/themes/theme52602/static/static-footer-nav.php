<?php /* Static Name: Footer navigation */?> 
	<?php if (has_nav_menu('footer_menu')) {
		if ( of_get_option('footer_menu') == 'true') { ?>  
		<div><h4><?php echo __('Navigation', CURRENT_THEME); ?></h4></div>
		<nav class="nav footer-nav">
			<?php wp_nav_menu( array(
				'container'       => 'ul',
				'depth'           => 0,
				'theme_location' => 'footer_menu' 
				)); 
			?>
		</nav>
	<?php }
	}
?>