jQuery(document).ready(function( $ ) {

	$(".main-navigation ul li.page_item_has_children").click(function(e){
		if ( $(this).children("ul").hasClass("open-sub") ) {
			$(this).children("ul").removeClass("open-sub");
			$(this).removeClass("open-sub");
		} else {
			$(this).children("ul").addClass("open-sub");
			$(this).addClass("open-sub");
		}
	});
	
	
	// Add class when video plays
	$("video").on('play', function() {
		$(this).parent().addClass('playing');
	});
	
	
	// Remove class when video pauses or ends
	$("video").on('pause ended', function() {
		$(this).parent().removeClass('playing');
	});


});