<?php
/**
 * This class used to manage settings page in backend.
 * @author Flipper Code <hello@flippercode.com>
 * @version 1.0.0
 * @package Maps
 */

if( !get_option('wpgmp_settings') and get_option( 'wpgmp_language' ) ) {

	$wpgmp_settings['wpgmp_language'] = get_option( 'wpgmp_language',true );
	$wpgmp_settings['wpgmp_api_key'] = get_option( 'wpgmp_api_key',true );
	$wpgmp_settings['wpgmp_scripts_place'] = get_option( 'wpgmp_scripts_place',true );
	$wpgmp_settings['wpgmp_allow_meta'] = get_option('wpgmp_allow_meta', true );
	
	update_option( 'wpgmp_settings',$wpgmp_settings);
}

$wpgmp_settings = get_option('wpgmp_settings',true);

$form  = new WPGMP_Template();
$form->set_header( __( 'General Setting(s)', WPGMP_TEXT_DOMAIN ), $response );
$form->add_element('text','wpgmp_api_key',array(
	'label' => __( 'Google Maps API Key',WPGMP_TEXT_DOMAIN ),
	'value' => $wpgmp_settings[ 'wpgmp_api_key' ],
	'desc' => __( 'Get here <a target="_blank" href="https://developers.google.com/maps/documentation/javascript/get-api-key"> Api Key </a> and insert here.', WPGMP_TEXT_DOMAIN ),
	));

$language = array(
'en' => __( 'ENGLISH', WPGMP_TEXT_DOMAIN ),
'ar' => __( 'ARABIC', WPGMP_TEXT_DOMAIN ),
'eu' => __( 'BASQUE', WPGMP_TEXT_DOMAIN ),
'bg' => __( 'BULGARIAN', WPGMP_TEXT_DOMAIN ),
'bn' => __( 'BENGALI', WPGMP_TEXT_DOMAIN ),
'ca' => __( 'CATALAN', WPGMP_TEXT_DOMAIN ),
'cs' => __( 'CZECH', WPGMP_TEXT_DOMAIN ),
'da' => __( 'DANISH', WPGMP_TEXT_DOMAIN ),
'de' => __( 'GERMAN', WPGMP_TEXT_DOMAIN ),
'el' => __( 'GREEK', WPGMP_TEXT_DOMAIN ),
'en-AU' => __( 'ENGLISH (AUSTRALIAN)', WPGMP_TEXT_DOMAIN ),
'en-GB' => __( 'ENGLISH (GREAT BRITAIN)', WPGMP_TEXT_DOMAIN ),
'es' => __( 'SPANISH', WPGMP_TEXT_DOMAIN ),
'fa' => __( 'FARSI', WPGMP_TEXT_DOMAIN ),
'fi' => __( 'FINNISH', WPGMP_TEXT_DOMAIN ),
'fil' => __( 'FILIPINO', WPGMP_TEXT_DOMAIN ),
'fr' => __( 'FRENCH', WPGMP_TEXT_DOMAIN ),
'gl' => __( 'GALICIAN', WPGMP_TEXT_DOMAIN ),
'gu' => __( 'GUJARATI', WPGMP_TEXT_DOMAIN ),
'hi' => __( 'HINDI', WPGMP_TEXT_DOMAIN ),
'hr' => __( 'CROATIAN', WPGMP_TEXT_DOMAIN ),
'hu' => __( 'HUNGARIAN', WPGMP_TEXT_DOMAIN ),
'id' => __( 'INDONESIAN', WPGMP_TEXT_DOMAIN ),
'it' => __( 'ITALIAN', WPGMP_TEXT_DOMAIN ),
'iw' => __( 'HEBREW', WPGMP_TEXT_DOMAIN ),
'ja' => __( 'JAPANESE', WPGMP_TEXT_DOMAIN ),
'kn' => __( 'KANNADA', WPGMP_TEXT_DOMAIN ),
'ko' => __( 'KOREAN', WPGMP_TEXT_DOMAIN ),
'lt' => __( 'LITHUANIAN', WPGMP_TEXT_DOMAIN ),
'lv' => __( 'LATVIAN', WPGMP_TEXT_DOMAIN ),
'ml' => __( 'MALAYALAM', WPGMP_TEXT_DOMAIN ),
'it' => __( 'ITALIAN', WPGMP_TEXT_DOMAIN ),
'mr' => __( 'MARATHI', WPGMP_TEXT_DOMAIN ),
'nl' => __( 'DUTCH', WPGMP_TEXT_DOMAIN ),
'no' => __( 'NORWEGIAN', WPGMP_TEXT_DOMAIN ),
'pl' => __( 'POLISH', WPGMP_TEXT_DOMAIN ),
'pt' => __( 'PORTUGUESE', WPGMP_TEXT_DOMAIN ),
'pt-BR' => __( 'PORTUGUESE (BRAZIL)', WPGMP_TEXT_DOMAIN ),
'pt-PT' => __( 'PORTUGUESE (PORTUGAL)', WPGMP_TEXT_DOMAIN ),
'ro' => __( 'ROMANIAN', WPGMP_TEXT_DOMAIN ),
'ru' => __( 'RUSSIAN', WPGMP_TEXT_DOMAIN ),
'sk' => __( 'SLOVAK', WPGMP_TEXT_DOMAIN ),
'sl' => __( 'SLOVENIAN', WPGMP_TEXT_DOMAIN ),
'sr' => __( 'SERBIAN', WPGMP_TEXT_DOMAIN ),
'sv' => __( 'SWEDISH', WPGMP_TEXT_DOMAIN ),
'tl' => __( 'TAGALOG', WPGMP_TEXT_DOMAIN ),
'ta' => __( 'TAMIL', WPGMP_TEXT_DOMAIN ),
'te' => __( 'TELUGU', WPGMP_TEXT_DOMAIN ),
'th' => __( 'THAI', WPGMP_TEXT_DOMAIN ),
'tr' => __( 'TURKISH', WPGMP_TEXT_DOMAIN ),
'uk' => __( 'UKRAINIAN', WPGMP_TEXT_DOMAIN ),
'vi' => __( 'VIETNAMESE', WPGMP_TEXT_DOMAIN ),
'zh-CN' => __( 'CHINESE (SIMPLIFIED)', WPGMP_TEXT_DOMAIN ),
'zh-TW' => __( 'CHINESE (TRADITIONAL)', WPGMP_TEXT_DOMAIN ),
);

