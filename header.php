<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package Explorer
 * @since Explorer 1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<!-- Favicons ==================================================
	================================================== -->
	<?php if(get_theme_mod('explorer_favicon')) : ?>
	<link rel="shortcut icon" href="<?php echo get_theme_mod( 'explorer_favicon' ); ?>">
	<?php endif; ?>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php do_action( 'before' ); ?>
<div id="headertop">
	<div class="page hfeed site">
		<nav id="site-navigation" class="navigation-main" role="navigation">
			<h1 class="menu-toggle anarielgenericon"><?php _e( 'Menu', 'explorer' ); ?></h1>
			<div class="screen-reader-text skip-link">
				<a href="#content" title="<?php esc_attr_e( 'Skip to content', 'explorer' ); ?>"><?php _e( 'Skip to content', 'explorer' ); ?></a>
			</div><!-- .screen-reader-text skip-link -->
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- #site-navigation -->
		<?php if ( has_nav_menu( 'social' ) ) : // Check if there's a menu assigned to the 'social' location. ?>
		<?php wp_nav_menu(
			array(
				'theme_location'  => 'social',
				'container'       => 'div',
				'container_id'    => 'menu-social',
				'container_class' => 'menusocial',
				'menu_id'         => 'menu-social-items',
				'menu_class'      => 'menu-items',
				'depth'           => 1,
				'link_before'     => '<span class="text">',
				'link_after'      => '</span>',
				'fallback_cb'     => '',
			)
		); ?>
		<?php endif; // End check for menu. ?>
	</div><!-- .page -->
</div><!-- #headertop -->
<header id="masthead" class="site-header main" role="banner">
	<div class="page hfeed site">
	<?php if ( get_theme_mod( 'explorer_logo' ) ) : ?>
		<div class="site-logo">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo get_theme_mod( 'explorer_logo' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"></a>
		</div><!-- .site-logo -->
   <?php else : ?>
		<div class="site-branding">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</div><!-- .site-branding -->
   <?php endif; ?>
	</div><!-- .page -->
</header><!-- #masthead -->
<?php $header_image = get_header_image();
if ( ! empty( $header_image ) ) { ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home" class="header-image-link"> <img class="headerimage" src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" /> </a>
<?php } ?>
<?php if ( get_theme_mod( 'show_togglecontent' ) ) : ?>
	<?php get_template_part( 'content-togglemenu' ); ?>
<?php endif; ?> 