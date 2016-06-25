$(document).ready(function(){

  FastClick.attach(document.body);

  // Having navigation bar state in sync with scrolling position
  syncScrolling();

  // Add smooth scrolling
  smoothScrolling();

  // Add 100% height on image
  fullheightImage();

});

var fullheightImage = function fullheightImage() {
  var targetContainer = $("#home .imageWrapper");
  $(window).resize(function () {
    targetContainer.height($(window).height() - $('#masthead.site-header').height());
  });
  $(window).trigger('resize');
};

var smoothScrolling = function smoothScrolling() {
  $('a[rel="home"]').on('click', function (e) {
    e.preventDefault();

    $('html, body').stop().animate({
      'scrollTop': 0
    }, 400, 'swing', function () {
    });
  });

  $('a[href^="#"]').on('click',function (e) {
    e.preventDefault();

    var target = this.hash;
    var $target = $(target);
    var offset = $target.offset().top - 65;
    if (target === '#home') {
      offset = 0;
    }

    $('html, body').stop().animate({
      'scrollTop': offset
    }, 400, 'swing', function () {
    });

    // remove toggle state from navbar
    $('#site-navigation').removeClass('toggled');
    $('#site-navigation .menu-toggle').removeClass('is-active');

  });

  $('.player').YTPlayer();
};

var syncScrolling = function syncScrolling() {
  var sections = $('section');
  var lastSection = sections.last();
  var lastSectionOffset = 0;
  var nav = $('#site-navigation');
  var $navLinks = nav.find('a');
  var cur_pos = 0;
  var top = 0;
  var bottom = 0;

  $(window).on('scroll', function () {
    cur_pos = $(this).scrollTop();

    sections.each(function() {
      top = $(this).offset().top - 100;
      bottom = top + $(this).outerHeight();
      lastSectionOffset = lastSection.offset().top-(lastSection.height()/1.25);

      if (cur_pos >= top && cur_pos <= bottom) {
        $navLinks.removeClass('active');

        $(this).addClass('active');
        nav.find('a[href="#'+$(this).attr('id')+'"]').addClass('active');
      }
      if(cur_pos >= lastSectionOffset) {
        $navLinks.removeClass('active').last().addClass('active');
      }
    });
  });
};
