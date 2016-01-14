<?php /* Wrapper Name: Header */ ?>
<div class="nav-wrap">
	<div class="row">
		<div class="span3" data-motopress-type="static" data-motopress-static-file="static/static-logo.php">
			<?php get_template_part("static/static-logo"); ?>
		</div>
		<div class="span9">
			<div class="menu-wrap" data-motopress-type="static" data-motopress-static-file="static/static-nav.php">
				<?php get_template_part("static/static-nav"); ?>
			</div>
			<?php if (of_get_option('facebook') || of_get_option('twitter') || of_get_option('dribbble') || of_get_option('behance')) { ?>
				<div class="social-wrap" data-motopress-type="static" data-motopress-static-file="static/static-social.php">
					<?php get_template_part("static/static-social"); ?>
				</div>
			<?php } ?>
		</div>
	</div>
</div>