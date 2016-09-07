<?php
/**
 * The Template for displaying all single projects.
 *
 * @package Explorer
 * @since Explorer 1.0
 */

get_header( 'custom' ); ?>
	<div class="page hfeed site">
		<div id="main" class="site-main">
			 <div id="primary" class="content-area full-width">
				<div id="content" class="site-content" role="main">
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'content', 'portfolio-single' ); ?>
						<?php
							// If comments are open or we have at least one comment, load up the comment template
							if ( comments_open() || '0' != get_comments_number() ) :
								comments_template();
							endif;
						?>
						<?php explorer_content_nav( 'nav-below' ); ?>
					<?php endwhile; // end of the loop. ?>
				 </div><!-- #content -->
			</div><!-- #primary -->
		</div><!-- #main -->
	</div><!-- .page -->
<?php get_footer(); ?>