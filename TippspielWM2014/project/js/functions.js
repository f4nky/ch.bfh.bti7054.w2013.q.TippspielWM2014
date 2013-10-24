/**************************************************
	H2 SlideToggle
**************************************************/
function h2SlideToggle() {
	jQuery('#content h2').click(function() {
		$(this).next('table').slideToggle('fast');
	});
}

/**************************************************
	DOCUMENT READY
**************************************************/
jQuery(document).ready(function() {
	h2SlideToggle();
});