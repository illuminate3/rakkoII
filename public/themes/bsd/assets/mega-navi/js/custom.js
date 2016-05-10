// File:	Cutom Script
// Author:	Pixel Art Inc.
// URL:		http://www.themeforest.net/user/pixelartinc
// URL:		http://www.pixelartinc.com
// Developed by:	Umair Khan @ Pixelartinc for Flay



$(document).ready(function() {
	
	
	
			//Focus and Blur Effect with Inputs
			var addFocusAndBlur = function($input, $val){
				
				$input.focus(function(){
					if (this.value == $val) {this.value = '';}
				});
				
				$input.blur(function(){
					if (this.value == '') {this.value = $val;}
				});
			}
			addFocusAndBlur(jQuery('.contact-name'),'Name');
			addFocusAndBlur(jQuery('.contact-email'),'Email');
			addFocusAndBlur(jQuery('.contact-message'),'Message');
			addFocusAndBlur(jQuery('.bottom-email'),'Your Email');
			addFocusAndBlur(jQuery('.search-field'),'Search...');
			
			
			
			//Main Menu
			$('.header-wrapper nav > ul > li').hover(function(){
				  	$(this).children('ul').slideToggle(50);
				});
			
			
			
			//Home Slider
		  	$('#slider').cycle({
				next:  '.next',
				prev:   '.prev'
				});
			
			
			
			//Testimonial Slider
			$('#testimonial').cycle({
				next:  '.next',
				prev:   '.prev'
				});
			
			
			
			//Home Tabs	
			$(".tabs").tabs(".panes > .tab-pane", {effect: 'fade'});
			
			
			
			//Bottom Tweets
			$(".bottom-tweet").tweet({
		          username: "envato",
		          count: 2
		        });
			
			
			
			//Home Tweets
			$(".home-tweet").tweet({
		          username: "envato",
		          count: 2
		        });
				
				
				
			//Isotope
			$(function(){
		      
		      var $container = $('.grid-view');
		
		      $container.isotope({
		        itemSelector : '.item'
		      });
		      
		      
		      var $optionSets = $('.portfolio-menu'),
		          $optionLinks = $optionSets.find('a');
		
		      $optionLinks.click(function(){
		        var $this = $(this);
		        // don't proceed if already selected
		        if ( $this.hasClass('selected') ) {
		          return false;
		        }
		        var $optionSet = $this.parents('.portfolio-menu');
		        $optionSet.find('.selected').removeClass('selected');
		        $this.addClass('selected');
		  
		        // make option object dynamically, i.e. { filter: '.my-filter-class' }
		        var options = {},
		            key = $optionSet.attr('data-option-key'),
		            value = $this.attr('data-option-value');
		        // parse 'false' as false boolean
		        value = value === 'false' ? false : value;
		        options[ key ] = value;
		        if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {
		          // changes in layout modes need extra logic
		          changeLayoutMode( $this, options )
		        } else {
		          // otherwise, apply new options
		          $container.isotope( options );
		        }
		        
		        return false;
		      });
					   });	
		
		
		
});