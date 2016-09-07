<?php
/**
 * The template for displaying search forms in explorer
 *
 * @package Explorer
 * @since Explorer 1.0
 */
?>
	<form method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
		<label for="s" class="screen-reader-text"><?php _ex( 'Search', 'assistive text', 'explorer' ); ?></label>
		<input type="search" class="field" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" id="s" placeholder="<?php echo _ex( 'Search &hellip;', 'placeholder', 'explorer' ); ?>" />
		<input type="submit" class="submit" id="searchsubmit" value="<?php echo _ex( 'Search', 'submit button', 'explorer' ); ?>" />
	</form>