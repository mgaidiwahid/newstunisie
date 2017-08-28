// JavaScript Document

jQuery(document).ready(function(){
	
	//Main menu
	jQuery('ul.sf-menu li a').each(function(){
		$rel = jQuery(this).attr('rel');
		jQuery(this).parent().addClass($rel);
		//alert($rel);
	});
	
	//Search form
	
	$("#search-block-form .form-submit").addClass('tbutton small');
	
	//Top news
	$(".cat-div-top-news a").addClass('cat color1');
	
	$(".cat-post-of-the-day a").addClass('cat');
	$(".cat_div_widget a").addClass('cat color1');
	
	$("#edit-submit--2").addClass('tbutton small');
	$(".block-menu ul li ul").removeClass('sf-menu');
});