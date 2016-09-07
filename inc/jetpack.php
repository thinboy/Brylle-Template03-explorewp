<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Explorer
 * @since Explorer 1.0
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function explorer_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'content',
		'footer_widgets' => array(
			'sidebar-2',
			'sidebar-5',
			'sidebar-4',
		),
		'footer'         => 'page',
	) );
	add_theme_support( 'jetpack-responsive-videos' );
/**
* Add theme support for Portfolio Custom Post Type.
*/
	add_theme_support( 'jetpack-portfolio' );
}
add_action( 'after_setup_theme', 'explorer_jetpack_setup' );
/**
 * Do we have footer widgets? Or is it viewed from iPad or mobile?
 * If so let's switch to the "click to load" type IS
 *
 * @return bool
 */

function explorer_has_footer_widgets( $has_widgets ) {
	if ( Jetpack_User_Agent_Info::is_ipad() || ( function_exists( 'jetpack_is_mobile' ) && jetpack_is_mobile() ) || is_active_sidebar( 'sidebar-2' ) || is_active_sidebar( 'sidebar-5' ) || is_active_sidebar( 'sidebar-4' ) )

		return true;

	return $has_widgets;
}
add_filter( 'infinite_scroll_has_footer_widgets', 'explorer_has_footer_widgets' );