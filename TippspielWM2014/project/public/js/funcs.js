/**************************************************
	DOCUMENT READY
**************************************************/
jQuery(document).ready(function() {
	headlineSlideToggle();
});

/**************************************************
	H2 slideToggle
**************************************************/
function headlineSlideToggle() {
	jQuery('#content h2').click(function() {
		$(this).next().slideToggle('fast');
	});
	jQuery('#content h3').click(function() {
		$(this).next().slideToggle('fast');
	});
}