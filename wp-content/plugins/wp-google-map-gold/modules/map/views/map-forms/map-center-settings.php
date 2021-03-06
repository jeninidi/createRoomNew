<?php
/**
 * Map's Center Location setting(s).
 * @package Maps
 */

$form->add_element( 'group', 'map_center_setting', array(
	'value' => __( 'Map\'s Center', WPGMP_TEXT_DOMAIN ),
	'before' => '<div class="fc-12">',
	'after' => '</div>',
));

$form->add_element( 'text', 'map_all_control[map_center_latitude]', array(
	'label' => __( 'Center Latitude', WPGMP_TEXT_DOMAIN ),
	'value' => $data['map_all_control']['map_center_latitude'],
	'desc' => __( 'Enter here the center latitude.', WPGMP_TEXT_DOMAIN ),
	'placeholder' => '',
));
$form->add_element( 'text', 'map_all_control[map_center_longitude]', array(
	'label' => __( 'Center Longitude', WPGMP_TEXT_DOMAIN ),
	'value' => $data['map_all_control']['map_center_longitude'],
	'desc' => __( 'Enter here the center longitude.', WPGMP_TEXT_DOMAIN ),
	'placeholder' => '',
));


$form->add_element( 'checkbox', 'map_all_control[nearest_location]', array(
	'label' => __( 'Center by Current Location', WPGMP_TEXT_DOMAIN ),
	'value' => 'true',
	'class' => 'chkbox_class',
	'id' => 'wpgmp_nearest_location',
	'current' => $data['map_all_control']['nearest_location'],
	'desc' => __( 'Center the map based on visitor\'s current location.', WPGMP_TEXT_DOMAIN ),
));

$form->add_element( 'checkbox', 'map_all_control[fit_bounds]', array(
	'label' => __( 'Center by Locations Assigned', WPGMP_TEXT_DOMAIN ),
	'value' => 'true',
	'class' => 'chkbox_class',
	'id' => 'wpgmp_nearest_location',
	'current' => $data['map_all_control']['fit_bounds'],
	'desc' => __( 'Center the map based on locations assigned to the map to show all locations at once.', WPGMP_TEXT_DOMAIN ),
));

$form->add_element( 'checkbox', 'map_all_control[current_post]', array(
	'label' => __( 'Center by Current Post', WPGMP_TEXT_DOMAIN ),
	'value' => 'true',
	'class' => 'chkbox_class',
	'current' => $data['map_all_control']['current_post'],
	'desc' => __( 'To display a map centred on the current post', WPGMP_TEXT_DOMAIN ),
));

$form->add_element( 'checkbox', 'map_all_control[show_center_circle]', array(
	'label' => __( 'Display Circle', WPGMP_TEXT_DOMAIN ),
	'value' => 'true',
	'id' => 'show_center_circle',
	'current' => $data['map_all_control']['show_center_circle'],
	'desc' => __( 'Display a circle around the center location.', WPGMP_TEXT_DOMAIN ),
	'class' => 'chkbox_class switch_onoff',
	'data' => array( 'target' => '.center_circle_settings' ),
));
$form->set_col( 6 );
$color = (empty( $data['map_all_control']['center_circle_fillcolor'] )) ?  '8CAEF2' : sanitize_text_field( wp_unslash( $data['map_all_control']['center_circle_fillcolor'] ) );
$form->add_element( 'text', 'map_all_control[center_circle_fillcolor]', array(
	'value' => $color,
	'class' => 'color form-control center_circle_settings',
	'id' => 'center_circle_fillcolor',
	'desc' => __( 'Circle fill color.', WPGMP_TEXT_DOMAIN ),
	'show' => 'false',
	'before' => '<div class="fc-2">',
	'after' => '</div>',
));
$form->add_element( 'text', 'map_all_control[center_circle_fillopacity]', array(
	'value' => $data['map_all_control']['center_circle_fillopacity'],
	'class' => 'form-control center_circle_settings',
	'id' => 'center_circle_fillopacity',
	'desc' => __( 'Circle fill opacity.', WPGMP_TEXT_DOMAIN ),
	'show' => 'false',
	'before' => '<div class="fc-2">',
	'after' => '</div>',
	'default_value' => '.5',
));
$color = (empty( $data['map_all_control']['center_circle_strokecolor'] )) ?  '8CAEF2' : sanitize_text_field( wp_unslash( $data['map_all_control']['center_circle_strokecolor'] ) );
$form->add_element( 'text', 'map_all_control[center_circle_strokecolor]', array(
	'value' => $color,
	'class' => 'color {pickerClosable:true} form-control center_circle_settings',
	'id' => 'center_circle_strokecolor',
	'desc' => __( 'Circle stroke color.', WPGMP_TEXT_DOMAIN ),
	'show' => 'false',
	'before' => '<div class="fc-2">',
	'after' => '</div>',
));

