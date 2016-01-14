<?php get_header(); ?>
<main>
<div class="section">
  <div class="container">
    <h1 class="section-title">Herramientas y recursos adicionales</h1>
    <?php 
      if(is_active_sidebar('herramientas-sib')) {
        get_sidebar();
      } 
    ?>
    <h2 class="section-subtitle">Otras herramientas</h2>
    <div class="sib-tools sib-tools-wrapper">
      <div class="row sib-tools-separator">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                  <div class="col-md-4  sib-tools-col" id="post-<?php the_ID(); ?>">
                  <!-- loop content -->
                    <div class="tools-post-image"><?php the_post_thumbnail('square'); ?></div>
                    <h2 class="tools-post-title"><?php the_title(); ?></h2>
                    <div class="tools-post-content"><?php the_content(); ?></div>
                    <?php $urlfield = get_post_meta($post->ID, 'URL', true); ?>
                    <?php if($urlfield !== '') { ?>
                    <div class="tools-post-custom"> <a href="<?php echo $urlfield; ?>" target="_blank"><?php echo get_post_meta($post->ID, 'URL', true); ?></a></div>
                    <?php } ?>
                  <!-- loop content -->
                  </div>
                <?php $counter++;
                  if ($counter % 3 == 0) {
                  echo '</div><div class="row sib-tools-separator">';
                }
                endwhile; endif; ?>
      </div><!-- /row -->
    </div>
  </div><!-- /container -->
</div>
</main>
<?php get_footer(); ?>