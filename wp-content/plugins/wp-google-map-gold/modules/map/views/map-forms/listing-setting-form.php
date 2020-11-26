<?php
/**
 * Contro Positioning over google maps.
 * @package Maps
 * @author Flipper Code <hello@flippercode.com>
 */

$form->add_element( 'group', 'map_elements_setting', array(
	'value' => __( 'Custom Filters', WPGMP_TEXT_DOMAIN ),
	'before' => '<div class="fc-12">',
	'after' => '</div>',
));

$form->add_element( 'checkbox_toggle', 'map_all_control[wpgmp_display_custom_filters]', array(
	'label' => __( 'Display Custom Filters', WPGMP_TEXT_DOMAIN ),
	'value' => 'true',
	'id' => 'wpgmp_wpgmp_display_custom_filters',
	'current' => $data['map_all_control']['wpgmp_display_custom_filters'],
	'desc' => __( 'Check to enable custom filters for extra fields, custom fields & taxonomies.', WPGMP_TEXT_DOMAIN ),
	'class' => 'chkbox_class switch_onoff ',
	'data' => array( 'target' => '.wpgmp_custom_filters' ),
));
$form->set_col( 3 );
$next_index = 0;
if ( isset( $data['map_all_control']['custom_filters'] ) && $data['map_all_control']['wpgmp_display_custom_filters'] == true ) {
	$ex = 0;
	foreach ( $data['map_all_control']['custom_filters'] as $i => $label ) {
		$form->add_element( 'text', 'map_all_control[custom_filters]['.$ex.'][slug]', array(
			'value' => (isset( $data['map_all_control']['custom_filters'][ $i ]['slug'] ) and ! empty( $data['map_all_control']['custom_filters'][ $i ]['slug'] )) ? $data['map_all_control']['custom_filters'][ $i ]['slug'] : '',
			'desc' => __( 'Enter placeholder for marker taxonomies, extra fields or custom fields as {%custom_field_slug_here%}, {extra_field_slug_here}, {%taxonomy%}, e.g: {color}.', WPGMP_TEXT_DOMAIN ),
			'class' => 'wpgmp_custom_filters form-control sortable_child',
			'placeholder' => __( 'Enter placeholder', WPGMP_TEXT_DOMAIN ),
			'before' => '<div class="fc-4">',
			'after' => '</div>',
			'show' => 'false',
			'lable' => '&nbsp;'
		));
		$form->add_element( 'text', 'map_all_control[custom_filters]['.$ex.'][text]', array(
			'value' => (isset( $data['map_all_control']['custom_filters'][ $i ]['text'] ) and ! empty( $data['map_all_control']['custom_filters'][ $i ]['text'] )) ? $data['map_all_control']['custom_filters'][ $i ]['text'] : '',
			'desc' => __( 'Enter text here for the filter to be shown, e.g: Select Colors.', WPGMP_TEXT_DOMAIN ),
			'class' => 'wpgmp_custom_filters form-control',
			'placeholder' => __( 'Enter filter text', WPGMP_TEXT_DOMAIN ),
			'before' => '<div class="fc-3">',
			'after' => '</div>',
			'show' => 'false',
		));
		$form->add_element( 'button', 'custom_filters_add_btn['.$ex.']', array(
			'value' => __( 'Remove',WPGMP_TEXT_DOMAIN ),
			'desc' => '',
			'class' => 'repeat_remove_button fc-btn fc-btn-blue btn-sm wpgmp_custom_filters',
			'before' => '<div class="fc-2">',
			'after' => '</div>',
			'show' => 'false',
		));			
		$ex++;
	}
	$next_index = $ex;
}

