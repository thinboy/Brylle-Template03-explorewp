<?php
/**
 * The template used for displaying projects on index view
 *
 * @package Explorer
 * @since Explorer 1.0
 */
?>
	<div class="threecolumn clearfix">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php if ( '' != get_the_post_thumbnail() ) : ?>
			<div class="postinner portfolio clearfix">
				<figure>
					<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
				</figure>
			<?php endif; ?>
			</div><!-- .postinner -->
		</article><!-- #post-## -->
	</div>