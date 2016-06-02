$(document).ready(function(){

  // Add smooth scrolling
  $('a[href^="#"]').on('click',function (e) {
    e.preventDefault();

    var target = this.hash;
    var $target = $(target);

    $('html, body').stop().animate({
      'scrollTop': $target.offset().top + 20
    }, 400, 'swing', function () {
    });
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
