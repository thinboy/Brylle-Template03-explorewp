<?php
/**
 * Template Name: Grid Page
 *
 * @package Explorer
 */
get_header( 'custom' ); ?>
<?php while ( have_posts() ) : the_post(); ?>
	<?php if ( has_post_thumbnail() ): ?>
	<?php the_post_thumbnail(); ?>
<?php endif; ?>
	<div class="page layout hfeed site">
		  <div id="main" class="site-main">
			  <div id="primary" class="content-area full-width gridpage">
				  <div id="content" class="site-content" role="main">
						  <h1 class="page-title">
							  <?php the_title(); ?>
						  </h1>
						  <?php get_template_part( 'content', 'page' ); ?>
					  <?php endwhile; // end of the loop. ?>
					  <div class="child-pages columns clearfix">
						  <?php
							  $child_pages = new WP_Query( array(
								  'post_type'      => 'page',
								  'orderby'        => 'menu_order',
								  'order'          => 'ASC',
								  'post_parent'    => $post->ID,
								  'posts_per_page' => 999,
								  'no_found_rows'  => true,
							  ) );
							  while ( $child_pages->have_posts() ) : $child_pages->the_post();
								   get_template_part( 'content', 'grid' );
							  endwhile;
							  wp_reset_postdata();
						  ?>
					  </div><!-- .child-pages -->
					  <?php
						  // If comments are open or we have at least one comment, load up the comment template
						  if ( comments_open() || '0' != get_comments_number() )
							  comments_template();
					  ?>
				</div><!-- #content -->
			</div><!-- #primary -->
		</div><!-- #main -->
	</div><!-- .page -->
<?php get_footer(); ?>