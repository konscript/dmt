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
    
    $("#sponsor-logo-1").hover(function() {
       $(this).attr('src', 'wp-content/themes/konscript/graphics/sponsor-logo-dj-color.png');
    });
    
    $("#sponsor-logo-1").mouseleave(function() {
       $(this).attr('src', 'wp-content/themes/konscript/graphics/sponsor-logo-dj-gray.png');
    });
    
    $("#sponsor-logo-2").hover(function() {
       $(this).attr('src', 'wp-content/themes/konscript/graphics/sponsor-logo-cancer-color.png');
    });
    
    $("#sponsor-logo-2").mouseleave(function() {
       $(this).attr('src', 'wp-content/themes/konscript/graphics/sponsor-logo-cancer-gray.png');
    });
});