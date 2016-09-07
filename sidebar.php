<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Explorer
 * @since Explorer 1.0
 */
if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
	<div id="secondary" class="widget-area sidebar-widget-area" role="complementary">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</div><!-- #secondary -->