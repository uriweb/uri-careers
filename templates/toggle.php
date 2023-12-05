<?php

/**
 * Create the toggle for advising pages
 */
function uri_careers_toggle( $link_careers, $link_advising, $button_style ) {
	if ( function_exists( 'uri_cl_shortcode_button' ) ) {
		echo '<div class="center">';
		echo do_shortcode( '[cl-button link="' . $link_advising . '" text="Advising" style=' . $button_style[0] . '][cl-button link="' . $link_careers . '" text="Careers" style="' . $button_style[1] . '"]' );
		echo '</div>';
	}
}
