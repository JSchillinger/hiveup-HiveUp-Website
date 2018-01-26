(function ($) {

	'use strict';

	$(document).ready(function() {

		$('.filter-title').click(function(){
    	$('.filter').toggleClass("active");
		});

		// Comments

		$('.commentlist li').addClass('card');
		$('.comment-reply-link').addClass('btn btn-secondary');

		// Forms

		$('select, input[type=text], input[type=email], input[type=password], textarea').addClass('form-control');
		$('input[type=submit]').addClass('btn btn-primary');

    	// Pagination fix for ellipsis

		$('.pagination .dots').addClass('page-link').parent().addClass('disabled');

		// You can put your own code in here

	});

	var $root = $('html, body');

	$('a[href^="#"]').click(function () {
	    $root.animate({
	        scrollTop: $( $.attr(this, 'href') ).offset().top
	    }, 500);

	    return false;
	});

	$(window).scroll(function () {
	  var hero = $('#hero').height();
	  if ( $(this).scrollTop() > 100 && !$('#main-nav').hasClass('open') ) {
		    $('#main-nav').addClass('open');
		    /* $('nav').slideDown(); */
			} else if ( $(this).scrollTop() <= 100 ) {
		    $('#main-nav').removeClass('open');
		    /* $('nav').slideUp(); */
	  }
	});

	$(window).on('load', function(){
	    $('#loading').fadeOut();
	});

	// ANIMATION //
	/*Interactivity to determine when an animated element in in view. In view elements trigger our animation*/
	$(document).ready(function() {

	  //window and animation items
	  var animation_elements = $.find('.animation-element');
	  var web_window = $(window);

	  //check to see if any animation containers are currently in view
	  function check_if_in_view() {
	    //get current window information
	    var window_height = web_window.height();
	    var window_top_position = web_window.scrollTop();
	    var window_bottom_position = (window_top_position + window_height);

	    //iterate through elements to see if its in view
	    $.each(animation_elements, function() {

	      //get the element sinformation
	      var element = $(this);
	      var element_height = $(element).outerHeight();
	      var element_top_position = $(element).offset().top;
	      var element_bottom_position = (element_top_position + element_height);

	      //check to see if this current container is visible (its viewable if it exists between the viewable space of the viewport)
	      if ((element_top_position <= window_bottom_position)) { //(element_bottom_position >= window_top_position) && //
	        element.addClass('in-view');
	      } // else {
	        // element.removeClass('in-view');//
	      // }
	    });

	  }

	  //on or scroll, detect elements in view
	  $(window).on('scroll resize', function() {
	      check_if_in_view()
	    })
	    //trigger our scroll event on initial load
	  $(window).trigger('scroll');

	});


	$('.open-menu').on('click', function() {
     $('.overlay').addClass('open');
  });

  $('.close-menu').on('click', function() {
    $('.overlay').removeClass('open');
  });
}(jQuery));