$form->add_element( 'text', 'map_all_control[center_circle_strokeopacity]', array(
	'value' => $data['map_all_control']['center_circle_strokeopacity'],
	'class' => 'form-control center_circle_settings',
	'id' => 'center_circle_strokeopacity',
	'desc' => __( 'Circle stroke opacity.', WPGMP_TEXT_DOMAIN ),
	'show' => 'false',
	'before' => '<div class="fc-2">',
	'after' => '</div>',
	'default_value' => '.5',
));

$form->add_element( 'text', 'map_all_control[center_circle_strokeweight]', array(
	'value' => $data['map_all_control']['center_circle_strokeweight'],
	'class' => 'form-control center_circle_settings',
	'id' => 'center_circle_strokeweight',
	'desc' => __( 'Circle stroke weight.', WPGMP_TEXT_DOMAIN ),
	'show' => 'false',
	'before' => '<div class="fc-2">',
	'after' => '</div>',
	'default_value' => '1',
));

$form->add_element( 'text', 'map_all_control[center_circle_radius]', array(
	'value' => $data['map_all_control']['center_circle_radius'],
	'class' => 'form-control center_circle_settings',
	'id' => 'center_circle_radius',
	'desc' => __( 'Circle radius around center location.', WPGMP_TEXT_DOMAIN ),
	'show' => 'false',
	'before' => '<div class="fc-2">',
	'after' => '</div>',
	'default_value' => '5',
));

$form->set_col( 1 );
$form->add_element( 'checkbox', 'map_all_control[show_center_marker]', array(
	'label' => __( 'Display Marker', WPGMP_TEXT_DOMAIN ),
	'value' => 'true',
	'id' => 'show_center_marker',
	'current' => $data['map_all_control']['show_center_marker'],
	'desc' => __( 'Display a marker on center location.', WPGMP_TEXT_DOMAIN ),
	'class' => 'chkbox_class switch_onoff',
	'data' => array( 'target' => '.center_marker_settings' ),
));

$form->add_element( 'textarea', 'map_all_control[show_center_marker_infowindow]', array(
	'label' => __( 'Infowindow Message for Center Marker', WPGMP_TEXT_DOMAIN ),
	'value' => $data['map_all_control']['show_center_marker_infowindow'],
	'desc' => __('Display custom message on center location.',WPGMP_TEXT_DOMAIN),
	'textarea_rows' => 10,
	'textarea_name' => 'show_center_marker_infowindow',
	'class' => 'form-control center_marker_settings',
	'id' => 'show_center_marker_infowindow',
	'show' => 'false',
));

$form->add_element('image_picker', 'map_all_control[marker_center_icon]', array(
		'label' => __( 'Choose Center Marker Image', WPGMP_TEXT_DOMAIN ),
		'src' => (isset( $data['map_all_control']['marker_center_icon'] )  ? wp_unslash( $data['map_all_control']['marker_center_icon'] ) : WPGMP_IMAGES.'/default_marker.png'),
		'required' => false,
		'before' => '<div class="fc-8 center_marker_settings">',
		'after' => '</div>',
		'show' => 'false',
		'choose_button' => __( 'Choose', WPGMP_TEXT_DOMAIN ),
		'remove_button' => __( 'Remove',WPGMP_TEXT_DOMAIN ),
		'id' => 'marker_center_icon',
	));
