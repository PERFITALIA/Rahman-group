$(document).ready(function(){ 
 $(".youtube-link1").grtyoutube();
 $(".youtube-link2").grtyoutube();
 $(".youtube-link3").grtyoutube();
 $(".youtube-link4").grtyoutube();
 $(".youtube-link5").grtyoutube();
 $(".youtube-link6").grtyoutube();
 $(".youtube-link7").grtyoutube();
 $(".youtube-link8").grtyoutube();
 $(".youtube-link9").grtyoutube();
 $(".youtube-link10").grtyoutube();
 $(".youtube-link11").grtyoutube();
 $(".youtube-link12").grtyoutube();
 $(".youtube-link13").grtyoutube();
 $(".youtube-link14").grtyoutube();
 $(".youtube-link15").grtyoutube();
 $(".youtube-link16").grtyoutube();
 $(".youtube-link17").grtyoutube();
 $(".youtube-link18").grtyoutube();
 $(".youtube-link19").grtyoutube();
 $('.ham-icon').click(function(){
  $("html").css("overflow", "hidden");
  $('.my-sidenav1').css('height', '100vh');
});

 $('.ham-icon1').click(function(){
  $('.my-sidenav').css('max-width', '380px');
});
 
 $('.top-nav-content ul li.hoversidedata').hover(function(){
  $('.submenu1').css('display', 'none');
  $(this).find('ul').css('display', 'block');
});
 $('.nav-pills li a').click(function(){
  $('.sub-menu li .submenu1').css('display', 'none');
  $('.sub-menu li:first-child .submenu1').css('display', 'block');
});

 $('.cross-btn1').click(function(){
  $('.my-sidenav').css('max-width', '0px');
}); 
 $('.cross-btndes').click(function(){
  $('.my-sidenav1').css('height', '0');
  $("html").css("overflow", "unset");
}); 
 $(window).on("scroll", function() {
        // Sticky nev Effect
  if($(this).scrollTop() > 50) {
    $('#header').addClass("sticky"); 
  }else{
    $('#header').removeClass("sticky");
  } 
});


 if ($("body").hasClass("headercolored")) {
  $('#header').addClass("sticky"); 
}
var windowWidth = $(window).width(); 
if(windowWidth <= 991){
 $('.ham').removeClass('ham-icon');
 $('.ham').addClass('ham-icon-mbl');
 $('.ham-icon-mbl').click(function(){
  $('.my-sidenav2').css('max-width', '380px');
});
}


$(".my-sidenav").accordion();
collectMapSvg();

$('#backtotop').bind('click', function(e) {
  e.preventDefault();
  $('body,html').animate({scrollTop:0},800);  
});

});
$('#main-banner').owlCarousel({
  autoplay:true,
  items:4,
  loop:true,
  margin:0,
  slideSpeed: 300,
  paginationSpeed: 3000,
  autoplaySpeed:5000,
  autoplayTimeout:5000,
  autoplayHoverPause:false,
  nav:false,
  touchDrag: true,
  mouseDrag: false,
  animateIn: 'fadeIn',
  animateOut: 'fadeOut',
  transitionStyle: "fade",
  responsive:{
   0:{
    items:1
  },
  600:{
    items:1
  },
  1000:{
    items:1
  }
}
});

$('.MediaTestimonial.owl-carousel').owlCarousel({
  autoplay: true,
  loop: false,
  dots:true,   
  nav: false,
  navText:"",
  touchDrag: true,
  mouseDrag: false,
  smartSpeed: 1000,
  margin:30,
  responsive: {
    0: {
      items: 1
      
    },
    600: {
      items: 1
    },
    1000: {
      items: 4
    }
  }
});


$('.ourbusinessslider').on('initialized.owl.carousel changed.owl.carousel', function(e) {
  if (!e.namespace)  {
    return;
  }
  var carousel = e.relatedTarget;
  $('.slider-counter').text(carousel.relative(carousel.current()) + 1 + '/' + carousel.items().length);
}).owlCarousel({
  autoplay:false,
  items: 1,
  loop:false,
  touchDrag: true,
  mouseDrag: false,
  margin:5,
  nav:false,
  navText:"",
  smartSpeed: 1000,
  dots:false
});

