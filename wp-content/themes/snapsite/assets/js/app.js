// Begin jQuery no-conflict mode
jQuery(document).ready(function($) {

  // Initialize Foundation
  $(document).foundation();

  // Homepage slider
  $('.homepage-slider .slider-container').slick({
    infinite: true,
    speed: 300,
    slidesToShow: 1,
    prevArrow: $('.prev'),
    nextArrow: $('.next')
  });

  // Slick Slider adjustments for accessibility
  $('.slick-track').attr( 'aria-label', 'Slider track' );
  $('.slick-slide').removeAttr( 'aria-describedby' );

  // R

  // Smooth scroll homepage button achor links
  $('.home .hero .button').click(function(){
    $('html, body').animate({
      scrollTop: $( $(this).attr('href') ).offset().top
    }, 500);
    return false;
  });

  function showMenu() {
    $(this).children('.sub-menu').slideDown();
  }

  function hideMenu() {
    $(this).children('.sub-menu').slideUp();
  }


  $(".top-nav .menu-item-has-children").hoverIntent( showMenu, hideMenu );



// End jQuery no-conflict mode
});

// Initiailize skip-link-focus-fix
skipLinkFocus.init();
