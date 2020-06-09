// Part of code from one project.

(function ($, Drupal) {

  /*
    Disable scroll on views ajax.
   */
  Drupal.behaviors.viewsScrollOff = {
    attach: function () {

      /* Views Ajax Content Load Autoscroll Feature Disabled */
      Drupal.AjaxCommands.prototype.viewsScrollTop = null;
    }
  };

  /*
      Fix grid with js.
   */
  Drupal.behaviors.homepage_articles = {
    attach: function (context, settings) {

      $('.search-topics__grid', context).once('leaderAttached').each(function () {
        $('.st__item-show-more .icon').click( function(){
          var parent_block = $(this).parent().parent();
          parent_block.toggleClass('toggled');

          var block_wrapper = $(parent_block).closest('.search-topics__item');
          var block_wrapper_index = $(block_wrapper).index();

          if( $('.item_full-index-'+block_wrapper_index).length > 0 ){
            $('.item_full-index-'+block_wrapper_index).slideUp('medium', function(){
              $(this).remove();
            })
          }else{
            var full_text = $(parent_block).find('.st__item-full-text').clone();

            block_wrapper.after( $(full_text) );
            $(full_text).wrap('<div class="item_full-text-wrap item_full-index-'+block_wrapper_index+' "></div>');
          }
        } );
      });
    }
  };

})(jQuery, Drupal);


