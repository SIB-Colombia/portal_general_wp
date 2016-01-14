<?php get_header(); ?>
<main>
<div class="section">
  <div class="container">
    <h1 class="section-title">Equipo coordinador</h1>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <?php
    $thumb_id = get_post_thumbnail_id();
    $thumb_url = wp_get_attachment_image_src($thumb_id,'square', true);
    ?>
    <div class="width25 fixed-height team-member align-center" data-title="<?php echo get_the_title(); ?>" data-content="<?php echo get_the_content(); ?>" data-image="<?php echo $thumb_url[0]; ?>" data-toggle="modal" data-target="#teamMember">
      <div class="team-img"><?php the_post_thumbnail('square'); ?></div>
      <h3><?php the_title(); ?></h3>
      <p><?php echo substr(get_the_excerpt(),0,80).'...'; ?></p>
    </div>
<?php endwhile; else : ?>
<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
    
<!-- Modal -->
<div id="teamMember" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Eqipo coordinador</h4>
      </div>
      <div class="modal-body align-center team-display">
        <div id="item-image" class="team-img-wrapper"></div>
        <h2 id="item-title"></h2>
        <p id="item-content"></p>
      </div>
    </div>

  </div>
</div>
    
</div>
</div>
</main>
<script>

//GET DATA INFO FROM ITEM TO DISPLAY IN EDIT SCREEN
    
$(document).on('click', 'div.team-member', function(event, ui)
{
	var data_title = $(this).data('title');
    var data_content = $(this).data('content');
    var data_image = $(this).data('image');
    var image = '<img src="'+data_image+'" alt="'+data_title+'">';
    $('#item-title').html( data_title );
    $('#item-content').html( data_content );
    $('#item-image').html( image );
    
});

</script>
<?php get_footer(); ?>