$form->add_element( 'text', 'map_all_control[custom_filters]['.$next_index.'][slug]', array(
	'value' => (isset( $data['map_all_control']['custom_filters'][ $next_index ]['slug'] ) and ! empty( $data['map_all_control']['custom_filters'][ $next_index ]['slug'] )) ? $data['map_all_control']['custom_filters'][ $next_index ]['slug'] : '',
	'desc' => __( 'Enter placeholder here for marker taxonomies, extra fields or custom fields as {%custom_field_slug_here%}, {extra_field_slug_here}, {%taxonomy%}, e.g: {color}.', WPGMP_TEXT_DOMAIN ),
	'class' => 'wpgmp_custom_filters form-control sortable_child',
	'placeholder' => __( 'Enter placeholder', WPGMP_TEXT_DOMAIN ),
	'before' => '<div class="fc-4">',
	'after' => '</div>',
	'show' => 'false',
	'lable' => '&nbsp;'
));

$form->add_element( 'text', 'map_all_control[custom_filters]['.$next_index.'][text]', array(
	'value' => (isset( $data['map_all_control']['custom_filters'][ $next_index ]['text'] ) and ! empty( $data['map_all_control']['custom_filters'][ $next_index ]['text'] )) ? $data['map_all_control']['custom_filters'][ $next_index ]['text'] : '',
	'desc' => __( 'Enter text here for the filter to be shown, e,g, : Select Colors.', WPGMP_TEXT_DOMAIN ),
	'class' => 'wpgmp_custom_filters form-control',
	'placeholder' => __( 'Enter filter text', WPGMP_TEXT_DOMAIN ),
	'before' => '<div class="fc-3">',
	'after' => '</div>',
	'show' => 'false',
));

$form->add_element( 'button', 'custom_filters_add_btn['.$next_index.']', array(
	'value' => __( 'Add More...',WPGMP_TEXT_DOMAIN ),
	'desc' => '',
	'class' => 'repeat_button fc-btn fc-btn-blue btn-sm wpgmp_custom_filters',
	'before' => '<div class="fc-2">',
	'after' => '</div>',
	'show' => 'false',
));
	
$form->set_col( 1 );


$form->add_element( 'group', 'map_listing_setting', array(
	'value' => __( 'Listing Settings', WPGMP_TEXT_DOMAIN ),
	'before' => '<div class="fc-12">',
	'after' => '</div>',
));

$form->add_element( 'checkbox', 'map_all_control[display_listing]', array(
	'label' => __( 'Display Listing', WPGMP_TEXT_DOMAIN ),
	'value' => 'true',
	'id' => 'wpgmp_display_listing',
	'current' => $data['map_all_control']['display_listing'],
	'desc' => __( 'Display locations listing below the map.', WPGMP_TEXT_DOMAIN ),
	'class' => 'chkbox_class switch_onoff',
	'data' => array( 'target' => '.wpgmp_display_listing' ),
));

$form->add_element( 'checkbox', 'map_all_control[wpgmp_search_display]', array(
	'label' => __( 'Display Search Form', WPGMP_TEXT_DOMAIN ),
	'value' => 'true',
	'id' => 'wpgmp_wpgmp_search_display',
	'current' => $data['map_all_control']['wpgmp_search_display'],
	'desc' => __( 'Check to display search form below the map.', WPGMP_TEXT_DOMAIN ),
	'class' => 'chkbox_class wpgmp_display_listing switch_onoff',
	'show' => 'false',
	'data' => array( 'target' => '.wpgmp_search_display' ),

));

$form->add_element( 'checkbox', 'map_all_control[search_field_autosuggest]', array(
	'label' => __( 'Enable Google Autosuggest', WPGMP_TEXT_DOMAIN ),
	'value' => 'true',
	'current' => $data['map_all_control']['search_field_autosuggest'],
	'desc' => __( 'Apply google autosuggest on search field.', WPGMP_TEXT_DOMAIN ),
	'class' => 'chkbox_class wpgmp_display_listing wpgmp_search_display',
	'show' => 'false',
));

