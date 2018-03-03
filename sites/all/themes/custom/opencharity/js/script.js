(function ($) {  
  /**
   * JS responsible for hamburger styling.
   */
  Drupal.behaviors.hamburgerMenu = {
    attach: function(context, settings) {
      $('.menu-bar__button', context).once('hamburger-menu-processed', function() {
        $(this).on('click', function() {
          var el = $(this).data('target');
          if(el) {
            $(el).slideToggle();
            if($(el).attr('aria-expanded')){
              $(el).attr('aria-expanded', false);
            }
            else {
              $(el).attr('aria-expanded', true);
            }
          }
        });
      });
    }
  };
})(jQuery);

