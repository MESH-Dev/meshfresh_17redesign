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
	$('li.sayhello').click(function(e){
		e.preventDefault();
		$('#sayHello').toggleClass('active');
	});
	$('#sayHello').hover(function(e){
		if($timer){
			clearTimeout($timer);
		}
	},function(e){
		$timer = setTimeout(function(){
			$('#sayHello').removeClass('active');
		}, 250);
	});

	//Mobile
	$('#menuTrigger').click(function(ev){
		$('#siteWrap').addClass('active');
		$('#mobileMenu').addClass('active');
		$('body').addClass('noscroll');
		$('#siteWrap').width($('#siteWrap').width);
		document.ontouchmove = function(event){
			event.preventDefault();
		}
	});
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
    $('body').mousemove(function(e) {

        // moving right 
        if (e.pageX < mX) {
            $('.badge-left').stop();//.fadeOut('250');
            $('.badge-right').stop();//.fadeOut('250');

        // moving left
        } else {
            $('.badge-left').stop();//.fadeOut('250');
            $('.badge-right').stop();//.fadeOut('250');
        }

        // set new mX after doing test above
        mX = e.pageX;

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



// $(".typed-content").typed({
// 		strings: ["brands,", "websites,", "print works,", "digital media,", "objects,", "and other fun stuff"],
//         //strings: ["First sentence.", "Second sentence."],
//         typeSpeed: 0,
//         contentType: 'html',
//         backspace: function(curString, curStrPos){

// 	    setTimeout(function() {

// 	            // check string array position
// 	            // on the first string, only delete one word
// 	            // the stopNum actually represents the amount of chars to
// 	            // keep in the current string. In my case it's 3.
// 	            if (self.arrayPos == 1){
// 	                self.stopNum = 3;
// 	            }
// 	            //every other time, delete the whole typed string
// 	            else{
// 	                self.stopNum = 0;
// 	            }
//         //stringsElement: $('#typed_string')
//       });


// $(".start").typed({
//             strings: ["MESH is your full service"],
//             typeSpeed: 30, // typing speed
//             backDelay: 999, // pause before backspacing
//             loop: false, // loop on or off (true or false)
//             loopCount: 1, // number of loops, false = infinite
//             cursorChar: "",
//             callback: function(){ } // call function after typing is done
//         });

// setTimeout(function(){
// $(".design").typed({
//             strings: ["design", "communication design"],
//             typeSpeed: 30, // typing speed
//             startDelay: 100,
//             backDelay: 999, // pause before backspacing
//             loop: true, // loop on or off (true or false)
//             loopCount: 1, // number of loops, false = infinite
//             cursorChar: "",
//             callback: function(){ } // call function after typing is done
//         });
//    }, 2000);

// setTimeout(function(){
// $(".make").typed({
//             strings: ["studio. We make"],
//             typeSpeed: 30, // typing speed
//             backDelay: 999, // pause before backspacing
//             loop: true, // loop on or off (true or false)
//             loopCount: 1, // number of loops, false = infinite
//             cursorChar: "",
//             callback: function(){ } // call function after typing is done
//         });
//  }, 6000);
// setTimeout(function(){
//         $(".typed-content-0").typed({
//             strings: ["brands,"],
//             typeSpeed: 30, // typing speed
//             backDelay: 750, // pause before backspacing
//             loop: false, // loop on or off (true or false)
//             loopCount: false, // number of loops, false = infinite
//             cursorChar: "",
//             callback: function(){ } // call function after typing is done
//         });
//     }, 8000);

// setTimeout(function(){
//         //$(".typed-content-1").css("display", "inherit");
//         $(".typed-content-1").typed({
//             strings: ["websites,"],
//             typeSpeed: 30, // typing speed
//             backDelay: 750, // pause before backspacing
//             loop: false, // loop on or off (true or false)
//             loopCount: false, // number of loops, false = infinite
//             cursorChar: "",
//             callback: function(){ } // call function after typing is done
//         });
//     }, 10000);

// setTimeout(function(){
//         //$(".typed-content-2").css("display", "inherit");
//         $(".typed-content-2").typed({
//             strings: ["print works,"],
//             typeSpeed: 30, // typing speed
//             backDelay: 750, // pause before backspacing
//             loop: false, // loop on or off (true or false)
//             loopCount: false, // number of loops, false = infinite
//             cursorChar: "",
//             callback: function(){ } // call function after typing is done
//         });
//     }, 12000);

// setTimeout(function(){
//         //$("typed-content-3").css("display", "inherit");
//         $(".typed-content-3").typed({
//             strings: [" digital media,"],
//             typeSpeed: 30, // typing speed
//             backDelay: 750, // pause before backspacing
//             loop: false, // loop on or off (true or false)
//             loopCount: false,
//             cursorChar: "", // number of loops, false = infinite
//             callback: function(){ } // call function after typing is done
//         });
//     }, 14000);

// setTimeout(function(){
//         //$(".element4").css("display", "inherit");
//         $(".typed-content-4").typed({
//             strings: [" objects,"],
//             typeSpeed: 30, // typing speed
//             backDelay: 750, // pause before backspacing
//             loop: false, // loop on or off (true or false)
//             loopCount: false,
//             cursorChar: "", // number of loops, false = infinite
//             callback: function(){ } // call function after typing is done
//         });
//     }, 16000);

// setTimeout(function(){
//         //$(".element4").css("display", "inherit");
//         $(".typed-content-5").typed({
//             strings: [" and other fun stuff "],
//             typeSpeed: 30, // typing speed
//             backDelay: 750, // pause before backspacing
//             loop: false, // loop on or off (true or false)
//             loopCount: false,
//             cursorChar: "", // number of loops, false = infinite
//             callback: function(){ } // call function after typing is done
//         });
//     }, 18000);

// setTimeout(function(){
//         //$(".element4").css("display", "inherit");
//         $(".end").typed({
//             strings: [" to share your good ideas. "],
//             typeSpeed: 30, // typing speed
//             backDelay: 750, // pause before backspacing
//             loop: false, // loop on or off (true or false)
//             loopCount: false,
//             cursorChar: "", // number of loops, false = infinite
//             callback: function(){ } // call function after typing is done
//         });
//     }, 20000);

//$(".work-grid").justifiedGallery();

Macy.init({
            container: '#macy',
            trueOrder: true,
            waitForImages: true,
            margin: 40,
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