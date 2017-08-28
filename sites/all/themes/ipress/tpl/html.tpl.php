<?php

/**

 * @file html.tpl.php

 * Default theme implementation to display the basic html structure of a single

 * Drupal page.

 *

 * Variables:

 * - $css: An array of CSS files for the current page.

 * - $language: (object) The language the site is being displayed in.

 *   $language->language contains its textual representation.

 *   $language->dir contains the language direction. It will either be 'ltr' or 'rtl'.

 * - $rdf_namespaces: All the RDF namespace prefixes used in the HTML document.

 * - $grddl_profile: A GRDDL profile allowing agents to extract the RDF data.

 * - $head_title: A modified version of the page title, for use in the TITLE

 *   tag.

 * - $head_title_array: (array) An associative array containing the string parts

 *   that were used to generate the $head_title variable, already prepared to be

 *   output as TITLE tag. The key/value pairs may contain one or more of the

 *   following, depending on conditions:

 *   - title: The title of the current page, if any.

 *   - name: The name of the site.

 *   - slogan: The slogan of the site, if any, and if there is no title.

 * - $head: Markup for the HEAD section (including meta tags, keyword tags, and

 *   so on).

 * - $styles: Style tags necessary to import all CSS files for the page.

 * - $scripts: Script tags necessary to load the JavaScript files and settings

 *   for the page.

 * - $page_top: Initial markup from any modules that have altered the

 *   page. This variable should always be output first, before all other dynamic

 *   content.

 * - $page: The rendered page content.

 * - $page_bottom: Final closing markup from any modules that have altered the

 *   page. This variable should always be output last, after all other dynamic

 *   content.

 * - $classes String of classes that can be used to style contextually through

 *   CSS.

 *

 * @see template_preprocess()

 * @see template_preprocess_html()

 * @see template_process()

 * @see nucleus_preprocess_html()

 */

?>

<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie8" lang="<?php print $language->language; ?>"><![endif]-->
<!--[if IE 9 ]><html class="ie9" lang="<?php print $language->language; ?>"><![endif]-->
<!--[if (gte IE 10)|!(IE)]><!--><html xmlns="http://www.w3.org/1999/xhtml" lang="<?php print $language->language; ?>"><!--<![endif]-->
<head>
	<title><?php print $head_title; ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<?php print $styles; ?><?php print $scripts; ?><?php print $head; ?>	
	
	<?php
		$color_scheme = theme_get_setting('color_scheme', 'ipress');
		if(isset($color_scheme) && !empty($color_scheme)){
	?>
	<style type="text/css" media="all">
		a:hover, #footer a:hover, #newsletters button:hover, #header .search button:hover { color: <?php print $color_scheme;?> } #mobilepro:hover, .title.colordefault, .cat.colordefault, li.colordefault:hover > a, li.colordefault li:hover > a, li.current.colordefault, .share_post span, .pagination-tt ul li a, .wp-polls input.Buttons, .owl-theme .owl-controls.clickable .owl-buttons div:hover, .small_posts .s_thumb span, #layerBall:after, .inner_f, .right_icons a:hover, .search_icon i:hover, .search_icon i.activeated_search, #contactForm #sendMessage, .tags a:hover, #wp-calendar #today, .accordion-head-sign,.toggle-head-sign, .tbutton {background-color: <?php print $color_scheme;?> !important} .s_form, #track_input:focus, #contactForm #senderName:focus, #contactForm #senderEmail:focus, #contactForm #message:focus {border-color: <?php print $color_scheme;?> !important} ::selection{background:<?php print $color_scheme;?> !important} ::-moz-selection{background:<?php print $color_scheme;?> !important} .s_form:after {border-bottom: 6px solid <?php print $color_scheme;?>} #layerBall { box-shadow: 0 0 1px <?php print $color_scheme;?>}#layerBall:before {box-shadow: 0 0 4px <?php print $color_scheme;?>} .colordefault.title:after {border-top-color: <?php print $color_scheme;?>!important} .colordefault.cat:after {border-left-color: <?php print $color_scheme;?>!important} a.cat{background:<?php print $color_scheme;?>!important} .post_day .relative .cat:after, .cat-post-of-the-day a:after{border-left:5px solid <?php print $color_scheme;?>!important}
	</style>
	<?php
		}
	?>
	
	<?php
		//Tracking code
		$tracking_code = theme_get_setting('general_setting_tracking_code', 'ipress');
		print $tracking_code;
		//Custom css
		$custom_css = theme_get_setting('custom_css', 'ipress');
		if(!empty($custom_css)):
	?>
	<style type="text/css" media="all">
	<?php 
		print $custom_css;
	 ?>
	</style>
	<?php
		endif;
	?>
	
	<!--[if IE]>
		<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=EmulateIE8; IE=EDGE" />
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body class="<?php print $classes;?>"  <?php print $attributes;?>>
	<div id="skip-link"><a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a></div>
	<!-- /layout -->
	<?php print $page_top; ?><?php print $page; ?><?php print $page_bottom; ?>
	
	<!-- Scripts -->
		
		<script type="text/javascript">
		/* <![CDATA[ */
			function date_time(id){
				date = new Date;
				year = date.getFullYear();
				month = date.getMonth();
				months = new Array('January', 'February', 'March', 'April', 'May', 'June', 'Jully', 'August', 'September', 'October', 'November', 'December');
				d = date.getDate();
				day = date.getDay();
				days = new Array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
				h = date.getHours();
				if(h<10){
					h = "0"+h;}
					m = date.getMinutes();
					if(m<10){
						m = "0"+m;
					}
					s = date.getSeconds();
					if(s<10){
						s = "0"+s;
					}
				// result = ''+days[day]+' '+months[month]+' '+d+' '+year+' '+h+':'+m+':'+s;
				result = ''+days[day]+' '+d+' '+months[month]+' '+year;
				document.getElementById(id).innerHTML = result;
				setTimeout('date_time("'+id+'");','1000');
				return true;
			}
			window.onload = date_time('date_time');
		/* ]]> */
		</script>
</body>
</html>