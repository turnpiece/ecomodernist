<?php $destinations = array();

foreach ( WPMUDEVSnapshot::instance()->config_data['destinations'] as $key => $item ){
	$type = $item['type'];

	if ( ! isset( $destinations[ $type ] ) ){
		$destinations[ $type ] = array();
	}

	$destinations[ $type ][ $key ] = $item;
} ?>

<section class="wpmud-box wpsd-widget-sftp">

	<div class="wpmud-box-title has-typecon has-button">

		<i class="wps-typecon sftp"></i>

		<h3><?php esc_html_e( 'FTP/sFTP', SNAPSHOT_I18N_DOMAIN ); ?></h3>
		<?php
		$add_destination_link = add_query_arg(
									array(
										'snapshot-action' => 'add' ,
										'type' => 'ftp',
										'destination-noonce-field' => wp_create_nonce( 'snapshot-destination' ),
										), WPMUDEVSnapshot::instance()->snapshot_get_pagehook_url('snapshots-newui-destinations')
									);
		?>
		<a class="button button-small button-outline" href="<?php echo esc_url( $add_destination_link ); ?>" class="button button-outline"><?php esc_html_e( 'Add Destination', SNAPSHOT_I18N_DOMAIN ); ?></a>

	</div>

	<div class="wpmud-box-content">

		<div class="row">

			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

				<?php
                $this->render(
					"destinations/partials/ftp-destination-list", false, array(
						'item' => $item,
						'destinations' => ( isset( $destinations[ 'ftp' ] ) ? $destinations[ 'ftp' ] : array() )
					), false, false
				);
				?>

			</div>

		</div>

	</div>

</section>