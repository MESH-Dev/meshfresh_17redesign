//Karl script
//Variable definitions
var detailView = new TimelineMax(),
    project_2_transition = new TimelineMax(),
    project_3_transition = new TimelineMax(),
    project_scroll = new TimelineMax(),
    fullscreen_open = new TimelineMax(),
    fullscreen_close = new TimelineMax(),
    tooltip_next = new TimelineMax,
    tooltip_prev = new TimelineMax,
    tooltip_fs = new TimelineMax;
var scrollarea = new ScrollMagic.Controller({
    container: "#detail_scrollarea"
});
//Variable definitions


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
    .to("#copy_1", 0.25, {css:{left:"0px", autoAlpha:1}, delay:0.7}, "closed")//make this #current_copy (copy in view)
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


//Project Transition definitions: defines GSAP actions transitioning between projects
project_2_transition.add("start")
    .to("#infobar", 1, {backgroundColor:"#CC8B86"}) //Once dynamic selectors are finalized, make this a single function that chooses from an array of colors based on project?
    .to("#copy_1", 1, {css:{left:"20px", autoAlpha:0}}, "start")
    .to("#copy_2", 1, {css:{left:"0px", autoAlpha:1}})
    .add("end");

project_3_transition.add("start")
    .to("#infobar", 1, {backgroundColor:"#7C2B2D"})
    .to("#copy_2", 1, {css:{left:"20px", autoAlpha:0}}, "start")
    .to("#copy_3", 1, {css:{left:"0px", autoAlpha:1}})
    .add("end");
//Project Transition definitions


//Project Trigger definitions: defines scroll triggers for project transitions
var project_2_trigger = new ScrollMagic.Scene({
    triggerHook: "onEnter",
    reverse: true,
    triggerElement: '#img3',
    duration: 450,
    offset: 140
})
    .setTween(project_2_transition)
    .addTo(scrollarea);

var project_3_trigger = new ScrollMagic.Scene({
    triggerHook: "onEnter",
    reverse: true,
    triggerElement: '#img6',
    duration: 450,
    offset: 140
})
    .setTween(project_3_transition)
    .addTo(scrollarea);
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

//Fullscreen Definition
fullscreen_open.add("start")
    .paused(true)
    .to("#detail_scrollarea", 0.4, {css:{width:"97%"}}, "start")
    .to("#infobar", 0.4, {css:{left:"auto", right:"97%"}}, "start")
    .to("#fullscreen", 0.4, {css:{autoAlpha:0}}, "start")
    .to("#fullscreen_exit", 0.4, {css:{autoAlpha:1}}, "start")
    .to("#copy_1", 0.4, {css:{autoAlpha:0}}, "start")//make this #current_copy
    .to("#fs_title1", 0.4, {css:{autoAlpha:1}}, "start")
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

tooltip_next.add("start")
    .paused(true)
    .to("#next_tip", 0.3, {css:{autoAlpha:1, left:"40px"}, ease:Power2.easeInOut}, "start")
    .add("end");

tooltip_prev.add("start")
    .paused(true)
    .to("#prev_tip", 0.3, {css:{autoAlpha:1, left:"40px"}, ease:Power2.easeInOut}, "start")
    .add("end");
//Tooltip Show/Hide Definitions

//Tooltip Trigger Definitions
var fs_tip_trigger = document.getElementById('fullscreen'),
    fs_close_tip_trigger = document.getElementById('fullscreen_exit'),
    next_tip_trigger = document.getElementById('next_arrow'),
    prev_tip_trigger = document.getElementById('prev_arrow');

fs_tip_trigger.onmouseover = showTooltipLeft;
fs_tip_trigger.onmouseout = hideTooltipLeft;
next_tip_trigger.onmouseover = showTooltipNext;
next_tip_trigger.onmouseout = hideTooltipNext;
prev_tip_trigger.onmouseover = showTooltipPrev;
prev_tip_trigger.onmouseout = hideTooltipPrev;

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
//Tooltip Trigger Definitions
//});
//=================================