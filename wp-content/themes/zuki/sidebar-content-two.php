<?php
/**
 * The Content Two Widget Area on the Custom Front Page Template
 *
 * @package Zuki
 * @since Zuki 1.0
 */

if ( ! is_active_sidebar( 'front-content-2' ) ) {
	return;
}
?>
<div id="front-content-two" class="front-content widget-area">
	<?php dynamic_sidebar( 'front-content-2' ); ?>
</div><!-- #front-content-two -->