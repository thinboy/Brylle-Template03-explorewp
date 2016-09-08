<?php
/**
 * explorer functions and definitions
 *
 * @package Explorer
 * @since Explorer 1.0
 */
/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 1020; /* pixels */
/**
 * Adjusts content_width value for full-width page and grid page.
 */
function explorer_content_width() {
	global $content_width;
	if ( is_page_template( 'page-templates/full-width-page.php' )
	|| is_page_template( 'page-templates/featured-page.php' )
	|| is_page_template( 'page-templates/front-page.php' )
	|| is_page_template( 'page-templates/front-page-one.php' )
	|| is_page_template( 'page-templates/portfolio-page.php' )
	|| is_page_template( 'page-templates/showcase-page.php' )
	|| is_page_template( 'page-templates/grid-page.php' ))
		$content_width = 1470;
}
add_action( 'template_redirect', 'explorer_content_width' );

if ( ! function_exists( 'explorer_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function explorer_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on test, use a find and replace
	 * to change 'test' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'explorer', get_template_directory() . '/languages' );
	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );
	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
	/**
	 * Enable support for Post Thumbnails on posts and pages
	 */
	add_theme_support( 'post-thumbnails' );
	// This theme allows users to set a custom background
	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'test_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'explorer' ),
		'social' => __( 'Social', 'explorer' ),
	) );
	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link', 'gallery' ) );
}
endif; // explorer_setup
add_action( 'after_setup_theme', 'explorer_setup' );
/**
 * Register widgetized area and update sidebar with default widgets
 */
function explorer_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'explorer' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Widget Area', 'explorer' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer One', 'explorer' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Use this widget area to display widgets in the first column of the footer', 'explorer' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Two', 'explorer' ),
		'id'            => 'sidebar-5',
		'description'   => __( 'Use this widget area to display widgets in the second column of the footer', 'explorer' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Three', 'explorer' ),
		'id'            => 'sidebar-4',
		'description'   => __( 'Use this widget area to display widgets in the third column of the footer', 'explorer' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Front Page Sidebar', 'explorer' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Use this widget area to display Explorer Front Page: 5 Column Recent Posts widget, Explorer Front Page: Masonry Recent Posts widget or Soliloquy slider ', 'explorer' ),
		'before_widget' => '<aside id="%1$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="home-widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'explorer_widgets_init' );
if ( ! function_exists( 'explorer_fonts_url' ) ) :
/**
 * Register Google fonts for explorer.
 *
 * @since Explorer 1.0
 *
 * @return string Google fonts URL for the theme.
 */
function explorer_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';
	/* translators: If there are characters in your language that are not supported by Raleway, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'explorer' ) ) {
		$fonts[] = 'Open+Sans:300italic,400italic,600italic,700italic,800italic,700,300,600,800,400';
	}
	/* translators: If there are characters in your language that are not supported by Playfair Display, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Varela Round font: on or off', 'explorer' ) ) {
		$fonts[] = 'Varela+Round';
	}
	/* translators: To add an additional character subset specific to your language, translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language. */
	$subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'explorer' );
	if ( 'cyrillic' == $subset ) {
		$subsets .= ',cyrillic,cyrillic-ext';
	} elseif ( 'greek' == $subset ) {
		$subsets .= ',greek,greek-ext';
	} elseif ( 'devanagari' == $subset ) {
		$subsets .= ',devanagari';
	} elseif ( 'vietnamese' == $subset ) {
		$subsets .= ',vietnamese';
	}
	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), '//fonts.googleapis.com/css' );
	}
	return $fonts_url;
}
endif;
/**
 * Enqueue scripts and styles
 */
