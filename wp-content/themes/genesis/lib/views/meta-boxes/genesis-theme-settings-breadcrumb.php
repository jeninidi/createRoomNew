<?php
/**
 * Genesis Framework.
 *
 * WARNING: This file is part of the core Genesis Framework. DO NOT edit this file under any circumstances.
 * Please do all modifications in the form of a child theme.
 *
 * @package StudioPress\Genesis
 * @author  StudioPress
 * @license GPL-2.0-or-later
 * @link    https://my.studiopress.com/themes/genesis/
 */

?>
<table class="form-table">
<tbody>

	<tr valign="top">
		<th scope="row"><?php esc_html_e( 'Enable Breadcrumbs on', 'genesis' ); ?></th>
		<td>
			<fieldset>
			<legend class="screen-reader-text"><?php esc_html_e( 'Enable Breadcrumbs on', 'genesis' ); ?></legend>

				<?php if ( 'page' === get_option( 'show_on_front' ) ) : ?>
					<p><label for="<?php $this->field_id( 'breadcrumb_front_page' ); ?>"><input type="checkbox" name="<?php $this->field_name( 'breadcrumb_front_page' ); ?>" id="<?php $this->field_id( 'breadcrumb_front_page' ); ?>" value="1"<?php checked( $this->get_field_value( 'breadcrumb_front_page' ) ); ?> />
					<?php esc_html_e( 'Front page', 'genesis' ); ?></label></p>

					<p><label for="<?php $this->field_id( 'breadcrumb_posts_page' ); ?>"><input type="checkbox" name="<?php $this->field_name( 'breadcrumb_posts_page' ); ?>" id="<?php $this->field_id( 'breadcrumb_posts_page' ); ?>" value="1"<?php checked( $this->get_field_value( 'breadcrumb_posts_page' ) ); ?> />
					<?php esc_html_e( 'Posts page', 'genesis' ); ?></label></p>
				<?php else : ?>
					<p><label for="<?php $this->field_id( 'breadcrumb_home' ); ?>"><input type="checkbox" name="<?php $this->field_name( 'breadcrumb_home' ); ?>" id="<?php $this->field_id( 'breadcrumb_home' ); ?>" value="1"<?php checked( $this->get_field_value( 'breadcrumb_home' ) ); ?> />
					<?php esc_html_e( 'Homepage', 'genesis' ); ?></label></p>
				<?php endif; ?>

				<p><label for="<?php $this->field_id( 'breadcrumb_single' ); ?>"><input type="checkbox" name="<?php $this->field_name( 'breadcrumb_single' ); ?>" id="<?php $this->field_id( 'breadcrumb_single' ); ?>" value="1"<?php checked( $this->get_field_value( 'breadcrumb_single' ) ); ?> />
				<?php esc_html_e( 'Single Posts', 'genesis' ); ?></label></p>

				<p><label for="<?php $this->field_id( 'breadcrumb_page' ); ?>"><input type="checkbox" name="<?php $this->field_name( 'breadcrumb_page' ); ?>" id="<?php $this->field_id( 'breadcrumb_page' ); ?>" value="1"<?php checked( $this->get_field_value( 'breadcrumb_page' ) ); ?> />
				<?php esc_html_e( 'Pages', 'genesis' ); ?></label></p>

				<p><label for="<?php $this->field_id( 'breadcrumb_archive' ); ?>"><input type="checkbox" name="<?php $this->field_name( 'breadcrumb_archive' ); ?>" id="<?php $this->field_id( 'breadcrumb_archive' ); ?>" value="1"<?php checked( $this->get_field_value( 'breadcrumb_archive' ) ); ?> />
				<?php esc_html_e( 'Archives', 'genesis' ); ?></label></p>

				<p><label for="<?php $this->field_id( 'breadcrumb_404' ); ?>"><input type="checkbox" name="<?php $this->field_name( 'breadcrumb_404' ); ?>" id="<?php $this->field_id( 'breadcrumb_404' ); ?>" value="1"<?php checked( $this->get_field_value( 'breadcrumb_404' ) ); ?> />
				<?php esc_html_e( '404 page', 'genesis' ); ?></label></p>

				<p><label for="<?php $this->field_id( 'breadcrumb_attachment' ); ?>"><input type="checkbox" name="<?php $this->field_name( 'breadcrumb_attachment' ); ?>" id="<?php $this->field_id( 'breadcrumb_attachment' ); ?>" value="1"<?php checked( $this->get_field_value( 'breadcrumb_attachment' ) ); ?> />
				<?php esc_html_e( 'Attachment/Media', 'genesis' ); ?></label></p>

			</fieldset>
		</td>
	</tr>

</tbody>
</table>
