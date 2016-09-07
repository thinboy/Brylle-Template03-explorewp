<?php
/**
 * The default template for displaying pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Explorer
 */
get_header( 'custom' ); ?>
	<div class="page hfeed site">
		<div id="main" class="site-main">
			<div id="primary" class="content-area">
				<div id="content" class="site-content" role="main">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php if ( has_post_thumbnail() ): ?>
				<?php the_post_thumbnail(); ?>
				<?php endif; ?>
				<h1 class="page-title">
					<?php the_title(); ?>
				</h1>
				<?php get_template_part( 'content', 'page' ); ?>
				<?php
							// If comments are open or we have at least one comment, load up the comment template
							if ( comments_open() || '0' != get_comments_number() )
								comments_template();
						?>
				<?php endwhile; // end of the loop. ?>
				</div><!-- #content -->
			</div><!-- #primary -->
			<?php get_sidebar(); ?>
		</div><!-- #main -->
	</div><!-- .page -->
<?php get_footer(); ?>