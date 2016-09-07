<?php
/**
 * The template for displaying the footer.
 *
 * Contains the footer content
 *
 * @package Explorer
 * @since Explorer 1.0
 */
?>
	<div class="footer copyright custom">
		<div class="page hfeed site">
		<div class="footerwidgets">
			<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
			<?php get_template_part( 'content-togglemenu' ); ?>
			<?php endif; ?>
		</div><!-- .footerwidgets -->
		<div class="site-info">
			<?php if( get_theme_mod( 'hide_copyright' ) == '') { ?>
				<?php esc_attr_e('&copy;', 'explorer'); ?>
				<a href="<?php echo home_url('/') ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>"> <?php echo get_theme_mod( 'copyright_textbox', 'The Explorer Theme by Anariel Design.' ); ?> </a>
			<?php } // end if ?>
		</div>
		<!-- .site-info -->
		</div><!-- .page -->
	</div><!-- .copyright -->
	<?php wp_footer(); ?>
</body></html>