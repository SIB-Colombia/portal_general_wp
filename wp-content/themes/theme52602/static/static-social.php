<?php /* Static Name: Social Links */ ?>
<h4><?php echo __('Follow Us', CURRENT_THEME); ?></h4>
<ul class="social">
	<?php
		$social_networks = array("twitter", "facebook", "dribbble", "behance");
		for($i=0, $array_lenght=count($social_networks); $i<$array_lenght; $i++){
			if(of_get_option($social_networks[$i]) != "") {
				echo '<li class="'.$social_networks[$i].'"><a href="'.of_get_option($social_networks[$i]).'" title="'.$social_networks[$i].'"><i class="i-'.$social_networks[$i].'"></i><span class="label">'.$social_networks[$i].'</span></a></li>';
			}
		}
	?>
</ul>