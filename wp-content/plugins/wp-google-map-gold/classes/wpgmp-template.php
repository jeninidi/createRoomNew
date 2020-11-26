<?php
/**
 * Template class
 * @author Flipper Code<hello@flippercode.com>
 * @version 3.0.0
 * @package Posts
 */

if ( ! class_exists( 'WPGMP_Template' ) ) {

	/**
	 * Controller class to display views.
	 * @author: Flipper Code<hello@flippercode.com>
	 * @version: 3.0.0
	 * @package: Maps
	 */

	class WPGMP_Template extends FlipperCode_HTML_Markup{


		function __construct($options = array()) {

			$productInfo = array('productName' => __('WP Google Map Pro',WPGMP_TEXT_DOMAIN),
                        'productSlug' => 'wp-google-map-gold',
                        'product_tag_line' => 'worlds most advanced google map plugin',
                        'productTextDomain' => WPGMP_TEXT_DOMAIN,
                        'productVersion' => WPGMP_VERSION,
                        'productID' => '5211638',
                        'videoURL' => 'https://www.youtube.com/playlist?list=PLlCp-8jiD3p2PYJI1QCIvjhYALuRGBJ2A',
                        'docURL' => 'http://wpgmp.flippercode.com/tutorials/',
                        'demoURL' => 'http://wpgmp.flippercode.com',
                        'productSaleURL' => 'http://codecanyon.net/item/advanced-google-maps-plugin-for-wordpress/5211638',
                        'multisiteLicence' => 'http://codecanyon.net/item/advanced-google-maps-plugin-for-wordpress/5211638?license=extended&open_purchase_for_item_id=5211638&purchasable=source'
   			 );
			$productInfo = array_merge($productInfo, $options);
			parent::__construct($productInfo);

		}

	}
	
}
