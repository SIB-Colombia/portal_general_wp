<?php /* Static Name: Footer text */ ?>
<div id="footer-text" class="footer-text">
	<a href="<?php echo home_url(); ?>/" title="<?php bloginfo('description'); ?>" class="footer-logo"><?php bloginfo('name'); ?></a>
	<?php $myfooter_text = of_get_option('footer_text'); ?>
	<?php if($myfooter_text){?>
		<p class="desc"><?php echo of_get_option('footer_text'); ?></p>
	<?php } else { ?>
		<p class="desc">
			<?php bloginfo('description'); ?>
		</p>
	<?php } ?>
	<?php if( is_front_page() ) { ?>
		More Web Design WordPress Themes at <a rel="nofollow" href="http://www.templatemonster.com/category/web-design-wordpress-themes/" target="_blank">TemplateMonster.com</a>
	<?php } ?>
</div>