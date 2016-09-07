<?php
/**
 * The template used for displaying child page on the front grid template.
 *
 * @package Explorer
 * @since Explorer 1.0
 */
?>
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'child-page' ); ?>>
		<?php if ( '' != get_the_post_thumbnail() ) : ?>
		<div class="imagecontainer">
			<a href="<?php the_permalink(); ?>">
				<?php
				if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
				the_post_thumbnail();
				}
			?>
			</a>
		</div>
		<?php endif; ?>
		<header class="entry-header">
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
		</header>
		<div class="entry-summary">
			<?php echo custom_trim_words( get_the_content(), 20 ); ?>
		</div>
		<?php edit_post_link( __( 'Edit', 'explorer' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
	</article><!-- #post-## -->