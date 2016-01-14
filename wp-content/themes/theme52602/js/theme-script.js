jQuery(document).ready(function() {
	jQuery(window).resize(
		function(){
			if(!jQuery('body').hasClass('cherry-fixed-layout')) {
				jQuery('.full-width-block').width(jQuery(window).width());
				jQuery('.full-width-block').css({width: jQuery(window).width(), "margin-left": (jQuery(window).width()/2)*-1, left: "50%"});
			};
			jQuery('.thumbnail').each(function(){
				if(jQuery(this).width() < 150) {
					jQuery(this).addClass('mini');
				} else {
					jQuery(this).removeClass('mini');
				}
			})
		}		
	).trigger('resize');

	jQuery('.thumbnail').each(function(){
		if(jQuery(this).width() < 150) {
			jQuery(this).addClass('mini');
		}
	})
	
	jQuery('.single-post, .single-portfolio, .page-template-page-testi-php, .single-faq').find('.title-section .breadcrumb li:last-child').prev('.divider').addClass('hidden');

	var i = 1;
	jQuery('#commentform p.field').each(function(){
		jQuery(this).addClass('item-'+i);
		i++;
	})

	var j = 1;
	jQuery('.circle-container').each(function(){
		if(!$(this).hasClass('count')) {
			$(this).parent().addClass('circle-count-wrap').addClass('item-'+j);
			j++;
		}
	})
})