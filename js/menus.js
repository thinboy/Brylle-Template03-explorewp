( function( $ ){
	    jQuery('.menu-content').hide();
	    jQuery('a.about-menu-toggle').click(function () {
		jQuery('html, body').animate({
              scrollTop: jQuery(this).offset().top
        }, 800);
		jQuery('.menu-content').slideToggle('800');
		jQuery('a.about-menu-toggle').toggleClass('open');
    });
		jQuery('a.menu-close').click(function () {
		jQuery('.menu-content').slideToggle('800');
		jQuery('a.about-menu-toggle').removeClass('open');
    });
})( jQuery );