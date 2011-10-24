jQuery(document).ready(function($) {
	// Image swap on hover
    $("#product-image-container li img").hover(function(){
        $('#product-main-image').attr('src',$(this).attr('src'));
    });
});