<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Explorer
 * @since Explorer 1.0
 */
get_header( 'custom' ); ?>
	<div class="page hfeed site">
		<div id="main" class="site-main">
			<h1 class="page-title">
				<?php _e( 'Oops! That page can&rsquo;t be found.', 'explorer' ); ?>
			</h1>
			<div id="primary" class="content-area full-width">
				<div id="content" class="site-content" role="main">
					<article id="post-0" class="post error404 not-found">
						<div class="entry-content">
							<p><?php _e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'explorer' ); ?></p>
							<?php get_search_form(); ?>
							<div class="widget-container">
								<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>
								<?php if ( explorer_categorized_blog() ) : // Only show the widget if site has multiple categories. ?>
								<div class="widget widget_categories">
									<h2 class="widgettitle"><?php _e( 'Most Used Categories', 'explorer' ); ?></h2>
									<ul>
									<?php
										wp_list_categories( array(
											'orderby'    => 'count',
											'order'      => 'DESC',
											'show_count' => 1,
											'title_li'   => '',
											'number'	 => 10,
										) );
									?>
									</ul>
								</div><!-- .widget -->
								<?php endif; ?>
								<?php
								/* translators: %1$s: smiley */
								$archive_content = '<p>' . sprintf( __( 'Try looking in the monthly archives. %1$s', 'explorer' ), convert_smilies( ':)' ) ) . '</p>';
								the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
								?>
								<?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>
							</div><!-- .widget-container -->
						</div><!-- .entry-content -->
					</article><!-- #post-0 .post .error404 .not-found -->
				</div><!-- #content -->
			</div><!-- #primary -->
		</div><!-- #main -->
	</div><!-- .page -->
<?php get_footer(); ?>