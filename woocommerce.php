<?php
/**
 * Template Name: WooCommerce Shop Page
 *
 * @package Explorer
 */
?>
<?php get_header( 'custom' ); ?>
	<div id="pagewoocommerce" class="page fullwidth hfeed site">
		<div id="main" class="site-main">
		  <div id="content-wrap">
			<?php woocommerce_content(); ?>
		  </div><!-- #content-wrap -->
		</div><!-- #main -->
	</div><!-- #pagewoocommerce -->
<?php get_footer(); ?>