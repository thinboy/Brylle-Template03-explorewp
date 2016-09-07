<?php
/**
 * explorer Theme Customizer
 *
 * @package Explorer
 * @since Explorer 1.0
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function explorer_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$wp_customize->add_section( 'explorer_theme_options', array(
		'title'    => __( 'Theme Options', 'explorer' ),
		'priority' => 130,
	) );

	/* Front Page: Featured Page One */
	$wp_customize->add_setting( 'explorer_featured_page_one_front_page', array(
		'default'           => '',
		'sanitize_callback' => 'explorer_sanitize_dropdown_pages',
	) );
	$wp_customize->add_control( 'explorer_featured_page_one_front_page', array(
		'label'             => __( 'Front Page: Featured Page One', 'explorer' ),
		'section'           => 'explorer_theme_options',
		'priority'          => 8,
		'type'              => 'dropdown-pages',
	) );

	/* Front Page: Featured Page Two */
	$wp_customize->add_setting( 'explorer_featured_page_two_front_page', array(
		'default'           => '',
		'sanitize_callback' => 'explorer_sanitize_dropdown_pages',
	) );
	$wp_customize->add_control( 'explorer_featured_page_two_front_page', array(
		'label'             => __( 'Front Page: Featured Page Two', 'explorer' ),
		'section'           => 'explorer_theme_options',
		'priority'          => 9,
		'type'              => 'dropdown-pages',
	) );

	/* Front Page: Featured Page Three */
	$wp_customize->add_setting( 'explorer_featured_page_three_front_page', array(
		'default'           => '',
		'sanitize_callback' => 'explorer_sanitize_dropdown_pages',
	) );
	$wp_customize->add_control( 'explorer_featured_page_three_front_page', array(
		'label'             => __( 'Front Page: Featured Page Three', 'explorer' ),
		'section'           => 'explorer_theme_options',
		'priority'          => 10,
		'type'              => 'dropdown-pages',
	) );
