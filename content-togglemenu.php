<?php
/**
 * @package Explorer
 */
?>
<div class="toggle-wrap">
	<?php if ( get_theme_mod( 'toggle_title' ) ) : ?>
		<a href="#contents" class="about-menu-toggle"><span><?php echo wp_kses_post( get_theme_mod( 'toggle_title' ) ); ?></span></a>
	<?php else : ?>
		<a href="#contents" class="about-menu-toggle"><span></span></a>
	<?php endif; ?>
	<div class="menu-content">
	<div class="page hfeed site">
		<?php get_sidebar( 'footer' ); ?>
		<?php if ( has_nav_menu( 'social' ) ) : // Check if there's a menu assigned to the 'social' location. ?>
			<?php wp_nav_menu(
				array(
					'theme_location'  => 'social',
					'container'       => 'div',
					'container_id'    => 'menu-social-footer',
					'container_class' => 'menusocial',
					'menu_id'         => 'menu-social-footer-items',
					'menu_class'      => 'menu-items',
					'depth'           => 1,
					'link_before'     => '<span class="text">',
					'link_after'      => '</span>',
					'fallback_cb'     => '',
				)
			); ?>
			<?php endif; // End check for menu. ?>
	</div><!-- end .page -->
	</div><!-- end .menu-content -->
</div><!-- end #toggle-wrap -->