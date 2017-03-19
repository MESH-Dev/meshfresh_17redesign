jQuery(window).load(function($) {
	//jQuery(".projects-loader").fadeOut("slow");

	function imgLoaded(img){
		var $img = jQuery(img);
		$img.parent().addClass('loaded');
	};

	function lazyLoad(){
	    var $images = jQuery('.lazy-load');
	 
	    $images.each(function(){
	        var $img = jQuery(this),
	            src = $img.attr('data-src');
	           // console.log(src);
	 
	        $img
	            .on('load',imgLoaded($img[0]))
	            .attr('src',src);
	    });
	};

	lazyLoad();
});

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
 

 


	$('.home-title').hover(function(){
		$(this).find('.emoticon').text(';)');
	},function(){
		$(this).find('.emoticon').text(':)');
	})

	function centerGreeting(){
		var hgH = $('.home_greeting').height();
		//console.log(hgH);
		var calcH = -(hgH/2);

		$('#home .content').css({"margin-top":calcH});
	}
	
 
    $(".twenty20").twentytwenty();
    var handler = $('.twentytwenty-handle');


    var mX = 0;
    var wWidth = $(window).width();
 

var sh_ctr = 0;
var wWidth = $(window).width();

var dc_top, de_top, bt_top, dclose_top;

if(wWidth > 768){
	// var dc_top = 125;
	// var bt_top = 168;
	// var de_top = 160;
	if($('.detail_copy').length > 0){
		var dc_top = $('.detail_copy').position().top;
	}

	if($('#back_tip').length > 0){
		var bt_top = $('#back_tip').position().top;
	}

	if($('#detail_exit').length > 0){
		var de_top = $('#detail_exit').position().top;
	}

	if($('#detail_close').length > 0){
		var dclose_top = $('#detail_close').position().top;
	}
}
// else if(wWidth < 480){
// 	var dc_top = 110;
// 	var bt_top = 20;
// 	var de_top = 110;
// }

$('.say-hello').click(function(e){
sh_ctr ++
e.stopPropagation();
e.preventDefault();
	if(sh_ctr == 1){
		$('#sayHello').slideDown(200);
		$('#detail_exit, #back_tip, #detail_close, .detail_copy').css({top:"+=100"});
		//$('.detail_copy').css({top:"+=100"});
	}else{
		$('#sayHello').slideUp(200);
		$('#detail_exit').css({top:de_top});
		$('.detail_copy').css("top",dc_top);
		//This element should really relate more to the content
		$('#back_tip').css({top:bt_top});
		$('#detail_close').css({top:dclose_top});
		sh_ctr = 0;
	}
	
});

