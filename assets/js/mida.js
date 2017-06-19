// JavaScript Document

(function () {
    var previousScroll = 50;

    $(window).scroll(function(){
       var currentScroll = $(this).scrollTop();
       if (currentScroll > previousScroll){
           $('.agencytop').removeClass('down')
		   $('.agencytop').addClass('up')
       } else {
           $('.agencytop').removeClass('up')
		   $('.agencytop').addClass('down')
       }
     	
     	var iHeight = $(window).height();
     	// for iphone5s
		if(iHeight == 512 || iHeight == 355) {	
		} else {
			previousScroll = currentScroll;
		}
        
    });
}()); 
new flickerplate('.mbanner');
$(document).ready(function() {
	
	$('.a').hide();
	$('.q').click(function(){
		
			$(this).next('.a').slideToggle('fast');
		
		})
	
	$('.openmenu').click(function(){
			$('.centerside').toggleClass('openMe');
			$('.leftside').toggleClass('openMe');
			$('.menu ul').toggleClass('openMe');
		})
	
	$('#email').focus(function(){
			$(this).attr('placeholder','e-poçt ünvanı');
		}).focusout(function() {
			$(this).attr('placeholder','xəbərlərə abunə');
        });
    var w = $('.mbanner').width();
	var nh = w / 2.2;
	$('.mbanner').css('height', nh);
});
$(window).resize(function() {
    clearTimeout($.data(this, 'resizeTimer'));
    $.data(this, 'resizeTimer', setTimeout(function() {
		
    var w = $('.mbanner').width();
	var nh = w / 2.2;
	$('.mbanner').css('height', nh);
    }, 300));
});


jQuery(document).ready(function($){

	$('iframe[src*="youtube.com"]').each(function() {
		$(this).addClass("mobyotube");
	}); 

});