function explorer_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'explorer-fonts', explorer_fonts_url(), array(), null );
	wp_enqueue_style( 'explorer-style', get_stylesheet_uri() );
	wp_enqueue_script( 'explorer-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'explorer-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	wp_enqueue_script( 'explorer-menus', get_template_directory_uri() . '/js/menus.js', array( 'jquery' ), '1.0', true );
	if ( is_page_template( 'page-templates/portfolio-page.php' )
	|| is_page_template( 'page-templates/front-page-two.php' ) ) {
		wp_enqueue_script( 'masonry' );
		wp_enqueue_script( 'explorer-functions', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20130605', true );
	}
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
	if ( is_singular() && wp_attachment_is_image() )
		wp_enqueue_script( 'explorer-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
}
add_action( 'wp_enqueue_scripts', 'explorer_scripts' );
/**
 * Appends post title to Aside and Quote posts
 *
 * @param string $content
 * @return string
 */
function explorer_conditional_title( $content ) {
	if ( has_post_format( 'aside' ) || has_post_format( 'quote' ) ) {
		if ( ! is_singular() )
			$content .= the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>', false );
		else
			$content .= the_title( '<h1 class="entry-title">', '</h1>', false );
	}
	return $content;
}
add_filter( 'the_content', 'explorer_conditional_title', 0 );
/*-----------------------------------------------------------------------------------*/
/* Custom Trim Words
/*-----------------------------------------------------------------------------------*/
function custom_trim_words( $text, $num_words = 55, $more = null ) {
	if ( null === $more )
		$more = __( '&hellip;', 'explorer' );
	$original_text = $text;
	$text = strip_shortcodes( $text );
	// Add tags that you don't want stripped
	$text = strip_tags( $text, '<a>' );
	if ( 'characters' == _x( 'words', 'word count: words or characters?', 'explorer' ) && preg_match( '/^utf\-?8$/i', get_option( 'blog_charset' ) ) ) {
		$text = trim( preg_replace( "/[\n\r\t ]+/", ' ', $text ), ' ' );
		preg_match_all( '/./u', $text, $words_array );
		$words_array = array_slice( $words_array[0], 0, $num_words + 1 );
		$sep = '';
	} else {
		$words_array = preg_split( "/[\n\r\t ]+/", $text, $num_words + 1, PREG_SPLIT_NO_EMPTY );
		$sep = ' ';
	}
	if ( count( $words_array ) > $num_words ) {
		array_pop( $words_array );
		$text = implode( $sep, $words_array );
		$text = $text . $more;
	} else {
		$text = implode( $sep, $words_array );
	}
	return apply_filters( 'custom_trim_words', $text, $num_words, $more, $original_text );
}
/**
 * Returns a "Read More" link for excerpts
 *
 */
function explorer_read_more_link() {
	return ' <a href="'. esc_url( get_permalink() ) . '" class="excerpt-link">' . __( 'Read More', 'explorer' ) . '</a>';
}
/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and explorer_read_more_link().
 */
function explorer_auto_excerpt_more( $more ) {
	return ' &hellip;' . explorer_read_more_link();
}
add_filter( 'excerpt_more', 'explorer_auto_excerpt_more' );
/**
 * Excerpt Length
 *
 */
function custom_excerpt_length( $length ) {
	return 28;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
/**
* Grab the Healthy Living Custom widgets
*/
require( get_template_directory() . '/inc/widgets.php' );
/**
 * Implement the Custom Header feature
 */
require( get_template_directory() . '/inc/custom-header.php' );
/**
 * Custom template tags for this theme.
 */
require( get_template_directory() . '/inc/template-tags.php' );
/**
 * Custom functions that act independently of the theme templates
 */
require( get_template_directory() . '/inc/extras.php' );
/**
 * Customizer additions
 */
require( get_template_directory() . '/inc/customizer.php' );
/**
 * Load Jetpack compatibility file.
 */
require( get_template_directory() . '/inc/jetpack.php' );
/**
 * WooCommerce
 *
 * Unhook sidebar
 */
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
add_theme_support( 'woocommerce' );
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 40;' ), 20 );

//add_filter( 'jetpack_development_mode', '__return_true' );