/**
 * jQuery Unveil
 * A very lightweight jQuery plugin to lazy load images
 * http://luis-almeida.github.com/unveil
 *
 * Licensed under the MIT license.
 * Copyright 2013 Luís Almeida
 * https://github.com/luis-almeida
 */

;(function($) {

  $.fn.unveil = function(threshold, callback) {

    var $w = $(window),
        th = threshold || 0,
        retina = window.devicePixelRatio > 1,
        attrib = retina? "data-src-retina" : "data-src",
        images = this,
        $w = $('#detail_scrollarea'),
        loaded;

    this.one("unveil", function() {
      var source = this.getAttribute(attrib);
      source = source || this.getAttribute("data-src");
      if (source) {
        this.setAttribute("src", source);
        if (typeof callback === "function") callback.call(this);
      }
    });

    function unveil() {
      var inview = images.filter(function() {
        var $e = $(this);
        if ($e.is(":hidden")) return;

        var wt = $w.scrollTop(),
            wb = wt + $w.height(),
            et = $e.offset().top,
            eb = et + $e.height();

        return eb >= wt - th && et <= wb + th;
      });

      loaded = inview.trigger("unveil");
      images = images.not(loaded);
    }

    $w.on("scroll.unveil resize.unveil lookup.unveil", unveil);

    unveil();

    return this;

  };

})(window.jQuery || window.Zepto);

jQuery(document).ready(function($){

	$("#project-panels img").unveil(200);
 
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
	// setTimeout(function(){
	// 	//Blogroll
	// 	$blogMasn = $('#posts-masn').masonry({
	// 		//columnWidth: 460,
	// 		itemSelector: '.blog-entry',
	// 		gutter: 20
	// 	});

	// 	//Advocate
	// 	$advMasn = $('#adv-mason').masonry({
	// 		//columnWidth: 226,
	// 		itemSelector: '.adv-entry',
	// 		gutter: 10
	// 	});

	// 	// $wknewMasn = $('.work-grid').masonry({
	// 	// 	//columnWidth: 226,
	// 	// 	itemSelector: '.work-block',
	// 	// 	columnWidth: '.columns-4',
 //  // 			percentPosition: true,
	// 	// 	gutter: '.column-gutter',
	// 	// });

	// 	//People
	// 	$peopleMasn = $('#people-masn').masonry({
	// 		//columnWidth: 460,
	// 		itemSelector: '.people-entry',
	// 		gutter: 18
	// 	});
	// 	$('.people-entry').click(function(e){
	// 		if($(this).hasClass('active')){
	// 			$('.people-entry').removeClass('active');
	// 			$peopleMasn.masonry();
	// 		}else{
	// 			$('.people-entry').removeClass('active');
	// 			$(this).addClass('active');
	// 			$peopleMasn.masonry();
	// 		}
	// 	});
	// }, 400);

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

    // $('body').mousemove(function(e) {

    //     // moving right 

    //  //    if(wWidth > 550){
	   //  //     if (e.pageX < mX) {
	   //  //         $('.badge-left').stop().fadeOut('250');
	   //  //         $('.badge-right').stop().fadeIn('250');

	   //  //     // moving left
	   //  //     } else {
	   //  //         $('.badge-left').stop().fadeIn('250');
	   //  //         $('.badge-right').stop().fadeOut('250');
	   //  //     }
    // 	// }
    //  //    // set new mX after doing test above
    //  //    mX = e.pageX;

    // });


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
    autoplaySpeed:3000,
    pauseOnFocus:true,
    pauseOnHover:true,
})			

Macy.init({
    container: '#macy',
    trueOrder: true,
    waitForImages: false,
    margin: 15,
    columns: 3,
    breakAt: {
        //1200: ,
        950: 2,
        520: 1,
        //400: 1
    }
 //    function(){
	// 	$('#macy .work-block').removeClass('columns-4');
	// 	alert('Macy Running');
	// }

	// Macy.onImageLoad(function () {
	// 	$('#macy .work-block').removeClass('columns-4');
	// 	alert('Macy Running');
	// }
});

Macy.onImageLoad(function () {
	$('#macy .work-block').removeClass('columns-4');
	$('#macy.blogroll-grid .blog-entry').addClass('macy-box');
	$('#macy.people-grid .people-entry').addClass('macy-box');
  // console.log('Every time an image loads I get fired');
  // Macy.recalculate();
});