/**
 * Adds the individual sections for custom logo
 */
	$wp_customize->add_section( 'explorer_logo_section' , array(
	'title'       => __( 'Logo', 'explorer' ),
	'priority'    => 30,
	'description' => 'Upload a logo to replace the default site name and description in the header',
) );
$wp_customize->add_setting( 'explorer_logo', array(
	'sanitize_callback' => 'esc_url_raw',
) );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'explorer_logo', array(
	'label'    => __( 'Logo', 'explorer' ),
	'section'  => 'explorer_logo_section',
	'settings' => 'explorer_logo',
) ) );
/*-----------------------------------------------------------------------------------*/
/*	Adds the individual sections, settings, and controls to the theme customizer
/*-----------------------------------------------------------------------------------*/
	$wp_customize->add_section(
		'explorer_section_one',
		array(
			'title' => 'Copyright Settings',
			'description' => 'This is a settings section.',
			'priority' => 31,
		)
	);
	$wp_customize->add_setting(
	'copyright_textbox',
	array(
		'default' => 'Explorer by Anariel Design. All rights reserved.',
		'sanitize_callback' => 'explorer_sanitize_text',
	)
);
$wp_customize->add_control(
	'copyright_textbox',
	array(
		'label' => 'Copyright text',
		'section' => 'explorer_section_one',
		'type' => 'text',
	)
);
$wp_customize->add_setting(
	'hide_copyright',
	array(
	'sanitize_callback' => 'explorer_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	'hide_copyright',
	array(
		'type' => 'checkbox',
		'label' => 'Hide copyright text',
		'section' => 'explorer_section_one',
	)
);
/**
 * Adds the individual sections for custom favicon
 */
	$wp_customize->add_section( 'explorer_favicon_section' , array(
	'title'       => __( 'Favicon', 'explorer' ),
	'priority'    => 32,
	'description' => 'Upload a favicon',
) );
$wp_customize->add_setting(
	'explorer_favicon',
	array(
	'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'explorer_favicon', array(
	'label'    => __( 'Favicon', 'explorer' ),
	'section'  => 'explorer_favicon_section',
	'settings' => 'explorer_favicon',
) ) );
/**
 * Adds the individual sections for custom colors
 */
	$wp_customize->add_setting('explorer_link_color', array(
		'default'           => '#383f49',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'explorer_link_color', array(
		'label'    => __('Change color of the dark gray background and border elements like footer,header background etc.', 'explorer'),
		'section'  => 'colors',
		'priority' => 25,
		'settings' => 'explorer_link_color',
	)));
	$wp_customize->add_setting('explorer_linkone_color', array(
		'default'           => '#fc536a',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'explorer_linkone_color', array(
		'label'    => __('Change color of the pink background and border elements like buttons etc.', 'explorer'),
		'section'  => 'colors',
		'priority' => 26,
		'settings' => 'explorer_linkone_color',
	)));
	$wp_customize->add_setting('explorer_linktwo_color', array(
		'default'           => '#637a8b',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'explorer_linktwo_color', array(
		'label'    => __('Change color of the blue background and border elements like buttons, borders etc.', 'explorer'),
		'section'  => 'colors',
		'priority' => 27,
		'settings' => 'explorer_linktwo_color',
	)));
	$wp_customize->add_setting('explorer_linkthree_color', array(
		'default'           => '#dfe3e6',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'explorer_linkthree_color', array(
		'label'    => __('Change color of the blue background and border elements like sticky blog border, dividers, input borders etc.', 'explorer'),
		'section'  => 'colors',
		'priority' => 28,
		'settings' => 'explorer_linkthree_color',
	)));
	$wp_customize->add_setting('explorer_linkfour_color', array(
		'default'           => '#f6f9fb',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'explorer_linkfour_color', array(
		'label'    => __('Change color of the light gray background and border elements like sidebar background, masonry post background etc.', 'explorer'),
		'section'  => 'colors',
		'priority' => 29,
		'settings' => 'explorer_linkfour_color',
	)));
	$wp_customize->add_setting('explorer_linkeight_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'explorer_linkeight_color', array(
		'label'    => __('Change color of the white background and border elements elements.', 'explorer'),
		'section'  => 'colors',
		'priority' => 30,
		'settings' => 'explorer_linkeight_color',
	)));
	$wp_customize->add_setting('explorer_linkfive_color', array(
		'default'           => '#383f49',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'explorer_linkfive_color', array(
		'label'    => __('Change color of the dark gray text elements.', 'explorer'),
		'section'  => 'colors',
		'priority' => 31,
		'settings' => 'explorer_linkfive_color',
	)));
	$wp_customize->add_setting('explorer_linksix_color', array(
		'default'           => '#637a8b',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'explorer_linksix_color', array(
		'label'    => __('Change color of the blue text elements.', 'explorer'),
		'section'  => 'colors',
		'priority' => 32,
		'settings' => 'explorer_linksix_color',
	)));
	$wp_customize->add_setting('explorer_linkseven_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'explorer_linkseven_color', array(
		'label'    => __('Change color of the white text elements.', 'explorer'),
		'section'  => 'colors',
		'priority' => 33,
		'settings' => 'explorer_linkseven_color',
	)));
}
add_action( 'customize_register', 'explorer_customize_register' );
/**
 * Sanitization
 */
//Checkboxes
function explorer_sanitize_checkbox( $input ) {
	if ( $input == 1 ) {
		return 1;
	} else {
		return '';
	}
}
//Integers
function explorer_sanitize_int( $input ) {
	if( is_numeric( $input ) ) {
		return intval( $input );
	}
}
//Text
function explorer_sanitize_text( $input ) {
	return wp_kses_post( force_balance_tags( $input ) );
}
//No sanitize - empty function for options that do not require sanitization -> to bypass the Theme Check plugin
function explorer_no_sanitize( $input ) {
}
/**
 * Sanitize the dropdown pages.
 *
 * @param interger $input.
 * @return interger.
 */
function explorer_sanitize_dropdown_pages( $input ) {
	if ( is_numeric( $input ) ) {
		return intval( $input );
	}
}
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function explorer_customize_preview_js() {
	wp_enqueue_script( 'explorer-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130529', true );
}
add_action( 'customize_preview_init', 'explorer_customize_preview_js' );
/**
 * Colors Changer
 */
