<?php
/**
 * Map's Advanced setting(s).
 * @package Maps
 */

$form->add_element( 'group', 'map_advanced_setting', array(
	'value' => __( 'Advanced Settings', WPGMP_TEXT_DOMAIN ),
	'before' => '<div class="fc-12">',
	'after' => '</div>',
));

$form->add_element( 'checkbox_toggle', 'map_all_control[url_filter]', array(
	'label' => __( 'URL Filters', WPGMP_TEXT_DOMAIN ),
	'value' => 'true',
	'id' => 'wpgmp_url_filter',
	'current' => $data['map_all_control']['url_filter'],
	'desc' => __( 'Check to enable filters by url parameters.', WPGMP_TEXT_DOMAIN ),
	'class' => 'checkbox_toggle switch_onoff',
	'data' => array( 'target' => '.url_filer_options' ),
));

$form->add_element( 'message', 'url_instruction', array(
	'value' => __( 'You can filter markers/locations/posts on maps using url parameters. Following default parameters are supported :',WPGMP_TEXT_DOMAIN ),
	'class' => 'fc-msg fc-success url_filer_options',
	'show' => 'false',
));

$url_parameters = array(
	array('search', __('Search Term',WPGMP_TEXT_DOMAIN)),
	array('category', __('Category ID or Name.',WPGMP_TEXT_DOMAIN)),
	array('limit', __('# of Locations.',WPGMP_TEXT_DOMAIN)),
	array('perpage', __('# of Locations per page.',WPGMP_TEXT_DOMAIN)),
	array('zoom', __('Zoom Level.',WPGMP_TEXT_DOMAIN)),
	array('hide_map', __('To hide the map. Filters & listing will be visible if enabled.',WPGMP_TEXT_DOMAIN)),
	array('maps_only', __('To show only maps. Tabs, filters, listing will be hide.',WPGMP_TEXT_DOMAIN)),
);

$form->add_element( 'table', 'wpgmp_urlparameters_table', array(
	'heading' => array( 'Query Parameter','Value' ),
	'data' => $url_parameters,
	'before' => '<div class="fc-8">',
	'after' => '</div>',
	'class' => 'fc-table fc-table-layout5 url_filer_options',
	'show' => 'false',
));

