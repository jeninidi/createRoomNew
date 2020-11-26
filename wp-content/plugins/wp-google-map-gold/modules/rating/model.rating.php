<?php
/**
 * Class: WPGMP_Model_Rating
 * @author Flipper Code <hello@flippercode.com>
 * @package Maps
 * @version 3.0.0
 */

if ( ! class_exists( 'WPGMP_Model_Rating' ) ) {

	/**
	 * Rating model for CRUD operation.
	 * @package Maps
	 * @author Flipper Code <hello@flippercode.com>
	 */
	class WPGMP_Model_Rating extends FlipperCode_Model_Base
	{
		/**
		 * Validations on rating properies.
		 * @var array
		 */
		public $validations = array(
		);
		/**
		 * Intialize rating object.
		 */
		public function __construct() {
			$this->table = TBL_RATING;
			$this->unique = 'rating_id';
		}
		/**
		 * Admin menu for CRUD Operation
		 * @return array Admin meny navigation(s).
		 */
		public function navigation() {

			return array(
			
			);
		}
		/**
		 * Install table associated with rating entity.
		 * @return string SQL query to install location_ratings table.
		 */
		public function install() {

			global $wpdb;
			$rating = 'CREATE TABLE '.$wpdb->prefix.'location_ratings (
				rating_id int(11) NOT NULL AUTO_INCREMENT,
				location_id int(11) NOT NULL DEFAULT 0,
				loc_type ENUM("location","post") DEFAULT "location",
				user_id int(11) NOT NULL DEFAULT 0,
				user_ip varchar(255) NOT NULL,
				map_id int(11) NOT NULL,
				rating DOUBLE NOT NULL,
				PRIMARY KEY  (rating_id)
				) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1 ;';
			return $rating;
		}
		/**
		 * Get Rating(s)
		 * @param  array $where  Conditional statement.
		 * @return array         Array of Rating object(s).
		 */
		public function fetch($where = array()) {

			$objects = $this->get( $this->table, $where );

			if ( isset( $objects ) ) {
				return $objects;
			}
		}
		/**
		 * Add or Edit Operation.
		 */
		public function save($value) {
			//global $_POST;
			$entityID = ''; $data = array();
			if ( isset( $value['entityID'] ) ) {
				$entityID = intval( wp_unslash( $value['entityID'] ) );
			}
			$data['location_id'] 		= sanitize_text_field( wp_unslash( $value['location_id'] ) );
			$data['map_id'] 		= sanitize_text_field( wp_unslash( $value['map_id'] ) );
			$data['loc_type'] 		= sanitize_text_field( wp_unslash( $value['loc_type'] ) );
			if(isset($value['user_id'])){
				$data['user_id'] 	= sanitize_text_field( wp_unslash( $value['user_id'] ) );
			}
			$data['user_ip'] 	= sanitize_text_field( wp_unslash( $value['user_ip'] ) );
			$data['rating'] 			= sanitize_text_field( wp_unslash( $value['rating'] ) );
			if ( $entityID > 0 ) {
				$where[ $this->unique ] = $entityID;
			} else {
				$where = '';
			}

			$result = FlipperCode_Database::insert_or_update( $this->table, $data, $where );

			if ( false === $result ) {
				$response['error'] = __( 'Something went wrong. Please try again.',WPGMP_TEXT_DOMAIN );
			} elseif ( $entityID > 0 ) {
				$response['success'] = __( 'Rating updated successfully',WPGMP_TEXT_DOMAIN );
			} else {
				$response['success'] = __( 'Rating saved successfully.',WPGMP_TEXT_DOMAIN );
			}
			return $response;
		}
		/**
		 * Get user ip.
		 */
		function get_user_ip() {
			if ( ! empty( $_SERVER['HTTP_CLIENT_IP'] ) ) {
				$user_ip = $_SERVER['HTTP_CLIENT_IP'];
			} elseif ( ! empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) {
				$user_ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
			} else {
				$user_ip = $_SERVER['REMOTE_ADDR'];
			}
			return $user_ip;
		}
		
		/**
		 * Get average rating
		 */
		public function get_locs_rating($map_id) {
			if ( $map_id!='') {
				$map_id = intval( wp_unslash( $map_id ) );
				$connection = FlipperCode_Database::connect();
				$this->query = $connection->prepare( "SELECT AVG(rating) as avg_rating, location_id, loc_type FROM $this->table WHERE map_id='%d' GROUP BY location_id", $map_id );
				return FlipperCode_Database::reader( $this->query, $connection );
			}
		}
		
		/**
		 * Get average rating
		 */
		public function get_location_average_rating($map_id,$loc_id,$loc_type) {
			if ( $map_id!='' && $loc_id != '' && $loc_type != '' ) {
				$map_id = intval( wp_unslash( $map_id ) );
				$loc_id = intval( wp_unslash( $loc_id ) );
				$loc_type = sanitize_text_field( wp_unslash( $loc_type ) );
				$connection = FlipperCode_Database::connect();
				$this->query = $connection->prepare( "SELECT AVG(rating) as avg_rating, location_id, loc_type FROM $this->table WHERE map_id='%d' AND location_id='%d' AND loc_type='%s'", $map_id,$loc_id,$loc_type );
				return FlipperCode_Database::reader( $this->query, $connection );
			}
		}
	}
}