function explorer_customizer_css() {
	?>
	<style type="text/css">
	.navigation-main ul ul, .navigation-main ul ul li:hover, .navigation-main li li.current_page_item, .navigation-main li li.current-menu-item, .page-links a, .widget-area .milestone-header, .widget-area .milestone-countdown, .widget-area .milestone-message, .widget-area .milestone-countdown { background-color: <?php echo get_theme_mod( 'explorer_link_color' ); ?>; }
	#headertop, .copyright, .menu-content, a.menu-close { background: <?php echo get_theme_mod( 'explorer_link_color' ); ?>; }
	.pullquote, .welcome hr.separator, hr.separator { border-top-color: <?php echo get_theme_mod( 'explorer_link_color' ); ?>; }
	.pullquote, .footer ul li, .fivecolumn .entry-title { border-bottom-color: <?php echo get_theme_mod( 'explorer_link_color' ); ?>; }
	.site-title, .widget-area .milestone-countdown { border-color: <?php echo get_theme_mod( 'explorer_link_color' ); ?>; }
	.woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit, .woocommerce #content input.button, .woocommerce-page a.button, .woocommerce-page button.button, .woocommerce-page input.button, .woocommerce-page #respond input#submit, .woocommerce-page #content input.button { border-color: <?php echo get_theme_mod( 'explorer_link_color' ); ?>!important; }
	.woocommerce span.onsale, .woocommerce-page span.onsale, .gridlist-toggle a.active { background: <?php echo get_theme_mod( 'explorer_link_color' ); ?>!important; }

	button, input[type="button"], input[type="reset"], input[type="submit"], .button, .button:visited { background-color: <?php echo get_theme_mod( 'explorer_linkone_color' ); ?>; }

	.button:hover, .button:active, .page-links > span, .entry-content .page-links a:hover, .entry-content .page-links a:active, a.more-link, a.excerpt-link, .tagcloud a, .widget_calendar #wp-calendar tbody a:hover { background-color: <?php echo get_theme_mod( 'explorer_linktwo_color' ); ?>; }
	.site-content [class*="navigation"] a, #content [class*="navigation"] a { border-color: <?php echo get_theme_mod( 'explorer_linktwo_color' ); ?>; }
	.widget_text a:hover { border-bottom-color: <?php echo get_theme_mod( 'explorer_linktwo_color' ); ?>; }
	#infinite-handle span { border-color: <?php echo get_theme_mod( 'explorer_linktwo_color' ); ?>!important; }

	hr { border-bottom-color: <?php echo get_theme_mod( 'explorer_linkthree_color' ); ?>; }
	input[type="text"], input[type="email"], input[type="password"], input[type="search"], textarea, input[type="text"]:focus, input[type="email"]:focus, input[type="password"]:focus, input[type="search"]:focus, textarea:focus, .entry-content table, .comment-body table, .entry-content th, .comment-body th, .entry-content td, .comment-body td, .sticky .entry-meta, .widget_calendar #wp-calendar, .widget_calendar #wp-calendar thead th, .widget_calendar #wp-calendar tbody td, .masonry .entry-meta { border-color: <?php echo get_theme_mod( 'explorer_linkthree_color' ); ?>; }

	pre, .authorbox, .single .comments-area, #secondary .jetpack_subscription_widget #subscribe-email input, .sidebar-widget-area .widget, .color-section, .fivecolumn .overlay, .masonry .postinner, .archive .page-title, .search .page-title, #infinite-footer .container, .footer .jetpack_subscription_widget input[type="text"], .footer input[type="submit"], form.contact-form, .portfolio-entry { background: <?php echo get_theme_mod( 'explorer_linkfour_color' ); ?>; }
	.footer.custom a.about-menu-toggle { background-color: <?php echo get_theme_mod( 'explorer_linkfour_color' ); ?>; }
	abbr, acronym, .entry-header .entry-meta, .comments-area article, .comment-list li.trackback, .comment-list li.pingback, .widget_text a  { border-bottom-color: <?php echo get_theme_mod( 'explorer_linkfour_color' ); ?>; }
	.entry-header .entry-meta  { border-top-color: <?php echo get_theme_mod( 'explorer_linkfour_color' ); ?>; }
	.gallery a img { border-color: <?php echo get_theme_mod( 'explorer_linkfour_color' ); ?>!important; }

	body,button,input,select,textarea, blockquote:before, blockquote cite a, .site-title a, .main-small-navigation a, .entry-title a, .categories-links a, .entry-footer a, .postdate a, h1.entry-title, .authorbox h3.author-name a, .comment-author cite, .widget a, .widget_flickr #flickr_badge_uber_wrapper a:link, .widget_flickr #flickr_badge_uber_wrapper a:active, .widget_flickr #flickr_badge_uber_wrapper a:visited, .sidebar-widget-area .widgettitle, .sidebar-widget-area .widget-title, .sidebar-widget-area .widget-title a, .sidebar-widget-area .widget-grofile h4, a.about-menu-toggle, .footer.custom a.about-menu-toggle, a.about-menu-toggle:after, a.about-menu-toggle.open:after, hr.separator:after, .sharedaddy h3.sd-title, div#jp-relatedposts a, .portfolio-entry-title a { color: <?php echo get_theme_mod( 'explorer_linkfive_color' ); ?>; }
	.woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit, .woocommerce #content input.button, .woocommerce-page a.button, .woocommerce-page button.button, .woocommerce-page input.button, .woocommerce-page #respond input#submit, .woocommerce-page #content input.button, .woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price, .single .product span.amount, .woocommerce ul.products li.product h3, .woocommerce-page ul.products li.product h3 { color: <?php echo get_theme_mod( 'explorer_linkfive_color' ); ?>!important; }

	.site-description, .categories-links a:hover, .tags-links, .entry-header .entry-meta, .entry-meta a, .entry-meta, footer.entry-meta .edit-link a:before, .site-content [class*="navigation"] a, #content [class*="navigation"] a, .site-content .navigation-comment a, .site-content .navigation-comment a:hover, .trackback .edit-link a, .pingback .edit-link a, .comment-meta a, .comment-meta a:hover, #cancel-comment-reply-link, #cancel-comment-reply-link:hover,.wp-caption-text, .widget a:hover, .widget_flickr #flickr_badge_uber_wrapper a:hover, .widget_rss ul a, .widget_recent_entries .post-date, .widget_text a, .social-links a, #infinite-footer .blog-credits, #infinite-footer .blog-credits a, #infinite-footer .blog-info a:hover, #infinite-footer .blog-credits a:hover { color: <?php echo get_theme_mod( 'explorer_linksix_color' ); ?>; }
	#infinite-handle span { color: <?php echo get_theme_mod( 'explorer_linksix_color' ); ?>!important; }
	@media screen and (min-width: 800px) {
.entry-header .entry-meta, .entry-format a:before, .entry-date a:before, .sticky-post:before, .byline a:before, .edit-link a:before, .comments-link a:before, .tags-links:before, .full-size-link a:before, .parent-post-link a:before, .attachment span.entry-date:before, .comment-reply-link:before, .comment-reply-login:before, .entry-format a:hover:before, .entry-date a:hover:before, .byline a:hover:before, .edit-link a:hover:before, .comments-link a:hover:before, .full-size-link a:hover:before, .parent-post-link a:hover:before, .comment-reply-link:hover:before, .comment-reply-login:hover:before, span.sticky-post:hover:before { color: <?php echo get_theme_mod( 'explorer_linksix_color' ); ?>; }
	}

	button, input[type="button"], input[type="reset"], input[type="submit"], .button, .button:visited, .button:hover, .navigation-main a, .navigation-main ul li.menu-item-has-children > a:after, .menu-toggle, .menu-toggle:before, .menusocial li a[href*="codepen.io"]::before, .widget .menu li a[href*="codepen.io"]::before, .menusocial li a[href*="digg.com"]::before, .widget .menu li a[href*="digg.com"]::before, .menusocial li a[href*="dribbble.com"]::before, .widget .menu li a[href*="dribbble.com"]::before, .menusocial li a[href*="dropbox.com"]::before, .widget .menu li a[href*="dropbox.com"]::before, .menusocial li a[href*="facebook.com"]::before, .widget .menu li a[href*="facebook.com"]::before, .menusocial li a[href*="flickr.com"]::before, .widget .menu li a[href*="flickr.com"]::before, .menusocial li a[href*="plus.google.com"]::before, .widget .menu li a[href*="plus.google.com"]::before, .menusocial li a[href*="github.com"]::before, .widget .menu li a[href*="github.com"]::before, .menusocial li a[href*="instagram.com"]::before, .widget .menu li a[href*="instagram.com"]::before, .menusocial li a[href*="linkedin.com"]::before, .widget .menu li a[href*="linkedin.com"]::before, .menusocial li a[href*="pinterest.com"]::before, .widget .menu li a[href*="pinterest.com"]::before, .menusocial li a[href*="polldaddy.com"]::before, .widget .menu li a[href*="polldaddy.com"]::before, .menusocial li a[href*="getpocket.com"]::before, .widget .menu li a[href*="getpocket.com"]::before, .menusocial li a[href*="reddit.com"]::before, .widget .menu li a[href*="reddit.com"]::before, .menusocial li a[href*="skype.com"]::before, .menusocial li a[href*="skype:"]::before, .widget .menu li a[href*="skype.com"]::before, .widget .menu li a[href*="skype:"]::before, .menusocial li a[href*="stumbleupon.com"]::before, .widget .menu li a[href*="stumbleupon.com"]::before, .menusocial li a[href*="tumblr.com"]::before, .widget .menu li a[href*="tumblr.com"]::before, .menusocial li a[href*="twitter.com"]::before, .widget .menu li a[href*="twitter.com"]::before, .menusocial li a[href*="vimeo.com"]::before, .widget .menu li a[href*="vimeo.com"]::before, .menusocial li a[href*="wordpress.org"]::before, .menusocial li a[href*="wordpress.com"]::before, .widget .menu li a[href*="wordpress.org"]::before, .widget .menu li a[href*="wordpress.com"]::before, .menusocial li a[href*="youtube.com"]::before, .widget .menu li a[href*="youtube.com"]::before, .page-links > span, .page-links a, .entry-content .page-links a, a.more-link, a.excerpt-link, .widget_calendar #wp-calendar tbody a:hover, .footer .widget_calendar #wp-calendar tbody a,.widget-area .milestone-header, .widget-area .milestone-countdown, .widget-area .milestone-message, .footer .widget_calendar #wp-calendar caption, .footer .widget a, .copyright, .site-info, .site-info a, .menu-content, a.menu-close:after, .front-page-content-area .with-featured-image .entry-content, .front-page-content-area .with-featured-image .page-title, .front-page-content-area .with-featured-image .entry-meta a, .front-page-content-area .with-featured-image .edit-link a:before { color: <?php echo get_theme_mod( 'explorer_linkseven_color' ); ?>; }
	.tagcloud a{ color: <?php echo get_theme_mod( 'explorer_linkseven_color' ); ?>!important; }

	.site-footer, .main-small-navigation div, #secondary .jetpack_subscription_widget form, .widget_calendar #wp-calendar tbody a, a.about-menu-toggle, .front-page { background-color: <?php echo get_theme_mod( 'explorer_linkeight_color' ); ?>; }
	.masonry .entry-meta, .woocommerce .woocommerce-ordering select, .woocommerce-page .woocommerce-ordering select { background: <?php echo get_theme_mod( 'explorer_linkeight_color' ); ?>; }
	#infinite-handle span { background: <?php echo get_theme_mod( 'explorer_linkeight_color' ); ?>!important; }
	.contact-form input[type="submit"] { border-color: <?php echo get_theme_mod( 'explorer_linkeight_color' ); ?>; }

	</style>
	<?php
}
add_action( 'wp_head', 'explorer_customizer_css' );