$('.certificationSlider.owl-carousel').owlCarousel({
  autoplay: false,
  loop: false,
  dots:true,   
  nav: false,
  navText:"",
  touchDrag: true,
  mouseDrag: false,
  smartSpeed:3000,
  animateOut: 'fadeOut',
  margin:30,
  responsive: {
    0: {
      items: 1
    },
    600: {
      items: 1
    },
    1000: {
      items: 5
    }
  } 
});

$('.certificationSliderAbt.owl-carousel').owlCarousel({
  autoplay: true,
  loop: true,
  dots:false, 
  animateIn: 'flip',
  animateOut: 'flip',
  nav: false,
  navText:"",
  touchDrag: true,
  mouseDrag: false,
  smartSpeed: 0,
  responsive: {
    0: {
      items: 1
    },
    600: {
      items: 1
    },
    1000: {
      items: 1
    }
  } 
});


$('.digi-slider.owl-carousel').owlCarousel({
 autoplay: false,
 loop: false,
 dots:false,    
 nav: true,
 navText:"",
 touchDrag: true,
 mouseDrag: false,
 smartSpeed: 1000,
 margin:30,
 responsive: {
  0: {
   items: 1,
 },
 600: {
   items: 1,
   stagePadding: 50
 },
 1000: {
   items: 2,
   stagePadding:50
 }
}  
});

$('.adv-slider.owl-carousel').owlCarousel({
 autoplay: false,
 loop: false,
 dots:true,    
 nav: false,
 navText:"",
 touchDrag: true,
 mouseDrag: false,
 smartSpeed: 1000,
 margin:30,
 responsive: {
  0: {
   items: 2,
 },
 600: {
   items: 1,
   stagePadding: 50
 },
 1000: {
   items: 3,
   stagePadding:50
 }
}  
});


$('.awardslider.owl-carousel').owlCarousel({
  autoplay: false,
  loop: false,
  dots:true,   
  nav: false,
  navText:"",
  touchDrag: true,
  mouseDrag: false,
  smartSpeed: 2000,
  margin:30,
  responsive: {
    0: {
      items: 1
    },
    600: {
      items: 1
    },
    1000: {
      items: 2,
      stagePadding:50
    }
  } 
});


$('.panel-collapse').on('shown.bs.collapse', function (e) {
 var $panel = $(this).closest('.panel');
 $('html,body').animate({
   scrollTop: $panel.offset().top-80
 }, 500); 
});

/*
 * Replace all SVG images with inline SVG
 */
function collectMapSvg() {
  $('img.mapsvg').each(function(){
  //$('.'+cls).css({ fill: "#ff0000" });
    var $img = $(this);
    var imgID = $img.attr('id');
    var imgClass = $img.attr('class');
    var imgURL = $img.attr('src');

    $.get(imgURL, function(data) {
        // Get the SVG tag, ignore the rest
      var $svg = $(data).find('svg');

        // Add replaced image's ID to the new SVG
      if(typeof imgID !== 'undefined') {
       $svg = $svg.attr('id', imgID);
     }
        // Add replaced image's classes to the new SVG
     if(typeof imgClass !== 'undefined') {
       $svg = $svg.attr('class', imgClass+' replaced-svg');
     }

        // Remove any invalid XML tags as per http://validator.w3.org
     $svg = $svg.removeAttr('xmlns:a');

        // Check if the viewport is set, if the viewport is not set the SVG wont't scale.
     if(!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
       $svg.attr('viewBox', '0 0 ' + $svg.attr('height') + ' ' + $svg.attr('width'))
     }

        // Replace image with new SVG
     $img.replaceWith($svg);

   }, 'xml');

  });
}


$('.awardsSlider.owl-carousel').owlCarousel({
  autoplay: false,
  loop: false,
  dots:true,   
  nav: false,
  navText:"",
  touchDrag: true,
  mouseDrag: false,
  smartSpeed:3000,
  animateOut: 'fadeOut',
  margin:24,
  responsive: {
    0: {
      items: 1
    },
    600: {
      items: 1
    },
    1000: {
      items: 2
    }
  } 
});

