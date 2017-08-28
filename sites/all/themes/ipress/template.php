<?php 
global $base_url;

function ipress_preprocess_html(&$variables) {
	
	drupal_add_css(base_path().path_to_theme().'/styles/style.css', array('type' => 'external'));
	drupal_add_css(base_path().path_to_theme().'/styles/icons.css', array('type' => 'external'));
	drupal_add_css(base_path().path_to_theme().'/styles/animate.css', array('type' => 'external'));
	drupal_add_css(base_path().path_to_theme().'/styles/responsive.css', array('type' => 'external'));
	drupal_add_css('http://fonts.googleapis.com/css?family=Roboto:400,300,100,500', array('type' => 'external'));
	
	
	$styling = theme_get_setting('styling', 'ipress');
	if($styling=='rtl')
		drupal_add_css(base_path().path_to_theme().'/styles/rtl.css', array('type' => 'external'));
	
	//Version background
	$version = theme_get_setting('version_c', 'ipress');
	if($version=='dark')
		drupal_add_css(base_path().path_to_theme().'/styles/dark.css', array('type' => 'external'));
	
	
	drupal_add_css(base_path().path_to_theme().'/styles/update.css', array('type' => 'external'));
	
	drupal_add_js(base_path().path_to_theme().'/js/jquery.min.js', array('type' => 'file', 'scope' => 'footer'));
	drupal_add_js(base_path().path_to_theme().'/js/ipress.js', array('type' => 'file', 'scope' => 'footer'));
	
	drupal_add_js(base_path().path_to_theme().'/js/owl.carousel.min.js', array('type' => 'file', 'scope' => 'footer'));
	drupal_add_js(base_path().path_to_theme().'/js/jquery.ticker.js', array('type' => 'file', 'scope' => 'footer'));
	drupal_add_js(base_path().path_to_theme().'/js/custom.js', array('type' => 'file', 'scope' => 'footer'));
	
	drupal_add_js(base_path().path_to_theme().'/js/drupalet_admin/base.js', array('type' => 'file', 'scope' => 'footer'));
	
	$disable_switcher = theme_get_setting('ipress_disable_switch', 'ipress');
	if(empty($disable_switcher))
		$disable_switcher = 'on';
	if(!empty($disable_switcher) && $disable_switcher=='on'){
		//Style
		drupal_add_js(base_path().path_to_theme().'/customizer/script.js', array('type' => 'file', 'scope' => 'footer'));
		drupal_add_css(base_path().path_to_theme().'/customizer/style.css', array('type' => 'external'));
		//End style
	}
	drupal_add_js(base_path().path_to_theme().'/js/jflickrfeed.js', array('type' => 'file', 'scope' => 'footer'));
	drupal_add_js(base_path().path_to_theme().'/js/update.js', array('type' => 'file', 'scope' => 'footer'));
}


function ipress_form_comment_form_alter(&$form, &$form_state) {
  $form['comment_body']['#after_build'][] = 'ipress_customize_comment_form';
}

function ipress_customize_comment_form(&$form) {
  $form[LANGUAGE_NONE][0]['format']['#access'] = FALSE;
  return $form;
}

function ipress_preprocess_page(&$vars) {
	
	if (isset($vars['node'])) {  
		$vars['theme_hook_suggestions'][] = 'page__'. $vars['node']->type;
	}
	
	//404 page
	$status = drupal_get_http_header("status");  
	if($status == "404 Not Found") {      
		$vars['theme_hook_suggestions'][] = 'page__404';
	}
	
}

//custom main menu
function ipress_menu_tree__main_menu($variables) {
	$str = '';
	$str .= '<ul class="sf-menu sf-js-enabled sf-shadow">';
		$str .= $variables['tree'];
	$str .= '</ul>';
	
	return $str;
}
// Remove superfish css files.
function ipress_css_alter(&$css) {
	unset($css[drupal_get_path('module', 'system') . '/system.menus.css']);
	unset($css[drupal_get_path('module', 'system') . '/system.theme.css']);
	
//	unset($css[drupal_get_path('module', 'system') . '/system.base.css']);
}

function ipress_form_alter(&$form, &$form_state, $form_id) {
	if ($form_id == 'search_block_form') {
		$form['search_block_form']['#title_display'] = 'invisible'; // Toggle label visibilty
		$form['search_block_form']['#default_value'] = t('Search'); // Set a default value for the textfield
		$form['search_block_form']['#attributes']['id'] = array("mod-search-searchword");
		//disabled submit button
		//unset($form['actions']['submit']);
		unset($form['search_block_form']['#title']);
		$form['search_block_form']['#attributes']['onblur'] = "if (this.value == '') {this.value = 'Search';}";
		$form['search_block_form']['#attributes']['onfocus'] = "if (this.value == 'Search') {this.value = '';}";
	}
	if($form_id == 'contact_site_form'){
		$form['mail']['#attributes']['class'] = array("input-contact-form");
		$form['name']['#attributes']['class'] = array("input-contact-form");
		$form['subject']['#attributes']['class'] = array("input-contact-form");
		$form['message']['#attributes']['class'] = array("message-contact-form");
		$form['actions']['submit']['#attributes']['class'] = array('btn btn-success contact-form-button'); 
	}
	if ($form_id == 'comment_form') {
		$form['comment_filter']['format'] = array(); // nuke wysiwyg from comments
	}
}
function ipress_textarea($variables) {
  $element = $variables['element'];
  $element['#attributes']['name'] = $element['#name'];
  $element['#attributes']['id'] = $element['#id'];
  $element['#attributes']['cols'] = $element['#cols'];
  $element['#attributes']['rows'] = $element['#rows'];
  _form_set_class($element, array('form-textarea'));

  $wrapper_attributes = array(
    'class' => array('form-textarea-wrapper'),
  );

  // Add resizable behavior.
  if (!empty($element['#resizable'])) {
    $wrapper_attributes['class'][] = 'resizable';
  }

  $output = '<div' . drupal_attributes($wrapper_attributes) . '>';
  $output .= '<textarea' . drupal_attributes($element['#attributes']) . '>' . check_plain($element['#value']) . '</textarea>';
  $output .= '</div>';
  return $output;
}
function ipress_breadcrumb($variables) {
	$breadcrumb = $variables['breadcrumb'];
	if (!empty($breadcrumb)) {
		$crumbs = '<nav id="breadcrumbs">';
			$crumbs .= '<ul class="">';
				$crumbs .= '<li>You are here:</li>';
				foreach($breadcrumb as $value) {
					$crumbs .= '<li>'.$value.'</li>';
				}
				//$crumbs .= '<li>'.drupal_get_title().'</li>';
			$crumbs .= '</ul>';
		$crumbs .= '</nav>';
		return $crumbs;
	}else{
		return NULL;
	}
}