$form->add_element( 'checkbox', 'map_all_control[wpgmp_display_category_filter]', array(
	'label' => __( 'Display Category Filter', WPGMP_TEXT_DOMAIN ),
	'value' => 'true',
	'id' => 'wpgmp_display_category_filter',
	'current' => $data['map_all_control']['wpgmp_display_category_filter'],
	'desc' => __( 'Check to display category filter.', WPGMP_TEXT_DOMAIN ),
	'class' => 'chkbox_class wpgmp_display_listing',
	'show' => 'false',
));


$form->add_element( 'checkbox', 'map_all_control[wpgmp_display_sorting_filter]', array(
	'label' => __( 'Display Sorting Filter', WPGMP_TEXT_DOMAIN ),
	'value' => 'true',
	'id' => 'wpgmp_wpgmp_display_sorting_filter',
	'current' => $data['map_all_control']['wpgmp_display_sorting_filter'],
	'desc' => __( 'Check to display sorting filter.', WPGMP_TEXT_DOMAIN ),
	'class' => 'chkbox_class wpgmp_display_listing',
	'show' => 'false',
));

$form->add_element( 'checkbox', 'map_all_control[wpgmp_display_radius_filter]', array(
	'label' => __( 'Display Radius Filter', WPGMP_TEXT_DOMAIN ),
	'value' => 'true',
	'id' => 'wpgmp_display_radius_filter',
	'current' => $data['map_all_control']['wpgmp_display_radius_filter'],
	'desc' => __( 'Check to display radius filter. Recommended to display search results within certian radius.', WPGMP_TEXT_DOMAIN ),
	'class' => 'chkbox_class wpgmp_display_listing switch_onoff',
	'show' => 'false',
	'data' => array( 'target' => '.wpgmp_radius_filter' ),
));

$dimension_options = array( 'miles' => __( 'Miles',WPGMP_TEXT_DOMAIN ),'km' => __( 'KM',WPGMP_TEXT_DOMAIN ) );
$form->add_element( 'select', 'map_all_control[wpgmp_radius_dimension]', array(
	'label' => __( 'Dimension', WPGMP_TEXT_DOMAIN ),
	'current' => $data['map_all_control']['wpgmp_radius_dimension'],
	'desc' => __( 'Choose radius dimension in miles or km.', WPGMP_TEXT_DOMAIN ),
	'options' => $dimension_options,
	'class' => 'form-control  wpgmp_radius_filter',
	'show' => 'false',
));

$form->add_element( 'text', 'map_all_control[wpgmp_radius_options]', array(
	'label' => __( 'Radius Options', WPGMP_TEXT_DOMAIN ),
	'value' => $data['map_all_control']['wpgmp_radius_options'],
	'desc' => __( 'Set radius options. Enter comma seperated numbers.', WPGMP_TEXT_DOMAIN ),
	'class' => 'form-control  wpgmp_radius_filter',
	'show' => 'false',
	'default_value' => '5,10,15,20,25,50,100,200,500',
));

$form->add_element( 'checkbox', 'map_all_control[wpgmp_display_location_per_page_filter]', array(
	'label' => __( 'Display Per Page Filter', WPGMP_TEXT_DOMAIN ),
	'value' => 'true',
	'id' => 'wpgmp_wpgmp_display_location_per_page_filter',
	'current' => $data['map_all_control']['wpgmp_display_location_per_page_filter'],
	'desc' => __( 'Check to enable locations per page filter.', WPGMP_TEXT_DOMAIN ),
	'class' => 'chkbox_class wpgmp_display_listing',
	'show' => 'false',
));

$form->add_element( 'checkbox', 'map_all_control[wpgmp_display_location_per_page_filter]', array(
	'label' => __( 'Display Per Page Filter', WPGMP_TEXT_DOMAIN ),
	'value' => 'true',
	'id' => 'wpgmp_wpgmp_display_location_per_page_filter',
	'current' => $data['map_all_control']['wpgmp_display_location_per_page_filter'],
	'desc' => __( 'Check to enable locations per page filter.', WPGMP_TEXT_DOMAIN ),
	'class' => 'chkbox_class wpgmp_display_listing',
	'show' => 'false',
));

