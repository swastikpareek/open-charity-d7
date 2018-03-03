(function ($) {  
  /** 
   * JS behaviour for adding slick slide show to
   * blogs block.
   */
  Drupal.behaviors.slickSlidesBlogs = {
    attach: function(context, settings) {
      // if libray loaded
      if(typeof $(document).slick == 'function') {      
        // blog teaser slide show
        $('.blogs-teaser .view__content', context).slick({
          slidesToShow: 5,
          slidesToScroll: 1,
          autoplay: false,
          autoplaySpeed: 1000,
          arrows: true,
          infinite: true,
          responsive: [{
            breakpoint: 1024,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 3,
              infinite: true,
              arrows: true
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }]       
        });        
      }
    }
  };
})(jQuery);