<?php
/**
 * Control Setting(s).
 * @package Maps
 */

$form->add_element( 'group', 'map_control_setting', array(
	'value' => __( 'Control Setting', WPGMP_TEXT_DOMAIN ),
	'before' => '<div class="fc-12">',
	'after' => '</div>',
));

$form->add_element( 'checkbox', 'map_all_control[zoom_control]', array(
	'label' => __( 'Turn Off Zoom Control', WPGMP_TEXT_DOMAIN ),
	'value' => 'false',
	'id' => 'wpgmp_zoom_control',
	'current' => $data['map_all_control']['zoom_control'],
	'desc' => __( 'Please check to disable zoom control.', WPGMP_TEXT_DOMAIN ),
	'class' => 'chkbox_class',
));


$form->add_element( 'checkbox', 'map_all_control[full_screen_control]', array(
	'label' => __( 'Turn Off Full Screen Control', WPGMP_TEXT_DOMAIN ),
	'value' => 'false',
	'id' => 'full_screen_control',
	'current' => $data['map_all_control']['full_screen_control'],
	'desc' => __( 'Please check to disable full screen control.', WPGMP_TEXT_DOMAIN ),
	'class' => 'chkbox_class',
));


$form->add_element( 'checkbox', 'map_all_control[map_type_control]', array(
	'label' => __( 'Turn Off Map Type Control', WPGMP_TEXT_DOMAIN ),
	'value' => 'false',
	'id' => 'map_type_control',
	'current' => $data['map_all_control']['map_type_control'],
	'desc' => __( 'Please check to disable map type control.', WPGMP_TEXT_DOMAIN ),
	'class' => 'chkbox_class',
));
$form->add_element( 'checkbox', 'map_all_control[scale_control]', array(
	'label' => __( 'Turn Off Scale Control', WPGMP_TEXT_DOMAIN ),
	'value' => 'false',
	'id' => 'scale_control',
	'current' => $data['map_all_control']['scale_control'],
	'desc' => __( 'Please check to disable scale control.', WPGMP_TEXT_DOMAIN ),
	'class' => 'chkbox_class',
));
$form->add_element( 'checkbox', 'map_all_control[street_view_control]', array(
	'label' => __( 'Turn Off Street View Control', WPGMP_TEXT_DOMAIN ),
	'value' => 'false',
	'id' => 'wpgmp_street_view_control',
	'current' => $data['map_all_control']['street_view_control'],
	'desc' => __( 'Please check to disable street view control.', WPGMP_TEXT_DOMAIN ),
	'class' => 'chkbox_class',
));
$form->add_element( 'checkbox', 'map_all_control[overview_map_control]', array(
	'label' => __( 'Turn Off Overview Map Control', WPGMP_TEXT_DOMAIN ),
	'value' => 'false',
	'id' => 'overview_map_control',
	'current' => $data['map_all_control']['overview_map_control'],
	'desc' => __( 'Please check to disable overview map control.', WPGMP_TEXT_DOMAIN ),
	'class' => 'chkbox_class',
));

$form->add_element( 'checkbox', 'map_all_control[search_control]', array(
	'label' => __( 'Turn On Search Control', WPGMP_TEXT_DOMAIN ),
	'value' => 'true',
	'id' => 'search_control',
	'current' => $data['map_all_control']['search_control'],
	'desc' => __( 'Please check to enable search box control.', WPGMP_TEXT_DOMAIN ),
	'class' => 'chkbox_class',
));

$form->add_element( 'checkbox', 'map_all_control[locateme_control]', array(
	'label' => __( 'Turn On Locate Me Control', WPGMP_TEXT_DOMAIN ),
	'value' => 'true',
	'id' => 'search_control',
	'current' => $data['map_all_control']['locateme_control'],
	'desc' => __( 'Please check to enable locate me control.', WPGMP_TEXT_DOMAIN ),
	'class' => 'chkbox_class',
));