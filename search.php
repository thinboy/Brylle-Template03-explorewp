<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Explorer
 * @since Explorer 1.0
 */
get_header( 'custom' ); ?>
	<div class="page hfeed site">
		<div id="main" class="site-main">
			<section id="primary" class="content-area">
				<div id="content" class="site-content" role="main">
				<div class="hero page-header without-featured-image">
				<h1 class="page-title">
					<?php
						if ( have_posts() ) :
							printf( __( 'Search Results for: %s', 'explorer' ), '<span>' . get_search_query() . '</span>' );
						else :
							_e( 'Nothing Found', 'explorer' );
						endif;
					?>
				</h1>
				</div><!-- .hero -->
				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'content', 'search' ); ?>
					<?php endwhile; ?>
					<?php explorer_content_nav( 'nav-below' ); ?>
				<?php else : ?>
					<?php get_template_part( 'no-results', 'search' ); ?>
				<?php endif; ?>
				</div><!-- #content -->
			</section><!-- #primary -->
			<?php get_sidebar(); ?>
		</div><!-- #main -->
	</div><!-- .page -->
<?php get_footer(); ?>