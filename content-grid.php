<?php
/**
 * The template used for displaying child page on the grid template.
 *
 * @package Explorer
 * @since Explorer 1.0
 */
?>
	<div class="column clearfix">
		<article id="post-<?php the_ID(); ?>" <?php post_class( 'child-page' ); ?>>
			<?php if ( '' != get_the_post_thumbnail() ) : ?>
			<a href="<?php the_permalink(); ?>">
				<?php
				if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
				  the_post_thumbnail();
				}
			?>
			</a>
			<?php endif; ?>
			<header class="entry-header">
				<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
			</header>
			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div>
			<?php edit_post_link( __( 'Edit', 'explorer' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
		</article><!-- #post-## -->
	</div><!-- .column -->