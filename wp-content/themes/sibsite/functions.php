<?php 

//Customized excerpt length

function custom_excerpt_length() {
  return 50;
}

add_filter('excerpt_length', 'custom_excerpt_length');

// Theme Setup

function sibsite_setup() {
  
  //Navigation Menu
  register_nav_menus(array(
    'primary' => __('Primary Menu')
  ));
  
  //Add featured image support
  add_theme_support('post-thumbnails');
  
  //Add image size
  add_image_size('small-thumbnail', 110, 110, true);
  add_image_size('medium-image', 330, 220, true);
  add_image_size('full-image', 750, 390, true);
  add_image_size('slideimage', 1280, 650, true);
  add_image_size('square', 350, 350, true);
}

add_action('after_setup_theme', 'sibsite_setup');

// Add Widget locations

function customWidgetsInit() {
  register_sidebar(array(
    'name' => 'Sidebar',
    'id' => 'sidebar',
    'before_widget' => '<div id="%1$s" class="%2$s sidebar-widget">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>'
  ));
  
  register_sidebar(array(
    'name' => 'Breadcrumbs',
    'id' => 'breadcrumbs'
  ));
  
  register_sidebar(array(
    'name' => 'Before content',
    'id' => 'pre-content',
    'before_widget' => '<div id="%1$s" class="%2$s pre-content">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>'
  ));
  
  register_sidebar(array(
    'name' => 'After content',
    'id' => 'post-content',
    'before_widget' => '<div id="%1$s" class="%2$s post-content">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>'
  ));
  
  register_sidebar(array(
    'name' => 'Herramientas SIB',
    'id' => 'herramientas-sib',
    'before_widget' => '<div id="%1$s" class="%2$s herramientas-sib">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="section-subtitle">',
    'after_title' => '</h2>'
  ));
}

add_action('widgets_init', 'customWidgetsInit');

// Add custom post type function
function create_posttype() {
  register_post_type( 'equipo',
  // CPT Options
    array(
      'labels' => array(
        'name' => __( 'Equipo' ),
        'singular_name' => __( 'Integrante' )
      ),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'equipo'),
      'menu_icon' => 'dashicons-groups',
      'supports' => array( 'title', 'editor', 'thumbnail')
    )
  );
  
  register_post_type( 'slideshow',
  // CPT Options
    array(
      'labels' => array(
        'name' => __( 'Slideshow' ),
        'singular_name' => __( 'Imagen' )
      ),
      'public' => true,
      'has_archive' => false,
      'rewrite' => array('slug' => 'slideshow'),
      'menu_icon' => 'dashicons-format-gallery',
      'supports' => array( 'title', 'editor', 'thumbnail')
    )
  );
  
  register_post_type( 'videos',
  // CPT Options
    array(
      'labels' => array(
        'name' => __( 'Videos' ),
        'singular_name' => __( 'Video' )
      ),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'video'),
      'menu_icon' => 'dashicons-video-alt3'
    )
  );
  
  register_post_type( 'herramientas',
  // CPT Options
    array(
      'labels' => array(
        'name' => __( 'Herramientas SIB' ),
        'singular_name' => __( 'Herramienta' )
      ),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'herramientas'),
      'menu_icon' => 'dashicons-hammer',
      'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields')
    )
  );
  
  flush_rewrite_rules( false ); //For archive to work
}
add_action( 'init', 'create_posttype' );

//Add custom Taxonomy

function create_hierarchical_taxonomy() {

  $labels = array(
    'name' => _x( 'Galerias', 'taxonomy general name' ),
    'singular_name' => _x( 'Galeria', 'taxonomy singular name' ),
    'menu_name' => __( 'Galerias' )
  ); 	

  register_taxonomy('galerias',array('slideshow'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'galeria' ),
  ));
  
  $labels_h = array(
    'name' => _x( 'Tipo Herramienta', 'taxonomy general name' ),
    'singular_name' => _x( 'Tipo', 'taxonomy singular name' ),
    'menu_name' => __( 'Tipo' )
  ); 	

  register_taxonomy('tipos',array('herramientas'), array(
    'hierarchical' => true,
    'labels' => $labels_h,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'tipos' ),
  ));
  
  $labels_e = array(
    'name' => _x( 'Miembro', 'taxonomy general name' ),
    'singular_name' => _x( 'Miembro', 'taxonomy singular name' ),
    'menu_name' => __( 'Miembro' )
  ); 	

  register_taxonomy('tipo',array('equipo'), array(
    'hierarchical' => true,
    'labels' => $labels_e,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'miembro' ),
  ));

}


add_action( 'init', 'create_hierarchical_taxonomy', 0 );

?>