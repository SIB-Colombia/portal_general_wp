<?php get_header(); ?>
 
<!-- CAROUSEL -->
<?php 
// the query
$query_slide = new WP_Query( array( 'post_type' => 'slideshow', 'tax_query' => array(
		array(
			'taxonomy' => 'galerias',
			'field'    => 'slug',
			'terms'    => 'home',
		),
	) ) ); ?>

<?php if ( $query_slide->have_posts() ) : ?>

	<!-- pagination here -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
	<!-- the loop -->
    <?php $x = 0; ?>
	<?php while ( $query_slide->have_posts() ) : $query_slide->the_post(); ?>
		<li data-target="#myCarousel" data-slide-to="<?php echo $x; ?>"<?php if($x == 0) { echo ' class="active"'; } ?>></li>
        <?php $x++; ?>
	<?php endwhile; ?>
	<!-- end of the loop -->
      </ol>
      <div class="carousel-inner" role="listbox">
      <?php $y = 0; ?>
      <?php while ( $query_slide->have_posts() ) : $query_slide->the_post(); ?>
        <div class="item<?php if($y == 0) { echo ' active';} ?>">
          <?php the_post_thumbnail('slideimage'); ?>
          <div class="carousel-caption">
            <h3><?php the_title(); ?></h3>
            <p><?php echo get_the_content(); ?></p>
          </div>
        </div>
        <?php $y++; ?>
      <?php endwhile; ?>
      </div>
      <!-- Left and right controls -->
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
	<!-- pagination here -->

	<?php wp_reset_postdata(); ?>

<?php else : ?>
<?php endif; ?>
<!-- / CAROUSEL -->
<!-- FEATURED -->
<div class="container home-block shadow">
  <div class="row align-center">
  <div class="col-md-3">
    <a href="#">
    <div class="featured-circle circle-1">
      <h3>Consultar</h3>
      <p>Contenido de la sección</p>
    </div>
    </a>
  </div>
  <div class="col-md-3">
    <a href="#">
    <div class="featured-circle circle-2">
      <h3>Publicar</h3>
      <p>Contenido de la sección</p>
    </div>
    </a>
  </div>
  <div class="col-md-3">
    <a href="#">
    <div class="featured-circle circle-3">
      <h3>Comunidad SIB</h3>
      <p>Contenido de la sección</p>
    </div>
    </a>
  </div>
  <div class="col-md-3">
    <a href="#">
    <div class="featured-circle circle-4">
      <h3>Preguntas frecuentes</h3>
      <p>Contenido de la sección</p>
    </div>  
  </div>
  </a>
</div>
</div>
<!-- / FEATURED -->
<!-- NEWS -->

<?php 
// ACTUALIDAD
$query_actual = new WP_Query( 'cat=actualidad&posts_per_page=3' ); ?>

<?php if ( $query_actual->have_posts() ) : ?>

	<!-- pagination here -->

    <div class="container home-block">
      <h1 class="title">Actualidad</h1>
      <div class="row">
	<!-- the loop -->
	<?php while ( $query_actual->have_posts() ) : $query_actual->the_post(); ?>
        <div class="col-md-4">
          <div class="home-teaser-img"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium-image'); ?></a></div>
          <h2 class="home-teaser-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
          <div class="row home-author-cont">
            <div class="col-sm-8">por <span class="home-author"><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a></span></div>
            <div class="col-sm-4"><?php the_time('d/m/Y'); ?></div>
          </div>
          <p class="home-teaser-contents"><?php the_excerpt(); ?></p>
        </div>
	<?php endwhile; ?>
	<!-- end of the loop -->
      </div>
      <div class="row btn-box">
        <div class="col-md-12 align-right">
          <a href="#" class="read-more-btn">+ Leer más</a>
        </div>
      </div>
    </div>
	<!-- pagination here -->

	<?php wp_reset_postdata(); ?>

