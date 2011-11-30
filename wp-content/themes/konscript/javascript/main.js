jQuery(document).ready(function($) {
	// Image swap on hover on product page
    $("#product-image-container li img").hover(function(){
        $('#product-main-image').attr('src',$(this).attr('src'));
    });
    
    // Cycle logos on tools frontpage
    $("#tools-front-manufacturers-slideshow").cycle({
        fx: 'fade',
        timeout: 1000,
        speed: 1000
    });
    
    // Remove end separator in IE
	$(".primary-menu li:last-child .separator").css('display', 'none');
	$(".general-menu li:last-child .separator").css('display', 'none');
   
	$('#site-sponsors a .sponsor-hover').hide();

	$('#site-sponsors a').hover(function() {
		$(this).find('.sponsor-idle').fadeOut();		
		$(this).find('.sponsor-hover').fadeIn();
	}, function() {
		$(this).find('.sponsor-idle').fadeIn();		
		$(this).find('.sponsor-hover').fadeOut();		
	});
	
});