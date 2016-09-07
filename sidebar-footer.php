<?php
/**
 * The footer widget areas.
 *
 * @package Explorer
 * @since Explorer 1.0
 */
?>
<?php if ( is_active_sidebar( 'sidebar-2' ) || is_active_sidebar( 'sidebar-5' ) || is_active_sidebar( 'sidebar-4' ) ) : ?>
	<div class="clearfix footer-widget-area" role="complementary">
			<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
				<div class="three_column">
					<?php dynamic_sidebar( 'sidebar-2' ); ?>
				</div><!-- .footer-widget -->
			<?php endif; ?>
			<?php if ( is_active_sidebar( 'sidebar-5' ) ) : ?>
				<div class="three_column">
					<?php dynamic_sidebar( 'sidebar-5' ); ?>
				</div><!-- .footer-widget -->
			<?php endif; ?>
			<?php if ( is_active_sidebar( 'sidebar-4' ) ) : ?>
				<div class="three_column lastcolumn">
					<?php dynamic_sidebar( 'sidebar-4' ); ?>
				</div><!-- .footer-widget -->
			<?php endif; ?>
	</div><!-- #tertiary -->
<?php endif; ?>