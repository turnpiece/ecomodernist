<?php
/**
 * BuddyPress Media - group album create template
 *
 * @package WordPress
 * @subpackage BuddyBoss Media
 */
?>

<?php //do_action( 'template_notices' ); ?>

<h2 class="entry-title create-album-title"><?php _e( 'Create an Album', 'onesocial' );?></h2>

<div id="buddypress" class="album-wrapper">
	<form method="POST" id="buddyboss-media-album-create-form" class="standard-form album-create-form">
		<?php wp_nonce_field( 'buddyboss_media_edit_album' );?>
			
		<div class="editfield">
			<label for="album_title"><?php _e( 'Title (required)', 'onesocial' );?></label>
			<input type="text" name="album_title" value="<?php if( isset( $_POST['album_title'] ) ){ echo esc_attr($_POST['album_title']); }?>">
		</div>

		<div class="editfield">
			<label for="album_description"><?php _e( 'Description', 'onesocial' );?></label>
			<textarea name="album_description"><?php if( isset( $_POST['album_description'] ) ){ echo esc_attr($_POST['album_description']); }?></textarea>
		</div>

		<div class="editfield">
			<label for="album_privacy"><?php _e( 'Visibility (required)', 'buddyboss-media' );?></label>
			<select name="album_privacy">
			<?php 
            $is_group = bp_is_group();
            $options = bbm_get_visibility_lists( $is_group );
			
			$selected_val = isset( $_POST['album_visibility'] ) ? $_POST['album_visibility'] : '';
			
			foreach( $options as $key=>$val ){
                //replace key loggedin with members
                if( $is_group && 'loggedin' == $key ){
                    $key = 'members';
                }
				$selected = $selected_val == $key ? ' selected' : '';
				echo "<option value='" . esc_attr( $key ) . "' $selected>$val</option>";
			}
			?>
			</select>
		</div>

		<div class="submit">
			<input type="submit" name="btn_submit" value="<?php esc_attr_e( 'Create Album', 'onesocial' );?>">
		</div>

	</form>
</div>