//Potential header functionality on grid landing pages
$(function(){
    var lastScrollTop = 0, delta = 5;
    $(window).scroll(function(event){

       var st = $(this).scrollTop();
       var page_top = $('.fullwidth').offset().top;
	    var fullwidth_top = $('.fullwidth').scrollTop();
	    var window_top = $(window).scrollTop();
       
       if(Math.abs(lastScrollTop - st) <= delta)
          return;
       
		if(window_top > page_top-50) {
			$('.nav-wrap').css({
				'position':'fixed'
			});

			if (st > lastScrollTop ){
			   // downscroll code
			   //console.log('scroll down');
			   //console.log(lastScrollTop + " " + st);
			   $('.nav-bg').stop().slideUp(50);
			} else {
			  // upscroll code
			  //console.log('scroll up');
			  $('.nav-bg').slideDown(50);
			}
		}else{
			$('.nav-wrap').css({
				"position":'absolute'
			});
			$('.nav-bg').stop().slideUp(0);
		}	
       lastScrollTop = st;
    });
});

/*PROJECTS PAGE AJAX FUNCTIONS--------------------------------------------------------
--------------------------------------------------------------------------------------------------------------	
--------------------------------------------------------------------------------------------------------------
*/


$(document).on('click', '#load-next', function () {
	ajax_load_projects('next','');
});

 

$(document).on('click', '.work-block', function () {
	var project_id = $(this).attr('data-id');
	project_id  = project_id.trim();
	var project_color = $(this).attr('data-color');
	var photos_id = '#'+project_id+'-panels';
	console.log(photos_id);

	var offset_y = $(photos_id).offset().top;
	console.log(offset_y);

	//Add fixed positioning class="fixed" to header when a project is clicked
	$('header').removeClass('absolute').addClass('fixed');

	$('#detail_scrollarea').animate({
              scrollTop: offset_y
            }, 1000);

	var pid = '#'+project_id;

	$('.detail_copy').removeClass('active-project');
	$(pid).addClass('active-project');



	//$('#project-panels').html('');
	//$('#sidebar-content').html('');

	$('#infobar').css('background-color',project_color);
 
	//ajax_load_projects('single',project_id);
	infoOpen();
});


$(document).on('click', '#load-prev', function () {
	ajax_load_projects('prev','');
});


var loaded = [];



//Fucntion to load in post
//to_load = 'next' , 'prev', 'both'
function ajax_load_projects(to_load, single_id){
 
	//get current active/visible project
	
 

 
	//back to beginning
	// if(single_id == initial_proj){
	// 	return;
	// }

	console.log("loaded = " + loaded);

	console.log("location = " + loaded.indexOf(single_id));



	//project has already been loaded
	// if( single_id in loaded ){
	// 	return;
	// }
 
	var is_loading = false;
  
	if (is_loading == false){
		is_loading = true;
		//$('.loader.fadeIn(200);

		var data = {
			action: 'load_project',  //Our function from function.php
 
			to_load: to_load,
			single_id: single_id,
			dataType: 'json'
		};
 
		jQuery.post(ajaxurl, data, function(response) {

			if(response !== 0){

				var data = JSON.parse(response);
					//data[0] = next project images
					//data[1] = next project text
 
				 
				//$('.loader').fadeOut(1000);
				$('#project-panels').append(data[0]);
				$('#sidebar-content').append(data[1]);
				//$('#project-panels').prepend(data[2]);
				//$('#sidebar-content').prepend(data[3]);

				loaded.push(single_id);

				//kill controller
				scrollarea = null;
				scrollarea = new ScrollMagic.Controller();

				var scrollarea = new ScrollMagic.Controller({
					container: "#detail_scrollarea"
				});

				//add new projects to controller
				$('.project-wrap').each(function () {
					var newProject = this;

					var scene = new ScrollMagic.Scene({ triggerElement: newProject, duration: 100, offset: 0 })
						//when project is in view - 
						.on('start', function () {
							//console.log(this.triggerElement().id);
							var active_id = this.triggerElement().id;
							var active = '#' + active_id;

							//console.log(active);


							active = active.substring(0, active.length - 7);

							//$('#sidebar-content .flex-content').fadeOut();
							//$(active).fadeIn();

						}).addTo(scrollarea);
				});
				//ajax_load_projects('next','');
 

				is_loading = false;
			}
			else{
				//$('.loader').hide();
				is_loading = false;
			}
		});

    }

} //End Ajax_load_project Function


