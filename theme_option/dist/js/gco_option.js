jQuery(document).ready(function(){
    if (jQuery('#back-to-top').length) {
        jQuery("#back-to-top").on('click', function() {
            jQuery('html, body').animate({
                scrollTop: jQuery('html, body').offset().top,
            }, 1000);
        });
    }
});