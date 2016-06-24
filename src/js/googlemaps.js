(function($) {

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
      scrollwheel: false,
      center		: new google.maps.LatLng(0, 0),
      mapTypeId	: google.maps.MapTypeId.ROADMAP
    };


    // create map
    map = new google.maps.Map( $el[0], args);


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
    var markerId = $marker.attr('data-markerid');

    // create marker
    var marker = new google.maps.Marker({
      position	: latlng,
      map			: map
    });

    // add to array
    map.markers.push( marker );
    ttMarkers.push(marker);

    // if marker contains HTML, add it to an infoWindow
    if( $marker.html() )
    {
      // create info window
      var infowindow = new google.maps.InfoWindow({
        content		: $marker.html(),
        maxWidth: 200
      });

      ttInfoWindows.push(infowindow);

      // show info window when marker is clicked
      google.maps.event.addListener(marker, 'click', function() {
        closeInfoWindows();
        infowindow.open( map, marker );
        setActiveRow(markerId);
      });

      google.maps.event.addListener(infowindow,'closeclick',function(){
        closeInfoWindows();
      });

      google.maps.event.addDomListener(window, 'resize', function() {

        if (mapCenter) {
          map.setCenter(mapCenter);
        } else if (mapBounds) {
          map.fitBounds(mapBounds);
        }
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
      mapCenter = map.getCenter();
    }
    else
    {
      // fit to bounds
      map.fitBounds( bounds );
      mapBounds = bounds;
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
  var ttMarkers = ttMarkers || [];
  var ttInfoWindows = [];
  var markerRows = null;
  var markerRows = [];
  var mapCenter;
  var mapBounds;

  // function to setActiveRow
  var setActiveRow = function setActiveRow(id) {
    removeActiveClass();
    $(markerRows[id]).addClass('active');
  };

  // function to close all infowindows
  var closeInfoWindows = function closeInfoWindows() {
    ttInfoWindows.forEach(function (el) {
      el.close();
    });
    removeActiveClass();
  };

  var removeActiveClass = function removeActiveClass() {
    $(markerRows).removeClass('active');
  };


  $(document).ready(function(){

    $('.acf-map').each(function(){
      // create map
      map = new_map( $(this) );
    });

    markerRows = $('[data-mapTarget]');
    markerRows.each(function(){
      $(this).on('click', function (ev) {
        var markerIndex = $(ev.currentTarget).data('maptarget');
        google.maps.event.trigger(ttMarkers[markerIndex], 'click');
      });
    });


  });
})(jQuery);
