<?php
/**
 * Display Tabs over google maps.
 * @package Maps
 * @author Flipper Code <hello@flippercode.com>
 */

$form->add_element( 'group', 'map_am_setting', array(
	'value' => __( 'Google Maps Amenities', WPGMP_TEXT_DOMAIN ),
	'before' => '<div class="fc-12">',
	'after' => '</div>',
));

$form->add_element( 'checkbox', 'map_all_control[gm_amenities]', array(
	'label' => __( 'Show Amenities', WPGMP_TEXT_DOMAIN ),
	'value' => 'true',
	'id' => 'wpgmp_display_marker_category',
	'current' => $data['map_all_control']['gm_amenities'],
	'desc' => __( 'Show nearby amenities on the map.', WPGMP_TEXT_DOMAIN ),
	'class' => 'chkbox_class switch_onoff',
	'data' => array( 'target' => '.map_amenities_setting' ),
));

$dimension_options = array( 'miles' => __( 'Miles',WPGMP_TEXT_DOMAIN ),'km' => __( 'KM',WPGMP_TEXT_DOMAIN ) );
$form->add_element( 'select', 'map_all_control[gm_radius_dimension]', array(
	'label' => __( 'Dimension', WPGMP_TEXT_DOMAIN ),
	'current' => $data['map_all_control']['gm_radius_dimension'],
	'desc' => __( 'Choose radius dimension in miles or km.', WPGMP_TEXT_DOMAIN ),
	'options' => $dimension_options,
	'class' => 'form-control  map_amenities_setting',
	'show' => 'false',
));

$form->add_element( 'text', 'map_all_control[gm_radius]', array(
	'label' => __( 'Radius Options', WPGMP_TEXT_DOMAIN ),
	'value' => $data['map_all_control']['gm_radius'],
	'desc' => __( 'Set radius in number.', WPGMP_TEXT_DOMAIN ),
	'class' => 'form-control  map_amenities_setting',
	'show' => 'false',
	'default_value' => '100',
));

$form->add_element( 'message', 'gamenities_instruction', array(
	'value' => __( 'You can select amenities to display on map load.',WPGMP_TEXT_DOMAIN ),
	'class' => 'alert alert-success map_amenities_setting',
	'show' => 'false',
));

$amenities_options = array(
'accounting',
'airport',
'amusement_park',
'aquarium',
'art_gallery',
'atm',
'bakery',
'bank',
'bar',
'beauty_salon',
'bicycle_store',
'book_store',
'bowling_alley',
'bus_station',
'cafe',
'campground',
'car_dealer',
'car_rental',
'car_repair',
'car_wash',
'casino',
'cemetery',
'church',
'city_hall',
'clothing_store',
'convenience_store',
'courthouse',
'dentist',
'department_store',
'doctor',
'electrician',
'electronics_store',
'embassy',
'establishment',
'finance',
'fire_station',
'florist',
'food',
'funeral_home',
'furniture_store',
'gas_station',
'general_contractor',
'grocery_or_supermarket',
'gym',
'hair_care',
'hardware_store',
'health',
'hindu_temple',
'home_goods_store',
'hospital',
'insurance_agency',
'jewelry_store',
'laundry',
'lawyer',
'library',
'liquor_store',
'local_government_office',
'locksmith',
'lodging',
'meal_delivery',
'meal_takeaway',
'mosque',
'movie_rental',
'movie_theater',
'moving_company',
'museum',
'night_club',
'painter',
'park',
'parking',
'pet_store',
'pharmacy',
'physiotherapist',
'place_of_worship',
'plumber',
'police',
'post_office',
'real_estate_agency',
'restaurant',
'roofing_contractor',
'rv_park',
'school',
'shoe_store',
'shopping_mall',
'spa',
'stadium',
'storage',
'store',
'subway_station',
'synagogue',
'taxi_stand',
'train_station',
'travel_agency',
'university',
'veterinary_care',
'zoo',
	);
$amenities = array();
if ( ! empty( $amenities_options ) ) {
	$count = 0;
	$column = 1;
	foreach ( $amenities_options as $place_type => $amenity ) {

		$amenities[ $count ][] = $form->field_checkbox( 'map_all_control[wpgmp_show_amenities]['.$amenity.']', array(
				'desc' => str_replace('_',' ',$amenity),
				'value' => $amenity,
				'current' => $data['map_all_control']['wpgmp_show_amenities'][ $amenity ],
				'before' => '<div class="fc-1">',
				'after' => '</div>',
				'class' => 'chkbox_class',
				) );
		if ( 0 == $column % 7 ) {
			$count++; }

		$column++;
	}
}
$form->add_element( 'table', 'wpgmp_gamenities_table', array(
		'heading' => array( '','','','','','','','' ),
		'data' => $amenities,
		'before' => '<div class="fc-11">',
		'after' => '</div>',
		'class' => ' map_amenities_setting',
		'show' => 'false',
));