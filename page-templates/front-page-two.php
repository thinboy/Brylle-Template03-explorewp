<?php
/**
 * Template Name: Front Page Two
 *
 * @package Explorer
 */
get_header(); ?>
	<div class="front-page one">
		<div class="page hfeed site welcome">
			<?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
			<div class="posts clearfix">
					<?php get_sidebar( 'front-content-one' ); ?>
			</div>
			<?php endif; ?>
		</div>
	</div>
<?php get_footer(); ?>