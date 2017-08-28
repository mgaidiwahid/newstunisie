<?php

function ipress_form_system_theme_settings_alter(&$form, $form_state) {

  $theme_path = drupal_get_path('theme', 'ipress');
  $form['settings'] = array(
      '#type' => 'vertical_tabs',
      '#title' => t('Theme settings'),
      '#weight' => 2,
      '#collapsible' => TRUE,
      '#collapsed' => FALSE,
	  '#attached' => array(
					'css' => array(drupal_get_path('theme', 'ipress') . '/css/drupalet_base/admin.css'),
					'js' => array(
						drupal_get_path('theme', 'ipress') . '/js/drupalet_admin/admin.js',
					),
			),
  );

  $form['settings']['general_setting'] = array(
      '#type' => 'fieldset',
      '#title' => t('General Settings'),
      '#collapsible' => TRUE,
      '#collapsed' => FALSE,
  );

  $form['settings']['general_setting']['general_setting_tracking_code'] = array(
      '#type' => 'textarea',
      '#title' => t('Tracking Code'),
      '#default_value' => theme_get_setting('general_setting_tracking_code', 'ipress'),
  );
  $form['settings']['layout']['ipress_disable_switch'] = array(
      '#title' => t('Switcher style'),
      '#type' => 'select',
      '#options' => array('on' => t('ON'), 'off' => t('OFF')),
      '#default_value' => theme_get_setting('ipress_disable_switch', 'ipress'),

  );
  
 $form['settings']['layout'] = array(
      '#type' => 'fieldset',
      '#title' => t('Layout settings'),
      '#collapsible' => TRUE,
      '#collapsed' => FALSE,
  );

  $form['settings']['layout']['layout_settings'] = array(
      '#type' => 'select',
      '#title' => t('Layout'),
	  '#options' => array('boxed-margin'=>t('Boxed margin'),'full'=>t('Full'), 'boxed'=>t('Boxed')),
      '#default_value' => theme_get_setting('layout_settings', 'ipress'),
  );
   $form['settings']['layout']['styling'] = array(
      '#type' => 'select',
      '#title' => t('Styling'),
      '#options' => array(
			'ltr' => 'Default (LTR)',
			'rtl' => 'RTL Version',
      ),
      '#default_value' => theme_get_setting('styling', 'ipress'),
  );
  $form['settings']['layout']['color_scheme'] = array(
      '#type' => 'textfield',
      '#title' => t('Color scheme'),
	  '#id' => t('colorpickerField1'),
	   '#description'  => t('Please enter a color code. <i>For example: #FF000 (red)</i>. Getting the color code here: <a href="http://html-color-codes.info/" target="_blank">http://html-color-codes.info/</a><br/><p><i>Leave blank if you want to use the default color.</i></p>'),
      '#default_value' => theme_get_setting('color_scheme', 'ipress'),
  );
   $form['settings']['layout']['version_c'] = array(
      '#type' => 'select',
      '#title' => t('Version'),
      '#options' => array(
			'light' => 'Light',
			'dark' => 'Dark',
      ),
      '#default_value' => theme_get_setting('version_c', 'ipress'),
  );
 
  
  
  $form['settings']['footer'] = array(
      '#type' => 'fieldset',
      '#title' => t('Footer settings'),
      '#collapsible' => TRUE,
      '#collapsed' => FALSE,
  );

  $form['settings']['footer']['footer_copyright_message'] = array(
      '#type' => 'textarea',
      '#title' => t('Footer copyright message'),
      '#default_value' => theme_get_setting('footer_copyright_message', 'ipress'),
  );

  $form['settings']['footer']['footer_columns'] = array(
      '#type' => 'select',
      '#title' => t('Footer columns'),
	  '#options' => array('4'=>t('4 col'),'3'=>t('3 col')),
      '#default_value' => theme_get_setting('footer_columns', 'ipress'),
  );

	$form['settings']['custom_css'] = array(
		  '#type' => 'fieldset',
		  '#title' => t('Custom CSS'),
		  '#collapsible' => TRUE,
		  '#collapsed' => FALSE,
	  );  

	$form['settings']['custom_css']['custom_css'] = array(
		  '#type' => 'textarea',
		  '#title' => t('Custom CSS'),
		  '#default_value' => theme_get_setting('custom_css', 'ipress'),
		  '#description'  => t('<strong>Example:</strong><br/>h1 { font-family: \'Metrophobic\', Arial, serif; font-weight: 400; }')
	  );
}