$form->add_element( 'select', 'wpgmp_language', array(
	'label' => __( 'Map Language', WPGMP_TEXT_DOMAIN ),
	'current' => $wpgmp_settings[ 'wpgmp_language' ],
	'desc' => __( 'Choose your language for map. Default is English.', WPGMP_TEXT_DOMAIN ),
	'options' => $language,
	'before' => '<div class="fc-4">',
	'after' => '</div>',
));

$form->add_element( 'radio', 'wpgmp_scripts_place', array(
	'label' => __( 'Include Scripts in ', WPGMP_TEXT_DOMAIN ),
	'radio-val-label' => array( 'header' => __( 'Header',WPGMP_TEXT_DOMAIN ),'footer' => __( 'Footer (Recommanded)',WPGMP_TEXT_DOMAIN ) ),
	'current' => $wpgmp_settings[ 'wpgmp_scripts_place' ],
	'class' => 'chkbox_class',
	'default_value' => 'footer',
));

$form->add_element( 'group', 'location_metabox_settings', array(
	'value' => __( 'Meta Box Settings', WPGMP_TEXT_DOMAIN ),
	'before' => '<div class="fc-12">',
	'after' => '</div>',
));

$args = array(
		'public' 	=> true,
		'_builtin' 	=> false,
);
$post_type_options = array( 'all' => __( 'All',WPGMP_TEXT_DOMAIN ),'post' => __( 'Posts',WPGMP_TEXT_DOMAIN ), 'page' => __( 'Page',WPGMP_TEXT_DOMAIN ) );
$custom_post_types = get_post_types( $args, 'names' );
foreach ( $custom_post_types as $post_type ) {
	$post_type_options[ sanitize_title( $post_type ) ] = ucwords( $post_type );
}
$selected_values = unserialize($wpgmp_settings['wpgmp_allow_meta']);

$form->add_element( 'multiple_checkbox', 'wpgmp_allow_meta[]', array(
	'label' => __( 'Hide Meta Box', WPGMP_TEXT_DOMAIN ),
	'value' => $post_type_options,
	'current' => $selected_values,
	'class' => 'chkbox_class ',
	'default_value' => '',
));

$form->add_element( 'checkbox', 'wpgmp_metabox_map', array(
	'label' => __( 'Hide Map', WPGMP_TEXT_DOMAIN ),
	'value' => 'true',
	'current' => $wpgmp_settings['wpgmp_metabox_map'],
	'desc' => __( 'Hide map showing in the meta box.', WPGMP_TEXT_DOMAIN ),
	'class' => 'chkbox_class',
));


$form->add_element( 'group', 'location_extra_fields', array(
	'value' => __( 'Extra Field(s)', WPGMP_TEXT_DOMAIN ),
	'before' => '<div class="fc-12">',
	'after' => '</div>',
));

