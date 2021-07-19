/**
 * @file
 * Add theme-related local scripts here.
 *
 */
 
var jsheartbeat = 7000;

(function ($) {
  $(window).scroll(function() {
    //makeSticky($('#oer-search'),'sticky-mobile');
  });
  
  $(document).ready(function(){ 
    
    // Mark first and last slides.
    
    makeSlider($('#portal-call-out_section .custom-html-widget'));
    
    
    var splash = $('body.front #splash');
    
    // set frontpage splash to full screen
    
    if (splash.length > 0) {
      splash.height($(window).height());
    }
    	
	//mobile menu
	$('#show-mobile-menu').click(function(){
      $('#mobile-nav-block').show();
    });
    $('#close-mobile-menu').click(function(){
      $('#mobile-nav-block').hide();
    });
        
    //social menu
    $('.social-btn img').mouseover(function(){
      var src=$(this).attr('src');
      hoversrc=src.replace('-dark','-black');
      $(this).attr('src',hoversrc);
    });
    $('.social-btn img').mouseout(function(){
      var hoversrc=$(this).attr('src');
      src=hoversrc.replace('-black','-dark');
      $(this).attr('src',src);
    });
    
    //testimonial portrait credit rollover
    $('.testimonial_portrait').hover(function(){
      var creditvisibility=$(this).find('span').css('visibility');
      //use visibility not toggle, so layout is stable.
      if (creditvisibility=='hidden'){
        $(this).find('span').css('visibility','visible');
      }else{
        $(this).find('span').css('visibility','hidden');
      }
    });
    
    //default page figure credit rollover
    $('figure img').mouseenter(function(){
		$(this).siblings('figcaption').show();
	});
	$('figure img').mouseleave(function(){
		$(this).siblings('figcaption').hide();
	});
	
    //Review interactions
	if($('#review').length>0){ 
      $('.criterion-text').hide();
      $('.criterion-showanswer img').removeClass('up-arrow').addClass('down-arrow');
      $('.answeraction').text('show');
      $('.criterion-detail:first-of-type').find('.criterion-text').show();
      $('.criterion-detail:first-of-type').find('.criterion-showanswer .resourceicon img').removeClass('down-arrow').addClass('up-arrow');
      $('.criterion-detail:first-of-type').find('.answeraction').text('hide');
	}
  });
  
  
  /*
  
  function makeSticky(element) {
    
    var sclass = typeof arguments[1] !== "undefined" ? arguments[1] : "sticky";
    
    var itemOffset = element.offset();
        
    if (window.pageYOffset >= itemOffset.top) {
      element.addClass(sclass);
    } else {
      element.removeClass(sclass);
    }
    
  }
  
  */
  
  function makeSlider(wrapper) {
    var coslides = wrapper.children();
    coslides.first().addClass('first');
    coslides.last().addClass('last');
    
    var i=0; 
    var maxheight = 0;
    
    // Find maximum height of hidden elements.
    // Items must display as blocks but have their visibility hidden
    // for height() to work.
    
    coslides.each(function(){
      $(this).attr('data-slide-number',i);
      i++;
            
      $(this).css('visibility','hidden');
      $(this).css('display','block');
                  
      if ($(this).height() > maxheight) {
        maxheight = $(this).height();
      }
      
      $(this).css('visibility','');
      $(this).hide();
    });
    
    coslides.height(maxheight);
    coslides.first().show();
    
    // Intialize the slide animation
    
    wrapper.ready(function(){
        var current = 0;
      
        setInterval(function () {
          var active = coslides.eq(current);
          var next = active.hasClass('last') ? wrapper.find('.first') : coslides.eq(current+1);
          current = next.data('slide-number');
          
          active.fadeOut(1000,'linear',function(){
            next.fadeIn(2000,'linear',function(){
            });        
          });
        }, jsheartbeat);
      });
  }
  
  
 }(jQuery));