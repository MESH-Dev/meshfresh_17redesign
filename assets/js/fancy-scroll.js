//Karl script
//Variable definitions
var detailView = new TimelineMax(),
    project_2_transition = new TimelineMax(),
    project_3_transition = new TimelineMax(),
    project_scroll = new TimelineMax();
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
    .to("#copy_1", 0.25, {css:{left:"0px", autoAlpha:1}, delay:0.7}, "closed")
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
project_next.add("start")
    .paused(true)
    .to("#detail_scrollarea", 1, {scrollTo:"#img3", ease:Power2.easeInOut})//Redefine for dynamic selectors, ex."scroll to first image of '.next_proj' from '.active_proj'"
    .add("end");
//Scroll Button definition


//Scroll Button function calls
function nextScroll(){
    project_scroll.play();
}

function prevScroll(){
    project_scroll.reverse();
}
//Scroll Button function calls

//});
//=================================