<?php
if( !class_exists( 'RT_Widget_Fields' ) ){

	class RT_Widget_Fields {
		
		public static function display( $fields, $instance, $object ){
			foreach ( $fields as $key => $field ) {
				$label  = $field['label'];
				$desc   = !empty( $field['desc'] ) ? $field['desc'] : false;
				$id     = $object->get_field_id( $key );
				$name   = $object->get_field_name( $key );
				$value  = $instance[$key];
				
				if ( method_exists( __CLASS__, $field['type'] ) ) {
					echo '<div class="rt-widget-field">';
					if ( version_compare( phpversion() , '5.3.0', '<' ) ) {
						call_user_func( __CLASS__ . '::'. $field['type'], $id, $name, $value, $label );
					}
					else {
						call_user_func( array( __CLASS__, $field['type'] ), $id, $name, $value, $label );
					}
					if ( $desc ) {
						echo '<div class="desc">' . $desc . '</div>';
					}
					echo '</div>';
				}
			}
		}

		public static function text( $id, $name, $value, $label ){
			?>
			<label for="<?php echo esc_attr( $id );?>"><?php echo esc_html( $label );?>:</label>
			<input class="widefat" type="text" id="<?php echo esc_attr( $id ); ?>" name="<?php echo esc_attr( $name ); ?>" value="<?php echo esc_attr( $value ); ?>" />
			<?php
		}

		public static function textarea( $id, $name, $value, $label ){
			?>
			<label for="<?php echo esc_attr( $id );?>"><?php echo esc_html( $label );?>:</label>
			<textarea class="widefat" rows="3" id="<?php echo esc_attr( $id ); ?>" name="<?php echo esc_attr( $name ); ?>"><?php echo esc_textarea( $value ); ?></textarea>
			<?php
		}

		public static function url( $id, $name, $value, $label ){
			?>
			<label for="<?php echo esc_attr( $id );?>"><?php echo esc_html( $label );?>:</label>
			<input class="widefat" type="text" id="<?php echo esc_attr( $id ); ?>" name="<?php echo esc_attr( $name ); ?>" value="<?php echo esc_url( $value ); ?>" />
			<?php
		}

		public static function checkbox( $id, $name, $value, $label ){
			?>
			<label for="<?php echo esc_attr( $id ); ?>"><input class="widefat" type="checkbox" id="<?php echo esc_attr( $id ); ?>" name="<?php echo esc_attr( $name );?>" <?php echo $value ? ' checked="checked"' : '';?> /> <?php echo esc_html( $label );?></label>
			<?php
		}

		// Using components of RT_Postmeta_Fields
		public static function image( $id, $name, $value, $label ){
			$image = '';
			$disstyle = '';

			if ( $value ) {
				$image = wp_get_attachment_image_src( $value, 'thumbnail' );
				$image = $image[0];
			}
			else{
				$disstyle = 'display:none;';
			}

			echo '
			<label for="' . esc_attr( $id ) . '">' . esc_html( $label ) . ':</label>
			<div class="rt_metabox_image">
				<input name="'. esc_attr( $name ) .'" type="hidden" class="custom_upload_image" value="'. esc_attr( $value ) .'" />
				<img src="'. esc_url( $image ) .'" class="custom_preview_image" style="'. esc_attr( $disstyle ) .'" alt="" />
				<input class="rt_upload_image upload_button_'. esc_attr( $id ) .' button-primary" type="button" value="' . esc_html__( 'Choose Image', 'rt-framework' ). '" />
				<div class="rt_remove_image_wrap" style="'. esc_attr( $disstyle ) .'"><a href="#" class="rt_remove_image button" >' . __( 'Remove Image', 'rt-framework' ). '</a></div>
			</div>
			';
		}
	}
}