<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Explorer
 * @since Explorer 1.0
 */
get_header( 'custom' ); ?>
	<div class="page hfeed site">
		<div id="main" class="site-main archive">
			<section id="primary" class="content-area">
				<div id="content" class="site-content" role="main">
				<?php if ( have_posts() ) : ?>
					<h1 class="page-title">
					<?php
						if ( is_category() ) :
							single_cat_title();
						elseif ( is_tag() ) :
							single_tag_title();
						elseif ( is_author() ) :
							printf( __( 'Author: %s', 'explorer' ), '<span class="vcard">' . get_the_author() . '</span>' );
						elseif ( is_day() ) :
							printf( __( 'Day: %s', 'explorer' ), '<span>' . get_the_date() . '</span>' );
						elseif ( is_month() ) :
							printf( __( 'Month: %s', 'explorer' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'explorer' ) ) . '</span>' );
						elseif ( is_year() ) :
							printf( __( 'Year: %s', 'explorer' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'explorer' ) ) . '</span>' );
						elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
							_e( 'Asides', 'explorer' );
						elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
							_e( 'Galleries', 'explorer' );
						elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
							_e( 'Images', 'explorer' );
						elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
							_e( 'Videos', 'explorer' );
						elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
							_e( 'Quotes', 'explorer' );
						elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
							_e( 'Links', 'explorer' );
						elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
							_e( 'Statuses', 'explorer' );
						elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
							_e( 'Audios', 'explorer' );
						elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
							_e( 'Chats', 'explorer' );
						else :
							_e( 'Archives', 'explorer' );
						endif;
					?>
					</h1>
					<?php
					// Show an optional term description.
					$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						printf( '<div class="taxonomy-description">%s</div>', $term_description );
					endif;
				?>
				<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<?php
							/* Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'content', get_post_format() );
						?>
					<?php endwhile; ?>
					<?php explorer_content_nav( 'nav-below' ); ?>
				<?php else : ?>
					<?php get_template_part( 'content', 'none' ); ?>
				<?php endif; ?>
				</div><!-- #content -->
			</section><!-- #primary -->
			<?php get_sidebar(); ?>
		</div><!-- #main -->
	</div><!-- .page -->
<?php get_footer(); ?>