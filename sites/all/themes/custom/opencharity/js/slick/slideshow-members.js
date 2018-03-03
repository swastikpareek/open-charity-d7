(function ($) {  
  /** 
   * JS behaviour for adding slick slide show to
   * memebers block.
   */
  Drupal.behaviors.slickSlidesMembers = {
    attach: function(context, settings) {
      // if libray loaded
      if(typeof $(document).slick == 'function') {
        // members slide show
        $('.view--members .view__content', context).slick({
          slidesToShow: 5,
          slidesToScroll: 1,
          autoplay: false,
          autoplaySpeed: 1000,
          arrows: false,
          infinite: false,
          dots: true,
          responsive: [{
            breakpoint: 1024,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 3,
              infinite: true,
              dots: true
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
