<?php

function uri_careers_toggle ($link_careers) {
    if ( function_exists( 'uri_cl_shortcode_button' ) ) {
        $link_advising = get_permalink();
        echo '<div class="center">';
        echo do_shortcode( '[cl-button link="' . $link_advising . '" text="Advising" style="prominent"][cl-button link="' . $link_careers . '" text="Careers"]' );
echo '</div>';
    }
}
?>