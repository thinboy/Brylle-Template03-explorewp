<?php
/**
 * @package Explorer
 * @since Explorer 1.0
 */
?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="clearfix">
		<div class="one_third">
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header><!-- .entry-header -->
		<div class="entry-content">
			<?php the_content(); ?>
		</div><!-- .entry-content -->
		</div>
		<div class="two_third lastcolumn">
			<?php if ( has_post_thumbnail() ): ?>
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
			<?php endif; ?>
		</div>
		</div>
		<footer class="entry-meta">
			<?php
				echo get_the_term_list( $post->ID, 'jetpack-portfolio-tag', '<span class="tags-links">', '', '</span>' );
			?>
			<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
			<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'explorer' ), __( '1 Comment', 'explorer' ), __( '% Comments', 'explorer' ) ); ?></span>
			<?php endif; ?>
		</footer><!-- .entry-meta -->
		<?php
				wp_link_pages( array(
					'before'   => '<div class="page-links clear">',
					'after'    => '</div>',
					'pagelink' => '<span class="page-link">%</span>',
				) );
			?>
	</article><!-- #post-## -->