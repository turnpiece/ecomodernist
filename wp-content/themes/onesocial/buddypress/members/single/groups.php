<?php

/**
 * BuddyPress - Users Groups
 *
 * @package BuddyPress
 * @subpackage bp-legacy
 */

?>

<div class="item-list-tabs no-ajax" id="subnav" role="navigation">
	<ul>
		<?php
		if ( bp_is_my_profile() ) {
			bp_get_options_nav();

			echo bp_get_group_create_nav_item();
		}
		?>

		<?php if ( !bp_is_current_action( 'invites' ) ) : ?>

			<li id="groups-order-select" class="last filter">

				<label for="groups-order-by"><?php _e( 'Order By: ', 'onesocial' ); ?></label>
				<select id="groups-order-by">
					<option value="active"><?php _e( 'Last Active', 'onesocial' ); ?></option>
					<option value="popular"><?php _e( 'Most Members', 'onesocial' ); ?></option>
					<option value="newest"><?php _e( 'Newly Created', 'onesocial' ); ?></option>
					<option value="alphabetical"><?php _e( 'Alphabetical', 'onesocial' ); ?></option>

					<?php do_action( 'bp_member_group_order_options' ); ?>

				</select>
			</li>

		<?php endif; ?>

	</ul>
</div><!-- .item-list-tabs -->

<?php

switch ( bp_current_action() ) :

	// Home/My Groups
	case 'my-groups' :
		do_action( 'bp_before_member_groups_content' ); ?>

		<div class="groups mygroups dir-list">

			<?php bp_get_template_part( 'groups/groups-loop' ); ?>

		</div>

		<?php do_action( 'bp_after_member_groups_content' );
		break;

	// Group Invitations
	case 'invites' :
		bp_get_template_part( 'members/single/groups/invites' );
		break;

	// Any other
	default :
		bp_get_template_part( 'members/single/plugins' );
		break;
endswitch;