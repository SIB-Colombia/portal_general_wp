<?php /* Wrapper Name: Footer */ ?>
<div class="row copyright">
	<div class="span6" data-motopress-type="static" data-motopress-static-file="static/static-footer-text.php">
		<?php get_template_part("static/static-footer-text"); ?>
	</div>
	<div class="span6" data-motopress-type="dynamic-sidebar" data-motopress-sidebar-id="footer-sidebar-1">
		<?php dynamic_sidebar("footer-sidebar-1"); ?>
	</div>	
</div>
<div class="row">
	<div class="span12 line"></div>
</div>
<div class="row footer-widgets">
	<div class="span3" data-motopress-type="static" data-motopress-static-file="static/static-footer-nav.php">
		<?php get_template_part("static/static-footer-nav"); ?>
	</div>
	<div class="span3" data-motopress-type="dynamic-sidebar" data-motopress-sidebar-id="footer-sidebar-2">
		<?php dynamic_sidebar("footer-sidebar-2"); ?>
	</div>
	<?php if (of_get_option('facebook') || of_get_option('twitter') || of_get_option('dribbble') || of_get_option('behance')) { ?>
		<div class="span3">
			<div class="social-wrap" data-motopress-type="static" data-motopress-static-file="static/static-social.php">
				<?php get_template_part("static/static-social"); ?>
			</div>
		</div>
	<?php } ?>
	<div class="span3" data-motopress-type="dynamic-sidebar" data-motopress-sidebar-id="footer-sidebar-3">
		<?php dynamic_sidebar("footer-sidebar-3"); ?>
	</div>
</div>