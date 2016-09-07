<?php
/**
 * Template Name: Front Page
 *
 * @package Explorer
 */
get_header( 'custom' ); ?>
	<div class="clearfix">
	<div class="posts columns three" id="posts">
			<?php get_sidebar( 'front-content-one' ); ?>
	</div>
	</div>
	<div class="front-page">
		<?php while ( have_posts() ) : the_post(); ?>
		<div class="page hfeed site welcome">
				<?php get_template_part( 'content', 'front' ); ?>
					<?php
								// If comments are open or we have at least one comment, load up the comment template
								if ( comments_open() || '0' != get_comments_number() )
									comments_template();
					?>
		</div>
		<?php endwhile; // end of the loop. ?>
		<?php explorer_featured_pages(); ?>
	</div>
<?php get_footer( 'custom' ); ?>