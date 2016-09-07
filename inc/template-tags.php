<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Explorer
 * @since Explorer 1.0
 */

if ( ! function_exists( 'explorer_content_nav' ) ) :
/**
 * Display navigation to next/previous pages when applicable
 */
function explorer_content_nav( $nav_id ) {
	global $wp_query, $post;

	// Don't print empty markup on single pages if there's nowhere to navigate.
	if ( is_single() ) {
		$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
		$next = get_adjacent_post( false, '', false );

		if ( ! $next && ! $previous )
			return;
	}

	// Don't print empty markup in archives if there's only one page.
	if ( $wp_query->max_num_pages < 2 && ( is_home() || is_archive() || is_search() ) )
		return;

	$nav_class = ( is_single() ) ? 'navigation-post' : 'navigation-paging';

	?>
	<nav role="navigation" id="<?php echo esc_attr( $nav_id ); ?>" class="<?php echo $nav_class; ?>">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'explorer' ); ?></h1>

	<?php
		if ( is_single() && 'jetpack-testimonial' == get_post_type() ) :
			previous_post_link( '<div class="nav-previous">%link</div>', __( '<span class="meta-nav">Previous testimonial</span>', 'explorer' ) );
			next_post_link( '<div class="nav-next">%link</div>', __( 'Next testimonial', 'explorer' ) );

		elseif ( is_attachment() ) :
			previous_post_link( '<div class="nav-previous">%link</div>', __( '<span class="meta-nav">View the post</span>', 'explorer' ) );

		elseif ( is_single() ) :
			previous_post_link( '<div class="nav-previous">%link</div>', __( '<span class="meta-nav">Previous post</span>', 'explorer' ) );
			next_post_link( '<div class="nav-next">%link</div>', __( 'Next post', 'explorer' ) );

		elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages
			if ( get_next_posts_link() )
	?>
			<div class="nav-previous"><?php next_posts_link( __( 'Older posts', 'explorer' ) ); ?></div>

	<?php
			if ( get_previous_posts_link() )
	?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts', 'explorer' ) ); ?></div>
	<?php endif; ?>

	</nav><!-- #<?php echo esc_html( $nav_id ); ?> -->
	<?php
}
endif; // explorer_content_nav

if ( ! function_exists( 'explorer_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 */
function explorer_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'explorer' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'explorer' ), '<span class="edit-link">', '<span>' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<footer>
				<div class="comment-author vcard">
					<span class="comment-author-avatar"><?php echo get_avatar( $comment, 48 ); ?></span>
					<cite class="fn genericon"><?php comment_author_link(); ?></cite>
				</div><!-- .comment-author .vcard -->

				<div class="comment-content">
					<?php comment_text(); ?>
					<?php if ( $comment->comment_approved == '0' ) : ?>
						<p><em><?php _e( 'Your comment is awaiting moderation.', 'explorer' ); ?></em></p>
					<?php endif; ?>
				</div>

				<div class="comment-meta commentmetadata">
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><time datetime="<?php comment_time( 'c' ); ?>">
					<?php printf( _x( '%1$s at %2$s', '1: date, 2: time', 'explorer' ), get_comment_date(), get_comment_time() ); ?>
					<?php
						comment_reply_link( array_merge( $args,array(
							'depth'     => $depth,
							'max_depth' => $args['max_depth'],
						) ) );
					?>
					</time></a>
					<?php edit_comment_link( __( 'Edit', 'explorer' ), '<span class="edit-link">', '<span>' ); ?>
				</div><!-- .comment-meta .commentmetadata -->
			</footer>
		</article><!-- #comment-## -->

	<?php
			break;
	endswitch;
}
endif; // ends check for explorer_comment()

if ( ! function_exists( 'explorer_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function explorer_posted_on() {
	if ( is_sticky() && is_home() && ! is_paged() ) :
		printf( __( '<span class="sticky-post">Sticky</span><span class="byline"><span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span></span>', 'explorer' ),
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_attr( sprintf( __( 'View all posts by %s', 'explorer' ), get_the_author() ) ),
			get_the_author()
		);
	else :
		printf( __( '<span class="entry-date"><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a></span> <span class="byline"><span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>', 'explorer' ),
			esc_url( get_permalink() ),
			esc_attr( get_the_time() ),
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_attr( sprintf( __( 'View all posts by %s', 'explorer' ), get_the_author() ) ),
			get_the_author()
		);
	endif;
}
endif;
/**
 * Returns true if a blog has more than 1 category
 */
function explorer_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'all_the_cool_cats' ) ) ) {
		// Create an array of all the categories that are attached to posts
		$all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		// Count the number of categories that are attached to the posts
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'all_the_cool_cats', $all_the_cool_cats );
	}

	if ( '1' != $all_the_cool_cats ) {
		// This blog has more than 1 category so explorer_categorized_blog should return true
		return true;
	} else {
		// This blog has only 1 category so explorer_categorized_blog should return false
		return false;
	}
}

/**
 * Flush out the transients used in explorer_categorized_blog
 */
function explorer_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'all_the_cool_cats' );
}
add_action( 'edit_category', 'explorer_category_transient_flusher' );
add_action( 'save_post', 'explorer_category_transient_flusher' );

/**
 * Display featured pages.
 */
function explorer_featured_pages() {
	$featured_page_1 = esc_attr( get_theme_mod( 'explorer_featured_page_one_front_page', '0' ) );
	$featured_page_2 = esc_attr( get_theme_mod( 'explorer_featured_page_two_front_page', '0' ) );
	$featured_page_3 = esc_attr( get_theme_mod( 'explorer_featured_page_three_front_page', '0' ) );
	if ( 0 == $featured_page_1 && 0 == $featured_page_2 && 0 == $featured_page_3 ) {
		return;
	}
?>
	<div class="color-section">
		<div class="page hfeed site">
			<div class="child-pages columns clearfix">
			<?php for ( $page_number = 1; $page_number <= 3; $page_number++ ) : ?>
				<?php if ( 0 != ${'featured_page_' . $page_number} ) : // Check if a featured page has been set in the customizer ?>
					<div class="threecolumn clearfix">
						<?php
							// Create new argument using the page ID of the page set in the customizer
							$featured_page_args = array(
								'page_id' => ${'featured_page_' . $page_number},
							);
							// Create a new WP_Query using the argument previously created
							$featured_page_query = new WP_Query( $featured_page_args );
						?>
						<?php while ( $featured_page_query->have_posts() ) : $featured_page_query->the_post(); ?>
							<?php get_template_part( 'content', 'frontgrid' ); ?>
						<?php
							endwhile;
							wp_reset_postdata();
						?>
					</div><!-- .featured-page -->
				<?php endif; ?>
			<?php endfor; ?>
			</div>
		</div><!-- .featured-page-wrapper -->
	</div><!-- #quaternary -->
<?php
}
if ( ! function_exists( 'explorer_view_link' ) ) :
/**
 * Prints an "View" plus off-screen title link for portfolio projects
 */
function explorer_view_link() {
	printf( '<a href="'. esc_url( get_permalink() ) . '" rel="bookmark" class="view-link">' . sprintf( __( 'View <span class="screen-reader-text">%1s</span>', 'explorer' ), esc_attr( strip_tags( get_the_title() ) ) ) . '</a>' );
}
endif; // explorer_view_link