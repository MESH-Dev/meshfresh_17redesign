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
 

// var controller = new ScrollMagic.Controller();
var controller = new ScrollMagic.Controller({
    container: "#detail_scrollarea"
});

controller.scrollTo(function (newpos) {
	TweenMax.to("#detail_scrollarea", 0.5, {scrollTo: {y: newpos}});
});
 
var active_project = '';

var windowsize = $(window).width();

//NEXT PROJECT BUTTON
$(document).on('click', '#next_proj', function (e) {
	var next_id = $('.active-project').next('.detail_copy').attr('id');
	next_id = '#' + next_id + '-panels';
	if ($(next_id).length > 0) {
			e.preventDefault();

			// trigger scroll
			controller.scrollTo(next_id);

				// if supported by the browser we can even update the URL.
			// if (window.history && window.history.pushState) {
			// 	history.pushState("", document.title, next_id);
			// }
		}
});

//PREV PROJECT BUTTON
$(document).on('click', '#prev_proj', function (e) {
	var prev_id = $('.active-project').prev('.detail_copy').attr('id');
	prev_copy = '#' + prev_id;
	prev_id = '#' + prev_id + '-panels';
	if ($(prev_id).length > 0) {
		e.preventDefault();

		// trigger scroll
		controller.scrollTo(prev_id);

			// if supported by the browser we can even update the URL.
		// if (window.history && window.history.pushState) {
		// 	history.pushState("", document.title, prev_id);
		// }
	}
 

});




 


$(document).on('click', 'p#explore_text', function () {

	first_proj = $('#macy .work-block:first-child');
	var project_id = first_proj.attr('data-id');
	project_id  = project_id.trim();
	var project_color = first_proj.attr('data-color');
	var photos_id = '#'+project_id+'-panels';
	var proj_id = first_proj.attr('data-post-id');

	var title = first_proj.find('span').html();
 
	$('.detail-side-title p').html(title);

	$('#infobar').addClass("open");

	//loop through project images, put clicked on div at top, move other to bottom
	$('.project-wrap').each(function() {
			var div_id = $(this).attr('data-id'); 
			if(div_id ==  proj_id){
				//$('#detail_scrollarea').animate({ scrollTop: 0 }, "fast");
				return false;
			}
			else{
				$(this).insertAfter($('.project-wrap').last());
			}
	});

	var pid = '#'+project_id;


 
	$('#infobar').css('background-color',project_color);
 
	//ajax_load_projects('single',project_id);
	infoOpen();


	$('.project-wrap').each(function () {
 
		var current = $(this);
		var current_id = $(this).attr('id');
		var elem = '#'+current_id;
		var text_elem = elem.substring(0,elem.length - 7);
		var refElement = $(elem);
		text_elem = $(text_elem);
		var project_color = text_elem.attr('data-color');

		new ScrollMagic.Scene({
			triggerElement: elem,
			duration: 0,
			reverse: true,
			//triggerHook: "onEnter",
			offset: 400
		}).addTo(controller)
		.on("enter leave", function (e) {

			$('.detail_copy').removeClass("active-project");
			text_elem.addClass("active-project");
			$('#infobar').css('background-color',project_color);
			active_project = refElement;

			var new_title = $(text_elem).find('span').html();
			//console.log(new_title + "ll");
			$('.detail-side-title p').html(new_title);

		

		});
	});

	$('#detail_scrollarea').animate({ scrollTop: 0 }, "fast");
	$('.detail_copy').removeClass('active-project');
	$(pid).addClass('active-project');

 


});


 
 
