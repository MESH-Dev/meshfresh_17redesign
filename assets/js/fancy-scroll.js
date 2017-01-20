//Karl script
//jQuery(document).ready(function($){
var detailView = new TimelineMax(),
    project_transition = new TimelineMax(),
    project_scroll = new TimelineMax();
var controller = new ScrollMagic.Controller({
    container: "#detail_scrollarea"
});
detailView.paused(true)
    .add("closed")
    .to("#infobar", 0.8, {css:{left:"0px"}, ease:Elastic.easeInOut.config(0.55, 0.7)})
    .to("#explore_text", 0.5, {autoAlpha:0}, "closed")
    .to("#gallery_cover", 0.4, {autoAlpha:1}, "closed")
    .to("body", 0.1, {css:{overflow:"hidden"}}, "closed")
    .to("#detail_scrollarea", 0.4, {autoAlpha:1})
    .to("#detail_exit", 0.25, {autoAlpha:1, delay:0.6}, "closed")
    .to(".detail_nav", 0.25, {autoAlpha:1, delay:0.65}, "closed")
    .to("#detail_copy", 0.25, {css:{left:"0px", autoAlpha:1}, delay:0.7}, "closed")
    .to("#infobar", 0.1, {css:{cursor:"default"}}, "closed")
    .add("open");
var infobar = document.getElementById("infobar"),
    detail_exit = document.getElementById("detail_exit");
function infoOpen(){
    detailView.play();
}
function infoClose(event){
    event.stopPropagation();
    detailView.reverse();   
}
project_transition.add("start")
    .to("#infobar", 1, {backgroundColor:"#CC8B86"})
    .to("#detail_copy", 1, {css:{left:"20px", autoAlpha:0}}, "start")
    .set("#detail_copy", {css:{left:"-16px"}})
    .to("#detail_copy", 1, {css:{left:"0px", autoAlpha:1}})
    .add("end");
var project_trigger = new ScrollMagic.Scene({
    triggerHook: "onEnter",
    reverse: true,
    triggerElement: '#img5',
    duration: 700
})
    .setTween(project_transition)
    .addTo(controller);
project_scroll.add("start")
    .paused(true)
    .to("#detail_scrollarea", 1, {scrollTo:"#img5", ease:Power2.easeInOut})
    .add("end");
function nextScroll(){
    project_scroll.play();
}
function prevScroll(){
    project_scroll.reverse();
}

//});
//=================================