// $('#detail_scrollarea').on("scroll", function (e) {
// 	e.preventDefault();
 
// 	var last_id = $('#project-panels:last-child').children('.project-wrap').last().attr('data-id');
	

	
// 	//ajax_load_projects('next',last_id);

// 	var scroll = $('#detail_scrollarea').scrollTop();
// 	var div_height = $('#project-panels').height();
// 	var window_height = $(window).height();

// 	console.log(scroll);
// 	console.log("/// "+ div_height);



// 	if ((scroll + window_height)  >= div_height - 300) {
// 		//ajax_load_projects('next',last_id);
// 		console.log("loaded: project after: " + last_id );
//    }
// });






 


}); //end jquery doc ready



//Variable definitions
var detailView = new TimelineMax(),
    //project_2_transition = new TimelineMax(),
    //project_3_transition = new TimelineMax(),
    project_scroll = new TimelineMax(),
    fullscreen_open = new TimelineMax(),
    fullscreen_close = new TimelineMax(),
    tooltip_next = new TimelineMax(),
    tooltip_prev = new TimelineMax(),
    tooltip_close = new TimelineMax(),
    tooltip_back = new TimelineMax(),
    tooltip_fs = new TimelineMax();


var scrollarea = new ScrollMagic.Controller({
    container: "#detail_scrollarea"
});



//Detail View Expand definition: defines GSAP timeline for detail view expansion animation
detailView.paused(true)
    .add("closed")
    .to("#infobar", 0.8, {css:{left:"0px"}, ease:Elastic.easeInOut.config(0.55, 0.7)})
    .to("#explore_text", 0.5, {autoAlpha:0}, "closed")
    .to("#gallery_cover", 0.4, {autoAlpha:1}, "closed")
    .to("body", 0.1, {css:{overflow:"hidden"}}, "closed")
    .to("#detail_scrollarea", 0.4, {autoAlpha:1})
    .to("#detail_exit", 0.25, {autoAlpha:1, delay:0.6}, "closed")
    .to(".detail_nav", 0.25, {autoAlpha:1, delay:0.65}, "closed")
    //.to("#copy_1", 0.25, {css:{left:"0px", autoAlpha:1}, delay:0.7}, "closed")//make this #current_copy (copy in view)
    .to("#infobar", 0.1, {css:{cursor:"default"}}, "closed")
    .add("open");
//Detail View Expand definition


//Detail View Expand function calls
function infoOpen(){
    detailView.play();
}

function infoClose(event){
    event.stopPropagation();
    detailView.reverse();
    $('header').removeClass('fixed').addClass('absolute');
}
//Detail View Expand function calls


//Project Transition definitions: defines GSAP actions transitioning between projects
// project_2_transition.add("start")
//     .to("#infobar", 1, {backgroundColor:"#CC8B86"}) //Once dynamic selectors are finalized, make this a single function that chooses from an array of colors based on project?
//     .to("#copy_1", 1, {css:{left:"20px", autoAlpha:0}}, "start")
//     .to("#copy_2", 1, {css:{left:"0px", autoAlpha:1}})
//     .add("end");

// project_3_transition.add("start")
//     .to("#infobar", 1, {backgroundColor:"#7C2B2D"})
//     .to("#copy_2", 1, {css:{left:"20px", autoAlpha:0}}, "start")
//     .to("#copy_3", 1, {css:{left:"0px", autoAlpha:1}})
//     .add("end");
//Project Transition definitions


//Project Trigger definitions: defines scroll triggers for project transitions
// var project_2_trigger = new ScrollMagic.Scene({
//     triggerHook: "onEnter",
//     reverse: true,
//     triggerElement: '#img3',
//     duration: 450,
//     offset: 140
// })
//     .setTween(project_2_transition)
//     .addTo(scrollarea);

// var project_3_trigger = new ScrollMagic.Scene({
//     triggerHook: "onEnter",
//     reverse: true,
//     triggerElement: '#img6',
//     duration: 450,
//     offset: 140
// })
//     .setTween(project_3_transition)
//     .addTo(scrollarea);
//Project Trigger definitions


//Scroll Button definition
// project_next.add("start")
//     .paused(true)
//     .to("#detail_scrollarea", 1, {scrollTo:"#img3", ease:Power2.easeInOut})//Redefine for dynamic selectors, ex."scroll to first image of '.next_proj' from '.active_proj'"
//     .add("end");
//Scroll Button definition


