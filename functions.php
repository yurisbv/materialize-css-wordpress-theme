<?php
/**
 * materialize css functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package materialize_css
 */
require 'materialize-functions/materialize-pagination.php';

if ( ! function_exists( 'materialize_css_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function materialize_css_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on materialize css, use a find and replace
	 * to change 'materialize-css' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'materialize-css', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	add_theme_support( 'custom-logo', array(
			'height'      => 64,
			'width'       => 400,
			'flex-width' => true)
	);

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'primary' => esc_html('Primary'),
			'secondary' => esc_html('Secondary')
		)
	);
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'materialize_css_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'materialize_css_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function materialize_css_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'materialize_css_content_width', 640 );
}
add_action( 'after_setup_theme', 'materialize_css_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function materialize_css_widgets_init() {
	register_sidebar(array(
		'name' => 'header',
		'id' =>'header_widgets'
	));
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'materialize-css' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'materialize-css' ),
		'before_widget' => '<div class="sidebar-area"><div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<div class="divider"></div><h5 class="sidebar-text center">',
		'after_title'   => '</h5>',
	));
	register_sidebar(array(
		'name' => 'Footer Left',
		'id' => 'footerleft_widgets',
		'before_widget' => '<div class="footer-area">',
		'after_widget' => '</div>',
		'before_title' => '<p class="footer-text">',
		'after_title' => '</p>',
	));
	register_sidebar(array(
		'name' => 'Footer Right',
		'id' => 'footerright_widgets',
		'before_widget' => '<div class="footer-area">',
		'after_widget' => '</div>',
		'before_title' => '<p class="footer-text">',
		'after_title' => '</p>',
	));
}
add_action( 'widgets_init', 'materialize_css_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function materialize_css_scripts() {
	if( !is_admin()){	 
	 	wp_deregister_script('jquery');
	 	wp_enqueue_script( 'materialize-css-jquery', 'https://code.jquery.com/jquery-2.1.1.min.js', '', null, true );
	}
	$themecolors = get_theme_mod('materialize_colors');
	wp_enqueue_style('material-colors', get_template_directory_uri() . '/css/'. $themecolors);

	 wp_enqueue_style('materialize_css-style', 'https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css', '', null, false);
	
	wp_enqueue_style('style', get_stylesheet_uri() );
	 
	wp_enqueue_script('materialize_css_scripts', 'https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.1/js/materialize.min.js', '', null, true);

	wp_enqueue_script('materialize_css-scripts', get_template_directory_uri() . '/js/custom.js', array(), '1.0', true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action('wp_enqueue_scripts', 'materialize_css_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';
/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';
/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';
/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/* Colunistas */
function colunista()
{
    global $wpdb;
    $colunista_list = $wpdb->get_results("SELECT ID, user_nicename from $wpdb->users ORDER BY display_name");
    return $colunista_list;
}

/*Customizar cores*/
function materialize_controls($wp_customize)
{
	$wp_customize->add_section( 'materialize_options',
 	array(
   'title'      => __('Material Options','materialized'),
   'description' => 'Personalize seu tema wordpress:',
   'priority'   => 30,
 )
 );
 
// Add setting
 $wp_customize->add_setting(
    'materialize_colors',
    array('default' => 'gnl.css')
 );
 
// Add control 
	$wp_customize->add_control(
		'materialize_color_selector',
		array(
		    'label' => 'Paleta de Cores',
		    'section' => 'materialize_options',
		    'settings' => 'materialize_colors',
		    'type' => 'select',
		    'choices' => array(
		    	'vermelho.css' =>'Vermelho',
		        'azul.css' => 'Azul',
		        'preto.css' => 'Preto',
		        'verde.css' => 'Verde',
		        'laranja.css' => 'Laranja'),
		));
}
add_action('customize_register', 'materialize_controls');

/*Materialize Paginador*/
// function materialize_pagination() {
// 	global $wp_query;
// 	$big = 999999999;

// 	echo '<ul class="pagination">'.
// 		paginate_links(array(
// 			'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
// 			'format' => '?paged=%#%',
// 			'current' => max(1, get_query_var('paged')),
// 			'total' => $wp_query->max_num_pages,
// 			'prev_text' => '<li class="waves-effect paginator-icon"><i class="material-icons">chevron_left</i></li>',
// 			'next_text' => '<li class="waves-effect paginator-icon"><i class="material-icons">chevron_right</i></li>',
// 			'add_fragment' => '',
// 			'before_page_number' => '<li class="waves-effect paginador-number">',
// 			'after_page_number'  => '</li>'
// 		)).
// 		'</ul>';
//       }
/*Fim do paginador*/
