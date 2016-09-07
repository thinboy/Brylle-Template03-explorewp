<?php
/**
 * Sample implementation of the Custom Header feature
 * http://codex.wordpress.org/Custom_Headers
 *
 * You can add an optional custom header image to header.php like so ...

	<?php if ( get_header_image() ) : ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
	</a>
	<?php endif; // End header image check. ?>

 *
 * @package Explorer
 * @since Explorer 1.0
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses explorer_header_style()
 * @uses explorer_admin_header_style()
 * @uses explorer_admin_header_image()
 */
function explorer_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'explorer_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '1c1615',
		'width'                  => 2600,
		'height'                 => 400,
		'flex-height'            => true,
		'wp-head-callback'       => 'explorer_header_style',
		'admin-head-callback'    => 'explorer_admin_header_style',
		'admin-preview-callback' => 'explorer_admin_header_image',
	) ) );
}
add_action( 'after_setup_theme', 'explorer_custom_header_setup' );

if ( ! function_exists( 'explorer_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see explorer_custom_header_setup().
 */
function explorer_header_style() {
	$header_text_color = get_header_textcolor();

	// If no custom options for text are set, let's bail
	// get_header_textcolor() options: HEADER_TEXTCOLOR is default, hide text (returns 'blank') or any hex value
	if ( HEADER_TEXTCOLOR == $header_text_color ) {
		return;
	}

	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
		// Has the text been hidden?
		if ( 'blank' == $header_text_color ) :
	?>
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		// If the user has set a custom color for the text use that
		else :
	?>
	<?php endif; ?>
	</style>
	<?php
}
endif; // explorer_header_style

if ( ! function_exists( 'explorer_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * @see explorer_custom_header_setup().
 */
function explorer_admin_header_style() {
?>
	<style type="text/css">
		.appearance_page_custom-header #headimg {
			border: none;
		}
		#headimg h1,
		#desc {
			text-align: center;
		}
		#headimg {
			text-align: center;
		}
		#headimg h1 {
			border: 2px solid #37383e;
			clear: both;
			display: inline-block;
			font-size: 50px;
			font-size: 2.77777778rem;
			letter-spacing: .02em;
			line-height: 1.2em;
			margin-bottom: 0.1em;
			padding: 5px 10px;
			font-family: 'Varela Round', sans-serif;
			text-align: center;
		}
		#headimg h1 a {
			color: #37383e;
			text-decoration: none;
		}
		#desc {
			font-family: "Open Sans", "Helvetica Neue", Helvetica, Arial, sans-serif;
			color: #6c6d70;
			font-size: 14px;
			font-size: 0.77777778rem;
			font-weight: 400;
			letter-spacing: .2em;
			margin-top: .4em;
			margin-bottom: 30px;
		}
		#headimg img {
			display: block;
	        margin: 0 auto .1% auto;
		}
	</style>
<?php
}
endif; // explorer_admin_header_style

if ( ! function_exists( 'explorer_admin_header_image' ) ) :
/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * @see explorer_custom_header_setup().
 */
function explorer_admin_header_image() {
	$style = sprintf( ' style="color:#%s;"', get_header_textcolor() );
?>
	<div id="headimg">
		<h1 class="displaying-header-text"><a id="name"<?php echo $style; ?> onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
		<div class="displaying-header-text" id="desc"<?php echo $style; ?>><?php bloginfo( 'description' ); ?></div>
		<?php if ( get_header_image() ) : ?>
		<img src="<?php header_image(); ?>" alt="">
		<?php endif; ?>
	</div>
<?php
}
endif; // explorer_admin_header_image