//Scroll Button function calls
// function nextScroll(){
//     project_scroll.play();
// }

// function prevScroll(){
//     project_scroll.reverse();
// }
//Scroll Button function calls




//Fullscreen Definition ------
fullscreen_open.add("start")
    .paused(true)
    .to("#detail_scrollarea", 0.4, {css:{width:"97%"}}, "start")
    .to("#infobar", 0.4, {css:{left:"auto", right:"97%"}}, "start")
    .to("#fullscreen", 0.4, {css:{autoAlpha:0}}, "start")
    .to("#fullscreen_exit", 0.4, {css:{autoAlpha:1}}, "start")
    //.to("#copy_1", 0.4, {css:{autoAlpha:0}}, "start")//make this #current_copy
   //.to("#fs_title1", 0.4, {css:{autoAlpha:1}}, "start")
    .add("end");

fullscreen_close.add("start")
    .paused(true)
    .to("#detail_scrollarea", 0.4, {css:{width:"67%"}}, "start")
    .to("#infobar", 0.4, {css:{right:"auto", left:"0px"}}, "start")
    .to("#fullscreen_exit", 0.4, {css:{autoAlpha:0}}, "start")
    .to("#fullscreen", 0.4, {css:{autoAlpha:1}}, "start")
    .add("end");
//Fullscreen Definition

//Fullscreen Trigger Definitions
function fullScreenTrigger(){
    fullscreen_open.play()
}

function fullScreenExitTrigger(){
    fullscreen_open.reverse()
}
//Fullscreen Trigger





//Tooltip Show/Hide Definitions
tooltip_fs.add("start")
    .paused(true)
    .to("#fs_tip", 0.3, {css:{autoAlpha:1, right:"100px"}, ease:Power2.easeInOut}, "start")
    .add("end");

tooltip_close.add("start")
    .paused(true)
    .to("#fs_close_tip", 0.3, {css:{autoAlpha:1, right:"100px"}, ease:Power2.easeInOut}, "start")
    .add("end");

tooltip_next.add("start")
    .paused(true)
    .to("#next_tip", 0.3, {css:{autoAlpha:1, left:"40px"}, ease:Power2.easeInOut}, "start")
    .add("end");

tooltip_prev.add("start")
    .paused(true)
    .to("#prev_tip", 0.3, {css:{autoAlpha:1, left:"40px"}, ease:Power2.easeInOut}, "start")
    .add("end");

tooltip_back.add("start")
    .paused(true)
    .to("#back_tip", 0.3, {css:{autoAlpha:1, left:"110px"}, ease:Power2.easeInOut}, "start")
    .add("end");
//Tooltip Show/Hide Definitions

//Tooltip Trigger Definitions
var fs_tip_trigger = document.getElementById('fullscreen'),
    fs_close_tip_trigger = document.getElementById('fullscreen_exit'),
    next_tip_trigger = document.getElementById('next_arrow'),
    prev_tip_trigger = document.getElementById('prev_arrow'),
    back_tip_trigger = document.getElementById('detail_exit');

fs_tip_trigger.onmouseover = showTooltipLeft;
fs_tip_trigger.onmouseout = hideTooltipLeft;
fs_close_tip_trigger.onmouseover = showTooltipClose;
fs_close_tip_trigger.onmouseout = hideTooltipClose;
next_tip_trigger.onmouseover = showTooltipNext;
next_tip_trigger.onmouseout = hideTooltipNext;
prev_tip_trigger.onmouseover = showTooltipPrev;
prev_tip_trigger.onmouseout = hideTooltipPrev;

back_tip_trigger.onmouseover = showTooltipBack;
back_tip_trigger.onmouseout = hideTooltipBack;

function showTooltipLeft(){
    tooltip_fs.play()
}
function hideTooltipLeft(){
    tooltip_fs.reverse()
}
function showTooltipNext(){
    tooltip_next.play()
}
function hideTooltipNext(){
    tooltip_next.reverse()
}
function showTooltipPrev(){
    tooltip_prev.play()
}
function hideTooltipPrev(){
    tooltip_prev.reverse()
}
function showTooltipClose(){
    tooltip_close.play()
}
function hideTooltipClose(){
    tooltip_close.reverse()
}
function showTooltipBack(){
    tooltip_back.play()
}
function hideTooltipBack(){
    tooltip_back.reverse()
}
//Tooltip Trigger Definitions
//});
//=================================
