jQuery(document).ready(function($) {
	// Image swap on hover
    $("#product-image-container li img").hover(function(){
        $('#product-main-image').attr('src',$(this).attr('src'));
    });
    
    $("#tools-front-manufacturers-slideshow").cycle({
        fx: 'fade',
        timeout: 1000,
        speed: 1000
    });

		$(".primary-menu li:last-child .separator").addClass('last-child');
		$(".general-menu li:last-child .separator").addClass('last-child');
    
});