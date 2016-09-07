<?php
/**
 * Available Explorer Custom Widgets
 *
 * Learn more: http://codex.wordpress.org/Widgets_API#Developing_Widgets
 *
 * @package Explorer
 * @since Explorer 1.0
 */
/*-----------------------------------------------------------------------------------*/
/* Custom Explorer Widget: Front Page Five Columns Recent Posts
/*-----------------------------------------------------------------------------------*/
add_action('widgets_init', 'explorer_fivecolumn_recentposts');
function explorer_fivecolumn_recentposts() {
	register_widget('explorer_fivecolumn_recentposts');
}
class explorer_fivecolumn_recentposts extends WP_Widget {
	function __construct() {
		$widget_ops = array('description' => __( '5 Column Recents Posts Widget with Featured Images.', 'explorer') );
		parent::__construct(false, __('Explorer Front Page: 5 Column Recent Posts', 'explorer'),$widget_ops);
	}
	function widget($args, $instance) {
		$title = apply_filters('widget_title', $instance['title'] );
		$postnumber = $instance['postnumber'];
		$category = apply_filters('widget_title', $instance['category']);
		echo $args['before_widget']; ?>
		<?php if( ! empty( $title ) )
			echo '<div class="widget-title-wrap"><h3 class="widget-title"><span>'. esc_html($title) .'</span></h3></div>'; ?>
<?php
// The Query
$recent_query = new WP_Query(array (
		'post_status'	=> 'publish',
		'posts_per_page' => $postnumber,
		'ignore_sticky_posts' => 1,
		'category_name' => $category,
	) );
?>
<?php
// The Loop
if($recent_query->have_posts()) : ?>
	<?php while($recent_query->have_posts()) : $recent_query->the_post() ?>
	<div class="fivecolumn clearfix">
	<article>
		<?php if ( '' != get_the_post_thumbnail() ) : ?>
			<div class="entry-thumb">
			<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'explorer' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php the_post_thumbnail(); ?></a>
			</div><!-- end .entry-thumb -->
		<?php endif; ?>
			<div class="postinner">
			<div class="overlay">
			<h3 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'explorer' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php the_title(); ?></a></h3>
			<div class="entry-meta">
			<?php
					if ( 'post' == get_post_type() )
						explorer_posted_on();
			?>
			</div>
			</div>
			<!-- .entry-meta -->
			</div>
	</article><!--end .column -->
	</div>
	<?php endwhile ?>
<?php endif ?>
		<?php
		echo $args['after_widget'];
		// Reset the post globals as this query will have stomped on it
		wp_reset_postdata();
		}
	function update($new_instance, $old_instance) {
			$instance['title'] = $new_instance['title'];
			$instance['postnumber'] = $new_instance['postnumber'];
			$instance['category'] = $new_instance['category'];
		return $new_instance;
	}
	function form($instance) {
			$title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
			$postnumber = isset( $instance['postnumber'] ) ? esc_attr( $instance['postnumber'] ) : '';
			$category = isset( $instance['category'] ) ? esc_attr( $instance['category'] ) : '';
		?>
	<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','explorer'); ?></label>
		<input type="text" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr($title); ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" /></p>
	<p><label for="<?php echo $this->get_field_id('postnumber'); ?>"><?php _e('Number of posts to show:','explorer'); ?></label>
		<input type="text" name="<?php echo $this->get_field_name('postnumber'); ?>" value="<?php echo esc_attr($postnumber); ?>" class="widefat" id="<?php echo $this->get_field_id('postnumber'); ?>" /></p>
	<p><label for="<?php echo $this->get_field_id('category'); ?>"><?php _e('Category slug (optional, separate multiple categories by comma):','explorer'); ?></label>
	<input type="text" name="<?php echo $this->get_field_name('category'); ?>" value="<?php echo esc_attr($category); ?>" class="widefat" id="<?php echo $this->get_field_id('category'); ?>" /></p>
	<?php
	}
}
/*-----------------------------------------------------------------------------------*/
/* Custom Explorer Widget: Front Page Masonry Recent Posts
/*-----------------------------------------------------------------------------------*/
add_action('widgets_init', 'explorer_masonry_recentposts');
function explorer_masonry_recentposts() {
	register_widget('explorer_masonry_recentposts');
}
class explorer_masonry_recentposts extends WP_Widget {
	function __construct() {
		$widget_ops = array('description' => __( 'Masonry Recents Posts Widget with Featured Images.', 'explorer') );
		parent::__construct(false, __('Explorer Front Page: Masonry Recent Posts', 'explorer'),$widget_ops);
	}
	function widget($args, $instance) {
		$title = apply_filters('widget_title', $instance['title'] );
		$postnumber = $instance['postnumber'];
		$category = apply_filters('widget_title', $instance['category']);
		echo $args['before_widget']; ?>
		<?php if( ! empty( $title ) )
			echo '<div class="widget-title-wrap"><h3 class="widget-title"><span>'. esc_html($title) .'</span></h3></div>'; ?>
<?php
// The Query
$recent_query = new WP_Query(array (
		'post_status'	=> 'publish',
		'posts_per_page' => $postnumber,
		'ignore_sticky_posts' => 1,
		'category_name' => $category,
	) );
?>
<?php
// The Loop
if($recent_query->have_posts()) : ?>
	<?php while($recent_query->have_posts()) : $recent_query->the_post() ?>
	<div class="threecolumn clearfix masonry">
	<article>
		 <?php if ( '' != get_the_post_thumbnail() ) : ?>
			 <div class="entry-thumb">
				 <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'explorer' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php the_post_thumbnail(); ?></a>
			</div><!-- end .entry-thumb -->
		<?php endif; ?>
			<div class="postinner">
			<div class="overlay">
			<h3 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'explorer' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php the_title(); ?></a></h3>
			<div class="entry-meta">
				<?php if ( false != get_post_format() ) : ?>
				<span class="entry-format"> <a href="<?php echo esc_url( get_post_format_link( get_post_format() ) ); ?>" title="<?php echo esc_attr( sprintf( __( 'All %s posts', 'explorer' ), get_post_format_string( get_post_format() ) ) ); ?>"><?php echo get_post_format_string( get_post_format() ); ?></a> </span>
				<?php endif; ?>
				<?php edit_post_link( __( 'Edit', 'explorer' ), '<span class="edit-link">', '</span>' ); ?>
				<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
				<span class="comments-link">
				<?php comments_popup_link( __( 'Leave a comment', 'explorer' ), __( '1 Comment', 'explorer' ), __( '% Comments', 'explorer' ) ); ?>
				</span>
				<?php endif; ?>
				<?php
						if ( 'post' == get_post_type() )
							explorer_posted_on();
				?>
			</div>
			<!-- .entry-meta -->
			<div class="entry-summary">
			<?php the_excerpt(); ?>
			</div>
			</div>
			<!-- .overlay -->
			</div>
	</article><!--end .column -->
	</div>
	<?php endwhile ?>
<?php endif ?>
		<?php
		echo $args['after_widget'];
		// Reset the post globals as this query will have stomped on it
		wp_reset_postdata();
		}
	function update($new_instance, $old_instance) {
			$instance['title'] = $new_instance['title'];
			$instance['postnumber'] = $new_instance['postnumber'];
			$instance['category'] = $new_instance['category'];
		return $new_instance;
	}
	function form($instance) {
			$title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
			$postnumber = isset( $instance['postnumber'] ) ? esc_attr( $instance['postnumber'] ) : '';
			$category = isset( $instance['category'] ) ? esc_attr( $instance['category'] ) : '';
		?>
	<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','explorer'); ?></label>
		<input type="text" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr($title); ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" /></p>
	<p><label for="<?php echo $this->get_field_id('postnumber'); ?>"><?php _e('Number of posts to show:','explorer'); ?></label>
		<input type="text" name="<?php echo $this->get_field_name('postnumber'); ?>" value="<?php echo esc_attr($postnumber); ?>" class="widefat" id="<?php echo $this->get_field_id('postnumber'); ?>" /></p>
	<p><label for="<?php echo $this->get_field_id('category'); ?>"><?php _e('Category slug (optional, separate multiple categories by comma):','explorer'); ?></label>
	<input type="text" name="<?php echo $this->get_field_name('category'); ?>" value="<?php echo esc_attr($category); ?>" class="widefat" id="<?php echo $this->get_field_id('category'); ?>" /></p>
	<?php
	}
}