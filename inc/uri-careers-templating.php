<?php
/**
 * Functions for finding templates.
 * http://jeroensormani.com/how-to-add-template-files-in-your-plugin/
 *
 * @package uri-careers
 */

/**
 * Get template.
 *
 * Search for the template and include the file.
 *
 * @since 1.0.0
 *
 * @see wcpt_locate_template()
 *
 * @param string $template_name          Template to load.
 * @param array  $args                   Args passed for the template file.
 * @param string $tempate_path          Path to templates.
 * @param string $default_path           Default path to template files.
 */
function uri_careers_get_template( $template_name, $args = array(), $tempate_path = '', $default_path = '' ) {

	if ( is_array( $args ) && isset( $args ) ) :
		extract( $args );
	endif;

	$template_file = uri_careers_locate_template( $template_name, $tempate_path, $default_path );

	if ( ! file_exists( $template_file ) ) :
		_doing_it_wrong( __FUNCTION__, sprintf( '<code>%s</code> does not exist.', $template_file ), '1.0.0' );
		return;
	endif;

	include $template_file;

}

/**
 * Locate page template.
 *
 * Locate the called template.
 * Search Order:
 * 1. /themes/theme/templates/$template_name
 * 2. /themes/theme/$template_name
 * 3. /plugins/uri-careers/templates/$template_name.
 *
 * @param   string $template_name          Template to load.
 * @param   string $template_path          Path to templates.
 * @param   string $default_path           Default path to template files.
 * @return  string  Path to the template file.
 */
function uri_careers_locate_template( $template_name, $template_path = '', $default_path = '' ) {

	   // Set variable to search in woocommerce-plugin-templates folder of theme.
	if ( ! $template_path ) :
		$template_path = 'templates/';
		endif;

	   // Set default plugin templates path.
	if ( ! $default_path ) :
		$default_path = URI_CAREERS_PATH . 'templates/'; // Path to the template folder
		endif;

	   // Search template file in theme folder.
	$template = locate_template(
			 array(
				 $template_path . $template_name,
				 $template_name,
			 )
			);

	   // Get plugins template file.
	if ( ! $template ) :
		$template = $default_path . $template_name;
	   endif;

	   return apply_filters( 'uri_careers_locate_template', $template, $template_name, $template_path, $default_path );

}

	/**
	 * Template loader.
	 *
	 * The template loader will check if WP is loading a template
	 * for a specific Post Type and will try to load the template
	 * from out 'template-parts' directory.
	 *
	 * @param   string $template    Template file that is being loaded.
	 * @return  string              Template file that should be loaded.
	 */
function uri_careers_template_loader( $template ) {

	if ( is_single() && get_post_type() === 'career-data' ) {

		$file = 'single-career-data.php';

		if ( file_exists( uri_careers_locate_template( $file ) ) ) {
			$template = uri_careers_locate_template( $file );
		}
	}

	return $template;

}
add_filter( 'template_include', 'uri_careers_template_loader', 99 );