$(document).click(function(){
	$('#sayHello').slideUp(200);
	$('#detail_exit').css({top:de_top});
	$('.detail_copy').css("top",dc_top);
		//This element should really relate more to the content
	$('#back_tip').css({top:bt_top});
	$('#detail_close').css({top:dclose_top});
	//$('#detail_exit, .detail_copy').animate({top:"-=100"},200);
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

$(window).on('resize', function(){
	$.sidr('close', 'sidr-main');
});
 //Slick slider for quotes
 var $slider = $(".slider").slick({
    autoplay: true,
    autoplaySpeed:6000,
    pauseOnFocus:true,
    pauseOnHover:true,
})			

// function resize_wb_img(){

// $('.work-block').each(function(){
// 	var _height = $(this).find('img.the-work').height();
 

// 	if(_height > 300){
 
// 		$(this).css({height:_height+17});
// 	}
// 	});
// }

// resize_wb_img();
// $(window).resize(resize_wb_img);

Macy.init({
    container: '#macy',
    trueOrder: true,
    waitForImages: false,
    margin: 15,
    columns: 3,
    breakAt: {
        //1200: ,
        950: 2,
        480: 1,
        //400: 1
    }
 
});

Macy.onImageLoad(function () {
	$('#macy .work-block').removeClass('columns-4');
	$('#macy.blogroll-grid .blog-entry').addClass('macy-box');
	$('#macy.people-grid .people-entry').addClass('macy-box');
 
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
			   $('.nav-bg').stop().slideUp(50);
			} else {
 
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

/*PROJECTS PAGE FUNCTIONS--------------------------------------------------------
--------------------------------------------------------------------------------------------------------------	
--------------------------------------------------------------------------------------------------------------
*/

var project_controller = new ScrollMagic.Controller({
    container: "#detail_scrollarea"
});



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
 
	}
 

});




var run_once = 0;
 

function GoToProject(project_id, reorder){
 
	var pid = '#'+project_id;
	var photos_id = '#'+project_id+'-panels';

	var project_color = $(pid).attr('data-color');
	
	var proj_id = $(photos_id).attr('data-id');

	var title = $(pid).find('span').html();
 
	$('.detail-side-text p').html("&#8226; &#8226; &#8226; &nbsp; "+title);

	$('#infobar').addClass("open");

	$('header').removeClass('absolute').addClass('detail-open');

	$('#sayHello').slideUp(200);


	//browser back button here?
	// if (window.history && window.history.pushState) {
	// 	history.pushState(null, null, '?p='+project_id );
	// }
 
	$('.detail_copy').removeClass('active-project');
	$(pid).addClass('active-project');
	$('#infobar').css('background-color',project_color);


	if(reorder){
		//loop through project images, put clicked on div at top, move other to bottom
		$('.project-wrap').each(function() {

				var div_id = $(this).attr('data-id');
				//console.log(div_id);
				if(div_id ==  proj_id){
					//$('#detail_scrollarea').animate({ scrollTop: 0 }, "fast");
					return false;
				}
				else{
					$(this).insertAfter($('.project-wrap').last());
				}
		});
	}
	else{
		controller.scrollTo(photos_id);
	}
 
	$('#detail_scrollarea').css("-webkit-overflow-scrolling","touch");


	//checkSize();
	infoOpen();
 
	if(run_once === 0){
 
		$('.project-wrap').each(function () {
	 
			var current = $(this);
			var current_id = $(this).attr('id');
			var elem = '#'+current_id;
			var text_elem = elem.substring(0,elem.length - 7);
			var url_id = current_id.substring(0,current_id.length - 7);
			var refElement = $(elem);
			text_elem = $(text_elem);
			var project_color = text_elem.attr('data-color');

			function updateContent(e) {
			 
				if (e.type == "enter") {
					 
					project_color = text_elem.attr('data-color');
					$('.detail_copy').removeClass("active-project");
					text_elem.addClass("active-project");
					$('#infobar').css('background-color',project_color);
					active_project = refElement;

					var new_title = $(text_elem).find('span').html();
					$('.detail-side-text p').html("&#8226; &#8226; &#8226; &nbsp; "+new_title);
					if (window.history && window.history.pushState) {
						history.pushState(null, null, '?p='+url_id );
					}
				}
				else{
					 
					$('.detail_copy').removeClass("active-project");
					project_color = text_elem.prev('.detail_copy').attr('data-color');
					text_elem.prev('.detail_copy').addClass("active-project");
					$('#infobar').css('background-color',project_color );
					if (window.history && window.history.pushState) {
						history.pushState(null, null, '?p='+url_id );
					}

					var new_title = $(text_elem).prev('.detail_copy').find('span').html();
					$('.detail-side-text p').html("&#8226; &#8226; &#8226; &nbsp; "+new_title);
				}
			}
			

			// build scenes
			var scene = new ScrollMagic.Scene({
				triggerElement: elem,
				duration: 0,
				offset: 100
			})
			.on("enter leave", updateContent)
			.addTo(controller);
	 
		});
		run_once = 1;
	}
 
}


 
$(document).on('click', '.work-block', function () {
	var project_id = $(this).attr('data-id');
	GoToProject(project_id,false);
});

$(document).on('click', 'p#explore_text', function () {
	first_proj = $('#macy .work-block:first-child');
	var project_id = first_proj.attr('data-id');
	GoToProject(project_id,false);
});

$(document).on('click', '.project-wrap img', function (e) {
	e.preventDefault();
	fullScreenTrigger();
});


$('.detail-side-text').click(function(e) {
	e.preventDefault();
	
	fullScreenExitTrigger();
});

 
$(window).resize(function() {
  windowsize = $(window).width();
  if (windowsize < 768) {
 
  }
});

 

//var clk_cnt = 0;
$('#detail_close').click(function(e) {
	
		fullScreenTrigger();
		//$(this).text('add');
 
	
});

$('#detail_exit').click(function(e) {
	e.preventDefault();
	fullScreenExitTrigger();
	infoClose(e);

	$('#detail_scrollarea').css("-webkit-overflow-scrolling","auto");
	
	$('header').removeClass('detail-open').addClass('absolute');
	
	$('#sayHello').slideUp(200);

	$('#detail_exit').css({top:de_top});
	$('.detail_copy').css("top",dc_top);
	$('#back_tip').css({top:bt_top});
	$('#detail_close').css({top:dclose_top});

	// $('#infobar').removeClass("open");
});


 
 


  

//Variable definitions //{onComplete:checkSize}
var detailView = new TimelineMax({onComplete:checkSize}),
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
	tooltip_project = new TimelineMax(),
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
    .to("#infobar", 0.1, {css:{cursor:"default"}},  "closed")
    .add("open");
//Detail View Expand definition


//Detail View Expand definition: defines GSAP timeline for detail view expansion animation
mobileDetailView.paused(true)
    .add("closed")
    .to("#infobar", 0.4, {css:{left: "auto", right:"100%", marginRight:"-40px"}}, "closed")
    .to("#explore_text", 0.5, {autoAlpha:0}, "closed")
    .to("#gallery_cover", 0.4, {autoAlpha:1}, "closed")
    .to("body", 0.1, {css:{overflow:"hidden"}}, "closed")
    .to("#detail_scrollarea", 0.4, {autoAlpha:1})
    .to("#detail_exit", 0.25, {autoAlpha:1, delay:0.6}, "closed")
 
    //.to("#copy_1", 0.25, {css:{left:"0px", autoAlpha:1}, delay:0.7}, "closed")//make this #current_copy (copy in view)
    .to("#infobar", 0.1, {css:{cursor:"default"}},  "closed")
	.to("#fullscreen", 0.4, {css:{autoAlpha:0}}, "closed")
    .to(".detail_nav", 0.4, {css:{autoAlpha:0}}, "closed")
    .to("#detail_close", 0.4, {css:{autoAlpha:0}}, "closed")
    .to(".detail_copy.active-project", 0.4, {css:{autoAlpha:0}}, "closed")
    //.to("#detail_close", 0.4, {css:{autoAlpha:1}}, "closed")
    .to(".detail-side-text p", 0.4, {css:{autoAlpha:1}}, "closed")
    .add("open");
//Detail View Expand definition


//Detail View Expand function calls
function infoOpen(){
    detailView.play();

}

function infoClose(event){
	$('#detail_scrollarea').css("-webkit-overflow-scrolling","auto");
    event.stopPropagation();
    detailView.reverse();
 
}
//Detail View Expand function calls
 
function checkSize(){

	//infoOpen();

	windowsize = $(window).width();
	if (windowsize < 769) {
		//mobileDetailView.play();
		fullScreenTrigger();
	}
	else{
		//detailView.play();
	}
 
 
}
 
//Fullscreen Definition ------
fullscreen_open.add("start")
    .paused(true)
   
	.to("#infobar", 0.3, {css:{left: "auto", right:"100%", marginRight:"-40px"}}, "start")
    //.to("#infobar", 0.3, {css:{transform: "translate(calc(-100% + 40px), auto)"}}, "start")
    .to(".detail_nav", 0.4, {css:{autoAlpha:0}}, "start")
    .to("#detail_close", 0.4, {css:{autoAlpha:0}}, "start")
    .to(".detail_copy.active-project", 0.4, {css:{autoAlpha:0}}, "start")
    .to(".detail-side-text p", 0.4, {css:{autoAlpha:1}}, "start")
    .add("end");


//currently not used
fullscreen_close.add("start")
    .paused(true)
   
    .to("#infobar", 0.3, {css:{left: "0px"}}, "start")
    .to(".detail_nav", 0.4, {css:{autoAlpha:1}}, "start")
    .to("#detail_close", 0.4, {css:{autoAlpha:1}}, "start")
    .to(".detail_copy.active-project", 0.4, {css:{autoAlpha:1}}, "start")
    .to(".detail-side-text p", 0.4, {css:{autoAlpha:1}}, "start")
    .add("end");

 
//Fullscreen Definition

//Fullscreen Trigger Definitions
function fullScreenTrigger(){
    fullscreen_open.play();
	//$('.detail-side-text p' ).fadeIn();
}

function fullScreenExitTrigger(){
 
	 
    fullscreen_open.reverse();

	//fullscreen_close.play();
 
}
 







//Tooltip Show/Hide Definitions
 

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
    .to("#back_tip", 0.3, {css:{autoAlpha:1, left:"60px"}, ease:Power2.easeInOut}, "start")
    .add("end");

tooltip_project.add("start")
    .paused(true)
    .to("#project_tip", 0.3, {css:{autoAlpha:1, left:"99%"}, ease:Power2.easeInOut}, "start")
    .add("end");
//Tooltip Show/Hide Definitions

//Tooltip Trigger Definitions
var next_tip_trigger = document.getElementById('next_arrow'),
    prev_tip_trigger = document.getElementById('prev_arrow'),
    back_tip_trigger = document.getElementById('detail_exit');
    project_tip_trigger = document.getElementById('detail_close');

 
next_tip_trigger.onmouseover = showTooltipNext;
next_tip_trigger.onmouseout = hideTooltipNext;
prev_tip_trigger.onmouseover = showTooltipPrev;
prev_tip_trigger.onmouseout = hideTooltipPrev;

back_tip_trigger.onmouseover = showTooltipBack;
back_tip_trigger.onmouseout = hideTooltipBack;

project_tip_trigger.onmouseover = showTooltipProject;
project_tip_trigger.onmouseout = hideTooltipProject;

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
function showTooltipProject(){
    tooltip_project.play()
}
function hideTooltipProject(){
    tooltip_project.reverse()
}
//Tooltip Trigger Definitions
//});
//=================================


var go_to = getQueryVariable('p');
 
if(go_to){
 
	//var project_id = "#" + go_to;
	//console.log("gt " + go_to);
	GoToProject(go_to, true);

}

//if user touches screen
window.addEventListener('touchstart', function() {
	$('.tooltip').css('display','none');
});


window.onresize = function (event) {
  applyOrientation();
}

function applyOrientation() {
	 	
	if(window.innerWidth < 500){
 
		if (window.innerHeight > window.innerWidth) {
			$('.rotate').css('display',' none'); 
		}else {
			$('.rotate').css('display',' block');
			}
	}
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

 


