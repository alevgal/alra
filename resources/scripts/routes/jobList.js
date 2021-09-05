export default {
  init() {

    let firstRequest = true;

    $( document ).ajaxComplete(function( event, xhr, settings ) {
     if( '/jm-ajax/get_listings/' === settings.url) {
        if( ! firstRequest ) {
          $([document.documentElement, document.body]).animate({
            scrollTop: $("#job-listings-wrap").offset().top - 180,
          }, 2000);
        }
       firstRequest = false;
     }
    });
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
