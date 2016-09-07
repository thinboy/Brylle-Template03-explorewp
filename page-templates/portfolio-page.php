<?php
/**
 * Template Name: Portfolio Page Template
 *
 * @package Explorer
 */

get_header( 'custom' ); ?>

	<div class="page hfeed site">
		<div id="main" class="site-main">
			 <div id="primary" class="content-area full-width">
				<div id="content" class="site-content" role="main">
					<div class="child-pages columns portfoliopage clearfix">
						<?php if ( ! get_theme_mod( 'explorer_hide_portfolio_page_content' ) ) : ?>
							<?php while ( have_posts() ) : the_post(); ?>
										   <?php if ( '' != get_the_post_thumbnail() ) : ?>
									<div class="entry-thumbnail">
										<?php the_post_thumbnail( 'explorer-featured-image' ); ?>
									</div><!-- .entry-thumbnail -->
								<?php endif; ?>
								<div class="page-content">
									<?php
										the_content();
										wp_link_pages( array(
											'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'explorer' ) . '</span>',
											'after'       => '</div>',
											'link_before' => '<span>',
											'link_after'  => '</span>',
										) );
									?>
								</div><!-- .page-content -->
							<?php endwhile; // end of the loop. ?>
						<?php endif; ?>
						<div class="posts clearfix">
							<?php
								if ( get_query_var( 'paged' ) ) :
									$paged = get_query_var( 'paged' );
								elseif ( get_query_var( 'page' ) ) :
									$paged = get_query_var( 'page' );
								else :
									$paged = 1;
								endif;
								$posts_per_page = get_option( 'jetpack_portfolio_posts_per_page', '12' );
								$args = array(
									'post_type'      => 'jetpack-portfolio',
									'posts_per_page' => $posts_per_page,
									'paged'          => $paged,
								);
								$project_query = new WP_Query ( $args );
								if ( $project_query -> have_posts() ) :
							?>
								<div class="portfolio-wrapper">
									<?php /* Start the Loop */ ?>
									<?php while ( $project_query -> have_posts() ) : $project_query -> the_post(); ?>
										<?php get_template_part( 'content', 'portfolio' ); ?>
									<?php endwhile; ?>
								</div><!-- .portfolio-wrapper -->
								<?php explorer_content_nav( 'nav-below' ); ?>
							<?php else : ?>
								<section class="no-results not-found">
									<header class="page-header">
										<h1 class="page-title"><?php _e( 'Nothing Found', 'explorer' ); ?></h1>
									</header><!-- .page-header -->
									<div class="page-content">
										<?php if ( current_user_can( 'publish_posts' ) ) : ?>
											<p><?php printf( __( 'Ready to publish your first project? <a href="%1$s">Get started here</a>.', 'explorer' ), esc_url( admin_url( 'post-new.php?post_type=jetpack-portfolio' ) ) ); ?></p>
										<?php else : ?>
											<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'explorer' ); ?></p>
											<?php get_search_form(); ?>
										<?php endif; ?>
									</div><!-- .page-content -->
								</section><!-- .no-results -->
							<?php endif; ?>
						  </div>
						  </div>
				</div><!-- #content -->
			</div><!-- #primary -->
		</div><!-- #main -->
	</div><!-- .page -->
<?php get_footer(); ?>