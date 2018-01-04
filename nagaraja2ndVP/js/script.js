// JavaScript Document
$(function(){
	$('body').scrollspy({ target: '.nav_parent', offset:120 });
	/*$('.item').css("max-height",window.innerHeight-100);*/
	$('#carousel').carousel({
  		interval: 10000
	});
	//smooth scrolling
	$("nav li a").on('click', function(e) {
	   e.preventDefault();
	   var hash = this.hash;
	   var off=$(this.hash).offset().top -80;
	   $("html, body").animate({
		   scrollTop: off
		 }, 500, function(){ window.location.hash = hash +".";});
	});
	
	//reducing size of the header on scroll
	$(window).on("scroll touchmove", function () {
  		$('.head').toggleClass('tiny', $(document).scrollTop() > 0);
	});
	/*Making height of image in about same as the text*/
	var ah=$('.yellow').height();
	if($(window).innerWidth()>640){$('#about .img').height(ah+83);}
	/********** Scrollorama animations ***********/
	if(window.innerWidth>360)
	{
	var controller = $.superscrollorama({triggerAtCenter: true});
	// individual element tween examples
	controller.addTween('.yellow', TweenMax.from( $('.yellow'), 0.5, {css:{right:'-1900px'}}),false);
	controller.addTween('.slide-left', TweenMax.from( $('.slide-left'), 1, {css:{right:'1900px'}}),false);
	controller.addTween('.checks', TweenMax.from( $('.checks'), 0.5, {css:{right:'-1900px'}}),false);
	$('.ach div').css('position','relative').each(function() {
		controller.addTween('.ach div', TweenMax.from( $(this), 1, {delay:Math.random()*.2,css:{left:Math.random()*200-100,top:Math.random()*200-100,opacity:0}, ease:Back.easeOut}));
	});
	controller.addTween('.divide', TweenMax.from( $('.divide'), 0.5, {css:{marginLeft:'100%'}}),false);
	controller.addTween('.maroon', TweenMax.from( $('.maroon'), 0.5, {css:{right:'-1900px'}}),false);
	controller.addTween('#downloads figure img', TweenMax.from( $('#downloads figure img'), .5, {css:{opacity:0, rotation: 720}, ease:Quad.easeOut}));
	}
	/********** End of scrollorama animations ***********/
	/*If touch screen change the why image*/
	function is_touch_device() {
	 return (('ontouchstart' in window)
		  || (navigator.MaxTouchPoints > 0)
		  || (navigator.msMaxTouchPoints > 0));
	}
	if (is_touch_device()) {
		$('#why img').attr('src','img/whyTablet.png');
	}
	
	if(window.innerWidth<768)
	{
	$('.nav').slideUp(0);
	$('.menu').click(function(){
		$('.nav').slideToggle(500);
	})
	$('.nav li a').click(function(){
		$('.nav').slideUp(500);
	})
	}
})