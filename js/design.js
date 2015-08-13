// JavaScript Document
$('#cyclebanner').cycle({ 
    fx:    'scrollHorz',
	delay:  -4000,
	next:   '#next2',
    prev:   '#prev2',
	pager: '#nav',
	before:  onBefore, 
    after:   onAfter,
    pause:  1 
});
$('.bannercontentfloat').animate({'top': '300px'}, 300, 'easeInExpo');
function onBefore() { 
	//$('.bannercontentfloat').animate({'top': '300px'}, 100, 'easeInExpo');
	$(this).find('.bannercontentfloat' ).stop(true, true).animate();
	$(this).find('.bannercontentfloat h1' ).stop(true, true).animate();
	$(this).find('.bannercontentfloat p' ).stop(true, true).animate();
	$( '.bannercontentfloat' ).animate({'top': '0px'}, 400 ); 
	$( '.bannercontentfloat h1' ).animate({'opacity': '.2'}, 100 );
	$( '.bannercontentfloat p' ).animate({'opacity': '.2'}, 200 );  
} 
function onAfter() { 
	//$('.bannercontentfloat').animate({'top': '-130px'}, 300, 'easeInExpo');
	$(this).find('.bannercontentfloat' ).stop(true, true).animate();
	$(this).find('.bannercontentfloat h1' ).stop(true, true).animate();
	$(this).find('.bannercontentfloat p' ).stop(true, true).animate();
	$( '.bannercontentfloat' ).animate({'top': '-190px'}, 500 ); 
	$( '.bannercontentfloat h1' ).animate({'opacity': '1'}, 800 );
	$( '.bannercontentfloat p' ).animate({'opacity': '1'}, 900 );  
}