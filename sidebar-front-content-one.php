<?php
/**
 * The Front Page One Widget Area.
 *
 * @package Explorer
 * @since Explorer 1.0
 */
if ( ! is_active_sidebar( 'sidebar-3' ) ) {
	return;
}
?>
	<?php dynamic_sidebar( 'sidebar-3' ); ?>
	