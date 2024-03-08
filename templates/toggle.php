<?php

/**
 * Create the toggle between the Advising and Careers page
 */
function uri_careers_toggle( $link_careers, $link_advising, $button_style, $style_class ) {
	if ( function_exists( 'uri_cl_shortcode_button' ) ) {
		echo '<div class="center">';
		echo do_shortcode( '[cl-button class="' . $style_class[0] . '" link="' . $link_advising . '" text="Majors" style=' . $button_style[0] . '][cl-button class="' . $style_class[1] . '" link="' . $link_careers . '" text="Careers" style="' . $button_style[1] . '"]' );
		echo '</div>';
	}
}
