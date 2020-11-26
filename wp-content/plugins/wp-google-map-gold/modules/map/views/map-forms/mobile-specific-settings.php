<?php
/**
 * Map's mobile specific setting(s).
 * @package Maps
 */

$form->add_element( 'group', 'mobile_specific_settings', array(
	'value' => __( 'Screens Specific Setting', WPGMP_TEXT_DOMAIN ),
	'before' => '<div class="fc-12">',
	'after' => '</div>',
));

$form->add_element( 'checkbox', 'map_all_control[mobile_specific]', array(
	'label' => __( 'Apply Screens Settings', WPGMP_TEXT_DOMAIN ),
	'value' => 'true',
	'id' => 'wpgmp_overlay',
	'current' => $data['map_all_control']['mobile_specific'],
	'desc' => __( 'Apply screen specific settings for desktop, mobile and tablets.', WPGMP_TEXT_DOMAIN ),
	'class' => 'chkbox_class switch_onoff',
	'data' => array( 'target' => '.map_mobile_specific' ),
));

$screens_options = array();


$zoom_level = array();
for ( $i = 0; $i < 20; $i++ ) {
	$zoom_level[ $i ] = $i;
}


$supported_screens = array('Smartphones','iPads','Large screens');


foreach($supported_screens as $key => $screen) {
$screen_slug = sanitize_title($screen);
$width = $form->field_text('map_all_control[screens]['.$screen_slug.'][map_width_mobile]', array(
	'label' => __( 'Map Width', WPGMP_TEXT_DOMAIN ),
	'value' => $data['map_all_control']['screens'][$screen_slug]['map_width_mobile'],
	'placeholder' => __( 'Map width in pixel.', WPGMP_TEXT_DOMAIN ),
));

$height = $form->field_text('map_all_control[screens]['.$screen_slug.'][map_height_mobile]', array(
	'label' => __( 'Map Height', WPGMP_TEXT_DOMAIN ),
	'value' => $data['map_all_control']['screens'][$screen_slug]['map_height_mobile'],
	'placeholder' => __( 'Map height in pixel.', WPGMP_TEXT_DOMAIN ),
));


$zoom =  $form->field_select('map_all_control[screens]['.$screen_slug.'][map_zoom_level_mobile]', array(
	'label' => __( 'Map Zoom Level', WPGMP_TEXT_DOMAIN ),
	'current' => $data['map_all_control']['screens'][$screen_slug]['map_zoom_level_mobile'],
	'options' => $zoom_level,
	'class' => 'form-controls',
	'default_value' => '5',
));

$draggable = $form->field_checkbox('map_all_control[screens]['.$screen_slug.'][map_draggable_mobile]', array(
	'label' => __( 'Map Draggable', WPGMP_TEXT_DOMAIN ),
	'value' => 'false',
	'id' => 'wpgmp_map_draggable_mobile',
	'current' => $data['map_all_control']['screens'][$screen_slug]['map_draggable_mobile'],
	'desc' => __( 'Tick to off map draggable.', WPGMP_TEXT_DOMAIN ),
	'class' => 'chkbox_class',
	'default_value' => 'true',
));

$scrolling = $form->field_checkbox('map_all_control[screens]['.$screen_slug.'][map_scrolling_wheel_mobile]', array(
	'label' => __( 'Turn Off Scrolling Wheel', WPGMP_TEXT_DOMAIN ),
	'value' => 'false',
	'id' => 'map_scrolling_wheel_mobile',
	'current' => $data['map_all_control']['screens'][$screen_slug]['map_scrolling_wheel_mobile'],
	'desc' => __( 'Tick to off scrolling wheel.', WPGMP_TEXT_DOMAIN ),
	'class' => 'chkbox_class ',
	'default_value' => 'true',

));

	$screens_options[] = array($screen,$width,$height,$zoom,$draggable,$scrolling);  
}

$form->add_element( 'table', 'screen_specific_settings', array(
		'heading' => array( 'Screen','Width','Height','Zoom','Draggable','Scrolling Wheel' ),
		'data' => $screens_options,
		'before' => '<div class="fc-12 map_mobile_specific">',
		'after' => '</div>',
		'show' => 'false',
		));