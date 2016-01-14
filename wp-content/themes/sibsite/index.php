<?php

get_header();

?>
<div class="container content-block">
<main id="main-content">
  <h1 class="title shadow title-section">Actualidad <a id="grid" class="grid-tgl"><img src="<?php bloginfo('template_directory');?>/img/view-grid.svg"></a> <a id="lines" class="grid-tgl"><img src="<?php bloginfo('template_directory');?>/img/view-lines.svg"></a></h1>
  

<?php  
if ( have_posts() ) { ?>
	<article class="col-md-8"<?php if(is_active_sidebar('sidebar')) { echo 'class="col-md-8"'; } else { echo 'class="col-md-12"'; } ?>>
    <?php 
        while ( have_posts() ) {
		the_post(); 
		//
		?>
        <div class="post-view shadow-sm">
        <div class="post-image"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('full-image'); ?></a></div>
        <h1 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
          <div class="post-date"><?php the_time('m/d/Y'); ?><?php 
            
          $categories = get_the_category();
          $separator = ', ';
          $output = '';
          
          if ($categories) {
            foreach ($categories as $category) {
              $output .= '<a href="'.get_category_link($category->term_id).'">'.$category->cat_name.'</a>'.$separator;
            }
            
            $cat = ' | Publicado en '.trim($output, $separator);
            echo $cat;
          }
            
            ?></div>
        <div class="post-author">por <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a></div>
        <div class="post-content"><p><?php echo get_the_excerpt(); ?></p></div>
        <a href="<?php the_permalink(); ?>" class="read-more-button">+ Leer más</a>
        </div>
        <?php
		//
	} // end while ?>
  </article>
<?php } // end if
?>
<?php 

if(is_active_sidebar('sidebar')) {
  get_sidebar();
} 
  ?>
</main>
</div>
<?php
get_footer();
?>