$form->add_element( 'checkbox', 'map_all_control[wpgmp_display_print_option]', array(
	'label' => __( 'Display Print Option', WPGMP_TEXT_DOMAIN ),
	'value' => 'true',
	'id' => 'wpgmp_display_print_option',
	'current' => $data['map_all_control']['wpgmp_display_print_option'],
	'desc' => __( 'Check to display print option.', WPGMP_TEXT_DOMAIN ),
	'class' => 'chkbox_class wpgmp_display_listing',
	'show' => 'false',
));

$form->add_element( 'checkbox', 'map_all_control[wpgmp_display_grid_option]', array(
	'label' => __( 'Display Grid/List Option', WPGMP_TEXT_DOMAIN ),
	'value' => 'true',
	'id' => 'wpgmp_display_grid_option',
	'current' => $data['map_all_control']['wpgmp_display_grid_option'],
	'desc' => __( 'Switch between list/grid view.', WPGMP_TEXT_DOMAIN ),
	'class' => 'chkbox_class wpgmp_display_listing',
	'show' => 'false',
));

$form->add_element( 'text', 'map_all_control[wpgmp_listing_number]', array(
	'label' => __( 'Locations Per Page', WPGMP_TEXT_DOMAIN ),
	'value' => $data['map_all_control']['wpgmp_listing_number'],
	'desc' => __( 'Set locations to display per page. Default is 10.', WPGMP_TEXT_DOMAIN ),
	'class' => 'form-control wpgmp_display_listing',
	'show' => 'false',
	'default_value' => 10,
));


$form->add_element( 'textarea', 'map_all_control[wpgmp_before_listing]', array(
	'label' => __( 'Before Listing Placeholder', WPGMP_TEXT_DOMAIN ),
	'value' => $data['map_all_control']['wpgmp_before_listing'],
	'desc' => __( 'Display a text/html content before display listing.', WPGMP_TEXT_DOMAIN ),
	'textarea_rows' => 10,
	'textarea_name' => 'map_all_control[wpgmp_before_listing]',
	'class' => 'form-control wpgmp_display_listing',
	'show' => 'false',
	'default_value' => __( 'Map Locations',WPGMP_TEXT_DOMAIN ),
));

$list_grid = array( 'wpgmp_listing_list' => 'List','wpgmp_listing_grid' => 'Grid' );
$form->add_element( 'select', 'map_all_control[wpgmp_list_grid]', array(
	'label' => __( 'List/Grid', WPGMP_TEXT_DOMAIN ),
	'current' => $data['map_all_control']['wpgmp_list_grid'],
	'desc' => __( 'Choose listing style for frontend display.', WPGMP_TEXT_DOMAIN ),
	'options' => $list_grid,
	'class' => 'form-control wpgmp_display_listing',
	'show' => 'false',
));

