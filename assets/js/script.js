jQuery(document).ready(function($){
 
	//Work Filter
	$('ul#filters li').click(function(){
		$filter = $(this).attr('data-filter');
		$('ul#filters li').removeClass('active');
		$(this).addClass('active');
		$('#works .work-entry').removeClass('hide');
		$('#works .work-entry').each(function(){
			if($(this).hasClass($filter) == false){
				$(this).addClass('hide');
			}
		});
	});

	//Masonry
	setTimeout(function(){
		//Blogroll
		$blogMasn = $('#posts-masn').masonry({
			//columnWidth: 460,
			itemSelector: '.blog-entry',
			gutter: 20
		});

		//Advocate
		$advMasn = $('#adv-mason').masonry({
			//columnWidth: 226,
			itemSelector: '.adv-entry',
			gutter: 10
		});

		// $wknewMasn = $('.work-grid').masonry({
		// 	//columnWidth: 226,
		// 	itemSelector: '.work-block',
		// 	columnWidth: '.columns-4',
  // 			percentPosition: true,
		// 	gutter: '.column-gutter',
		// });

		//People
		$peopleMasn = $('#people-masn').masonry({
			//columnWidth: 460,
			itemSelector: '.people-entry',
			gutter: 18
		});
		$('.people-entry').click(function(e){
			if($(this).hasClass('active')){
				$('.people-entry').removeClass('active');
				$peopleMasn.masonry();
			}else{
				$('.people-entry').removeClass('active');
				$(this).addClass('active');
				$peopleMasn.masonry();
			}
		});
	}, 400);

	//Say Hello
	// $('li.sayhello').click(function(e){
	// 	e.preventDefault();
	// 	$('#sayHello').toggleClass('active');
	// });
	// $('#sayHello').hover(function(e){
	// 	if($timer){
	// 		clearTimeout($timer);
	// 	}
	// },function(e){
	// 	$timer = setTimeout(function(){
	// 		$('#sayHello').removeClass('active');
	// 	}, 250);
	// });

	//Mobile
	// $('#menuTrigger').click(function(ev){
	// 	$('#siteWrap').addClass('active');
	// 	$('#mobileMenu').addClass('active');
	// 	$('body').addClass('noscroll');
	// 	$('#siteWrap').width($('#siteWrap').width);
	// 	document.ontouchmove = function(event){
	// 		event.preventDefault();
	// 	}
	// });


	$(document).hammer({swipe_velocity:0.3}).on('dragleft dragright swipeleft swiperight',function(ev){
		ev.gesture.preventDefault();
		if(ev.type == 'dragleft' || ev.type == 'dragright' || ev.type == 'swiperight') {return;}

		$('#siteWrap').removeClass('active');
		$('#mobileMenu').removeClass('active');
		$('body').removeClass('active');
		$('#siteWrap').width('100%');
		document.ontouchmove = function(event){
			return true;
		}
	});
	$('body.noscroll').bind("touchmove", {}, function(event){
	  event.preventDefault();
	});


	$('.home-title').hover(function(){
		$(this).find('.emoticon').text(';)');
	},function(){
		$(this).find('.emoticon').text(':)');
	})

	function centerGreeting(){
		var hgH = $('.home_greeting').height();
		console.log(hgH);
		var calcH = -(hgH/2);

		$('#home .content').css({"margin-top":calcH});
	}
	
 
    $(".twenty20").twentytwenty();
    var handler = $('.twentytwenty-handle');


    var mX = 0;
    var wWidth = $(window).width();

    //Resize?

    $('body').mousemove(function(e) {

        // moving right 

     //    if(wWidth > 550){
	    //     if (e.pageX < mX) {
	    //         $('.badge-left').stop().fadeOut('250');
	    //         $('.badge-right').stop().fadeIn('250');

	    //     // moving left
	    //     } else {
	    //         $('.badge-left').stop().fadeIn('250');
	    //         $('.badge-right').stop().fadeOut('250');
	    //     }
    	// }
     //    // set new mX after doing test above
     //    mX = e.pageX;

    });


// $(document).mousemove(function (e) {
//         handler.offset({ top: e.pageY, left: e.pageX });
//     }).click(function () {
//         $(this).unbind("mousemove");
//     });



// $(document).mousemove(function(e) {
//     handler.offset({
//         left: e.pageX,
//         top: e.pageY + 20

//     });
   
// });

var sh_ctr = 0;

$('.say-hello').click(function(){
sh_ctr ++

	if(sh_ctr == 1){
		$('#sayHello').slideDown(200);
	}else{
		$('#sayHello').slideUp(200);
		sh_ctr = 0;
	}
	
});

//Sidr funcitonality
$('.sidr-trigger').sidr({
      name: 'sidr-main',
      source: '.sidr-nav, #sayHello .row',
      renaming: false,
      side: 'left',
      displace: false,
  //     onOpen:function(){
  //     	$('.sidr ul.menu li a').click(function(){
		// 	$('.sidr ul li').removeClass('clicked')
		// 	$(this).parent().addClass('clicked');
		// })
  //     }
  });

 $('.sidr-close').click(
    function(){
      $.sidr('close', 'sidr-main');
       //console.log("Sidr should be closed");
    });


 //Slick slider for quotes
 var $slider = $(".slider").slick({
    autoplay: true,
    autoplaySpeed:7000,
    pauseOnFocus:true,
    pauseOnHover:true,
})			

Macy.init({
    container: '#macy',
    trueOrder: true,
    waitForImages: true,
    margin: 15,
    columns: 3,
    breakAt: {
        //1200: ,
        950: 2,
        520: 1,
        //400: 1
    },
    function(){
		$('.macy .work-block').removeClass('columns-4');
	}
});

});