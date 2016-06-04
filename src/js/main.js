$(document).ready(function(){

  // Add smooth scrolling
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
  });

  $(".infoTooltip").popover({
    html:true
  });

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
