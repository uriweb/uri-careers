<?php

/**
 * Create the toggle between the Advising and Careers page
 */
function uri_careers_toggle( $button_careers, $button_majors, $button_style, $style_class ) {
	return '<div class="center">' . do_shortcode( '[cl-button class="' . $style_class[0] . '" link="' . $button_majors . '" text="Majors" style=' . $button_style[0] . '][cl-button class="' . $style_class[1] . '" link="' . $button_careers . '" text="Careers" style="' . $button_style[1] . '"]' ) .
	'</div>';
}
