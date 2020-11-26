<?php
/**
 * Map's general setting(s).
 * @package Maps
 */

$form->add_element( 'text', 'map_title', array(
	'label' => __( 'Map Title', WPGMP_TEXT_DOMAIN ),
	'value' => $data['map_title'],
	'desc' => __( 'Enter here the map title.', WPGMP_TEXT_DOMAIN ),
	'required' => true,
	'placeholder' => '',
));
$form->add_element( 'text', 'map_width', array(
	'label' => __( 'Map Width', WPGMP_TEXT_DOMAIN ),
	'value' => $data['map_width'],
	'desc' => __( 'Enter here the map width in pixel. Leave it blank for 100% width.', WPGMP_TEXT_DOMAIN ),
	'placeholder' => '',
));
$form->add_element( 'text', 'map_height', array(
	'label' => __( 'Map Height', WPGMP_TEXT_DOMAIN ),
	'value' => $data['map_height'],
	'desc' => __( 'Enter here the map height in pixel.', WPGMP_TEXT_DOMAIN ),
	'required' => true,
	'placeholder' => '',
));

$zoom_level = array();
for ( $i = 0; $i < 20; $i++ ) {
	$zoom_level[ $i ] = $i;
}

$form->add_element( 'select', 'map_all_control[map_minzoom_level]', array(
	'label' => __( 'Minimum Zoom Level', WPGMP_TEXT_DOMAIN ),
	'current' => $data['map_all_control']['map_minzoom_level'],
	'desc' => __( 'The minimum zoom level which will be displayed on the map.', WPGMP_TEXT_DOMAIN ),
	'options' => $zoom_level,
	'default_value' => 0,
));

$form->add_element( 'select', 'map_all_control[map_maxzoom_level]', array(
	'label' => __( 'Maximum Zoom Level', WPGMP_TEXT_DOMAIN ),
	'current' => $data['map_all_control']['map_maxzoom_level'],
	'desc' => __( 'The maximum zoom level which will be displayed on the map.', WPGMP_TEXT_DOMAIN ),
	'options' => $zoom_level,
	'default_value' => 19,
));

$form->add_element( 'select', 'map_zoom_level', array(
	'label' => __( 'Default Zoom Level', WPGMP_TEXT_DOMAIN ),
	'current' => $data['map_zoom_level'],
	'desc' => __( 'Default zoom level when page is loaded.', WPGMP_TEXT_DOMAIN ),
	'options' => $zoom_level,
	'default_value' => 5,
));

$map_type = array( 'ROADMAP' => 'ROADMAP','SATELLITE' => 'SATELLITE','HYBRID' => 'HYBRID','TERRAIN' => 'TERRAIN' );
$form->add_element( 'select', 'map_type', array(
	'label' => __( 'Map Type', WPGMP_TEXT_DOMAIN ),
	'current' => $data['map_type'],
	'options' => $map_type,
));

$form->add_element( 'checkbox', 'map_scrolling_wheel', array(
	'label' => __( 'Turn Off Scrolling Wheel', WPGMP_TEXT_DOMAIN ),
	'value' => 'false',
	'id' => 'wpgmp_map_scrolling_wheel',
	'current' => $data['map_scrolling_wheel'],
	'desc' => __( 'Please check to disable scroll wheel zoom.', WPGMP_TEXT_DOMAIN ),
	'class' => 'chkbox_class ',
));

$form->add_element( 'checkbox', 'map_all_control[doubleclickzoom]', array(
	'label' => __( 'Double Click Zoom', WPGMP_TEXT_DOMAIN ),
	'value' => 'true',
	'id' => 'doubleclickzoom',
	'current' => $data['map_all_control']['doubleclickzoom'],
	'desc' => __( 'Please check to enable zoom on double click on the map.', WPGMP_TEXT_DOMAIN ),
	'class' => 'chkbox_class ',
));

$form->add_element( 'checkbox', 'map_all_control[map_draggable]', array(
	'label' => __( 'Map Draggable', WPGMP_TEXT_DOMAIN ),
	'value' => 'false',
	'id' => 'wpgmp_map_draggable',
	'current' => $data['map_all_control']['map_draggable'],
	'desc' => __( 'Please check to disable map draggable.', WPGMP_TEXT_DOMAIN ),
	'class' => 'chkbox_class',
));

$form->add_element( 'checkbox', 'map_45imagery', array(
	'label' => __( '45&deg; Imagery', WPGMP_TEXT_DOMAIN ),
	'value' => '45',
	'id' => 'wpgmp_map_45imagery',
	'current' => $data['map_45imagery'],
	'desc' => __( 'Apply 45&deg; Imagery ? (only available for map type SATELLITE and HYBRID).', WPGMP_TEXT_DOMAIN ),
	'class' => 'chkbox_class',
));

$gesture = array( 'auto' => 'Auto','greedy' => 'Greedy','cooperative' => 'Cooperative', 'none' => 'None' );
$form->add_element( 'select', 'map_all_control[gesture]', array(
	'label' => __( 'Gesture Handling', WPGMP_TEXT_DOMAIN ),
	'current' => $data['map_all_control']['gesture'],
	'options' => $gesture,
	'desc' => __( 'Controlling Zoom and Pan for desktop, touchscreen and mobile devices.', WPGMP_TEXT_DOMAIN ),
));
