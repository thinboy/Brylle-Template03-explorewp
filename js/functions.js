( function( $ ){
	//Masonry blocks
	$blocks = $(".posts");

	$blocks.imagesLoaded(function(){
		$blocks.masonry({
			itemSelector: '.threecolumn'
		});

		// Fade blocks in after images are ready (prevents jumping and re-rendering)
		$(".threecolumn").fadeIn();
	});

	$(window).resize(function () {
		$blocks.masonry();
	});
})( jQuery );