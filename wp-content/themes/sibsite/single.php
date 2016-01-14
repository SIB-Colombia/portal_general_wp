<?php

get_header();

?>
<div class="container content-block">
<main>  

<?php  
if ( have_posts() ) { ?>
	<article>
    <?php 
        while ( have_posts() ) {
		the_post(); 
		//
		?>
        <div class="post-view">
        <h1 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
        <div class="post-content"><?php the_content(); ?></div>
        </div>
        <?php
		//
	} // end while ?>
  </article>
<?php } // end if
?>

</main>
</div>
<?php
get_footer();
?>