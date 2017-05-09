$(document).ready(function($){
  $(window).scroll(function(){
    clearTimeout($.data(this, 'scrollTimer'));
      $('.lead-header').slideUp(300);
    $.data(this, 'scrollTimer', setTimeout(function(){
      $('.lead-header').slideDown();
    }, 600));
  });
  
  $('.blog-post .collapse').on('shown.bs.collapse', function(){
    var collapsedId = $(this).attr('id');
    $('a[href="#' + collapsedId + '"]').html('Read Less <span class="glyphicon glyphicon-menu-up"></span>');
  });
  
  $('.blog-post .collapse').on('hidden.bs.collapse', function(){
    var collapsedId = $(this).attr('id');
    $('a[href="#' + collapsedId + '"]').html('Read More <span class="glyphicon glyphicon-menu-down"></span>');
  });
  
  $('#how_hear_about').on('change', function(){
    var hear_about_option = $('#how_hear_about').val();
    $('.more-info').hide();
    $('#' + hear_about_option).toggle();
  });
  
  //budget selector
  $('.package').on('click', function(){
    var packageValue = $(this).val();
    $('.budget-info').html('<p>$<span id="numDollars"></span> for <span id="numImpressions"></span> monthly impressions.</p>');
    if(packageValue == '7500+'){
      $('#input_2_20').slider({
        id: 'budgetSlide',
        min: 7500,
        max: 100000,
        step: 100,
        value: 7500,
        scale: 'logarithmic',
        tooltip: 'always',
        handle: 'triangle',
        formatter: function(value){
          return '$' + value;
        }
      });
      $('#numDollars').text('7,500');
      $('#numImpressions').text('150,000');
    }
    else{
      if(document.getElementById('budgetSlide') != null){
        $('#input_2_20').slider('destroy');
      }
      $('#input_2_20').val(packageValue);
      $('#numDollars').text(packageValue).digits();
      $('#numImpressions').text($(this).attr('data-impressions'));
    }
  });
    //$('#input_1_20').on('slideEnabled', function(){
    //  $('#numDollars').text('7,500');
    //  $('#numImpressions').text(calculateImpressions('7500')).digits();
    //});
    $('#field_2_20').on('slide', '#input_2_20', function(slideEvent){
      var dollars = slideEvent.value;
      $('#numDollars').text(dollars);
      $('#numImpressions').text(calculateImpressions(dollars)).digits();
    });
    $('#field_2_20').on('slideStop', '#input_2_20', function(slideEvent){
      var dollars = slideEvent.value;
      $('#numDollars').text(dollars);
      $('#numImpressions').text(calculateImpressions(dollars)).digits();
    });

  function calculateImpressions(dollars){
    var divisor = .10;
    if(dollars > 24999){
      divisor = .03;
    }
    else if(dollars > 7500){
      divisor = .04;
    }
    else if(dollars == 7500){
      divisor = .05;
    }
    var impressions = (dollars / divisor).toFixed();
    return impressions;
  }
  
  $.fn.digits = function(){
    return this.each(function(){
      $(this).text($(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
    });
  }
  
  $('.acf-map').each(function(){
		// create map
		map = new_map($(this));
	});
});

/*
*  new_map
*
*  This function will render a Google Map onto the selected jQuery element
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	$el (jQuery element)
*  @return	n/a
*/

function new_map( $el ) {
	// var
	var $markers = $el.find('.marker');
	// vars
	var args = {
		zoom		: 16,
		center		: new google.maps.LatLng(0, 0),
		mapTypeId	: google.maps.MapTypeId.ROADMAP
	};
	// create map	        	
	var map = new google.maps.Map( $el[0], args);
	// add a markers reference
	map.markers = [];
	// add markers
	$markers.each(function(){
    	add_marker( $(this), map );
	});
	
	// center map
	center_map( map );
	
	// return
	return map;
}

/*
*  add_marker
*
*  This function will add a marker to the selected Google Map
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	$marker (jQuery element)
*  @param	map (Google Map object)
*  @return	n/a
*/

function add_marker( $marker, map ) {
	// var
	var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );
	// create marker
	var marker = new google.maps.Marker({
		position	: latlng,
		map			: map
	});
	// add to array
	map.markers.push( marker );
	// if marker contains HTML, add it to an infoWindow
	if( $marker.html() )
	{
		// create info window
		var infowindow = new google.maps.InfoWindow({
			content		: $marker.html()
		});
		// show info window when marker is clicked
		google.maps.event.addListener(marker, 'click', function() {
			infowindow.open( map, marker );
		});
	}
}

/*
*  center_map
*
*  This function will center the map, showing all markers attached to this map
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	map (Google Map object)
*  @return	n/a
*/

function center_map( map ) {
	// vars
	var bounds = new google.maps.LatLngBounds();
	// loop through all markers and create bounds
	$.each( map.markers, function( i, marker ){
		var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );
		bounds.extend( latlng );
	});
	// only 1 marker?
	if( map.markers.length == 1 )
	{
		// set center of map
	    map.setCenter( bounds.getCenter() );
	    map.setZoom( 16 );
	}
	else
	{
		// fit to bounds
		map.fitBounds( bounds );
	}
}

/*
*  document ready
*
*  This function will render each map when the document is ready (page has loaded)
*
*  @type	function
*  @date	8/11/2013
*  @since	5.0.0
*
*  @param	n/a
*  @return	n/a
*/
// global var
var map = null;