$data['location_extrafields'] = unserialize( get_option( 'wpgmp_location_extrafields' ) );
if ( isset( $data['location_extrafields'] ) ) {
	$ex = 0;
	foreach ( $data['location_extrafields'] as $i => $label ) {
		$form->set_col( 2 );
		$form->add_element( 'text', 'location_extrafields['.$ex.']', array(
			'value' => (isset( $data['location_extrafields'][ $i ] ) and ! empty( $data['location_extrafields'][ $i ] )) ? $data['location_extrafields'][ $i ] : '',
			'desc' => '',
			'class' => 'location_newfields form-control',
			'placeholder' => __( 'Field Label', WPGMP_TEXT_DOMAIN ),
			'before' => '<div class="fc-4">',
			'after' => '</div>',
			'desc' => __( 'Placehoder - ',WPGMP_TEXT_DOMAIN ).'{'.sanitize_title( $data['location_extrafields'][ $i ] ).'}',
		));
		$form->add_element( 'button', 'location_newfields_repeat['.$ex.']', array(
			'value' => __( 'Remove',WPGMP_TEXT_DOMAIN ),
			'desc' => '',
			'class' => 'repeat_remove_button fc-btn fc-btn-default fc-btn-sm',
			'before' => '<div class="fc-4">',
			'after' => '</div>',
		));

		$ex++;
	}
}

$form->set_col( 2 );
if ( isset( $data['location_extrafields'] ) ) {
	$next_index = $ex; } else {
	$next_index = 0;
	}

	$form->add_element( 'text', 'location_extrafields['.$next_index.']', array(
		'value' => (isset( $data['location_extrafields'][ $next_index ] ) and ! empty( $data['location_extrafields'][ $next_index ] )) ? $data['location_extrafields'][ $next_index ] : '',
		'desc' => '',
		'class' => 'location_newfields form-control',
		'placeholder' => __( 'Field Label', WPGMP_TEXT_DOMAIN ),
		'before' => '<div class="fc-4">',
		'after' => '</div>',
	));

$form->add_element( 'button', 'location_newfields_repeat', array(
	'value' => __( 'Add More...',WPGMP_TEXT_DOMAIN ),
	'desc' => '',
	'class' => 'repeat_button fc-btn fc-btn-default btn-sm',
	'before' => '<div class="fc-4">',
	'after' => '</div>',
));


$form->set_col( 1 );

$form->add_element( 'group', 'map_troubleshooting', array(
	'value' => __( 'Troubleshooting', WPGMP_TEXT_DOMAIN ),
	'before' => '<div class="fc-12">',
	'after' => '</div>',
));



$form->add_element( 'checkbox', 'wpgmp_auto_fix', array(
	'label' => __( 'Auto Fix', WPGMP_TEXT_DOMAIN ),
	'value' => 'true',
	'current' => $wpgmp_settings['wpgmp_auto_fix'],
	'desc' => __( 'If map is not visible somehow, turn on auto fix and check the map.', WPGMP_TEXT_DOMAIN ),
	'class' => 'chkbox_class',
));

$form->add_element( 'checkbox', 'wpgmp_debug_mode', array(
	'label' => __( 'Turn On Debug Mode', WPGMP_TEXT_DOMAIN ),
	'value' => 'true',
	'current' => $wpgmp_settings['wpgmp_debug_mode'],
	'desc' => __( 'If map is not visible somehow even auto fix in turned on, please turn on debug mode and contact support team to analysis javascript console output.', WPGMP_TEXT_DOMAIN ),
	'class' => 'chkbox_class',
));

$form->add_element( 'group', 'map_gdpr', array(
    'value' => __( 'Cookies Acceptance Setting', WPGMP_TEXT_DOMAIN ),
    'before' => '<div class="fc-12">',
    'after' => '</div>',
));

$form->add_element( 'checkbox', 'wpgmp_gdpr', array(
    'label' => __( 'Enable Cookies Acceptance', WPGMP_TEXT_DOMAIN ),
    'value' => 'true',
    'desc' => __('Maps will be not visible until visitor accept the cookies policy. You can display cookies message using popular cookies plugins. e.g cookies-notice wordpress plugin',WPGMP_TEXT_DOMAIN),
    'current' => $wpgmp_settings['wpgmp_gdpr'],
    'class' => 'chkbox_class switch_onoff',
    'data' => array( 'target' => '.wpgmp_gdpr_setting' ),
));

$form->add_element( 'textarea', 'wpgmp_gdpr_msg', array(
        'label' => __( '"No Map" Notice', WPGMP_TEXT_DOMAIN ),
        'desc' => __( 'Show message instead of map until visitor accept the cookies policy. HTML Tags are allowed. Leave it blank for no message.', WPGMP_TEXT_DOMAIN ),
        'value' => $wpgmp_settings['wpgmp_gdpr_msg'],
        'textarea_fc-dividers' => 10,
        'textarea_name' => 'wpgmp_gdpr_msg',
        'class' => 'form-control wpgmp_gdpr_setting',
        'show' => 'false',
));


$form->add_element('submit','wpgmp_save_settings',array(
    'value' => __( 'Save Setting',WPGMP_TEXT_DOMAIN ),
    ));
$form->add_element('hidden','operation',array(
    'value' => 'save',
    ));
$form->add_element('hidden','page_options',array(
    'value' => 'wpgmp_api_key,wpgmp_scripts_place',
    ));
$form->render();