$default_place_holder = '
<div class="wpgmp_locations">
<div class="wpgmp_locations_head">
<div class="wpgmp_location_title">
<a href="" class="place_title" data-zoom="{marker_zoom}" data-marker="{marker_id}">{marker_title}</a>
</div>
<div class="wpgmp_location_meta">
<span class="wpgmp_location_category fc-badge info">{marker_category}</span>
</div>
</div>
<div class="wpgmp_locations_content">
{marker_message}
</div>
<div class="wpgmp_locations_foot"></div>
</div>';
$listing_place_holder = stripslashes( trim( $default_place_holder ) );
$listing_place_holder = (($data['map_all_control']['wpgmp_categorydisplayformat']) ? $data['map_all_control']['wpgmp_categorydisplayformat'] : $listing_place_holder);
/**
$form->add_element( 'textarea', 'map_all_control[wpgmp_categorydisplayformat]', array(
	'label' => __( 'Listing Placeholder', WPGMP_TEXT_DOMAIN ),
	'value' => (($data['map_all_control']['wpgmp_categorydisplayformat']) ? $data['map_all_control']['wpgmp_categorydisplayformat'] : $listing_place_holder),
	'desc' => __( 'Use placeholder - {marker_id}, {marker_zoom}, {marker_title}, {marker_address}, {marker_city}, {marker_state}, {marker_country}, {marker_postal_code}, {marker_message}, {marker_latitude}, {marker_longitude}, {marker_icon},{marker_category},{extra_field_slug_here},{%custom_field_slug_here%}', WPGMP_TEXT_DOMAIN ),
	'textarea_rows' => 10,
	'textarea_name' => 'map_all_control[wpgmp_categorydisplayformat]',
	'class' => 'form-control wpgmp_display_listing',
	'show' => 'false',
));
**/
$form->add_element( 'select', 'map_all_control[wpgmp_categorydisplaysort]', array(
	'label' => __( 'Sort By', WPGMP_TEXT_DOMAIN ),
	'current' => $data['map_all_control']['wpgmp_categorydisplaysort'],
	'desc' => __( 'Select Sort By.', WPGMP_TEXT_DOMAIN ),
	'options' => array( 'title' => __( 'Title',WPGMP_TEXT_DOMAIN ),'address' => __( 'Address',WPGMP_TEXT_DOMAIN ), 'category' => __( 'Category',WPGMP_TEXT_DOMAIN ), 'listorder' => __( 'Category Priority',WPGMP_TEXT_DOMAIN ) ),
	'class' => 'form-control wpgmp_display_listing',
	'show' => 'false',
));


$form->add_element( 'select', 'map_all_control[wpgmp_categorydisplaysortby]', array(
	'label' => __( 'Sort Order', WPGMP_TEXT_DOMAIN ),
	'current' => $data['map_all_control']['wpgmp_categorydisplaysortby'],
	'desc' => __( 'Select sorting order.', WPGMP_TEXT_DOMAIN ),
	'options' => array( 'asc' => __( 'Ascending',WPGMP_TEXT_DOMAIN ),'desc' => __( 'Descending',WPGMP_TEXT_DOMAIN ) ),
	'class' => 'form-control wpgmp_display_listing',
	'show' => 'false',
	'default_value' => 'asc',
));

$form->add_element( 'checkbox', 'map_all_control[wpgmp_apply_radius_only]', array(
	'label' => __( 'Apply Default Radius Filter', WPGMP_TEXT_DOMAIN ),
	'value' => 'true',
	'current' => $data['map_all_control']['wpgmp_apply_radius_only'],
	'desc' => __( 'Show markers available in certain radius based on user search.', WPGMP_TEXT_DOMAIN ),
	'class' => 'chkbox_class wpgmp_display_listing switch_onoff',
	'show' => 'false',
	'data' => array('target' => '.wpgmp_radius_filter_apply')
));

$form->add_element( 'text', 'map_all_control[wpgmp_default_radius]', array(
	'label' => __( 'Default Radius', WPGMP_TEXT_DOMAIN ),
	'value' => $data['map_all_control']['wpgmp_default_radius'],
	'desc' => __( 'Set default radius options.', WPGMP_TEXT_DOMAIN ),
	'class' => 'form-control wpgmp_radius_filter_apply',
	'show' => 'false',
	'default_value' => '100',
));

$dimension_options = array( 'miles' => __( 'Miles',WPGMP_TEXT_DOMAIN ),'km' => __( 'KM',WPGMP_TEXT_DOMAIN ) );
$form->add_element( 'select', 'map_all_control[wpgmp_default_radius_dimension]', array(
	'label' => __( 'Dimension', WPGMP_TEXT_DOMAIN ),
	'current' => $data['map_all_control']['wpgmp_default_radius_dimension'],
	'desc' => __( 'Choose default radius dimension in miles or km.', WPGMP_TEXT_DOMAIN ),
	'options' => $dimension_options,
	'class' => 'form-control  wpgmp_radius_filter_apply',
	'show' => 'false',
));

