<?php

namespace ACA\ACF\Editing;

use ACA\ACF\Editing;
use DateTime;

class DatePicker extends Editing {

	public function get_edit_value( $id ) {
		$value = parent::get_edit_value( $id );
		$date = DateTime::createFromFormat( 'Ymd', $value );

		if ( ! $date ) {
			return false;
		}

		return $date->format( 'Y-m-d' );
	}

	public function get_view_settings() {
		$data = parent::get_view_settings();
		$field = $this->column->get_field();

		$data['type'] = 'date';
		$data['weekstart'] = $field->get( 'first_day' );

		if ( ! $field->get( 'required' ) ) {
			$data['clear_button'] = true;
		}

		return $data;
	}

	public function save( $id, $value ) {
		if ( $value ) {
			$date = DateTime::createFromFormat( 'Y-m-d', $value );
			$value = $date->format( 'Ymd' );
		}

		return parent::save( $id, $value );
	}

}