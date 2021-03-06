<?php
/**
 * @package Explorer
 * @since Explorer 1.0
 */
?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
		<?php else : ?>
		<div class="entry-content">
			<?php the_content( __( 'Read More', 'explorer' ) ); ?>
			<div class="entry-meta">
				<?php if ( false != get_post_format() ) : ?>
					<span class="entry-format">
						<a href="<?php echo esc_url( get_post_format_link( get_post_format() ) ); ?>" title="<?php echo esc_attr( sprintf( __( 'All %s posts', 'explorer' ), get_post_format_string( get_post_format() ) ) ); ?>"><?php echo get_post_format_string( get_post_format() ); ?></a>
					</span>
				<?php endif; ?>
				<?php edit_post_link( __( 'Edit', 'explorer' ), '<span class="edit-link">', '</span>' ); ?>
				<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
					<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'explorer' ), __( '1 Comment', 'explorer' ), __( '% Comments', 'explorer' ) ); ?></span>
				<?php endif; ?>
			</div><!-- .entry-meta -->
			<?php
				wp_link_pages( array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'explorer' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>'
				) );
			?>
		</div>
		<?php endif; ?>
	</article><!-- #post-## -->