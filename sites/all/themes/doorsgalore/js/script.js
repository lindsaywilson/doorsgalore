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
        
		// ---------------------
		// GLOBAL SCRIPTS
		// ---------------------
		
		// Define Global Mobile
		window.isMobile = false;
		window.deviceHasChanged = false;
		LAYOUT.checkMobile;
		
		// Define if on mobile (based on CCS media Queries : Device < 960px wide)
		var resizeTimer;
		LAYOUT.timerResize();
		$(window).resize(function() {
			clearTimeout(resizeTimer);
			resizeTimer = setTimeout(function() { LAYOUT.timerResize(); }, 100);
		});
		
		$("#mobile-nav-btn").on( 'click', 'a', function(event){
            event.preventDefault();
            if( $(this).hasClass("open_nav") ){
                $("#nav").slideDown(600, "easeOutExpo");
                $(this).attr('class','close_nav');
            }else{
                $("#nav").slideUp(600, "easeOutExpo");
                $(this).attr('class','open_nav');
            }
        });
		
		// Magnific Popup
		if($('body').hasClass('page-node-63') || $('body').hasClass('page-node-64') ){
			$('a.magnific').magnificPopup({
				type: 'image',
				removalDelay: 300,
				mainClass: 'mfp-fade',
				gallery:{
					enabled:true
				}
			});
		}
		
		
		// Equal heights
		if(!window.isMobile){
			equalHeight($('.front .equalheight'));
			$(window).resize(function() {
				if(!window.isMobile){
					$('.front .equalheight').attr('style','');
					equalHeight($('.front .equalheight'));
				} else{
					$('.front .equalheight').attr('style','');
				}
			});
		}
		
		// Match Heights (responsive)
		$('.view-doors .rows .views-row').matchHeight(true);
		$('.view-homepage-promos .node-homepage-promo').matchHeight();
		$('#block-block-3 .grid').matchHeight(true);
		
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
		
		// Service Map
		if($('body').hasClass('page-node-54') || $('body').hasClass('page-node-55')){
			$('#block-block-12 .block-content, #block-block-13 .block-content').before('<div id="map-canvas" />');
			var address = '8160 120th Street Surrey BC Canada';
			var circle;
			var map;
			
			if($('body').hasClass('page-node-55')) {
				zoom = 9;
			} else { 
				zoom = 8; 
			}
			
			function initialize() {
			  geocoder = new google.maps.Geocoder();
			  var latlng = new google.maps.LatLng(49.151059, -122.890283);
			  var mapOptions = {
				zoom: zoom,
				center: latlng,
				disableDefaultUI: true
			 }
			  map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
			  var marker = new google.maps.Marker({
				map: map,
				position: latlng
			  });
			  var circleOptions = {
				  strokeColor: '#285da0',
				  fillOpacity: .9,
				  strokeWeight: 1,
				  fillColor: '#8eb9e7',
				  fillOpacity: 0.2,
				  map: map,
				  center: latlng,
				  radius: 25000
				};
				circle = new google.maps.Circle(circleOptions);
			}
			google.maps.event.addDomListener(window, 'load', initialize);
		}
        
        
    });
	
	
	    // ---------------------
	// LAYOUT
	// ---------------------
	
    var LAYOUT = {};
    LAYOUT.isPageReloaded = true;
    LAYOUT.timerResize = function(){
        
        // Define if mobile
        this.checkMobile();

        if(!window.isMobile){
            MOBILE.showNav();
        }
        
    };
	
    LAYOUT.checkMobile = function (){
        // Define if on mobile (based on CCS media Queries : Device < 800px wide)
        if ( $("#mobile-nav-btn").css("display") === 'block') {
            if( window.isMobile ){
                window.deviceHasChanged = false;
            }else{
               window.deviceHasChanged = true; 
               window.isMobile = true;
               MOBILE.hideNav();
            }  
        }else{
            if( !window.isMobile ){
                window.deviceHasChanged = false;
            }else{
                window.deviceHasChanged = true;
                window.isMobile = false;
				MOBILE.showNav();
            }
        }
    };

    
    // ---------------------
	// MOBILE
	// ---------------------
	
    var MOBILE = {};
    MOBILE.toggleNav = function (){
        var nextAction = $(this).attr("class");
		var nav = $('#nav');
        if (nextAction === "open_nav"){
            $(this).attr('class','close_nav');
			nav.slideDown(500, "easeOutExpo");
        }else{
			$(this).attr('class','open_nav');
            nav.slideUp(500, "easeOutExpo"); 
        }
    };
    MOBILE.showNav = function (){
		$('#nav').show();
        $('#mobile-nav-btn a').attr('class','close_nav');
    };
    MOBILE.hideNav = function (){
		$('#nav').hide();
		$('#mobile-nav-btn a').attr('class','open_nav');
    };



	// ---------------------
	// EQUAL HEIGHTS
	// ---------------------
	
	function equalHeight(group) {
		var tallest = 0;
		group.each(function() {
			var thisHeight = $(this).height();
			if(thisHeight > tallest) {
				tallest = thisHeight;
			}
		});
		group.height(tallest);
	}

    
})(jQuery, Drupal, this, this.document);
