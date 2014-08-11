/**
 * @file
 * A JavaScript file for the theme.
 *
 * In order for this JavaScript to be loaded on pages, see the instructions in
 * the README.txt next to this file.
 */

// JavaScript should be made compatible with libraries other than jQuery by
// wrapping it with an "anonymous closure". See:
// - https://drupal.org/node/1446420
// - http://www.adequatelygood.com/2010/3/JavaScript-Module-Pattern-In-Depth
(function ($, Drupal, window, document, undefined) {

    $(document).ready(function(){
        
        // Doors views items
		$('.view-doors .views-row').each( function(){
			w = $(this).find('img').width();
			$(this).css('max-width',w+'px')
		})
		
		
		// Doors spec items accordion
		$('.door-specs h2.block-title').click( function(){
			$(this).toggleClass('plus');
			$(this).parent().find('.block-content').slideToggle();
		});
		
		// Interior Doors Accordion
		$('.view-interior-doors h3').click( function(){
			$(this).toggleClass('plus');
			$(this).next().slideToggle();
		});
		
		//Interior Doors Hash
		$('.view-interior-doors h2').each( function(){
			hash = $(this).text().replace(/ /g,'-').toLowerCase();
			$(this).attr('id',hash);
		});
        
        
    });
    
    
})(jQuery, Drupal, this, this.document);
