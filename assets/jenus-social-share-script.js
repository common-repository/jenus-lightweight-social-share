jQuery(window).bind('scroll', function () {
    if (jQuery(window).scrollTop() > 300) {
        jQuery('.jenus-social-share ').addClass('fixed-social-share');
    } else {
        jQuery('.jenus-social-share ').removeClass('fixed-social-share');
    }
});