$(document).on('click', '.work-block', function () {
	var project_id = $(this).attr('data-id');
	project_id  = project_id.trim();
	var project_color = $(this).attr('data-color');
	var photos_id = '#'+project_id+'-panels';
	var proj_id = $(this).attr('data-post-id');

	var title = $(this).find('span').html();
 
	$('.detail-side-title p').html(title);

	$('#infobar').addClass("open");

	//loop through project images, put clicked on div at top, move other to bottom
	$('.project-wrap').each(function() {
			var div_id = $(this).attr('data-id'); 
			if(div_id ==  proj_id){
				//$('#detail_scrollarea').animate({ scrollTop: 0 }, "fast");
				return false;
			}
			else{
				$(this).insertAfter($('.project-wrap').last());
			}
	});

	var pid = '#'+project_id;


 
	$('#infobar').css('background-color',project_color);

	infoOpen();


 

	$('.project-wrap').each(function () {
 
		var current = $(this);
		var current_id = $(this).attr('id');
		var elem = '#'+current_id;
		var text_elem = elem.substring(0,elem.length - 7);
		var refElement = $(elem);
		text_elem = $(text_elem);
		var project_color = text_elem.attr('data-color');

		new ScrollMagic.Scene({
			triggerElement: elem,
			duration: 0,
			reverse: true,
			//triggerHook: "onEnter",
			offset: -100
		}).addTo(controller)
		.on("enter leave", function (e) {

			$('.detail_copy').removeClass("active-project");
			text_elem.addClass("active-project");
			$('#infobar').css('background-color',project_color);
			active_project = refElement;

			var new_title = $(text_elem).find('span').html();
			//console.log(new_title + "ll");
			$('.detail-side-title p').html(new_title);

		

		});
	});

	$('#detail_scrollarea').animate({ scrollTop: 0 }, "fast");
	$('.detail_copy').removeClass('active-project');
	$(pid).addClass('active-project');


});


if (windowsize < 751) {
	$('.detail-side-title p').click(function(e) {
		e.preventDefault();
 		fullScreenExitTrigger();
	});

	$(document).on('click', '.project-wrap img', function (e) {
		e.preventDefault();
		fullScreenTrigger();
	});

}

	

$('#fullscreen_exit').click(function(e) {
	e.preventDefault();
	fullScreenExitTrigger();
});

$('#fullscreen').click(function(e) {
	e.preventDefault();
	fullScreenTrigger();
});

$('#detail_exit').click(function(e) {
	e.preventDefault();
	infoClose(e);
	// $('#infobar').removeClass("open");
});


 
 
$(window).resize(function() {
  windowsize = $(window).width();
  if (windowsize < 751) {
	$('.detail-side-title p').click(function(e) {
		e.preventDefault();
 		fullScreenExitTrigger();
	});

	$(document).on('click', '.project-wrap img', function (e) {
		e.preventDefault();
		fullScreenTrigger();
	});
  }
});

  

//Variable definitions
var detailView = new TimelineMax(),
	mobileDetailView = new TimelineMax(),
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
}
//Detail View Expand function calls
 

 
//Fullscreen Definition ------
fullscreen_open.add("start")
    .paused(true)
    .to("#detail_scrollarea", 0.4, {css:{width:"98%"}}, "start")
    .to("#infobar", 0.4, {css:{left: "auto", right:"100%", marginRight:"-40px"}}, "start")
    .to("#fullscreen", 0.4, {css:{autoAlpha:0}}, "start")
    .to(".detail_nav", 0.4, {css:{autoAlpha:0}}, "start")
    .to("#fullscreen_exit", 0.4, {css:{autoAlpha:1}}, "start")
    .to(".detail-side-title p", 0.4, {css:{autoAlpha:1}}, "start")
    .add("end");

fullscreen_close.add("start")
    .paused(true)
    .to("#detail_scrollarea", 0.4, {css:{width:"67%"}}, "start")
    .to("#infobar", 0.4, {css:{right:"auto", left:"0",marginRight:"0px"}}, "start")
    .to(".detail_nav", 0.4, {css:{autoAlpha:1}}, "start")
    .to("#fullscreen_exit", 0.4, {css:{autoAlpha:0}}, "start")
    .to("#fullscreen", 0.4, {css:{autoAlpha:1}}, "start")
    .to(".detail-side-title p", 0.4, {css:{autoAlpha:0}}, "start")
    .add("end");
//Fullscreen Definition

//Fullscreen Trigger Definitions
function fullScreenTrigger(){
    fullscreen_open.play();
	//$('.detail-side-title p' ).fadeIn();
}

function fullScreenExitTrigger(){
    fullscreen_open.reverse();
    //$('.detail-side-title p' ).fadeOut();
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
    .to("#back_tip", 0.3, {css:{autoAlpha:1, left:"130px"}, ease:Power2.easeInOut}, "start")
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


var go_to = getQueryVariable('p');
console.log(go_to);
if(go_to != ''){
	var go_to_str = ".work-block[data-id='"+go_to+"']";
	$(go_to_str).trigger('click');
}





function getQueryVariable(variable)
{
       var query = window.location.search.substring(1);
       var vars = query.split("&");
       for (var i=0;i<vars.length;i++) {
               var pair = vars[i].split("=");
               if(pair[0] == variable){return pair[1];}
       }
       return(false);
}


}); //end jquery doc ready