<?php else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
<!-- / NEWS -->
<!-- CIFRAS -->
<div class="inv">
  <div class="container home-block shadow-top">
    <h1 class="title">Cifras de publicación</h1>
    <div class="row align-center">
      <div class="col-md-3">
        <a href="#">
        <div class="featured-circle circle-5">
          <h3>3.339</h3>
          <p class="cifras-desc">Fichas de especie publicadas</p>
        </div>
        </a>
      </div>
      <div class="col-md-3">
        <a href="#">
        <div class="featured-circle circle-6">
          <h3>1'121.244</h3>
          <p class="cifras-desc">Registros biológicos</p>
        </div>
        </a>
      </div>
      <div class="col-md-3">
        <a href="#">
        <div class="featured-circle circle-7">
          <h3>101</h3>
          <p class="cifras-desc">Entidades participantes</p>
        </div>
        </a>
      </div>
      <div class="col-md-3">
        <a href="#">
        <div class="featured-circle circle-8">
          <h3>666</h3>
          <p class="cifras-desc">Listas de especies</p>
        </div>
        </a>
      </div>
    </div>
    <div class="row align-center cifras-intro">
        <p>Cillum quamquam do quae quorum. Fore aut nostrud ad sint. Elit arbitror est 
          irure dolor aut ita quem expetendis voluptatibus, voluptate elit labore ullamco 
          magna ita magna an tempor aut nisi. Fugiat tempor non despicationes, eu qui 
          quorum irure multos, et ne enim eram varias, ita irure sunt legam iudicem, iis 
          ingeniis ex appellat eu nam labore laboris do se incurreret exercitation quo 
          lorem litteris appellat. Si dolor occaecat laboris, senserit minim summis 
          eiusmod dolor ita officia id mandaremus, eram iudicem singulis, senserit dolore 
          nescius expetendis, a nulla legam varias aliquip, te tempor ad occaecat, commodo 
          quis cernantur. Velit concursionibus cupidatat quis proident, non eram ab sunt 
          sed aut esse an quis, sed ab minim ingeniis.</p>
      </div>
      <div class="row btn-box">
      <div class="col-md-12 align-right">
        <a href="#" class="read-more-btn">+ Ver más cifras</a>
      </div>
  </div>
  </div>
</div>
<!-- / CIFRAS -->
<!-- IFRAME MAP 
<div class="map">
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10543000.693072546!2d-71.39228666698233!3d3.252055284229783!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e15a43aae1594a3%3A0x9a0d9a04eff2a340!2sColombia!5e0!3m2!1ses!2s!4v1444755331223" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>
<!-- / IFRAME MAP -->
<!-- VIDEOS -->
<?php
function getYouTubeId($url){
  parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars );
  return $my_array_of_vars['v'];
}
?>
<?php 
// the query
$query_video = new WP_Query( array( 'post_type' => 'videos', 'posts_per_page' => 3 ) ); ?>

<?php if ( $query_video->have_posts() ) : ?>

	<!-- pagination here -->
    <div class="container home-block shadow">
      <h1 class="title">Videos</h1>
        <div class="row">

	<!-- the loop -->
	<?php while ( $query_video->have_posts() ) : $query_video->the_post(); ?>
          <div class="col-md-4">
            <div class="home-teaser-img"><a data-toggle="modal" data-target="#<?php echo getYouTubeId(get_the_content()); ?>" style="cursor: pointer;"><img src="http://img.youtube.com/vi/<?php echo getYouTubeId(get_the_content()); ?>/0.jpg" alt="Video Image"></a></div>
            <!-- Modal -->
<div id="<?php echo getYouTubeId(get_the_content()); ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><?php the_title(); ?></h4>
      </div>
      <div class="modal-body">
        <p><?php the_content(); ?></p>
      </div>
    </div>

  </div>
</div><!-- / Modal -->
            <h2 class="home-video-title"><?php the_title(); ?></h2>
          </div>
	<?php endwhile; ?>
	<!-- end of the loop -->
          
          </div>
          <div class="row btn-box">
              <div class="col-md-12 align-right">
                <a href="#" class="read-more-btn">+ Ver más videos</a>
              </div>
          </div>
        </div>
	<!-- pagination here -->

	<?php wp_reset_postdata(); ?>

<?php else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
<!-- / VIDEOS -->
<!-- SOCIAL MEDIA -->
<div class="container home-block align-center">
  <a href="#" class="sm-icons"><img src="<?php bloginfo('template_directory');?>/img/sm-fb.svg" alt="Facebook"></a>
  <a href="#" class="sm-icons"><img src="<?php bloginfo('template_directory');?>/img/sm-tw.svg" alt="Twitter"></a>
  <a href="#" class="sm-icons"><img src="<?php bloginfo('template_directory');?>/img/sm-pin.svg" alt="Pinterest"></a>
  <a href="#" class="sm-icons"><img src="<?php bloginfo('template_directory');?>/img/sm-yt.svg" alt="YouTube"></a>
  <a href="#" class="sm-icons"><img src="<?php bloginfo('template_directory');?>/img/sm-subscribe.svg" alt="Newsletter"></a>
</div>
<!-- / SOCIAL MEDIA -->

<?php get_footer(); ?>