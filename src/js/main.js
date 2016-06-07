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

  $('a[href^="#"]', 'a[rel="home"]').on('click',function (e) {
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
};

var syncScrolling = function syncScrolling() {
  var sections = $('section');
  var nav = $('#site-navigation');

  $(window).on('scroll', function () {
    var cur_pos = $(this).scrollTop();

    sections.each(function() {
      var top = $(this).offset().top - 100,
        bottom = top + $(this).outerHeight();

      if (cur_pos >= top && cur_pos <= bottom) {
        nav.find('a').removeClass('active');
        sections.removeClass('active');

        $(this).addClass('active');
        nav.find('a[href="#'+$(this).attr('id')+'"]').addClass('active');
      }
    });
  });
};
