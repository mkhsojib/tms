//preloader
jQuery(window).on('load',function(){
    jQuery('.page-loader-wrapper').fadeOut();
    jQuery('.loader').delay(350).fadeOut('slow');
    jQuery('body').delay(350);
});