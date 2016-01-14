<?php get_header(); ?>

<?php 
if(is_active_sidebar('pre-content')) {
  get_sidebar();
} 
?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12"><?php the_content(); ?></div>
        </div>
      </div>
    </div>

<?php endwhile; else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>

<?php 
if(is_active_sidebar('post-content')) {
  get_sidebar();
} 
?>

<?php get_footer(); ?>