$form->add_element( 'group', 'map_list_skin_setting', array(
	'value' => __( 'Listing Item Skin', WPGMP_TEXT_DOMAIN ),
	'before' => '<div class="fc-12 wpgmp_display_listing">',
	'after' => '</div>',
	'show' => 'false',
));

$location_placeholders = array(
	 '{marker_id}',
     '{marker_title}',
     '{marker_address}',
     '{marker_message}',
     '{marker_category}',
     '{marker_icon}',
     '{marker_latitude}',
     '{marker_longitude}',
     '{marker_city}',
     '{marker_state}',
     '{marker_country}',
     '{marker_zoom}',
	 '{marker_image}',
     '{marker_postal_code}',
     '{extra_field_slug}',
     '{post_title}',
     '{post_link}',
     '{post_excerpt}',
     '{post_content}',
     '{post_categories}',
     '{post_tags}',
     '{%custom_field_slug_here%}',
	);

$form->add_element( 'templates', 'map_all_control[item_skin]', array(
	'before' => '<div class="fc-12 wpgmp_display_listing">',
	'after' => '</div>',
    'template_types' => 'item',
    'data_placeholders' => $location_placeholders,
    'templatePath' => WPGMP_TEMPLATES,
    'templateURL' => WPGMP_TEMPLATES_URL,
    'customiser' => 'true',
    'show' => 'false',
    'current' => (isset($data['map_all_control']['item_skin'])) ? $data['map_all_control']['item_skin'] : array('name'=>'default','type'=>'item','sourcecode'=>$listing_place_holder),
    'customiser_controls' => array('edit_mode','placeholder','sourcecode','mobile','desktop','grid'),
));

$filters_position = array( 'default' => __( 'Bottom of the Map',WPGMP_TEXT_DOMAIN ),'top_map' => __( 'Top of the Map',WPGMP_TEXT_DOMAIN ) );
$form->add_element( 'select', 'map_all_control[filters_position]', array(
	'label' => __( 'Filters Position', WPGMP_TEXT_DOMAIN ),
	'current' => $data['map_all_control']['filters_position'],
	'desc' => __( 'Choose filters position. Default is below the map.', WPGMP_TEXT_DOMAIN ),
	'options' => $filters_position,
	'class' => 'form-control  wpgmp_display_listing',
	'show' => 'false',
));

$form->add_element( 'checkbox', 'map_all_control[hide_locations]', array(
	'label' => __( 'Show Filters Only', WPGMP_TEXT_DOMAIN ),
	'value' => 'true',
	'current' => $data['map_all_control']['hide_locations'],
	'desc' => __( 'Check to display filters only.', WPGMP_TEXT_DOMAIN ),
	'class' => 'chkbox_class wpgmp_display_listing',
	'show' => 'false',
));

$form->add_element( 'checkbox', 'map_all_control[hide_map]', array(
	'label' => __( "Don't Show Maps", WPGMP_TEXT_DOMAIN ),
	'value' => 'true',
	'current' => $data['map_all_control']['hide_map'],
	'desc' => __( 'Check to display filters & locations only. Maps will be invisible.', WPGMP_TEXT_DOMAIN ),
	'class' => 'chkbox_class wpgmp_display_listing',
	'show' => 'false',
));


$form->add_element( 'group', 'map_geojson_setting', array(
	'value' => __( 'GEOJSON', WPGMP_TEXT_DOMAIN ),
	'before' => '<div class="fc-12">',
	'after' => '</div>',
));

$form->add_element( 'text', 'map_all_control[geojson_url]', array(
	'label' => __( 'Paste GEO JSON URL', WPGMP_TEXT_DOMAIN ),
	'value' => $data['map_all_control']['geojson_url'],
	'desc' => __( 'Enter GEO JSON Url', WPGMP_TEXT_DOMAIN ),
	'class' => 'form-control',
));
